<?php

namespace Sebbmyr\Teams\Cards\Adaptive\Elements;

use Sebbmyr\Teams\Cards\Adaptive\Actions\AdaptiveCardAction;
use Sebbmyr\Teams\Cards\Adaptive\Traits\HasVersion;

/**
 * AdaptiveCard to be used as inline element for Actions
 *
 * @version >= 1.0
 */
class AdaptiveCard implements AdaptiveCardElement
{
    use HasVersion;

    /**
     * Type of element.
     * Required: yes
     * @version 1.0
     * @var string
     */
    private $type;

    /**
     * Body container of AdaptiveCard
     * Required: no
     * Type: AdaptiveCardElement[]
     * @version 1.0
     * @var array
     */
    private $body;

    /**
     * Actions container of AdaptiveCard
     * Required: no
     * Type: AdaptiveCardAction[]
     * @version 1.0
     * @var array
     */
    private $actions;

    /**
     * @return static
     */
    public static function create(): self
    {
        return new static();
    }

    /**
     * Returns content of card element
     *
     * @return array
     * @throws \Exception
     */
    public function jsonSerialize(): array
    {
        // if type is not set, throw exception
        if (!isset($this->type)) {
            throw new \Exception('Card data type is not set', 500);
        }

        $data = [
            'type' => 'AdaptiveCard',
        ];

        if (isset($this->body)) {
            $data['body'] = $this->body;
        }

        if (isset($this->actions)) {
            $data['actions'] = $this->actions;
        }

        return $data;
    }

    /**
     * Adds element to card body
     * @param AdaptiveCardElement $element
     * @return AdaptiveCard
     */
    public function addElement(AdaptiveCardElement $element): self
    {
        if (!isset($this->body)) {
            $this->body = [];
        }

        $element->setVersion($this->version);

        $this->body[] = $element;

        return $this;
    }

    /**
     * Adds action to card actions
     * @param AdaptiveCardAction $action
     * @return AdaptiveCard
     */
    public function addAction(AdaptiveCardAction $action): self
    {
        if (!isset($this->actions)) {
            $this->actions = [];
        }

        $action->setVersion($this->version);

        $this->actions[] = $action;

        return $this;
    }
}
