<?php

declare(strict_types=1);

namespace App\Movies\Application\UseCases;


use App\Movies\Application\Response\MoviesResponse;
use App\Movies\Application\Response\MoviesResponses;

use App\Movies\Domain\MoviesInterface;


final class ShowAllMovies
{
    public function __construct(private MoviesInterface $repository)
    {
    }

    public function __invoke(): ?MoviesResponses
    {
        return new MoviesResponses(...self::mapping($this->repository->ShowAll()));
    }

    public static function mapping(array $movies): array
    {
        $array_response = [];

        foreach ($movies as $movie) {
            $array_response[] = new MoviesResponse(
                $movie->getId()->value(),
                $movie->getName()->value(),
                $movie->getCreateAt()->value(),
                $movie->getUpdateAt()->value(),
            );
        }

        return $array_response;

    }

}