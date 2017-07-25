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

use AnythingNative\Reviews\BadgeGenerator;
use AnythingNative\Reviews\CarouselInlineGenerator;
use AnythingNative\Reviews\CarouselWidgetGenerator;
use AnythingNative\Reviews\DropdownWidgetGenerator;
use AnythingNative\Reviews\GeneratorFactory;
use AnythingNative\Reviews\TrustedBadgeGenerator;
use AnythingNative\Reviews\VerticalWidgetGenerator;
use Joomla\Registry\Registry;
use PHPUnit\Framework\TestCase;

final class GeneratorFactoryTest extends TestCase
{
    private $defaultConfiguration = [
        'store_name' => 'anything_native',
    ];

    public function testItWillThrowAnExceptionIfNoStoreNameProvided()
    {
        $this->expectException(\Error::class);
        $this->expectExceptionMessage('A store name must be provided');

        $factory = new GeneratorFactory();
        $factory(new Registry(['store_name' => '', 'type' => 'BadgeGenerator']));
    }

    public function testItWillThrowAnExceptionIfUnknownTypeProvided()
    {
        $this->expectException(\Error::class);
        $this->expectExceptionMessage('Unknown type provided');

        $factory = new GeneratorFactory();
        $factory(new Registry(['store_name' => 'anythingnative', 'type' => 'unknown']));
    }

    public function testItCanBuildBadgeGenerator()
    {
        $params = new Registry($this->defaultConfiguration);
        $params->set('type', 'BadgeGenerator');

        $factory = new GeneratorFactory();
        static::assertInstanceOf(BadgeGenerator::class, $factory($params));
    }

    public function testItCanBuildCarouselInlineGenerator()
    {
        $params = new Registry($this->defaultConfiguration);
        $params->set('type', 'CarouselInlineGenerator');

        $factory = new GeneratorFactory();
        static::assertInstanceOf(CarouselInlineGenerator::class, $factory($params));
    }

    public function testItCanBuildCarouselWidgetGenerator()
    {
        $params = new Registry($this->defaultConfiguration);
        $params->set('type', 'CarouselWidgetGenerator');

        $factory = new GeneratorFactory();
        static::assertInstanceOf(CarouselWidgetGenerator::class, $factory($params));
    }

    public function testItCanBuildDropdownWidgetGenerator()
    {
        $params = new Registry($this->defaultConfiguration);
        $params->set('type', 'DropdownWidgetGenerator');

        $factory = new GeneratorFactory();
        static::assertInstanceOf(DropdownWidgetGenerator::class, $factory($params));
    }

    public function testItCanBuildTrustedBadgeGenerator()
    {
        $params = new Registry($this->defaultConfiguration);
        $params->set('type', 'TrustedBadgeGenerator');

        $factory = new GeneratorFactory();
        static::assertInstanceOf(TrustedBadgeGenerator::class, $factory($params));
    }

    public function testItCanBuildVerticalWidgetGenerator()
    {
        $params = new Registry($this->defaultConfiguration);
        $params->set('type', 'VerticalWidgetGenerator');

        $factory = new GeneratorFactory();
        static::assertInstanceOf(VerticalWidgetGenerator::class, $factory($params));
    }
}
