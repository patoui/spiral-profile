<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\PostRepository;
use Spiral\Http\PaginationFactory;
use Spiral\Http\Request\InputManager;
use Spiral\Views\ViewsInterface;

class PostController
{
    /** @var PostRepository */
    private PostRepository $repository;

    /**
     * @param \App\Repository\PostRepository $repository
     */
    public function __construct(PostRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(
        InputManager $request,
        ViewsInterface $views,
        PaginationFactory $paginator
    ): string {
        $post_select = $this->repository->select();
        $pagination  = $paginator
            ->createPaginator('posts')
            ->withPage((int) $request->query('page', 1))
            ->paginate($post_select);

        return $views->render('post/index', [
            'posts'      => $post_select->fetchAll(),
            'pagination' => $pagination,
        ]);
    }

    public function show(string $post_slug, ViewsInterface $views): string
    {
        return $views->render('post/show', [
            'post' => $this->repository->findBySlug($post_slug),
        ]);
    }
}
