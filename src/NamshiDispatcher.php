<?php
/*
 * This file is part of the namshiApi package.
 *
 * (c) mauromurru
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Created: 18/03/15 18:54
 */

namespace brainrepo\namshiApp;

class NamshiDispatcher implements EventDispatcher
{

    private $listeners = [];

    /**
     * Dispatches an event.
     */
    public function dispatch($eventName, array $parameters = array())
    {
        foreach ($this->listeners[$eventName] as $listener) {
            call_user_func_array($listener, $parameters);
        }
    }

    /**
     * Attaches the $callable to an event, so that it will get executed
     * once the event is dispatched.
     */
    public function on($eventName, $callable)
    {
        $this->listeners[$eventName][] = $callable;
    }
}
