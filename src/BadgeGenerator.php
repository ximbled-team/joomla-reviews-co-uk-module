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

<script src="https://widget.reviews.co.uk/badge/dist.js"></script>
<div id="badge-140" style="max-width:140px;"></div>
<script>
reviewsBadge('badge-140',{
  store: '{storeName}',
  primaryClr: '#12d06c',
  neutralClr: '#f4f4f4',
  starsClr: '#fff',
  textClr: '#fff'
});
</script>

*/

namespace AnythingNative\Reviews;

final class BadgeGenerator implements Generator
{
    /** @var string */
    private $storeName;

    /** @var array */
    private $options;

    /** @var string */
    private $scriptUrl = 'https://widget.reviews.co.uk/badge/dist.js';

    /** @var string */
    private $html = '<div id="{id}" style="max-width:140px;"></div>';

    /** @var string */
    private $js = 'reviewsBadge(\'{id}\', {config});';

    public function __construct($storeName, array $options)
    {
        $this->storeName = $storeName;
        $this->options = $options;
    }

    public function getStoreName()
    {
        return $this->storeName;
    }

    public function toString()
    {
        $id = 'reviews-badge-' . time();
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
