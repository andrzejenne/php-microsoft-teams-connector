<?php
declare(strict_types=1);


namespace Sebbmyr\Teams\Cards\Adaptive\Traits;


trait HasVersion
{
    /**
     * @var float
     */
    public $version;

    /**
     * @param float $version
     * @return $this
     */
    final public function setVersion(float $version): self
    {
        $this->version = $version;

        return $this;
    }
}
