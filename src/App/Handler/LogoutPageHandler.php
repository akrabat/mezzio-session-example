<?php

declare(strict_types=1);

namespace App\Handler;

use Laminas\Diactoros\Response\RedirectResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class LogoutPageHandler implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        /** @var \Mezzio\Session\LazySession $session */
        $session = $request->getAttribute('session');

        // clear all data from the session
        $session->clear();

        // regenerate id when changing user rights
        $session->regenerate();

        // redirect to home page
        return new RedirectResponse('/');
    }
}
