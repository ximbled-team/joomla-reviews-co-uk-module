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

use Joomla\Registry\Registry;

final class GeneratorFactory
{
    public function __invoke(Registry $registry): Generator
    {
        $type = (string) $registry->get('type', '');
        $storeName = (string) $registry->get('store_name', '');
        $expectedMethod = 'build' . $type;

        if (0 === strlen($storeName)) {
            throw new \Error(sprintf(
                'A store name must be provided. Please reconfigure mod_reviewscouk module.',
                $type
            ));
        }

        if (! method_exists($this, $expectedMethod)) {
            throw new \Error(sprintf(
                'Unknown type provided "%s". Please reconfigure mod_reviewscouk module.',
                $type
            ));
        }

        return $this->$expectedMethod($storeName, $registry);
    }

    private function buildBadgeGenerator(string $storeName, Registry $registry): BadgeGenerator
    {
        return new BadgeGenerator($storeName, [
            '' => $registry->get('', ''),
        ]);
    }

    private function buildCarouselInlineGenerator(string $storeName, Registry $registry): CarouselInlineGenerator
    {
        return new CarouselInlineGenerator($storeName, [
            '' => $registry->get('', ''),
        ]);
    }

    private function buildCarouselWidgetGenerator(string $storeName, Registry $registry): CarouselWidgetGenerator
    {
        return new CarouselWidgetGenerator($storeName, [
            '' => $registry->get('', ''),
        ]);
    }

    private function buildDropdownWidgetGenerator(string $storeName, Registry $registry): DropdownWidgetGenerator
    {
        return new DropdownWidgetGenerator($storeName, [
            '' => $registry->get('', ''),
        ]);
    }

    private function buildTrustedBadgeGenerator(string $storeName, Registry $registry): TrustedBadgeGenerator
    {
        return new TrustedBadgeGenerator($storeName, [
            '' => $registry->get('', ''),
        ]);
    }

    private function buildVerticalWidgetGenerator(string $storeName, Registry $registry): VerticalWidgetGenerator
    {
        return new VerticalWidgetGenerator($storeName, [
            '' => $registry->get('', ''),
        ]);
    }
}
