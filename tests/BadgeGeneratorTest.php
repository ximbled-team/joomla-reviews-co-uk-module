<?php
/**
 * This file is part of the joomla-reviews-co-uk-module project.
 * (c) 2017 WebOD LTD
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AnythingNativeTest\Reviews;

use AnythingNative\Reviews\BadgeGenerator;
use PHPUnit\Framework\TestCase;

final class BadgeGeneratorTest extends TestCase
{
    private $defaultConfig = [
        'primaryClr' => '#12d06c',
        'neutralClr' => '#f4f4f4',
        'starsClr' => '#fff',
        'textClr' => '#fff',
    ];

    public function testItCanBeConstructed()
    {
        static::assertInstanceOf(
            BadgeGenerator::class,
            new BadgeGenerator('anything-native', $this->defaultConfig)
        );
    }

    public function testItCanGetStoreName()
    {
        $SUT = new BadgeGenerator('anything-native', $this->defaultConfig);
        static::assertEquals('anything-native', $SUT->getStoreName());
    }

    public function testOutput()
    {
        $generator = new BadgeGenerator('anything-native', $this->defaultConfig);
        $string = $generator->toString();

        // Test store name is in there.
        static::assertContains('anything-native', $string);

        // Test their is a function being called.
        static::assertContains('reviewsBadge(\'reviews-badge-', $string);

        // Test there is a div with id prefixed with function selector.
        static::assertContains('id="reviews-badge-', $string);
    }
}
