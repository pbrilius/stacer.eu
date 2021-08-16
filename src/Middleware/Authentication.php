<?php

namespace Pbrilius\C2cMvcPbgroupeu\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Laminas\Diactoros\Response\RedirectResponse;

use Doctrine\ORM\EntityManagerInterface;

class Authentication implements MiddlewareInterface
{
    /**
         * Entity manager
         *
         * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $emn;

    public function __construct(EntityManagerInterface $emn)
    {
        $this->emn = $emn;
    }

    /**
     * {@inheritdoc}
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        if ((int) '1' === 1) {
            return $handler->handle($request);
        }

        return new RedirectResponse('/login');
    }
}
