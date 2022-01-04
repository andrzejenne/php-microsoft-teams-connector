<?php
declare(strict_types=1);


namespace Sebbmyr\Teams\Cards\Adaptive\Traits;


trait HasMinHeight
{
    /**
     * @var string
     * @version "1.2"
     * Specifies the minimum height of the column set in pixels, like `"80px"`.
     */
    private $minHeight;

    /**
     * @param string $minHeight
     * @return $this
     */
    public function setMinHeight(string $minHeight): self
    {
        $this->minHeight = $minHeight;

        return $this;
    }

}
