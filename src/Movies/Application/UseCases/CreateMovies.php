<?php

declare(strict_types=1);

namespace App\Movies\Application\UseCases;

use App\Movies\Application\Request\MoviesRequest;

use App\Movies\Domain\Movies;
use App\Movies\Domain\MoviesInterface;
use App\Movies\Domain\ValueObjects\MoviesNameVO;


final class CreateMovies
{
    public function __construct(private MoviesInterface $repository)
    {
    }

    public function __invoke(
        MoviesRequest $characters_request
    ): void
    {
        $movie = Movies::create(
            new MoviesNameVO($characters_request->getName()),
        );

        $this->repository->save($movie);
    }
}