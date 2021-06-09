<?php

declare(strict_types=1);

use Laminas\ConfigAggregator\ConfigAggregator;

return [
    // Toggle the configuration cache. Set this to boolean false, or remove the
    // directive, to disable configuration caching. Toggling development mode
    // will also disable it by default; clear the configuration cache using
    // `composer clear-config-cache`.
    // THIS IS A TEST PROJECT, so this is `false`. Set to `true` for production sites.
    ConfigAggregator::ENABLE_CACHE => false,

    // Enable debugging; typically used to provide debugging information within templates.
    // THIS IS A TEST PROJECT, so this is `true`. Set to `false` for production sites.
    'debug'  => true,

    'mezzio' => [
        // Provide templates for the error handling middleware to use when
        // generating responses.
        'error_handler' => [
            'template_404'   => 'error::404',
            'template_error' => 'error::error',
        ],
    ],
];
