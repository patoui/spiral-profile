<?php

declare(strict_types=1);

namespace App\Bootloader;

use App\Controller\TodoController;
use App\Controller\UserController;
use Spiral\Boot\Bootloader\Bootloader;
use Spiral\Router\Route;
use Spiral\Router\RouterInterface;
use Spiral\Router\Target\Action;

class RoutesBootloader extends Bootloader
{
    /**
     * Bootloader execute method.
     *
     * @param RouterInterface $router
     */
    public function boot(RouterInterface $router): void
    {
        $router->setRoute('user.index', (new Route('/user', new Action(UserController::class, 'index')))->withVerbs('GET'));
        $router->setRoute('user.show', (new Route('/user/<id:\d+>', new Action(UserController::class, 'show')))->withVerbs('GET'));
        $router->setRoute('user.store', (new Route('/user', new Action(UserController::class, 'store')))->withVerbs('POST'));
        $router->setRoute('user.update', (new Route('/user/<id:\d+>', new Action(UserController::class, 'update')))->withVerbs('PUT', 'PATCH'));
        $router->setRoute('user.delete', (new Route('/user/<id:\d+>', new Action(UserController::class, 'delete')))->withVerbs('DELETE'));

        $router->setRoute('todo.index', (new Route('/todo', new Action(TodoController::class, 'index')))->withVerbs('GET'));
        $router->setRoute('todo.create', (new Route('/todo/add', new Action(TodoController::class, 'create')))->withVerbs('GET'));
        $router->setRoute('todo.store', (new Route('/todo', new Action(TodoController::class, 'store')))->withVerbs('POST'));
        $router->setRoute('todo.edit', (new Route('/todo/<id:\d+>/edit', new Action(TodoController::class, 'edit')))->withVerbs('GET'));
        $router->setRoute('todo.update', (new Route('/todo/<id:\d+>/edit', new Action(TodoController::class, 'update')))->withVerbs('POST'));
        $router->setRoute('todo.delete', (new Route('/todo/<id:\d+>/delete', new Action(TodoController::class, 'delete')))->withVerbs('POST'));
    }
}
