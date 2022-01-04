<?php

namespace Sebbmyr\Teams\Cards\Adaptive\Actions;

use Sebbmyr\Teams\Cards\Adaptive\Traits\HasVersion;

/**
 * Base action
 *
 * @todo add 'fallback' property support
 * @todo add 'requires' property support
 */
abstract class AbstractAction implements AdaptiveCardAction
{
    use HasVersion;

    /**
     * Label for button or link that represents this action.
     * Required: no
     * @version 1.0
     * @var string
     */
    private $title;

    /**
     * Optional icon to be shown on the action in conjunction with the title.
     * Supports data URI in version 1.2+
     * Type: uri
     * Required: no
     * @version 1.1
     * @var string
     */
    private $iconUrl;

    /**
     * Controls the style of an Action, which influences how the action is displayed,
     * spoken, etc.
     * Type: ActionStyle
     * Required: no
     * @version 1.2
     * @var string
     */
    private $style;

    /**
     * @var string
     */
    private $type;

    /**
     * @param string $type
     */
    public function __construct(string $type)
    {
        $this->type = $type;
    }

    /**
     * Adds base properties to given action and returns it
     * @return array
     * @throws \Exception
     */
    public function jsonSerialize()
    {
        // if type is not set, throw exception
        if (!isset($this->type)) {
            throw new \Exception('Card action type is not set', 500);
        }
        $action = [
            'type' => $this->type,
            'title' => $this->title,
        ];

        if (isset($this->iconUrl) && $this->version >= 1.1) {
            $action['iconUrl'] = $this->iconUrl;
        }

        if ($this->version >= 1.2) {
            if (isset($this->style)) {
                $action['style'] = $this->style;
            }
//
//            if (isset($this->fallback)) {
//                $action['fallback'] = $this->fallback;
//            }
//
//            if (isset($this->requires)) {
//                $action['requires'] = $this->requires;
//            }
        }

        return $action;
    }

    /**
     * Sets title
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Sets icon url
     * @param string $iconUrl
     * @return $this
     */
    public function setIconUrl(string $iconUrl): self
    {
        $this->iconUrl = $iconUrl;

        return $this;
    }

    /**
     * Sets action style. Available options can be found in Styles.php
     * @param string $style
     * @return $this
     */
    public function setStyle(string $style): self
    {
        $this->style = $style;

        return $this;
    }
}
