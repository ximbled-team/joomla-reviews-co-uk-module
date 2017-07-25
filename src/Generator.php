<?php
/**
 * This file is part of the joomla-reviews-co-uk-module project.
 * (c) 2017 WebOD LTD
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace AnythingNative\Reviews;

interface Generator
{
    public function __construct(string $storeName, array $options);

    public function getStoreName(): string;

    public function toString(): string;
}
