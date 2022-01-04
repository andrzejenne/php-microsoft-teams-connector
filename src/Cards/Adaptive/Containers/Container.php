<?php

namespace Sebbmyr\Teams\Cards\Adaptive\Containers;

use Sebbmyr\Teams\Cards\Adaptive\AbstractElement;
use Sebbmyr\Teams\Cards\Adaptive\Elements\AdaptiveCardElement;
use Sebbmyr\Teams\Cards\Adaptive\Traits\HasBackgroundImage;
use Sebbmyr\Teams\Cards\Adaptive\Traits\HasBleed;
use Sebbmyr\Teams\Cards\Adaptive\Traits\HasMinHeight;
use Sebbmyr\Teams\Cards\Adaptive\Traits\HasStyle;

/**
 * Container
 *
 * @version >= 1.0
 * @see https://adaptivecards.io/explorer/Container.html
 */
class Container extends AbstractElement
{
    use HasBackgroundImage, HasBleed, HasMinHeight, HasStyle;

    /**
     * The value of the fact.
     * Required: yes
     * @version 1.0
     * @var string
     */
    private $items;

    /**
     * @param array $items
     * @return static
     */
    public static function create(array $items = []): self
    {
        return new static($items);
    }

    /**
     * @param array $items
     */
    public function __construct(array $items)
    {
        parent::__construct('Container');

        $this->items = $items;
    }

    /**
     * @param AdaptiveCardElement $element
     */
    public function addItem(AdaptiveCardElement $element)
    {
        $this->items[] = $element;
    }

    /**
     * Return fact content
     *
     * @return array
     * @throws \Exception
     */
    public function jsonSerialize()
    {
        $data = parent::jsonSerialize() + [
            'items' => $this->items,
        ];

        if ($this->version >= 1.2) {
            if (is_bool($this->bleed)) {
                $data['bleed'] = $this->bleed;
            }
            if (!empty($this->backgroundImage)) {
                $data['backgroundImage'] = $this->backgroundImage;
            }
            if (!empty($this->minHeight)) {
                $data['minHeight'] = $this->minHeight;
            }
            if (!empty($this->style)) {
                $data['style'] = $this->style;
            }
        }

        return $data;
    }
}
