<?php

namespace Siturra\Flow;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Siturra\Flow\FlowBuilder
 */
class FlowFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return FlowBuilder::class;
    }
}
