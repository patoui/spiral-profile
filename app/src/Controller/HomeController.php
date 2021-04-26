<?php

/**
 * This file is part of Spiral package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Controller;

use App\Database\User;
use Cycle\ORM\Transaction;
use Psr\Http\Message\ResponseInterface;
use Spiral\Http\ResponseWrapper;
use Cycle\ORM\ORMInterface;

class HomeController
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
    public function index(): ResponseInterface
    {
//        $user = new User();
//        $user->name = 'John Doe';
//
//        $tr = new Transaction($this->orm);
//        $tr->persist($user);
//        $tr->run();

        return $this->response->json(
            $this->orm->getRepository(User::class)->select()->fetchAll()
        );
    }
}
