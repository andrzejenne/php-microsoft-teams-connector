<?php

namespace Sebbmyr\Teams\Cards\Adaptive\Elements;

use Sebbmyr\Teams\Cards\Adaptive\AbstractElement;

/**
 * TextRun  element
 *
 * @version >= 1.2
 * @see https://adaptivecards.io/explorer/TextRun.html
 */
class TextRun extends AbstractElement
{
    /**
     * Type of element.
     * Required: yes
     * @version 1.2
     * @var string
     */
    private $type;

    /**
     * Text to display. A subset of markdown is supported (https://aka.ms/ACTextFeatures)
     * Required: yes
     * @version 1.2
     * @var string
     */
    private $text;

    /**
     * Controls the color of TextRun elements.
     * Type: Colors
     * Required: no
     * @version 1.2
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
     * If true, displays the text highlighted.
     * Default: false
     * Required: no
     * @version 1.2
     * @var bool
     */
    private $highlight;

    /**
     * If true, displays text slightly toned down to appear less prominent.
     * Default: false
     * Required: no
     * @version 1.2
     * @var bool
     */
    private $isSubtle;

    /**
     * If true, displays the text using italic font.
     * Default: false
     * Required: no
     * @version 1.2
     * @var bool
     */
    private $italic;

    /**
     * An Action that will be invoked when the 'Image' is tapped or selected.
     * 'Action.ShowCard' is not supported.
     * Type: ISelectAction
     * Required: no
     * @version 1.2
     * @var string
     */
    private $selectAction;

    /**
     * Controls size of text.
     * Type: FontSize
     * Required: no
     * @version 1.2
     * @var string
     */
    private $size;

    /**
     * If true, displays the text with strikethrough.
     * Required: no
     * @version 1.2
     * @var bool
     */
    private $strikethrough;

    /**
     * If true, displays the text with an underline.
     * Required: no
     * @version 1.3
     * @var bool
     */
    private $underline;

    /**
     * Controls the weight of TextRun elements.
     * Type: FontWeight
     * Required: no
     * @version 1.2
     * @var string
     */
    private $weight;

    public function __construct($text = null)
    {
        $this->setType('TextRun');
        $this->text = $text;
    }

    /**
     * Returns content of card element
     *
     * @param float $version
     * @return array
     * @throws \Exception
     */
    public function getContent(float $version): array
    {
        // if type is not set, throw exception
        if (!isset($this->type)) {
            throw new \Exception('Card element type is not set', 500);
        }
        // if text is not set, throw exception
        if (!isset($this->text)) {
            throw new \Exception('Card element text is not set', 500);
        }
        $element = [
            'text' => $this->text,
            'type' => $this->type,
        ];

        if ($version >= 1.2) {
            if (isset($this->color)) {
                $element['color'] = $this->color;
            }

            if (isset($this->fontType)) {
                $element['fontType'] = $this->fontType;
            }

            if (isset($this->highlight)) {
                $element['highlight'] = $this->highlight;
            }

            if (isset($this->isSubtle)) {
                $element['isSubtle'] = $this->isSubtle;
            }

            if (isset($this->italic)) {
                $element['italic'] = $this->italic;
            }

            if (isset($this->selectAction)) {
                $element['selectAction'] = $this->selectAction;
            }

            if (isset($this->size)) {
                $element['size'] = $this->size;
            }

            if (isset($this->strikethrough)) {
                $element['strikethrough'] = $this->strikethrough;
            }
            if (isset($this->weight)) {
                $element['weight'] = $this->weight;
            }
            if (isset($this->underline) && $version >= 1.3) {
                $element['underline'] = $this->underline;
            }
        }

        return $element;
    }

    /**
     * Sets type of element
     * @param string $type
     * @return TextRun
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Sets text
     * @param string $text
     * @return TextRun
     */
    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Sets color. Available options can be found in Styles.php
     * @param string $color
     * @return TextRun
     */
    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Sets font type. Available options can be found in Styles.php
     * @param string $fontType
     * @return TextRun
     */
    public function setFontType(string $fontType): self
    {
        $this->fontType = $fontType;

        return $this;
    }

    /**
     * Sets highlight flag
     * @param bool $highlight
     * @return TextRun
     */
    public function setHighlight($highlight)
    {
        $this->highlight = $highlight;

        return $this;
    }

    /**
     * Sets isSubtle flag
     * @param bool $isSubtle
     * @return TextRun
     */
    public function setIsSubtle($isSubtle)
    {
        $this->isSubtle = $isSubtle;

        return $this;
    }

    /**
     * Sets italic flag
     * @param bool $italic
     * @return TextRun
     */
    public function setItalic($italic)
    {
        $this->italic = $italic;

        return $this;
    }

    /**
     * Sets font size. Available options can be found in Styles.php
     * @param string $size
     * @return TextRun
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Sets strikethrough flag
     * @param bool $strikethrough
     * @return TextRun
     */
    public function setStrikethrough($strikethrough)
    {
        $this->strikethrough = $strikethrough;

        return $this;
    }

    /**
     * Sets underline flag
     * @param bool $underline
     * @return TextRun
     */
    public function setUnderline($underline)
    {
        $this->underline = $underline;

        return $this;
    }

    /**
     * Sets font weight. Available options can be found in Styles.php
     * @param string $weight
     * @return TextRun
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }
}
