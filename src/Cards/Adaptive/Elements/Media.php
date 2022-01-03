<?php

namespace Sebbmyr\Teams\Cards\Adaptive\Elements;

use Sebbmyr\Teams\Cards\Adaptive\AbstractElement;

/**
 * Media element
 *
 * CURRENTLY NOT SUPPORTED BY TEAMS
 *
 * @version 1.1
 * @see https://adaptivecards.io/explorer/Media.html
 */
class Media extends AbstractElement
{
    /**
     * Array of media sources to attempt to play.
     * Required: yes
     * Type: MediaSources[]
     * @version 1.1
     * @var array
     */
    private $sources;

    /**
     * URL of an image to display before playing.
     * Supports data URI in version 1.2+
     * Required: no
     * @version 1.1
     * @var string
     */
    private $poster;

    /**
     * Alternate text describing the audio or video.
     * Required: no
     * @version 1.1
     * @var string
     */
    private $altText;

    public function __construct($sources = null)
    {
        parent::__construct('Media');

        $this->sources = $sources;
    }

    /**
     * Returns content of card element
     *
     * @return array
     * @throws \Exception
     */
    public function jsonSerialize()
    {
        // if sources is not set, throw exception
        if (!isset($this->sources)) {
            throw new \Exception('Card element sources is not set', 500);
        }
        $data = parent::jsonSerialize() +
            ['sources' => $this->sources];

        if ($this->version >= 1.1) {
            if (isset($this->poster)) {
                $data['poster'] = $this->poster;
            }

            if (isset($this->altText)) {
                $data['altText'] = $this->altText;
            }
        }

        return $data;
    }

    /**
     * Adds source
     *
     * @param MediaSource $source
     * @return Media
     */
    public function addSource(MediaSource $source): self
    {
        if (!isset($this->sources)) {
            $this->sources = [];
        }

        $source->setVersion($this->version);

        return $this->addMediaSource($source);
    }

    /**
     * Sets poster
     * @param string $poster
     * @return Media
     */
    public function setPoster(string $poster): self
    {
        $this->poster = $poster;

        return $this;
    }

    /**
     * Sets alternative text
     * @param string $altText
     * @return Media
     */
    public function setAltText(string $altText): self
    {
        $this->altText = $altText;

        return $this;
    }

    /**
     * Adds MediaSource object to sources
     * @param MediaSource $source
     * @return Media
     */
    private function addMediaSource(MediaSource $source): self
    {
        if (!isset($this->sources)) {
            $this->sources = [];
        }

        $this->sources[] = $source;

        return $this;
    }
}
