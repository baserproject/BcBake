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

/**
 * ServiceCommand
 */
class ServiceProviderCommand extends SimpleBakeCommand
{

    /**
     * path fragment
     * @var string
     */
    public $pathFragment = 'ServiceProvider/';

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
