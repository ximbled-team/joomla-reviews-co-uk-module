<?php
/**
 * This file is part of the joomla-reviews-co-uk-module project.
 * (c) 2017 WebOD LTD
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AnythingNative\Reviews;

final class TrustedBadgeGenerator implements Generator
{
    /** @var string */
    private $storeName;

    /** @var array */
    private $options;

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
        return '<a href="https://www.reviews.co.uk/company-reviews/store/' . $this->storeName . '" target="_blank">
                    <img src="https://s3-eu-west-1.amazonaws.com/reviews-global/images/trust-badges/reviews-trust-logo-2.png"/>
                </a>';
    }
}
