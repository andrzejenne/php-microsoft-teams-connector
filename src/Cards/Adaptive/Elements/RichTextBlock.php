<?php

namespace Sebbmyr\Teams\Cards\Adaptive\Elements;

use Sebbmyr\Teams\Cards\Adaptive\AbstractElement;

/**
 * RichTextBlock element
 *
 * @version >= 1.2
 * @see https://adaptivecards.io/explorer/RichTextBlock.html
 */
class RichTextBlock extends AbstractElement
{
    /**
     * The array of inlines.
     * Required: yes
     * Type: Inline[]
     * @version 1.2
     * @var array
     */
    private $inlines;

    /**
     * Controls the horizontal text alignment.
     * Type: HorizontalAligment
     * Required: no
     * @version 1.2
     * @var string
     */
    private $horizontalAlignment;

    /**
     * @param array $inlines
     * @return static
     */
    public static function create(array $inlines = []): self
    {
        return new static($inlines);
    }

    /**
     * @param null $inlines
     */
    public function __construct($inlines = null)
    {
        parent::__construct('RichTextBlock');
        $this->inlines = $inlines;
    }

    /**
     * Returns content of card element
     * @return array
     * @throws \Exception
     */
    public function jsonSerialize()
    {
        // if inlines is not set, throw exception
        if (!isset($this->inlines)) {
            throw new \Exception('Card element inlines is not set', 500);
        }

        $data = parent::jsonSerialize() +
            ['inlines' => $this->inlines];

        if (isset($this->horizontalAlignment) && $this->version >= 1.2) {
            $data['horizontalAlignment'] = $this->horizontalAlignment;
        }

        return $data;
    }

    /**
     * Sets inlines
     * @param array $inlines
     * @return RichTextBlock
     */
    public function setInlines(array $inlines): self
    {
        if (!isset($this->inlines)) {
            $this->inlines = [];
        }

        foreach ($inlines as $inline) {
            if ($inline instanceof TextRun || is_string($inline)) {
                $this->inlines[] = $inline;
            }
        }

        return $this;
    }

    /**
     * Sets horizontal alignment. Available options can be found in Styles.php
     * @param string $alignment
     * @return RichTextBlock
     */
    public function setHorizontalAlignment(string $alignment): self
    {
        $this->horizontalAlignment = $alignment;

        return $this;
    }

    /**
     * Adds text to inlines
     * @param string $text
     * @return RichTextBlock
     */
    public function addText(string $text): self
    {
        if (!isset($this->inlines)) {
            $this->inlines = [];
        }

        if (!is_string($text)) {
            return $this;
        }

        $this->inlines[] = $text;

        return $this;
    }

    /**
     * Adds TextRun object to inlines
     * @param TextRun $text
     * @return RichTextBlock
     */
    public function addTextRun(TextRun $text): self
    {
        if (!isset($this->inlines)) {
            $this->inlines = [];
        }

        $this->inlines[] = $text;

        return $this;
    }
}
