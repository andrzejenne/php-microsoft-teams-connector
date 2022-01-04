<?php
declare(strict_types=1);


namespace Sebbmyr\Teams\Cards\Adaptive\Traits;


trait HasStyle
{
    /**
     * @var string
     * @version "1.2"
     * @enum("default", "emphasis", "good", "attention", "warning", "accent")
     */
    private $style;

    /**
     * @param string $style
     * @return $this
     */
    public function setStyle(string $style): self
    {
        $this->style = $style;

        return $this;
    }
}
