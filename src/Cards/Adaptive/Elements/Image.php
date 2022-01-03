<?php

namespace Sebbmyr\Teams\Cards\Adaptive\Elements;

use Sebbmyr\Teams\Cards\Adaptive\AbstractElement;

/**
 * Image element
 *
 * 'selectAction' property is currently not support
 *
 * @todo add checks to predefined styles, e.g. BlockElementHeight 'auto' and 'stretch'
 * @todo add 'selectAction' property support
 *
 * @see https://adaptivecards.io/explorer/Image.html
 */
class Image extends AbstractElement
{
    /**
     * The URL to the image. Supports data URI in version 1.2+
     * Required: yes
     * @version 1.0
     * @var string
     */
    private $url;

    /**
     * Alternate text describing the image.
     * Required: no
     * @version 1.0
     * @var string
     */
    private $altText;

    /**
     * Applies a background to a transparent image. This property will respect the image style.
     * Required: no
     * @version 1.1
     * @var string
     */
    private $backgroundColor;

    /**
     * The desired height of the image. If specified as a pixel value,
     * ending in ‘px’, E.g., 50px, the image will distort to fit
     * that exact height. This overrides the size property.
     * Type: string, BlockElementHeight
     * Default: 'auto'
     * Required: no
     * @version 1.1
     * @var string
     */
    private $height;

    /**
     * Controls the horizontal text alignment.
     * Type: HorizontalAligment
     * Required: no
     * @version 1.0
     * @var string
     */
    private $horizontalAlignment;

    /**
     * An Action that will be invoked when the 'Image' is tapped or selected.
     * 'Action.ShowCard' is not supported.
     * Type: ISelectAction
     * Required: no
     * @version 1.1
     * @var string
     */
    private $selectAction;

    /**
     * Controls the approximate size of the image. The physical dimensions will vary per host.
     * Type: ImageSize
     * Required: no
     * @version 1.0
     * @var string
     */
    private $size;

    /**
     * Controls how this 'Image' is displayed.
     * Type: ImageStyle
     * Required: no
     * @version 1.0
     * @var string
     */
    private $style;

    /**
     * The desired on-screen width of the image, ending in ‘px’. E.g., 50px.
     * This overrides the size property.
     * Required: no
     * @version 1.1
     * @var string
     */
    private $width;

    public function __construct($url = null)
    {
        parent::__construct('Image');

        $this->url = $url;
    }

    /**
     * Returns content of card element
     *
     * @return array
     * @throws \Exception
     */
    public function jsonSerialize()
    {
        // if url is not set, throw exception
        if (!isset($this->url)) {
            throw new \Exception('Card element url is not set', 500);
        }

        $data = parent::jsonSerialize() +
            ['url' => $this->url];

        if ($this->version >= 1.0) {
            if (isset($this->altText)) {
                $data['altText'] = $this->altText;
            }
            if (isset($this->horizontalAlignment)) {
                $data['horizontalAlignment'] = $this->horizontalAlignment;
            }
            if (isset($this->size)) {
                $data['size'] = $this->size;
            }
            if (isset($this->style)) {
                $data['style'] = $this->style;
            }
        }

        if ($this->version >= 1.1) {
            if (isset($this->backgroundColor)) {
                $data['backgroundColor'] = $this->backgroundColor;
            }
            if (isset($this->height)) {
                $data['height'] = $this->height;
            }
            if (isset($this->selectAction)) {
                $data['selectAction'] = $this->selectAction;
            }
            if (isset($this->width)) {
                $data['width'] = $this->width;
            }
        }

        return $data;
    }

    /**
     * Sets text
     * @param string $url
     * @return Image
     */
    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Sets alternative text
     * @param string $altText
     * @return Image
     */
    public function setAltText(string $altText): self
    {
        $this->altText = $altText;

        return $this;
    }

    /**
     * Sets background color
     * @param string $backgroundColor
     * @return Image
     */
    public function setBackgroundColor(string $backgroundColor): self
    {
        $this->backgroundColor = $backgroundColor;

        return $this;
    }

    /**
     * Sets height. Available options can be found in Styles.php
     * @param string $height [description]
     */
    public function setHeight(string $height): self
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Sets horizontal aligment. Available options can be found in Styles.php
     * @param string $alignment
     * @return Image
     */
    public function setHorizontalAlignment(string $alignment): self
    {
        $this->horizontalAlignment = $alignment;

        return $this;
    }

    /**
     * Sets image size. Available options can be found in Styles.php
     * @param string $size
     * @return Image
     */
    public function setSize(string $size): self
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Sets image style. Available options can be found in Styles.php
     * @param string $style
     * @return Image
     */
    public function setStyle(string $style): self
    {
        $this->style = $style;

        return $this;
    }

    /**
     * Sets width
     * @param string $width [description]
     * @return Image
     */
    public function setWidth(string $width): self
    {
        $this->width = $width;

        return $this;
    }
}
