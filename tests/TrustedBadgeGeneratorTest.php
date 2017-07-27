<?php
/**
 * This file is part of the joomla-reviews-co-uk-module project.
 * (c) 2017 WebOD LTD
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AnythingNativeTest\Reviews;

use AnythingNative\Reviews\TrustedBadgeGenerator;
use PHPUnit\Framework\TestCase;

final class TrustedBadgeGeneratorTest extends TestCase
{
    private $defaultConfig = [];

    public function testItCanBeConstructed()
    {
        static::assertInstanceOf(
            TrustedBadgeGenerator::class,
            new TrustedBadgeGenerator('anything-native', $this->defaultConfig)
        );
    }

    public function testItCanGetStoreName()
    {
        $SUT = new TrustedBadgeGenerator('anything-native', $this->defaultConfig);
        static::assertEquals('anything-native', $SUT->getStoreName());
    }

    public function testOutput()
    {
        $generator = new TrustedBadgeGenerator('anything-native', $this->defaultConfig);
        $string = $generator->toString();

        // Test store name is in there.
        static::assertContains('anything-native', $string);
    }
}
