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

use Bake\CodeGen\FileBuilder;
use Bake\Command\SimpleBakeCommand;
use Bake\Command\TestCommand;
use Bake\Utility\TableScanner;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;
use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
use Cake\Utility\Inflector;

/**
 * ServiceCommand
 */
class ServiceProviderCommand extends SimpleBakeCommand
{

    /**
     * path fragment
     * @var string
     */
    public string $pathFragment = 'ServiceProvider/';

    /**
     * name
     * @return string
     */
    public function name(): string
    {
        return 'service_provider';
    }

    /**
     * fileName
     * @param string $name
     * @return string
     */
    public function template(): string
    {
        return 'ServiceProvider/service_provider';
    }

    /**
     * fileName
     * @param string $name
     * @return string
     */
    public function fileName(string $name): string
    {
        return $name . 'ServiceProvider.php';
    }

}
