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

use Revision6\Contao\DataContainer\Events\LabelCallbackEvent;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcher;

/**
 * Class CallbackEventHelper to handle the event dispatching.
 *
 * @package Revision6\Contao\Events\SaveCallback
 */
class CallbackEventHelper
{
    /**
     * Dispatch the labelCallbackEvent.
     *
     * @param array  $row       The current database row.
     * @param string $label     The current label.
     * @param string $eventName The called eventName.
     *
     * @return void
     */
    public static function invokeLabelCallbackEvent($row, $label, $eventName)
    {
        $event = new LabelCallbackEvent($row, $label);
        self::dispatchEvent($eventName, $event);
        
        return $event->getLabel();
    }

    /**
     * Dispatch the given event.
     *
     * @param string $eventName The called eventName.
     * @param object $event     The event instance.
     *
     * @return void
     */
    private function dispatchEvent($eventName, $event)
    {
        /** @var EventDispatcher $eventDispatcher */
        $eventDispatcher = self::getEventDispatcher();
        $eventDispatcher->dispatch($eventName, $event);
    }

    /**
     * Get the eventDispatcher from GLOBAL.
     *
     * @return mixed
     *
     * @SuppressWarnings(PHPMD.Superglobals)
     */
    private function getEventDispatcher()
    {
        return $GLOBALS['container']['event-dispatcher'];
    }
}
