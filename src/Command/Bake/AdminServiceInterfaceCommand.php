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
 * AdminServiceInterfaceCommand
 */
class AdminServiceInterfaceCommand extends SimpleBakeCommand
{

    /**
     * path fragment
     * @var string
     */
    public $pathFragment = 'Service/Admin/';

    /**
     * name
     * @return string
     */
    public function name(): string
    {
        return 'admin_service_interface';
    }

    /**
     * fileName
     * @param string $name
     * @return string
     */
    public function template(): string
    {
        return 'Service/admin_service_interface';
    }

    /**
     * fileName
     * @param string $name
     * @return string
     */
    public function fileName(string $name): string
    {
        return $name . 'AdminServiceInterface.php';
    }

}
