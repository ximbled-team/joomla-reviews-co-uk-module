<?php
/**
 * This file is part of the joomla-reviews-co-uk-module project.
 * (c) 2017 WebOD LTD
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace {

    use AnythingNative\Reviews\GeneratorFactory;

    /** @var \Joomla\Registry\Registry $params */

    if (file_exists(__DIR__ . '/vendor/autoload.php')) {
        require_once __DIR__ . '/vendor/autoload.php';
    } else {
        require_once __DIR__ . '/src/Generator.php';

        require_once __DIR__ . '/src/BadgeGenerator.php';
        require_once __DIR__ . '/src/CarouselInlineWidgetGenerator.php';
        require_once __DIR__ . '/src/CarouselWidgetGenerator.php';
        require_once __DIR__ . '/src/DropdownWidgetGenerator.php';
        require_once __DIR__ . '/src/GeneratorFactory.php';
        require_once __DIR__ . '/src/TrustedBadgeGenerator.php';
        require_once __DIR__ . '/src/VerticalWidgetGenerator.php';
    }

    $factory = new GeneratorFactory();
    $generator = $factory($params);

    echo $generator->toString();
}
