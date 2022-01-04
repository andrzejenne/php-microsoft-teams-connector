<?php

namespace Sebbmyr\Teams\Cards\Adaptive\Elements;

use Sebbmyr\Teams\Cards\Adaptive\AbstractElement;
use Sebbmyr\Teams\Cards\Adaptive\Traits\HasHorizontalAlignment;

/**
 * Text block element
 *
 * @todo add checks to predefined styles, e.g. BlockElementHeight 'auto' and 'stretch'
 *
 * @see https://adaptivecards.io/explorer/TextBlock.html
 */
class TextBlock extends AbstractElement
{
    use HasHorizontalAlignment;

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

    /**
     * @param string $text
     * @return static
     */
    public static function create(string $text): self
    {
        return new static($text);
    }

    /**
     * @param string|null $text
     */
    public function __construct($text = null)
    {
        parent::__construct('TextBlock');
        $this->text = $text;
    }

    /**
     * Returns content of card element
     * @return array
     * @throws \Exception
     */
    public function jsonSerialize()
    {
        // if text is not set, throw exception
        if (!isset($this->text)) {
            throw new \Exception('Card element text is not set', 500);
        }
        $data = parent::jsonSerialize() +
            ['text' => $this->text];


        if (isset($this->color) ) {
            $data['color'] = $this->color;
        }

        if (isset($this->horizontalAlignment) ) {
            $data['horizontalAlignment'] = $this->horizontalAlignment;
        }

        if (isset($this->isSubtle) ) {
            $data['isSubtle'] = $this->isSubtle;
        }

        if (isset($this->maxLines) ) {
            $data['maxLines'] = $this->maxLines;
        }

        if (isset($this->size) ) {
            $data['size'] = $this->size;
        }

        if (isset($this->weight) ) {
            $data['weight'] = $this->weight;
        }

        if (isset($this->wrap) ) {
            $data['wrap'] = $this->wrap;
        }


        if (isset($this->fontType) && $this->version >= 1.2) {
            $data['fontType'] = $this->fontType;
        }

        return $data;
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
