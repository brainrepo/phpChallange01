Coding challanges
==================

## 1. Events to the rescue!

Imagine you re working with a state-machine that triggers a generic `state.change` event.

```php
<?php

class StateMachine
{
   public function transitionTo($state)
   {
        try {
            // ...

            $eventDispatcher->dispatch('state.change', ['from' => $fromState, 'to' => $toState]);
        } catch (\WhateverException $e) {
            $this->rollback();
        }
   }
}
```

Let's say **you can't modify this state machine class** because it's a 3rd party module and your framework sucks so you cannot extend it.

Describe how you can provide a better API / implementation for dealing with state transitions in your userland code.

You can create as many classes as you wish, but your only external dependency you can use in your classes is the `$eventDispatcher`, which implements this interface:

```php
<?php

interface EventDispatcher
{
    /**
     * Dispatches an event.
     */
    public function dispatch($eventName, array $parameters = array());

    /**
     * Attaches the $callable to an event, so that it will get executed
     * once the event is dispatched.
     */
    public function on($eventName, $calllable);
}
```

3 fundamental rules / starting points:

* less is better
* simplicity over complexity
* declarative vs generic

Have fun!