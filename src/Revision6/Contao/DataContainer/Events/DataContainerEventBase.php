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

namespace Revision6\Contao\DataContainer\Events;

use Symfony\Component\EventDispatcher\Event;

/**
 * Class SaveCallbackEvent to handle the save_callback event.
 *
 * @package Revision6\Contao\DataContainer\Events
 */
class DataContainerEventBase extends Event
{
    /**
     * The current dataContainer instance.
     *
     * @var \DataContainer $dataContainer The current dataContainer instance.
     */
    protected $dataContainer;

    /**
     * Get the current dataContainer instance.
     *
     * @return \DataContainer
     */
    public function getDataContainer()
    {
        return $this->dataContainer;
    }

    /**
     * Get the current table name.
     *
     * @return string
     */
    public function getTableName()
    {
        return $this->dataContainer->table;
    }

    /**
     * Get the current field name.
     *
     * @return string
     */
    public function getFieldName()
    {
        return $this->dataContainer->field;
    }
}
