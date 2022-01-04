<?php

namespace Sebbmyr\Teams\Cards\Adaptive;

use Sebbmyr\Teams\Cards\Adaptive\Elements\AdaptiveCardElement;
use Sebbmyr\Teams\Cards\Adaptive\Extendables\IsToggleable;
use Sebbmyr\Teams\Cards\Adaptive\Traits\HasSeparator;
use Sebbmyr\Teams\Cards\Adaptive\Traits\HasVersion;

/**
 * AbstractElement
 */
abstract class AbstractElement implements AdaptiveCardElement
{
    use HasVersion, HasSeparator, IsToggleable;

    /**
     * Type of element.
     * Required: yes
     * @version 1.0
     * @var string
     */
    private $type;

    /**
     * @var mixed
     * @unimplemented
     */
    protected $fallback;

    /**
     * @var string
     * @version: "1.1"
     * Specifies the height of the element.
     * @enum("auto","stretch")
     */
    protected $height;

    /**
     * @var string
     * @enum("default", "none", "small", "medium", "large", "extraLarge", "padding")
     * Controls the amount of spacing between this element and the preceding element.
     */
    protected $spacing;

    /**
     * @param string $type
     */
    public function __construct(string $type)
    {
        $this->type = $type;
    }

    /**
     * Adds base properties to given element and returns it
     *
     * @return array
     * @throws \Exception
     */
    public function jsonSerialize()
    {
        // if type is not set, throw exception
        if (!isset($this->type)) {
            throw new \Exception('Card element type is not set', 500);
        }

        $data = [
            'type' => $this->type
        ];

        if (!empty($this->requires)) {
            $data['requires'] = $this->requires;
        }
        if (!empty($this->id)) {
            $data['id'] = $this->id;
        }
        if (is_bool($this->separator)){
            $data['separator'] = $this->separator;
        }
        if (!empty($this->spacing)) {
            $data['spacing'] = $this->spacing;
        }

        if ($this->version >= 1.1) {
            if (!empty($this->height)) {
                $data['height'] = $this->height;
            }
        }

        if ($this->version >= 1.2) {
            if (is_bool($this->isVisible)) {
                $data['isVisible'] = $this->isVisible;
            }
        }

        return $data;
    }
}
