<?php
declare(strict_types=1);
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

use Bake\Command\AllCommand;
use Bake\Command\ControllerCommand;
use Bake\Command\ModelCommand;
use Bake\Command\TemplateCommand;

/**
 * Command for `bake all`
 */
class BcAllCommand extends AllCommand
{

    /**
     * All commands to call.
     *
     * @var array<string>
     */
    protected $commands = [
        ModelCommand::class,
        ControllerCommand::class,
        TemplateCommand::class,
        // CUSTOMIZE ADD 2024/02/23 ryuring
        // >>>
        ServiceCommand::class,
        AdminServiceCommand::class
        // <<<
    ];

}
