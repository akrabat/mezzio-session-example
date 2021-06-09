<?php

declare(strict_types=1);

namespace App\Handler;

use Laminas\Diactoros\Response\RedirectResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class LoginPageHandler implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        /** @var \Mezzio\Session\LazySession $session */
        $session = $request->getAttribute('session');

        if ($session->has('username')) {
            // already logged in - nothing to do
            return new RedirectResponse('/');
        }

        // regenerate id when changing user rights
        $session->regenerate();

        // simulate logging a user in by setting "username" and "logged-in-at"
        $session->set('username', 'Rob');
        $session->set('logged-in-at', date('Y-m-d H:i:s'));

        // redirect to home page
        return new RedirectResponse('/');
    }
}
