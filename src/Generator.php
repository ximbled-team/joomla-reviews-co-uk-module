<?php
/**
 * This file is part of the joomla-reviews-co-uk-module project.
 * (c) 2017 WebOD LTD
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AnythingNative\Reviews;

interface Generator
{
    public function __construct($storeName, array $options);

    public function getStoreName();

    public function toString();
}
