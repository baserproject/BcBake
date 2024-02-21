<?php
/**
 * baserCMS :  Based Website Development Project <https://basercms.net>
 * Copyright (c) NPO baser foundation <https://baserfoundation.org/>
 *
 * @copyright     Copyright (c) NPO baser foundation
 * @link          https://basercms.net baserCMS Project
 * @since         5.0.7
 * @license       https://basercms.net/license/index.html MIT License
 */

namespace BcBake\Command\Bake;

use Bake\Command\SimpleBakeCommand;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;
use Cake\Core\Configure;
use Cake\Utility\Inflector;

/**
 * AdminServiceCommand
 */
class AdminServiceCommand extends SimpleBakeCommand
{

    /**
     * path fragment
     * @var string
     */
    public string $pathFragment = 'Service/Admin/';

    /**
     * name
     * @return string
     */
    public function name(): string
    {
        return 'admin_service';
    }

    /**
     * fileName
     * @param string $name
     * @return string
     */
    public function template(): string
    {
        return 'Service/admin_service';
    }

    /**
     * fileName
     * @param string $name
     * @return string
     */
    public function fileName(string $name): string
    {
        return $name . 'AdminService.php';
    }

    /**
     * bake
     *
     * interface も生成する
     * @param string $name
     * @param Arguments $args
     * @param ConsoleIo $io
     * @return void
     */
    public function bake(string $name, Arguments $args, ConsoleIo $io): void
    {
        parent::bake($name, $args, $io);
        $this->bakeInterface($args, $io);
    }

    /**
     * templateData
     * @param Arguments $arguments
     * @return array
     */
    public function templateData(Arguments $arguments): array
    {
        $namespace = Configure::read('App.namespace');
        if ($this->plugin) {
            $namespace = $this->_pluginNamespace($this->plugin);
        }
        $name = $arguments->getArgument('name');
        return [
            'namespace' => $namespace,
            'singularName' => Inflector::singularize($name),
            'pluralName' => $name
        ];
    }

    /**
     * interface 生成
     * @param Arguments $args
     * @param ConsoleIo $io
     * @return void
     */
    public function bakeInterface(Arguments $args, ConsoleIo $io): void
    {
        if ($args->getOption('no-interface')) {
            return;
        }
        $serviceInterface = new AdminServiceInterfaceCommand();
        $serviceInterface->execute($args, $io);
    }

}
