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

use Cake\Event\Event;
use Cake\Event\EventManager;
use Cake\Utility\Inflector;

EventManager::instance()->on('Bake.beforeRender', function (Event $event) {
    $view = $event->getSubject();
	$name = $view->get('name');
	if(!$name) return;
	$pluralVar = Inflector::variable($name);
	$singularVar = Inflector::singularize($pluralVar);
    if ($pluralVar && !$view->get('pluralVar')) {
        $view->set('pluralVar', $pluralVar);
    }
    if ($singularVar && !$view->get('singularVar')) {
        $view->set('singularVar', $singularVar);
    }
});
