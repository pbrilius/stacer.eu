<?php

use Psr\Http\Message\ServerRequestInterface;

$responseFactory = new Laminas\Diactoros\ResponseFactory();
$strategy = new League\Route\Strategy\JsonStrategy($responseFactory);

// map a route
$router->group('/index.php/api/v' . $eniac->get('api.version'), function ($router) {
  $router->map('GET', '/', function (ServerRequestInterface $request): array {
    return [
      'title'   => 'My New Simple API',
      'version' => 1,
    ];
  });
})->setStrategy($strategy)
  ->middleware($container->get('authorization')[0])
  ->middleware($container->get('authentication')[0]);
