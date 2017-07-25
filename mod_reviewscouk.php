<?php
/**
 * This file is part of the joomla-reviews-co-uk-module project.
 * (c) 2017 WebOD LTD
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace {

    use AnythingNative\Reviews\GeneratorFactory;

    /** @var \Joomla\Registry\Registry $params */

    if (file_exists(__DIR__ . '/vendor/autoload.php')) {
        require_once __DIR__ . '/vendor/autoload.php';
    } else {
        JLoader::registerNamespace('AnythingNative', __DIR__ . '/src');
    }

    $factory = new GeneratorFactory();
    $generator = $factory($params);

    echo $generator->toString();
}
