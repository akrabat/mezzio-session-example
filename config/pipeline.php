<?php

declare(strict_types=1);

use Laminas\Stratigility\Middleware\ErrorHandler;
use Mezzio\Application;
use Mezzio\Handler\NotFoundHandler;
use Mezzio\Helper\ServerUrlMiddleware;
use Mezzio\Helper\UrlHelperMiddleware;
use Mezzio\MiddlewareFactory;
use Mezzio\Router\Middleware\DispatchMiddleware;
use Mezzio\Router\Middleware\ImplicitHeadMiddleware;
use Mezzio\Router\Middleware\ImplicitOptionsMiddleware;
use Mezzio\Router\Middleware\MethodNotAllowedMiddleware;
use Mezzio\Router\Middleware\RouteMiddleware;
use Psr\Container\ContainerInterface;

/**
 * Setup middleware pipeline:
 */

return function (Application $app, MiddlewareFactory $factory, ContainerInterface $container): void {
    // Error handler is commented out on this test site. You should not do this for a "real" website.
    // $app->pipe(ErrorHandler::class);
    $app->pipe(ServerUrlMiddleware::class);


    // Add session middleware, so every request has the session started and available.
    $app->pipe(\Mezzio\Session\SessionMiddleware::class);


    // Register the routing middleware in the middleware pipeline.
    // This middleware registers the Mezzio\Router\RouteResult request attribute.
    $app->pipe(RouteMiddleware::class);
    $app->pipe(ImplicitHeadMiddleware::class);
    $app->pipe(ImplicitOptionsMiddleware::class);
    $app->pipe(MethodNotAllowedMiddleware::class);
    $app->pipe(UrlHelperMiddleware::class);

    $app->pipe(DispatchMiddleware::class);
    $app->pipe(NotFoundHandler::class);
};
