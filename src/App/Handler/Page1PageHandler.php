<?php

declare(strict_types=1);

namespace App\Handler;

use Laminas\Diactoros\Response\HtmlResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Page1PageHandler implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        /** @var \Mezzio\Session\LazySession $session */
        $session = $request->getAttribute('session');

        $session->set('data-set-on-page-one', mt_rand());

        $sessionData = print_r($session->toArray(), true);
        $sessionId = $session->getId();

        $html = <<<HTML
<html>
<body>

<h1>Page 1</h1>

Session ID:
<pre>$sessionId</pre>

Session data:
<pre>$sessionData</pre>


<hr>
<p>
<a href="/">Home</a>
| <a href="/page1">Page1</a>
| <a href="/page2">Page2</a>
| <a href="/login">Login</a>
| <a href="/logout">Logout</a>
</p>

</body>
</html>
HTML;

        return new HtmlResponse($html);
    }
}
