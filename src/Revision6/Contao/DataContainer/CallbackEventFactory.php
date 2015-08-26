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
        $callback = function ($row, $label, $dataContainer) use ($eventName) {
            return CallbackEventHelper::invokeLabelCallbackEvent($row, $label, $dataContainer, $eventName);
        };

        return $callback;
    }

    /**
     * Create the label callback and return it to the datacontainer.
     *
     * @param string $eventName The called eventName.
     *
     * @return callable
     */
    public static function createChildRecordCallback($eventName, $table = '')
    {
        $callback = function ($row) use ($eventName,$table) {
            return CallbackEventHelper::invokeChildRecordCallbackEvent($row, $eventName,$table);
        };

        return $callback;
    }

    /**
     * Create the save callback and return it to the datacontainer.
     *
     * @param string $eventName The current event name.
     *
     * @return callable
     */
    public static function createSaveCallback($eventName)
    {
        $callback = function ($varValue, $dataContainer) use ($eventName) {
            return CallbackEventHelper::invokeSaveCallbackEvent($dataContainer, $varValue, $eventName);
        };

        return $callback;
    }

    /**
     * Create the load callback and return it to the datacontainer.
     *
     * @param string $eventName The current event name.
     *
     * @return callable
     */
    public static function createLoadCallback($eventName)
    {
        $callback = function ($varValue, $dataContainer) use ($eventName) {
            return CallbackEventHelper::invokeLoadCallbackEvent($dataContainer, $varValue, $eventName);
        };

        return $callback;
    }

    /**
     * Create the onload callback and return it to the datacontainer.
     *
     * @param string $eventName The current event name.
     *
     * @return callable
     */
    public static function createOnloadCallback($eventName)
    {
        $callback = function ($dataContainer) use ($eventName) {
            return CallbackEventHelper::invokeOnloadCallbackEvent($dataContainer, $eventName);
        };

        return $callback;
    }

    public static function createOnsubmitCallback($eventName)
    {
        $callback = function ($dataContainer) use ($eventName) {
            return CallbackEventHelper::invokeOnsubmitCallbackEvent($dataContainer, $eventName);
        };

        return $callback;
    }

    public static function createOncreateCallback($eventName)
    {
        $callback = function ($table, $recordId, $values, $dataContainer) use ($eventName) {
            return CallbackEventHelper::invokeOncreateCallbackEvent(
                $table,
                $recordId,
                $values,
                $dataContainer,
                $eventName
            );
        };

        return $callback;
    }

    /**
     * Create the options callback and return it to the datacontainer.
     *
     * @param string $eventName The current event name.
     *
     * @return callable
     */
    public static function createOptionsCallback($eventName)
    {
        $callback = function ($dataContainer) use ($eventName) {
            return CallbackEventHelper::invokeOptionsCallbackEvent($dataContainer, $eventName);
        };

        return $callback;
    }

    public static function createButtonCallback($eventName, $command = null)
    {
        $callback = function (
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
            $dataContainer
        ) use ($eventName, $command) {
            return CallbackEventHelper::invokeButtonCallbackEvent(
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
            );
        };

        return $callback;
    }
}
