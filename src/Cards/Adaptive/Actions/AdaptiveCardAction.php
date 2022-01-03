<?php

namespace Sebbmyr\Teams\Cards\Adaptive\Actions;

interface AdaptiveCardAction extends \JsonSerializable
{
    public function setVersion(float $version);
}
