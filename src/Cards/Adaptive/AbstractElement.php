<?php

namespace Sebbmyr\Teams\Cards\Adaptive;

use Sebbmyr\Teams\Cards\Adaptive\Elements\AdaptiveCardElement;

/**
 * AbstractElement
 */
abstract class AbstractElement implements AdaptiveCardElement
{
    /**
     * Type of element.
     * Required: yes
     * @version 1.0
     * @var string
     */
    private $type;

    /**
     * @var float
     */
    protected $version;

    /**
     * @param string $type
     */
    public function __construct(string $type)
    {
        $this->type = $type;
    }

    /**
     * Adds base properties to given element and returns it
     *
     * @return array
     * @throws \Exception
     */
    public function jsonSerialize()
    {
        // if type is not set, throw exception
        if (!isset($this->type)) {
            throw new \Exception('Card element type is not set', 500);
        }

        return [
            'type' => $this->type
        ];
    }

    /**
     * @param float $version
     * @return void
     */
    final public function setVersion(float $version)
    {
        $this->version = $version;
    }
}
