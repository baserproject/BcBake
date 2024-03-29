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

/**
 * ServiceCommand
 */
class ServiceCommand extends SimpleBakeCommand
{

    /**
     * path fragment
     * @var string
     */
    public $pathFragment = 'Service/';

    /**
     * name
     * @return string
     */
    public function name(): string
    {
        return 'service';
    }

    /**
     * fileName
     * @param string $name
     * @return string
     */
    public function template(): string
    {
        return 'Service/service';
    }

    /**
     * fileName
     * @param string $name
     * @return string
     */
    public function fileName(string $name): string
    {
        return $name . 'Service.php';
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
        $serviceInterface = new ServiceInterfaceCommand();
        $serviceInterface->execute($args, $io);
    }

}
