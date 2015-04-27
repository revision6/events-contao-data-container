<?php

/**
 * The events save-callback allows to use the save_callback as event
 *
 * PHP version 5
 *
 * @package    EventsSaveCallback
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
class SaveCallbackEvent extends Event
{
    /**
     * The event name.
     */
    const NAME = 'contao.datacontainer.events.save-callback';

    /**
     * The current dataContainer instance.
     *
     * @var \DataContainer $dataContainer The current dataContainer instance.
     */
    protected $dataContainer;

    /**
     * The current value.
     *
     * @var string $value The current field value.
     */
    protected $value;

    /**
     * The constructor for setting some values.
     *
     * @param \DataContainer $dataContainer The current dataContainer instance.
     * @param string         $value         The current field value.
     */
    public function __construct($value, \DataContainer $dataContainer)
    {
        $this->dataContainer = $dataContainer;

        if ($this->value) {
            $this->value = $value;
        } else {
            $this->value = '';
        }
    }

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
     * Set the value for the field.
     *
     * @param string $value The current value to set.
     *
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * Get the value.
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Get the current table name.
     *
     * @return string
     */
    public function getTableName() {
        return $this->dataContainer->table;
    }

    /**
     * Get the current field name.
     *
     * @return string
     */
    public function getFieldName() {
        return $this->dataContainer->field;
    }
}
