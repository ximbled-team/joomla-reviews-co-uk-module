<?php
/**
 * This file is part of the joomla-reviews-co-uk-module project.
 * (c) 2017 WebOD LTD
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/*
Expected output.

<script src="https://widget.reviews.co.uk/carousel/dist.js"></script>
<div id="carousel-widget-360" style="width:100%;max-width:360px;margin:0 auto;"></div>
<script>
carouselWidget('carousel-widget-360',{
  store: '{storeName}',
  primaryClr: '#f47e27',
  neutralClr: '#f4f4f4',
  reviewTextClr: '#494949',
  layout:'fullWidth',
  numReviews: 21
});
</script>

*/

declare(strict_types=1);

namespace AnythingNative\Reviews;

final class CarouselWidgetGenerator implements Generator
{
    /** @var string */
    private $storeName;

    /** @var array */
    private $options;

    /** @var string */
    private $scriptUrl = 'https://widget.reviews.co.uk/carousel/dist.js';

    /** @var string */
    private $html = '<div id="{id}" style="width:100%;max-width:360px;margin:0 auto;"></div>';

    /** @var string */
    private $js = 'carouselWidget(\'{id}\', {config});';

    public function __construct(string $storeName, array $options)
    {
        $this->storeName = $storeName;
        $this->options = $options;
    }

    public function getStoreName(): string
    {
        return $this->storeName;
    }

    public function toString(): string
    {
        $id = 'reviews-carousel-' . time();
        $config = $this->options;
        $config['store'] = $this->storeName;

        return str_replace(
            [
                '{id}',
                '{config}',
            ],
            [
                $id,
                json_encode($config),
            ],
            '<script src="' . $this->scriptUrl . '"></script>' . $this->html . '<script>' . $this->js . '</script>'
        );
    }
}
