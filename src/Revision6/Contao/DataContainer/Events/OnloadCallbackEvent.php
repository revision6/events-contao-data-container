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
class OnloadCallbackEvent extends DataContainerEventBase
{
    /**
     * The event name.
     */
    const NAME = 'contao.datacontainer.events.onload-callback';

    /**
     * The constructor for setting some values.
     *
     * @param \DataContainer $dataContainer The current dataContainer instance.
     */
    public function __construct(\DataContainer $dataContainer)
    {
        $this->dataContainer = $dataContainer;
    }
}
