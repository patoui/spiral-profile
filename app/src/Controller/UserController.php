<?php

declare(strict_types=1);

namespace App\Controller;

use App\Database\User;
use App\Request\UserRequest;
use Cycle\ORM\Transaction;
use Psr\Http\Message\ResponseInterface;
use Spiral\Http\ResponseWrapper;
use Cycle\ORM\ORMInterface;

class UserController
{


    /** @var ResponseWrapper */
    private $response;
    /** @var ORMInterface */
    private $orm;
    /**
     * @param ResponseWrapper $response
     * @param ORMInterface $orm
     */
    public function __construct(ResponseWrapper $response, ORMInterface $orm)
    {
        $this->orm = $orm;
        $this->response = $response;
    }
    /**
     * @return ResponseInterface
     */
    public function index(): ResponseInterface
    {
        return $this->response->json(
            $this->orm->getRepository(User::class)->all()
        );
    }

    public function show(int $id): ResponseInterface
    {

        $user = $this->orm->getRepository(User::class)->findByPK($id);

        if (!$user) {
            return $this->response->json(['User not found'], 404);
        }

        return $this->response->json($user);
    }

    /**
     * @throws \Throwable
     */
    public function store(UserRequest $request): ResponseInterface
    {
        if (!$request->isValid()) {
            return $this->response->json($request->getErrors(), 422);
        }
        $user = new User();
        $user->name = $request->getField('name');

        (new Transaction($this->orm))
            ->persist($user)
            ->run();

        return $this->response->json($user);
    }

    public function update(int $id, UserRequest $request): ResponseInterface
    {
        if (!$request->isValid()) {
            return $this->response->json($request->getErrors(), 422);
        }

        $user = $this->orm->getRepository(User::class)->findByPK($id);

        if (!$user) {
            return $this->response->json(['User not found'], 404);
        }

        $user->name = $request->getField('name');

        (new Transaction($this->orm))
            ->persist($user)
            ->run();

        return $this->response->json($user);
    }

    public function delete(int $id): ResponseInterface
    {
        $user = $this->orm->getRepository(User::class)->findByPK($id);

        if (!$user) {
            return $this->response->json(['User not found'], 404);
        }

        (new Transaction($this->orm))
            ->delete($user)
            ->run();

        return $this->response->json(['Successfully deleted user']);
    }
}
