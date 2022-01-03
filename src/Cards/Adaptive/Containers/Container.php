<?php

namespace Sebbmyr\Teams\Cards\Adaptive\Containers;

use Sebbmyr\Teams\Cards\Adaptive\AbstractElement;

/**
 * Container
 *
 * @version >= 1.0
 * @see https://adaptivecards.io/explorer/Container.html
 */
class Container extends AbstractElement
{
    /**
     * The value of the fact.
     * Required: yes
     * @version 1.0
     * @var string
     */
    private $items;
    
    public function __construct(array $items)
    {
        parent::__construct('Container');

        $this->items = $items;
    }

    /**
     * Return fact content
     *
     * @return array
     * @throws \Exception
     */
    public function jsonSerialize()
    {
        return parent::jsonSerialize() + [
            'items' => $this->items,
        ];
    }
}
