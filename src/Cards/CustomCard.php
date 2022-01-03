<?php

namespace Sebbmyr\Teams\Cards;

use Sebbmyr\Teams\TeamsConnectorInterface;

/**
 * Sebbmyr\Teams\Cards\CustomCard
 */
class CustomCard implements TeamsConnectorInterface
{
    /**
     * Theme color
     * @var string
     */
    private $color;

    /**
     * Summary
     * @var string
     */
    private $summary;

    /**
     * Title
     * @var string
     */
    private $title;

    /**
     * Generic text
     * @var string
     */
    private $text;

    /**
     * Action Buttons
     * @var array
     */
    private $potentialAction;

    /**
     * Sections
     * @var array
     */
    private $sections;

    /**
     * CustomCard constructor.
     * @param null $title
     * @param null $text
     */
    public function __construct($title = null, $text = null)
    {
        $this->title = $title ?: '';
        $this->text = $text ?: '';
    }

    /**
     * Formats data for API call
     */
    public function jsonSerialize()
    {
        $message = [
            '@type' => 'MessageCard',
            '@context' => 'http://schema.org/extensions',
        ];
        if (isset($this->summary)) {
            $message['summary'] = $this->summary;
        }
        if (isset($this->title)) {
            $message['title'] = $this->title;
        }
        if (isset($this->text)) {
            $message['text'] = $this->text;
        }
        if (isset($this->color)) {
            $message['themeColor'] = $this->color;
        }

        if (isset($this->sections)) {
            $message['sections'] = $this->sections;
        }
        if (isset($this->potentialAction)) {
            $message['potentialAction'] = $this->potentialAction;
        }

        return $message;
    }

    /**
     * Sets Card Title
     * 
     * @param string $title
     * @return CustomCard
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Sets Card Text
     * 
     * @param string $text
     * @return CustomCard
     */
    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Sets Card Summary
     * 
     * @param string $summary
     * @return CustomCard
     */
    public function setSummary(string $summary): self
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * Sets Card Color
     * 
     * @param string $color
     * @return CustomCard
     */
    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Adds activity section to card
     * 
     * @param string $text
     * @param string|null $title
     * @param string|null $image
     * @return CustomCard
     */
    public function addActivity(string $text, string $title = null, string $image = null): self
    {
        $data = [
            'activityText' => $text,
        ];

        if ($title) {
            $data['activityTitle'] = $title;
        }
        if ($image) {
            $data['activityImage'] = $image;
        }
        $this->sections[] = $data;

        return $this;
    }

    /**
     * Adds text section to card
     * 
     * @param string $title
     * @param array|null $array
     * @return CustomCard
     */
    public function addFactsText(string $title, array $array = null): self
    {
        $section = ['title' => $title];
        if (!is_null($array)) {
            $facts = [];
            foreach ($array as $arr) {
                $facts[] = ['name' => $arr];
            }
            $section['facts'] = $facts;
        }
        $this->sections[] = $section;

        return $this;
    }


    /**
     * Adds facts section to card
     * 
     * @param string $title
     * @param array $array
     * @return CustomCard
     */
    public function addFacts(string $title, array $array): self
    {
        $section = ['title' => $title];
        $facts = [];
        foreach ($array as $name => $value) {
            $facts[] = ['name' => $name, 'value' => $value];
        }
        $section['facts'] = $facts;
        $this->sections[] = $section;

        return $this;
    }


    /**
     * Adds single image to card
     * 
     * @param string $title
     * @param string $image
     * @return CustomCard
     */
    public function addImage(string $title, string $image): self
    {
        $this->addImages($title, [$image]);

        return $this;
    }

    /**
     * Adds images to card
     * 
     * @param string $title
     * @param array $images
     * @return CustomCard
     */
    public function addImages(string $title, array $images): self
    {
        $section = ['title' => $title];
        $sectionImages = [];
        foreach ($images as $image) {
            $sectionImages[] = ['image' => $image];
        }
        $section['images'] = $sectionImages;
        $this->sections[] = $section;

        return $this;
    }

    /**
     * Adds action button to card
     * 
     * @param string $text
     * @param string $url
     * @return CustomCard
     */
    public function addAction(string $text, string $url): self
    {
        $this->potentialAction[] = [
            '@context' => 'http://schema.org',
            '@type' => 'ViewAction',
            'name' => $text,
            'target' => [$url],
        ];

        return $this;
    }
}
