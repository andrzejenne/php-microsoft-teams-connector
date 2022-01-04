<?php
declare(strict_types=1);


namespace Sebbmyr\Teams\Cards\Adaptive\Traits;


trait HasVersion
{
    /**
     * @var float
     */
    protected $version;

    /**
     * @param float $version
     * @return void
     */
    final public function setVersion(float $version)
    {
        $this->version = $version;
    }
}
