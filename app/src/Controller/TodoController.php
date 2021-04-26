<?php

declare(strict_types=1);

namespace App\Controller;

use App\Database\Todo;
use App\Repository\TodoRepository;
use App\Request\TodoRequest;
use Cycle\ORM\Transaction;
use Psr\Http\Message\ResponseInterface;
use Spiral\Http\Exception\ClientException\NotFoundException;
use Spiral\Prototype\Traits\PrototypeTrait;

class TodoController
{
    use PrototypeTrait;

    /** @var TodoRepository */
    private $repository;

    /**
     * @param \App\Repository\TodoRepository $repository
     */
    public function __construct(TodoRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return string
     */
    public function index(): string
    {
        $todo_select = $this->repository->select();
        $paginator   = $this->paginators
            ->createPaginator('todos')
            ->withPage((int) $this->request->query('page', 1))
            ->paginate($todo_select);

        return $this->views->render('todos/index', [
            'todos'      => $todo_select->fetchAll(),
            'paginator'  => $paginator,
            'csrf_token' => $this->server_request->getAttribute('csrfToken'),
        ]);
    }

    /**
     * @return string
     */
    public function create(): string
    {
        if ($errors = $this->session->getSection('errors')->get('items')) {
            $this->session->getSection('errors')->delete('items');
        }
        return $this->views->render('todos/create', [
            'csrf_token' => $this->server_request->getAttribute('csrfToken'),
            'errors'     => $errors,
        ]);
    }

    /**
     * @throws \Throwable
     */
    public function store(TodoRequest $request): ResponseInterface
    {
        if (!$request->isValid()) {
            $this->session->getSection('errors')->set('items', $request->getErrors());
            return $this->response->redirect('/todo/add');
        }

        $todo        = new Todo();
        $todo->label = $request->getField('label');
        $todo->body  = $request->getField('body');

        (new Transaction($this->orm))->persist($todo)->run();

        return $this->response->redirect('/todo');
    }

    public function edit(int $id): string
    {
        if (!$todo = $this->repository->findByPK($id)) {
            throw new NotFoundException();
        }

        if ($errors = $this->session->getSection('errors')->get('items')) {
            $this->session->getSection('errors')->delete('items');
        }

        return $this->views->render('todos/edit', [
            'todo'       => $todo,
            'csrf_token' => $this->server_request->getAttribute('csrfToken'),
            'errors'     => $errors,
        ]);
    }

    /**
     * @throws \Throwable
     * @throws \Spiral\Models\Exception\EntityExceptionInterface
     */
    public function update(int $id, TodoRequest $request): ResponseInterface
    {
        if (!$todo = $this->repository->findByPK($id)) {
            throw new NotFoundException();
        }

        if (!$request->isValid()) {
            $this->session->getSection('errors')->set('items', $request->getErrors());
            return $this->response->redirect("/todo/{$id}/edit");
        }

        $todo->label = $request->getField('label');
        $todo->body  = $request->getField('body');

        (new Transaction($this->orm))->persist($todo)->run();

        return $this->response->redirect('/todo');
    }

    public function delete(int $id): ResponseInterface
    {
        if (!$todo = $this->repository->findByPK($id)) {
            throw new NotFoundException();
        }

        (new Transaction($this->orm))->delete($todo)->run();

        return $this->response->redirect('/todo');
    }
}
