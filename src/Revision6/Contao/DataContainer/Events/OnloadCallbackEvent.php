<?php

/**
 * The events onload-callback allows to use the onload_callback as event
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
 * Class SaveCallbackEvent to handle the onload_callback event.
 *
 * @package Revision6\Contao\Events\SaveCallback
 */
class OnloadCallbackEvent extends Event
{
    /**
     * The event name.
     */
    const NAME = 'contao.datacontainer.events.onload-callback';

    /**
     * The current dataContainer instance.
     *
     * @var \DataContainer $dataContainer The current dataContainer instance.
     */
    protected $dataContainer;

    /**
     * The constructor for setting some values.
     *
     * @param \DataContainer $dataContainer The current dataContainer instance.
     */
    public function __construct(\DataContainer $dataContainer)
    {
        $this->dataContainer = $dataContainer;
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
}