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

use Revision6\Contao\DataContainer\Events\ButtonCallbackEvent;
use Revision6\Contao\DataContainer\Events\ChildRecordCallbackEvent;
use Revision6\Contao\DataContainer\Events\LabelCallbackEvent;
use Revision6\Contao\DataContainer\Events\OncreateCallbackEvent;
use Revision6\Contao\DataContainer\Events\OnloadCallbackEvent;
use Revision6\Contao\DataContainer\Events\OnsubmitCallbackEvent;
use Revision6\Contao\DataContainer\Events\OptionsCallbackEvent;
use Revision6\Contao\DataContainer\Events\SaveCallbackEvent;
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
     * @param array          $row           The current database row.
     * @param string         $label         The current label.
     * @param \DataContainer $dataContainer The current dataContainer instance.
     * @param string         $eventName     The called eventName.
     *
     * @return string
     */
    public static function invokeLabelCallbackEvent($row, $label, $dataContainer, $eventName)
    {
        $event = new LabelCallbackEvent($row, $label, $dataContainer);
        self::dispatchEvent($eventName, $event);

        return $event->getLabel();
    }

    /**
     * Dispatch the childRecordCallbackEvent.
     *
     * @param array  $row       The current database row.
     * @param string $eventName The called eventName.
     *
     * @return string
     */
    public static function invokeChildRecordCallbackEvent($row, $eventName, $table)
    {
        $event = new ChildRecordCallbackEvent($row, $table);
        self::dispatchEvent($eventName, $event);

        return $event->getLabel();
    }

    /**
     * Dispatch the saveCallbackEvent.
     *
     * @param \DataContainer $dataContainer The current dataContainer.
     * @param mixed          $value         The current field value.
     * @param string         $eventName     The current event name.
     *
     * @return mixed
     */
    public static function invokeSaveCallbackEvent($dataContainer, $value, $eventName)
    {
        $event = new SaveCallbackEvent($value, $dataContainer);
        self::dispatchEvent($eventName, $event);

        return $event->getValue();
    }

    /**
     * Dispatch the onloadCallbackEvent.
     *
     * @param \DataContainer $dataContainer The current dataContainer instance.
     * @param string         $eventName     The current event name.
     *
     * @return void
     */
    public static function invokeOnloadCallbackEvent($dataContainer, $eventName)
    {
        $event = new OnloadCallbackEvent($dataContainer);
        self::dispatchEvent($eventName, $event);
    }

    public static function invokeOnsubmitCallbackEvent($dataContainer, $eventName)
    {
        $event = new OnsubmitCallbackEvent($dataContainer);
        self::dispatchEvent($eventName, $event);
    }

    public static function invokeOncreateCallbackEvent($table, $recordId, $values, $dataContainer, $eventName)
    {
        $event = new OncreateCallbackEvent($table, $recordId, $values, $dataContainer);
        self::dispatchEvent($eventName, $event);
    }

    /**
     * Dispatch the optionsCallbackEvent.
     *
     * @param \DataContainer $dataContainer The current dataConter instance.
     * @param string         $eventName     The current event name.
     *
     * @return array
     */
    public static function invokeOptionsCallbackEvent($dataContainer, $eventName)
    {
        $event = new OptionsCallbackEvent($dataContainer);
        self::dispatchEvent($eventName, $event);

        return $event->getOptions()->getArrayCopy();
    }

    public static function invokeButtonCallbackEvent(
        $row,
        $href,
        $label,
        $title,
        $icon,
        $attributes,
        $table,
        $roots,
        $childs,
        $circularReference,
        $previous,
        $next,
        $dataContainer,
        $eventName,
        $command
    ) {
        $event = new ButtonCallbackEvent(
            $row,
            $href,
            $label,
            $title,
            $icon,
            $attributes,
            $table,
            $roots,
            $childs,
            $circularReference,
            $previous,
            $next,
            $dataContainer,
            $command
        );
        self::dispatchEvent($eventName, $event);

        return $event->getButton();
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
