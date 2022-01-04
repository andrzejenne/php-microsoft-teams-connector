<?php
declare(strict_types=1);


namespace Sebbmyr\Teams\Cards\Adaptive\Actions;


class ToggleVisibility extends AbstractAction
{
    /**
     * @var array
     */
    private $targetElements;

    public function __construct(string $title, array $targetElements = [])
    {
        parent::__construct('Action.ToggleVisibility');

        $this->setTitle($title);

        $this->setTargetElements($targetElements);
    }

    /**
     * @param array $targetElements
     * @return $this
     */
    private function setTargetElements(array $targetElements): self
    {
        $this->targetElements = $targetElements;

        return $this;
    }

    public function jsonSerialize()
    {
        if (empty($this->targetElements)) {
            throw new \Exception("No targetElements found");
        }

        return parent::jsonSerialize()
            + [
                'targetElements' => $this->targetElements
            ];
    }


}
