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
            'primaryClr' => $registry->get('primary_color', '#12d06c'),
            'neutralClr' => $registry->get('neutral_color', '#f4f4f4'),
            'starsClr' => $registry->get('stars_color', '#ffffff'),
            'textClr' => $registry->get('text_color', '#ffffff'),
        ]);
    }

    private function buildCarouselInlineGenerator(string $storeName, Registry $registry): CarouselInlineGenerator
    {
        return new CarouselInlineGenerator($storeName, [
            'primaryClr' => $registry->get('primary_color', '#f47e27'),
            'neutralClr' => $registry->get('neutral_color', '#f4f4f4'),
            'reviewTextClr' => $registry->get('review_text_color', '#2f2f2f'),
            'ratingTextClr' => $registry->get('review_rating_color', '#2f2f2f'),
            'layout' => $registry->get('layout', 'fullWidth'),
            'numReviews' => (int) $registry->get('num_reviews', 21),
        ]);
    }

    private function buildCarouselWidgetGenerator(string $storeName, Registry $registry): CarouselWidgetGenerator
    {
        return new CarouselWidgetGenerator($storeName, [
            'primaryClr' => $registry->get('primary_color', '#f47e27'),
            'neutralClr' => $registry->get('neutral_color', '#f4f4f4'),
            'reviewTextClr' => $registry->get('review_text_color', '#494949'),
            'layout' => $registry->get('layout', 'fullWidth'),
            'numReviews' => (int) $registry->get('num_reviews', 21),
        ]);
    }

    private function buildDropdownWidgetGenerator(string $storeName, Registry $registry): DropdownWidgetGenerator
    {
        return new DropdownWidgetGenerator($storeName, [
            'primaryClr' => $registry->get('primary_color', '#f47e27'),
            'neutralClr' => $registry->get('neutral_color', '#f4f4f4'),
            'textClr' => $registry->get('text_color', '#000'),
            'height' => (int) $registry->get('height', 400),
            'numReviews' => (int) $registry->get('num_reviews', 10),
            'direction' => $registry->get('direction', 'down'),
        ]);
    }

    private function buildTrustedBadgeGenerator(string $storeName, Registry $registry): TrustedBadgeGenerator
    {
        return new TrustedBadgeGenerator($storeName, []);
    }

    private function buildVerticalWidgetGenerator(string $storeName, Registry $registry): VerticalWidgetGenerator
    {
        return new VerticalWidgetGenerator($storeName, [
            'primaryClr' => $registry->get('primary_color', '#f47e27'),
            'layout' => $registry->get('layout', 'fullWidth'),
            'height' => (int) $registry->get('height', 500),
            'numReviews' => (int) $registry->get('num_reviews', 10),
        ]);
    }
}
