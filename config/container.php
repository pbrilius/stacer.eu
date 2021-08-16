<?php

declare(strict_types=1);

$container = new League\Container\Container();

require_once __DIR__ . '/../bootstrap.php';

// Doctrine ORM
use Doctrine\ORM\EntityManagerInterface;

$container->add(EntityManagerInterface::class, $entityManager)->addTag('doctrine.orm');

// Middleware section
use Pbrilius\C2cMvcPbgroupeu\Middleware\Authentication;
use Pbrilius\C2cMvcPbgroupeu\Middleware\Authorization;

$container->add(Authorization::class, function() use ($container) {
  $authorization = new Authorization($container->get('doctrine.orm')[0]);

  return $authorization;
})->addTag('authorization')->setShared();

$container->add(Authentication::class, function() use ($container) {
  $authentication = new  Authentication($container->get('doctrine.orm')[0]);

  return $authentication;
})->addTag('authentication')->setShared();

// Logging
include_once __DIR__ . '/../monolog.php';
use Monolog\Logger;
$container->add(Logger::class, $logger)->addTag('logger');

// Frontend templates
use Twig\Environment;
include_once __DIR__ . '/../twig.php';
$container->add(Engine::class, $twig)->addTag('twig');

// Commands & handlers
use Pbrilius\C2cMvcPbgroupeu\Handler\ClearTwigCacheHandler;
$container->add(ClearTwigCacheHandler::class, function() use ($eniac) {
  return new ClearTwigCacheHandler($eniac->get('twig.cache'));
});
require_once __DIR__ . '/../commands.php';
use League\Tactician\CommandBus;

$container->add(CommandBus::class, $commandBus)->addTag('console.cli')->setShared();
