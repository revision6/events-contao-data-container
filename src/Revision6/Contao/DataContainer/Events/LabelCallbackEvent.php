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
class LabelCallbackEvent extends Event
{
    /**
     * The eventName.
     */
    const NAME = 'contao.datacontainer.events.label-callback';

    /**
     * The current database row.
     *
     * @var array
     */
    protected $row;

    /**
     * The current label.
     *
     * @var string
     */
    protected $label;

    /**
     * The current dataContainer instance.
     *
     * @var object
     */
    protected $dataContainer;

    /**
     * Set the event vars.
     *
     * @param array  $row           The current database row.
     * @param string $label         The current label.
     * @param object $dataContainer The current dataContainer instance.
     */
    public function __construct($row, $label, $dataContainer)
    {
        $this->row           = $row;
        $this->label         = $label;
        $this->dataContainer = $dataContainer;
    }

    /**
     * Get the current database row.
     *
     * @return array
     */
    public function getRow()
    {
        return $this->row;
    }

    /**
     * Set the current label.
     *
     * @param string $label The current label.
     *
     * @return void
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * Get the current label.
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    public function getDataContainer()
    {
        return $this->dataContainer;
    }

    public function getTableName()
    {
        return $this->dataContainer->table;
    }
}
