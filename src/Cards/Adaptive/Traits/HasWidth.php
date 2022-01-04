<?php
declare(strict_types=1);


namespace Sebbmyr\Teams\Cards\Adaptive\Traits;


trait HasWidth
{
    /**
     * @var string|int
     * `"auto"`, `"stretch"`, a number representing relative width of the column in the column group, or in version 1.1 and higher, a specific pixel width, like `"50px"`.
     */
    private $width;

    /**
     * @param string|int $width
     * @return $this
     */
    public function setWidth($width): self
    {
        $this->width = $width;

        return $this;
    }

}
