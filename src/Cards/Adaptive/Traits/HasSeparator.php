<?php
declare(strict_types=1);


namespace Sebbmyr\Teams\Cards\Adaptive\Traits;


use Sebbmyr\Teams\Cards\Adaptive\Elements\ColumnSet;

trait HasSeparator
{
    /**
     * @var bool
     *
     * "When `true`, draw a separating line between this column and the previous column."
     */
    private $separator;

    /**
     * @param bool $separator
     * @return $this
     */
    public function setSeparator(bool $separator): self
    {
        $this->separator = $separator;

        return $this;
    }
}
