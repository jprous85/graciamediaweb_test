<?php

declare(strict_types=1);

namespace App\Movies\Application\UseCases;

use App\Movies\Application\Request\MoviesIdRequest;
use App\Movies\Application\Response\MoviesResponse;

use App\Movies\Domain\Movies;
use App\Movies\Domain\MoviesInterface;
use App\Movies\Domain\ValueObjects\MoviesIdVO;


final class ShowMovies
{
    public function __construct(private MoviesInterface $repository)
    {
    }

    public function __invoke(MoviesIdRequest $id_request): ?MoviesResponse
    {
        $id_vo = new MoviesIdVO($id_request->getId());
        $movie = $this->repository->Show($id_vo);

        if ($movie) {
            return self::mapping($movie);
        }

        return null;
    }

    public static function mapping(Movies $character): MoviesResponse
    {
        return new MoviesResponse(
            $character->getId()->value(),
            $character->getName()->value(),
            $character->getCreateAt()->value(),
            $character->getUpdateAt()->value(),
        );
    }

}