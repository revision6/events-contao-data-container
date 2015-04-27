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
 * Class LabelCallbackEvent to handle the LabelCallbackEvent.
 *
 * @package Revision6\Contao\DataContainer\Events
 */
class OptionsCallbackEvent extends Event
{
    /**
     * The eventName.
     */
    const NAME = 'contao.datacontainer.events.options-callback';

    /**
     * The current dataContainer instance.
     *
     * @var \DataContainer
     */
    protected $dataContainer;

    /**
     * The current options array object.
     *
     * @var \ArrayObject
     */
    protected $options;

    /**
     * The constructor for setting some values.
     *
     * @param \DataContainer $dataContainer The current dataContainer instance.
     * @param \ArrayObject   $options       The current options array object.
     */
    public function __construct(\DataContainer $dataContainer, \ArrayObject $options = null)
    {
        $this->dataContainer = $dataContainer;

        if ($this->options) {
            $this->options = $options;
        } else {
            $this->options = new \ArrayObject();
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
     * Set the options to the array object.
     *
     * @param \ArrayObject $options The options to set to the array object.
     *
     * @return object
     */
    public function setOptions($options)
    {
        $this->options = $options;
        return $this;
    }

    /**
     * Get the current options.
     *
     * @return \ArrayObject
     */
    public function getOptions()
    {
        return $this->options;
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
