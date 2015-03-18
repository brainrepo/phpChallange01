<?php
/*
 * This file is part of the namshiApi package.
 *
 * (c) mauromurru
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Created: 18/03/15 18:28
 */

namespace brainrepo\namshiApp;

class StateMachine
{
    const INITIAL_STATE = "state.initial";
    const MID_STATE = "state.mid";
    const FINAL_STATE = "state.final";

    private $eventDispatcher;

    /**
     * Inject EventDispatcher
     * @param EventDispatcher $dispatcher
     */
    public function __construct(EventDispatcher $dispatcher)
    {
        $this->eventDispatcher = $dispatcher;
    }

    /**
     * Transition to state
     * @param $state
     */
    public function transitionTo($state)
    {
        try {
            $fromState = StateMachine::INITIAL_STATE;
            $toState = StateMachine::MID_STATE;

            $this->eventDispatcher->dispatch('state.change', ['from' => $fromState, 'to' => $toState]);
        } catch (\WhateverException $e) {
            $this->rollback();
        }
    }
}