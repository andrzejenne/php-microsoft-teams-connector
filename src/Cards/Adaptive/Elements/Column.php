<?php

namespace Sebbmyr\Teams\Cards\Adaptive\Elements;

use Sebbmyr\Teams\Cards\Adaptive\Extendables\IsToggleable;
use Sebbmyr\Teams\Cards\Adaptive\Traits\HasBackgroundImage;
use Sebbmyr\Teams\Cards\Adaptive\Traits\HasBleed;
use Sebbmyr\Teams\Cards\Adaptive\Traits\HasMinHeight;
use Sebbmyr\Teams\Cards\Adaptive\Traits\HasVersion;

/**
 * Column
 *
 * @see https://adaptivecards.io/explorer/Column.html
 */
class Column implements \JsonSerializable
{
    use IsToggleable, HasMinHeight, HasBleed, HasBackgroundImage, HasVersion;

    /**
     * @var array
     */
    private $items;

    /**
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
        $this->items = $items;
    }

    /**
     * Return fact content
     *
     * @return array
     * @throws \Exception
     */
    public function jsonSerialize()
    {
        if (empty($this->items)) {
            throw new \Exception("Column item items property is not set", 500);
        }

        $data = [
            'type' => 'Column',
            'items' => $this->items
        ];

        if ($this->version >= 1.2) {
            if (!empty($this->backgroundImage)) {
                $data['backgroundImage'] = $this->backgroundImage;
            }

            if (is_bool($this->bleed)) {
                $data['bleed'] = $this->bleed;
            }

            if (!empty($this->minHeight)) {
                $data['minHeight'] = $this->minHeight;
            }
        }

        return $data;
    }
}
