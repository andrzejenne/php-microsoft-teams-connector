<?php
declare(strict_types=1);


namespace Sebbmyr\Teams\Cards\Adaptive\Extendables;


trait HasRequires
{
    /**
     * @var array
     * @return $this
     * @version 1.2
     */
    protected $requires;

    /**
     * @param array $requires
     * @return $this
     */
    public function setRequires(array $requires): self
    {
        $this->requires = $requires;

        return $this;
    }
}
