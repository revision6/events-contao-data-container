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
class SaveCallbackEvent extends DataContainerEventBase
{
    /**
     * The event name.
     */
    const NAME = 'contao.datacontainer.events.save-callback';

    /**
     * The current value.
     *
     * @var string $value The current field value.
     */
    protected $value;

    /**
     * The constructor for setting some values.
     *
     * @param string         $value         The current field value.
     * @param \DataContainer $dataContainer The current dataContainer instance.
     */
    public function __construct($value, \DataContainer $dataContainer)
    {
        $this->dataContainer = $dataContainer;
        if ($value) {
            $this->value = $value;
        } else {
            $this->value = '';
        }
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
}
