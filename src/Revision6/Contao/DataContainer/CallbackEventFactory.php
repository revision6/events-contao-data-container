<?php

/**
 * The events contao data-container allows you to use contao callbacks as events.
 *
 * PHP version 5
 *
 * @package    EventContaoDataContainer
 * @author     Christopher Boelter <c.boelter@revision6.de>
 * @copyright  Revision6 UG
 * @license    LGPL.
 * @filesource
 */

namespace Revision6\Contao\DataContainer;

use Revision6\Contao\DataContainer\CallbackEventHelper;
use Symfony\Component\EventDispatcher\EventDispatcher;

/**
 * Class CallbackEventFactory to handle the callback calls.
 *
 * @package Revision6\Contao\DataContainer
 */
class CallbackEventFactory
{
    /**
     * Create the label callback and return it to the datacontainer.
     *
     * @param string $eventName The called eventName.
     *
     * @return callable
     */
    public static function createLabelCallback($eventName)
    {
        $callback = function ($row, $label) use ($eventName) {
            return CallbackEventHelper::invokeLabelCallbackEvent($row, $label, $eventName);
        };

        return $callback;
    }
}
