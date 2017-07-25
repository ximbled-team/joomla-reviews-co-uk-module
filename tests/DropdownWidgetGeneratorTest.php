<?php
/**
 * This file is part of the joomla-reviews-co-uk-module project.
 * (c) 2017 WebOD LTD
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace AnythingNativeTest\Reviews;

use AnythingNative\Reviews\DropdownWidgetGenerator;
use PHPUnit\Framework\TestCase;

final class DropdownWidgetGeneratorTest extends TestCase
{
    private $defaultConfig = [
        'primaryClr' => '#f47e27',
        'neutralClr' => '#f4f4f4',
        'textClr' => '#000000',
        'height' => 400,
        'numReviews' => 10,
        'direction' => 'down',
    ];

    public function testItCanBeConstructed()
    {
        static::assertInstanceOf(
            DropdownWidgetGenerator::class,
            new DropdownWidgetGenerator('anything-native', $this->defaultConfig)
        );
    }

    public function testItCanGetStoreName()
    {
        $SUT = new DropdownWidgetGenerator('anything-native', $this->defaultConfig);
        static::assertEquals('anything-native', $SUT->getStoreName());
    }

    public function testOutput()
    {
        $generator = new DropdownWidgetGenerator('anything-native', $this->defaultConfig);
        $string = $generator->toString();

        // Test store name is in there.
        static::assertContains('anything-native', $string);

        // Test their is a function being called.
        static::assertContains('dropdownWidget(\'reviews-dropdown-', $string);

        // Test there is a div with id prefixed with function selector.
        static::assertContains('id="reviews-dropdown-', $string);
    }
}
