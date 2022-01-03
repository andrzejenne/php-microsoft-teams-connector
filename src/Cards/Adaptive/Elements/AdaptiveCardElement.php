<?php

namespace Sebbmyr\Teams\Cards\Adaptive\Elements;

interface AdaptiveCardElement extends \JsonSerializable
{
    public function setVersion(float $version);
}
