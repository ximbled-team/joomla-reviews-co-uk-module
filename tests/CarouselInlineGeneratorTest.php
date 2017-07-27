<?php
/**
 * This file is part of the joomla-reviews-co-uk-module project.
 * (c) 2017 WebOD LTD
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AnythingNativeTest\Reviews;

use AnythingNative\Reviews\CarouselInlineGenerator;
use PHPUnit\Framework\TestCase;

final class CarouselInlineGeneratorTest extends TestCase
{
    private $defaultConfig = [
        'primaryClr' => '#f47e27',
        'neutralClr' => '#f4f4f4',
        'reviewTextClr' => '#2f2f2f',
        'ratingTextClr' => '#2f2f2f',
        'layout' => 'fullWidth',
        'numReviews' => 10,
    ];

    public function testItCanBeConstructed()
    {
        static::assertInstanceOf(
            CarouselInlineGenerator::class,
            new CarouselInlineGenerator('anything-native', $this->defaultConfig)
        );
    }

    public function testItCanGetStoreName()
    {
        $SUT = new CarouselInlineGenerator('anything-native', $this->defaultConfig);
        static::assertEquals('anything-native', $SUT->getStoreName());
    }

    public function testOutput()
    {
        $generator = new CarouselInlineGenerator('anything-native', $this->defaultConfig);
        $string = $generator->toString();

        // Test store name is in there.
        static::assertContains('anything-native', $string);

        // Test their is a function being called.
        static::assertContains('carouselInlineWidget(\'reviews-carousel-inline-', $string);

        // Test there is a div with id prefixed with function selector.
        static::assertContains('id="reviews-carousel-inline-', $string);
    }
}
