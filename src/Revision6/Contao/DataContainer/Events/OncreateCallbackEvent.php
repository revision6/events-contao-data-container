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
 * Class SaveCallbackEvent to handle the onload_callback event.
 *
 * @package Revision6\Contao\Events\SaveCallback
 */
class OncreateCallbackEvent extends DataContainerEventBase
{
    /**
     * The event name.
     */
    const NAME = 'contao.datacontainer.events.oncreate-callback';

    protected $table;

    protected $recordId;

    protected $values;

    function __construct($table, $recordId, $values, $dataContainer)
    {
        $this->table         = $table;
        $this->recordId      = $recordId;
        $this->values        = $values;
        $this->dataContainer = $dataContainer;
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

    /**
     * @return mixed
     */
    public function getRecordId()
    {
        return $this->recordId;
    }

    /**
     * @param mixed $recordId
     */
    public function setRecordId($recordId)
    {
        $this->recordId = $recordId;
    }

    /**
     * @return mixed
     */
    public function getValues()
    {
        return $this->values;
    }

    /**
     * @param mixed $values
     */
    public function setValues($values)
    {
        $this->values = $values;
    }
}
