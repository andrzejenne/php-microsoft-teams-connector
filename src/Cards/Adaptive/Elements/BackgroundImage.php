<?php
declare(strict_types=1);


namespace Sebbmyr\Teams\Cards\Adaptive\Elements;


use Sebbmyr\Teams\Cards\Adaptive\Traits\HasHorizontalAlignment;
use Sebbmyr\Teams\Cards\Adaptive\Traits\HasVersion;
use Sebbmyr\Teams\Cards\Adaptive\Traits\HasVerticalAlignment;

/**
 * Specifies a background image. Acceptable formats are PNG, JPEG, and GIF
 */
class BackgroundImage implements AdaptiveCardElement
{
    use HasVersion, HasHorizontalAlignment, HasVerticalAlignment;

    /**
     * @var string
     */
    private $url;

    private $fillMode;

    /**
     * @return static
     */
    public static function create(string $url = null): self
    {
        return new static();
    }

    /**
     * @param string|null $url
     */
    public function __construct(string $url = null)
    {
        $this->url = $url;
    }


    /**
     * @throws \Exception
     */
    public function jsonSerialize()
    {
        if (empty($this->url)) {
            throw new \Exception('Background image element is missing url');
        }

        $data = [
            'type' => 'BackgroundImage',
            'url' => $this->url,
        ];

        if (!empty($this->horizontalAlignment)) {
            $data['horizontalAlignment'] = $this->horizontalAlignment;
        }
        if (!empty($this->verticalAlignment)) {
            $data['verticalAlignment'] = $this->verticalAlignment;
        }

        return $data;
    }

    /**
     * @param string $url
     * @return $this
     */
    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }


}
