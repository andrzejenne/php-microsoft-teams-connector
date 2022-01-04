<?php

namespace Sebbmyr\Teams\Cards\Adaptive\Elements;

use Sebbmyr\Teams\Cards\Adaptive\AbstractElement;

/**
 * Fact
 *
 * @version >= 1.0
 * @see https://adaptivecards.io/explorer/Fact.html
 */
class Fact extends AbstractElement
{

    /**
     * The title of the fact.
     * Required: yes
     * @version 1.0
     * @var string
     */
    private $title;

    /**
     * The value of the fact.
     * Required: yes
     * @version 1.0
     * @var string
     */
    private $value;

    /**
     * @return static
     */
    public static function create(string $title, string $value): self
    {
        return new static($title, $value);
    }

    /**
     * @param string $title
     * @param string $value
     */
    public function __construct(string $title, string $value)
    {
        parent::__construct('Fact');

        $this->title = $title;
        $this->value = $value;
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
            'title' => $this->title,
            'value' => $this->value,
        ];
    }
}
