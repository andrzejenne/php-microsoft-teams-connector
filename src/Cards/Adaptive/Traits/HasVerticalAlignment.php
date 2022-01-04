<?php
declare(strict_types=1);


namespace Sebbmyr\Teams\Cards\Adaptive\Traits;


trait HasVerticalAlignment
{
    /**
     * @var string
     * @enum("top", "center", "bottom")
     * Describes how the image should be aligned if it must be cropped or if using repeat fill mode.
     */
    private $verticalAlignment;

    /**
     * @param string $alignment
     * @return $this
     */
    public function setVerticalAlignment(string $alignment): self
    {
        $this->verticalAlignment = $alignment;

        return $this;
    }
}
