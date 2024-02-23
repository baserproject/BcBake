<?php

namespace BcBake\Command\Bake;

use Bake\Command\PluginCommand;
use Bake\View\BakeView;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Utility\Filesystem;
use Cake\Utility\Inflector;

class BcPluginCommand extends PluginCommand
{
    public function execute(Arguments $args, ConsoleIo $io): ?int
    {
        $this->theme = $args->getOption('theme');
        return parent::execute($args, $io);
    }

    protected function _generateFiles(
        string $pluginName,
        string $path,
        Arguments $args,
        ConsoleIo $io
    ): void {
        $namespace = str_replace('/', '\\', $pluginName);
        $baseNamespace = Configure::read('App.namespace');

        $name = $pluginName;
        $vendor = 'your-name-here';
        if (str_contains($pluginName, '/')) {
            [$vendor, $name] = explode('/', $pluginName);
        }
        $package = Inflector::dasherize($vendor) . '/' . Inflector::dasherize($name);

        $composerConfig = json_decode(
            file_get_contents(ROOT . DS . 'composer.json'),
            true
        );
        $renderer = $this->createTemplateRenderer()
            ->set([
                'name' => $name,
                'package' => $package,
                'namespace' => $namespace,
                'baseNamespace' => $baseNamespace,
                'plugin' => $pluginName,
                'routePath' => Inflector::dasherize($pluginName),
                'path' => $path,
                'root' => ROOT,
                'cakeVersion' => $composerConfig['require']['cakephp/cakephp'],
            ]);

        $root = $path . $pluginName . DS;

        $paths = [];
        if ($args->hasOption('theme')) {
            $paths[] = Plugin::templatePath($args->getOption('theme'));
        }

        $paths = array_merge($paths, Configure::read('App.paths.templates'));
        $paths[] = Plugin::templatePath('Bake');

        $fs = new Filesystem();
        $templates = [];
        do {
            $templatesPath = array_shift($paths) . BakeView::BAKE_TEMPLATE_FOLDER . '/Plugin';
            if (is_dir($templatesPath)) {
                $templates = array_keys(iterator_to_array(
                    $fs->findRecursive($templatesPath, '/\.twig$/')
                ));
            }
        } while (!$templates);

        sort($templates);
        foreach ($templates as $template) {
            $template = substr($template, strrpos($template, 'Plugin' . DIRECTORY_SEPARATOR) + 7, -4);
            $template = rtrim($template, '.');
            $filename = $template;
            if ($filename === 'src/Plugin.php') {
                $filename = 'src/' . $name . 'Plugin.php';
            }
            // CUSTOMIZE ADD 2024/02/02 ryuring
            // >>>
            if ($filename === 'src/ServiceProvider/ServiceProvider.php') {
                $filename = 'src/ServiceProvider/' . $name . 'ServiceProvider.php';
            }
            if (strpos($filename, 'src/Event/') === 0) {
                $filename = 'src/Event/' . $name . substr($filename, 10);
            }
            // <<<
            $this->_generateFile($renderer, $template, $root, $filename, $io);
        }
    }
}
