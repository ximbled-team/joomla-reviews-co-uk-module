<?php
/**
 * This file is part of the joomla-reviews-co-uk-module project.
 * (c) 2017 WebOD LTD
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AnythingNativeTest\Reviews;

use AnythingNative\Reviews\CarouselWidgetGenerator;
use PHPUnit\Framework\TestCase;

final class CarouselWidgetGeneratorTest extends TestCase
{
    private $defaultConfig = [
        'primaryClr' => '#f47e27',
        'neutralClr' => '#f4f4f4',
        'reviewTextClr' => '#2f2f2f',
        'layout' => 'fullWidth',
        'numReviews' => 10,
    ];

    public function testItCanBeConstructed()
    {
        static::assertInstanceOf(
            CarouselWidgetGenerator::class,
            new CarouselWidgetGenerator('anything-native', $this->defaultConfig)
        );
    }

    public function testItCanGetStoreName()
    {
        $SUT = new CarouselWidgetGenerator('anything-native', $this->defaultConfig);
        static::assertEquals('anything-native', $SUT->getStoreName());
    }

    public function testOutput()
    {
        $generator = new CarouselWidgetGenerator('anything-native', $this->defaultConfig);
        $string = $generator->toString();

        // Test store name is in there.
        static::assertContains('anything-native', $string);

        // Test their is a function being called.
        static::assertContains('carouselWidget(\'reviews-carousel-', $string);

        // Test there is a div with id prefixed with function selector.
        static::assertContains('id="reviews-carousel-', $string);
    }
}
