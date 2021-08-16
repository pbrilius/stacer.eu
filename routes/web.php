<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

$router->map('GET', '/index.php', function (ServerRequestInterface $request) use ($container, $eniac): ResponseInterface {

    $twig = $container->get('twig')[0];

    $template = $twig->load('@user/index.html.twig');

    $response = new Laminas\Diactoros\Response;
    $response->getBody()->write($template->render([
      'target' => 'User',
    ]));
    return $response;
});

$router->map('GET', '/index.php/admin', function (ServerRequestInterface $request) use ($container, $eniac): ResponseInterface {

    $twig = $container->get('twig')[0];

    $template = $twig->load('@admin/index.html.twig');

    $response = new Laminas\Diactoros\Response;
    $response->getBody()->write($template->render([
      'target' => 'Administrator',
    ]));
    return $response;
});
