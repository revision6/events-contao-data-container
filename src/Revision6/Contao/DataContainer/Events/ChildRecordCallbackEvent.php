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
class ChildRecordCallbackEvent extends Event
{
    /**
     * The eventName.
     */
    const NAME = 'contao.datacontainer.events.child-record-callback';

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

    protected $table;

    /**
     * Set the event vars.
     *
     * @param array $row The current database row.
     */
    public function __construct($row, $table)
    {
        $this->row   = $row;
        $this->table = $table;
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

    /**
     * @return mixed
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @param mixed $table
     */
    public function setTable($table)
    {
        $this->table = $table;
    }
}
