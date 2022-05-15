<?php

declare(strict_types=1);

namespace App\Movies\Infrastructure\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Movies\Application\UseCases\ShowAllMovies;
use App\Movies\Application\Request\MoviesIdRequest;
use App\Movies\Application\UseCases\ShowMovies;

final class MoviesGetController extends AbstractController
{
    public function __construct(
        private ShowAllMovies $show_all_movies,
        private ShowMovies    $show_movies
    )
    {
    }

    /**
     * @Route("/movies", methods={"GET"})
     */
    public function showAllMovies()
    {
        return new JsonResponse(($this->show_all_movies)()->toArray(), Response::HTTP_OK);
    }

    /**
     * @Route("/movies/{id}", methods={"GET"})
     */
    public function showMovie(int $id): JsonResponse
    {
        $id_request = new MoviesIdRequest($id);
        return new JsonResponse(($this->show_movies)($id_request)->toArray(), Response::HTTP_OK);
    }
}