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

use AnythingNative\Reviews\VerticalWidgetGenerator;
use PHPUnit\Framework\TestCase;

final class VerticalWidgetGeneratorTest extends TestCase
{
    private $defaultConfig = [
        'primaryClr' => '#f47e27',
        'layout' => 'fullWidth',
        'height' => 500,
        'numReviews' => 10,
    ];

    public function testItCanBeConstructed()
    {
        static::assertInstanceOf(
            VerticalWidgetGenerator::class,
            new VerticalWidgetGenerator('anything-native', $this->defaultConfig)
        );
    }

    public function testItCanGetStoreName()
    {
        $SUT = new VerticalWidgetGenerator('anything-native', $this->defaultConfig);
        static::assertEquals('anything-native', $SUT->getStoreName());
    }

    public function testOutput()
    {
        $generator = new VerticalWidgetGenerator('anything-native', $this->defaultConfig);
        $string = $generator->toString();

        // Test store name is in there.
        static::assertContains('anything-native', $string);

        // Test their is a function being called.
        static::assertContains('verticalWidget(\'reviews-virt-', $string);

        // Test there is a div with id prefixed with function selector.
        static::assertContains('id="reviews-virt-', $string);
    }
}
