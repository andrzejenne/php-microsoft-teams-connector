<?php

namespace Sebbmyr\Teams\Cards\Adaptive\Elements;

use Sebbmyr\Teams\Cards\Adaptive\AbstractElement;
use Sebbmyr\Teams\Cards\Adaptive\Traits\HasBleed;
use Sebbmyr\Teams\Cards\Adaptive\Traits\HasHorizontalAlignment;
use Sebbmyr\Teams\Cards\Adaptive\Traits\HasMinHeight;
use Sebbmyr\Teams\Cards\Adaptive\Traits\HasStyle;
use Sebbmyr\Teams\Cards\Adaptive\Traits\HasVersion;

/**
 * ColumnSet element
 *
 * ColumnSet divides a region into Columns, allowing elements to sit side-by-side
 */
class ColumnSet extends AbstractElement
{
    use HasBleed, HasStyle, HasMinHeight, HasHorizontalAlignment, HasVersion;

    /**
     * The array of Fact's.
     * Required: yes
     * Type: Fact[]
     * @version 1.0
     * @var array
     */
    private $columns;

    /**
     * @var
     * @version "1.1"
     * @unimplemented
     */
    private $selectAction;

    /**
     * @return static
     */
    public static function create(array $columns = []): self
    {
        return new static($columns);
    }

    /**
     * @param array $columns
     */
    public function __construct($columns)
    {
        parent::__construct('ColumnSet');
        $this->columns = $columns;
    }

    /**
     * Returns content of card element
     *
     * @return array
     * @throws \Exception
     */
    public function jsonSerialize()
    {
        if (!isset($this->columns)) {
            throw new \Exception('Card element columns is not set', 500);
        }

        $data = parent::jsonSerialize()
            + [
                'columns' => $this->columns
            ];

        if (!empty($this->horizontalAlignment)) {
            $data['horizontalAlignment'] = $this->horizontalAlignment;
        }

        if ($this->version >= 1.2) {
            if (!empty($this->style)) {
                $data['style'] = $this->style;
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


    /**
     * Adds fact to element
     * @param Column $column
     * @return $this
     */
    public function addColumn(Column $column): self
    {
        if (!isset($this->columns)) {
            $this->columns = [];
        }

        $column->setVersion($this->version);

        $this->columns[] = $column;

        return $this;
    }
}
