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
class ButtonCallbackEvent extends DataContainerEventBase
{
    /**
     * The eventName.
     */
    const NAME = 'contao.datacontainer.events.button-callback';

    /**
     * @var $row The current database row.
     */
    protected $row;

    /**
     * @var
     */
    protected $href;

    /**
     * @var
     */
    protected $label;

    /**
     * @var
     */
    protected $title;

    /**
     * @var
     */
    protected $icon;

    /**
     * @var
     */
    protected $attributes;

    /**
     * @var
     */
    protected $table;

    /**
     * @var
     */
    protected $roots;

    /**
     * @var
     */
    protected $childs;

    /**
     * @var
     */
    protected $circularReference;

    /**
     * @var
     */
    protected $previous;

    /**
     * @var
     */
    protected $next;

    /**
     * @var
     */
    protected $button;

    protected $command;

    public function __construct(
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
        $command = null
    ) {
        $this->row               = $row;
        $this->href              = $href;
        $this->label             = $label;
        $this->title             = $title;
        $this->icon              = $icon;
        $this->attributes        = $attributes;
        $this->table             = $table;
        $this->roots             = $roots;
        $this->childs            = $childs;
        $this->circularReference = $circularReference;
        $this->previous          = $previous;
        $this->next              = $next;
        $this->dataContainer     = $dataContainer;
        $this->command           = $command;
    }

    /**
     * @return mixed
     */
    public function getRow()
    {
        return $this->row;
    }

    /**
     * @param mixed $row
     */
    public function setRow($row)
    {
        $this->row = $row;
    }

    /**
     * @return mixed
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * @param mixed $href
     */
    public function setHref($href)
    {
        $this->href = $href;
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param mixed $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @param mixed $icon
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
    }

    /**
     * @return mixed
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param mixed $attributes
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
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
    public function getRoots()
    {
        return $this->roots;
    }

    /**
     * @param mixed $roots
     */
    public function setRoots($roots)
    {
        $this->roots = $roots;
    }

    /**
     * @return mixed
     */
    public function getChilds()
    {
        return $this->childs;
    }

    /**
     * @param mixed $childs
     */
    public function setChilds($childs)
    {
        $this->childs = $childs;
    }

    /**
     * @return mixed
     */
    public function getCircularReference()
    {
        return $this->circularReference;
    }

    /**
     * @param mixed $circularReference
     */
    public function setCircularReference($circularReference)
    {
        $this->circularReference = $circularReference;
    }

    /**
     * @return mixed
     */
    public function getPrevious()
    {
        return $this->previous;
    }

    /**
     * @param mixed $previous
     */
    public function setPrevious($previous)
    {
        $this->previous = $previous;
    }

    /**
     * @return mixed
     */
    public function getNext()
    {
        return $this->next;
    }

    /**
     * @param mixed $next
     */
    public function setNext($next)
    {
        $this->next = $next;
    }

    /**
     * @return mixed
     */
    public function getButton()
    {
        return $this->button;
    }

    /**
     * @param mixed $button
     */
    public function setButton($button)
    {
        $this->button = $button;
    }

    /**
     * @return mixed
     */
    public function getCommand()
    {
        return $this->command;
    }

    /**
     * @param mixed $command
     */
    public function setCommand($command)
    {
        $this->command = $command;
    }

}
