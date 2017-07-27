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

<script src="https://widget.reviews.co.uk/vertical/dist.js"></script>
<div id="vertical-widget-360" style="width:100%;max-width:360px;"></div>
<script>
verticalWidget('vertical-widget-360',{
  store: '{storeName}',
  primaryClr: '#f47e27',
  layout:'fullWidth',
  height: 500,
  numReviews: 10
});
</script>

*/

namespace AnythingNative\Reviews;

final class VerticalWidgetGenerator implements Generator
{
    /** @var string */
    private $storeName;

    /** @var array */
    private $options;

    /** @var string */
    private $scriptUrl = 'https://widget.reviews.co.uk/vertical/dist.js';

    /** @var string */
    private $html = '<div id="{id}" style="width:100%;max-width:360px;"></div>';

    /** @var string */
    private $js = 'verticalWidget(\'{id}\', {config});';

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
        $id = 'reviews-virt-' . time();
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
