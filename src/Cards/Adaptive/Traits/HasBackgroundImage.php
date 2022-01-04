<?php
declare(strict_types=1);


namespace Sebbmyr\Teams\Cards\Adaptive\Traits;


use Sebbmyr\Teams\Cards\Adaptive\Elements\BackgroundImage;

trait HasBackgroundImage
{
    /**
     * @var string|BackgroundImage
     * Specifies the background image. Acceptable formats are PNG, JPEG, and GIF
     */
    private $backgroundImage;

    /**
     * @param $backgroundImage
     * @return $this
     */
    public function setBackgroundImage($backgroundImage): self
    {
        if (is_string($backgroundImage) || $backgroundImage instanceof BackgroundImage) {
            $this->backgroundImage = $backgroundImage;
        }

        return $this;
    }
}
