<?php
declare(strict_types=1);


namespace Sebbmyr\Teams\Cards\Adaptive\Traits;


use Sebbmyr\Teams\Cards\Adaptive\Elements\ColumnSet;

trait HasBleed
{
    /**
     * @var bool
     * @version "1.2"
     *
     * Determines whether the element should bleed through its parent's padding.
     */
    private $bleed;

    /**
     * @param bool $bleed
     * @return $this
     */
    public function setBleed(bool $bleed): self
    {
        $this->bleed = $bleed;

        return $this;
    }
}
