<?php
declare(strict_types=1);


namespace Sebbmyr\Teams\Cards\Adaptive\Traits;


use Sebbmyr\Teams\Cards\Adaptive\Elements\ColumnSet;

trait HasHorizontalAlignment
{
    /**
     * @var string
     * @enum("left", "center", "right")
     * Controls how content is horizontally positioned within its container.
     */
    private $horizontalAlignment;

    /**
     * @param string $alignment
     * @return $this
     */
    public function setHorizontalAlignment(string $alignment): self
    {
        $this->horizontalAlignment = $alignment;

        return $this;
    }
}
