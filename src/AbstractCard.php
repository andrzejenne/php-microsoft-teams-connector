<?php

namespace Sebbmyr\Teams;

/**
 * Abstract card
 */
abstract class AbstractCard implements TeamsConnectorInterface
{
    /**
     * @var array
     */
    public $data;

    public function __construct($data = [])
    {
        $this->data = $data;
    }

    /**
     * Returns message card array
     *
     * @return array
     * @deprecated
     */
    public function getMessage(): array {
        return $this->jsonSerialize();
    }
}
