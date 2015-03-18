<?php
/*
 * This file is part of the namshiApi package.
 *
 * (c) mauromurru
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Created: 18/03/15 22:08
 */

require __DIR__.'/bootstrap.php';

use brainrepo\namshiApp\NamshiDispatcher;
use brainrepo\namshiApp\StateMachine;

$dispatcher = new NamshiDispatcher();

$listener = function ($eventFrom, $eventTo) {
    echo $eventFrom . " <-> " . $eventTo;
};

$dispatcher->on('state.change', $listener);

$stateMachine = new StateMachine($dispatcher);

$stateMachine->transitionTo('a');
