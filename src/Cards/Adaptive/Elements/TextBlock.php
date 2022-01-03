<?php

namespace Sebbmyr\Teams\Cards\Adaptive\Elements;

use Sebbmyr\Teams\Cards\Adaptive\AbstractElement;

/**
 * Text block element
 *
 * @todo add checks to predefined styles, e.g. BlockElementHeight 'auto' and 'stretch'
 *
 * @see https://adaptivecards.io/explorer/TextBlock.html
 */
class TextBlock extends AbstractElement
{
    /**
     * Text to display. A subset of markdown is supported (https://aka.ms/ACTextFeatures)
     * Required: yes
     * @version 1.0
     * @var string
     */
    private $text;

    /**
     * Controls the color of TextBlock elements.
     * Type: Colors
     * Required: no
     * @version 1.0
     * @var string
     */
    private $color;

    /**
     * Type of font to use for rendering
     * Type: FontType
     * Required: no
     * @version 1.2
     * @var string
     */
    private $fontType;

    /**
     * Controls the horizontal text alignment.
     * Type: HorizontalAligment
     * Required: no
     * @version 1.0
     * @var string
     */
    private $horizontalAlignment;

    /**
     * If true, displays text slightly toned down to appear less prominent.
     * Default: false
     * Required: no
     * @version 1.0
     * @var bool
     */
    private $isSubtle;

    /**
     * Specifies the maximum number of lines to display.
     * Required: no
     * @version 1.0
     * @var int
     */
    private $maxLines;

    /**
     * Controls size of text.
     * Type: FontSize
     * Required: no
     * @version 1.0
     * @var string
     */
    private $size;

    /**
     * Controls the weight of TextBlock elements.
     * Type: FontWeight
     * Required: no
     * @version 1.0
     * @var string
     */
    private $weight;

    /**
     * If true, allow text to wrap. Otherwise, text is clipped.
     * Default: false
     * Required: no
     * @version 1.0
     * @var bool
     */
    private $wrap;

    public function __construct($text = null)
    {
        parent::__construct('TextBlock');
        $this->text = $text;
    }

    /**
     * Returns content of card element
     * @param  float $version
     * @return array
     */
    public function jsonSerialize()
    {
        // if text is not set, throw exception
        if (!isset($this->text)) {
            throw new \Exception('Card element text is not set', 500);
        }
        $element = parent::jsonSerialize() +
            ['text' => $this->text];
        
        if ($this->version >= 1.0) {

            if (isset($this->color) ) {
                $element['color'] = $this->color;
            }

            if (isset($this->horizontalAlignment) ) {
                $element['horizontalAlignment'] = $this->horizontalAlignment;
            }

            if (isset($this->isSubtle) ) {
                $element['isSubtle'] = $this->isSubtle;
            }

            if (isset($this->maxLines) ) {
                $element['maxLines'] = $this->maxLines;
            }

            if (isset($this->size) ) {
                $element['size'] = $this->size;
            }

            if (isset($this->weight) ) {
                $element['weight'] = $this->weight;
            }

            if (isset($this->wrap) ) {
                $element['wrap'] = $this->wrap;
            }

        }

        if (isset($this->fontType) && $this->version >= 1.2) {
            $element['fontType'] = $this->fontType;
        }

        return $element;
    }

    /**
     * Sets text
     * @param string $text
     * @return TextBlock
     */
    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Sets color. Available options can be found in Styles.php
     * @param string $color
     * @return TextBlock
     */
    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Sets font type. Available options can be found in Styles.php
     * @param string $fontType
     * @return TextBlock
     */
    public function setFontType(string $fontType): self
    {
        $this->fontType = $fontType;

        return $this;
    }

    /**
     * Sets horizontal alignment. Available options can be found in Styles.php
     * @param string $alignment
     * @return TextBlock
     */
    public function setHorizontalAligment(string $alignment): self
    {
        $this->horizontalAlignment = $alignment;

        return $this;
    }

    /**
     * Sets isSubtle flag
     * @param bool $isSubtle
     * @return TextBlock
     */
    public function setIsSubtle(bool $isSubtle): self
    {
        $this->isSubtle = $isSubtle;

        return $this;
    }

    /**
     * Sets max lines
     * @param int $maxLines
     * @return TextBlock
     */
    public function setMaxLines(int $maxLines): self
    {
        if ($maxLines < 1) {
            return $this;
        }

        $this->maxLines = $maxLines;

        return $this;
    }

    /**
     * Sets font size. Available options can be found in Styles.php
     * @param string $size
     * @return TextBlock
     */
    public function setSize(string $size): self
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Sets font weight. Available options can be found in Styles.php
     * @param string $weight
     * @return TextBlock
     */
    public function setWeight(string $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Sets wrap flag
     * @param bool $wrap
     * @return TextBlock
     */
    public function setWrap(bool $wrap): self
    {
        $this->wrap = $wrap;

        return $this;
    }
}
