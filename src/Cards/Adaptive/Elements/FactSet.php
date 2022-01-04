<?php

namespace Sebbmyr\Teams\Cards\Adaptive\Elements;

use Sebbmyr\Teams\Cards\Adaptive\AbstractElement;

/**
 * FactSet card element
 */
class FactSet extends AbstractElement
{

    /**
     * The array of Fact's.
     * Required: yes
     * Type: Fact[]
     * @version 1.0
     * @var array
     */
    private $facts;

    /**
     * @return static
     */
    public static function create(array $facts = []): self
    {
        return new static($facts);
    }

    /**
     * @param array $facts
     */
    public function __construct(array $facts)
    {
        parent::__construct('FactSet');
        $this->facts = $facts;
    }

    /**
     * Returns content of card element
     *
     * @return array
     * @throws \Exception
     */
    public function jsonSerialize()
    {
        // if facts is not set, throw exception
        if (!isset($this->facts)) {
            throw new \Exception('Card element facts is not set', 500);
        }

        return parent::jsonSerialize()
            + [
                'facts' => $this->facts
            ];
    }

    /**
     * Adds fact to element
     * @param Fact $fact
     * @return FactSet
     */
    public function addFact(Fact $fact): self
    {
        if (!isset($this->facts)) {
            $this->facts = [];
        }

        $fact->setVersion($this->version);

        $this->facts[] = $fact;

        return $this;
    }
}
