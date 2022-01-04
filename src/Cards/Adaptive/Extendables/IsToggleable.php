<?php
declare(strict_types=1);


namespace Sebbmyr\Teams\Cards\Adaptive\Extendables;


trait IsToggleable
{
    use HasRequires;

    /**
     * @var string
     */
    protected $id;

    /**
     * @var bool
     * @version 1.2
     * If `false`, this item will be removed from the visual tree.
     */
    private $isVisible;

    /**
     * @param string $id
     * @return $this
     */
    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param bool $isVisible
     * @return $this
     */
    public function setVisible(bool $isVisible): self
    {
        $this->isVisible = $isVisible;

        return $this;
    }


}
