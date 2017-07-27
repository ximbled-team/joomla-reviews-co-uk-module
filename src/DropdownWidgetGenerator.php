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

<script src="https://widget.reviews.co.uk/dropdown/dist.js"></script>
<div id="dropdown-240" style="width:240px;"></div>
    <script>
    dropdownWidget('dropdown-240',{
      store: '{storeName}',
      primaryClr: '#f47e27',
      neutralClr: '#f4f4f4',
      textClr: '#000',
      height: 400,
      numReviews: 10,
      direction: 'down'
    });
    </script>

*/

namespace AnythingNative\Reviews;

final class DropdownWidgetGenerator implements Generator
{
    /** @var string */
    private $storeName;

    /** @var array */
    private $options;

    /** @var string */
    private $scriptUrl = 'https://widget.reviews.co.uk/dropdown/dist.js';

    /** @var string */
    private $html = '<div id="{id}" style="width:100%;max-width:360px;margin:0 auto;"></div>';

    /** @var string */
    private $js = 'dropdownWidget(\'{id}\', {config});';

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
        $id = 'reviews-dropdown-' . time();
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
