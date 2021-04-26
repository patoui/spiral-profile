<?php

declare(strict_types=1);

namespace App\Errors;

use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Spiral\Http\ErrorHandler\RendererInterface;
use Spiral\Views\ViewsInterface;

class NiceRenderer implements RendererInterface
{
    private $responseFactory;

    private $views;

    public function __construct(
        ResponseFactoryInterface $responseFactory,
        ViewsInterface $views
    ) {
        $this->responseFactory = $responseFactory;
        $this->views = $views;
    }

    public function renderException(Request $request, int $code, string $message): Response
    {
        $response = $this->responseFactory->createResponse($code);

        $response->getBody()->write($this->views->render('errors/' . $code));

        return $response->withStatus($code, $message);
    }
}
