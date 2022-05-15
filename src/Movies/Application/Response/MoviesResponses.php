<?php

declare(strict_types=1);

namespace App\Movies\Application\Response;

final class MoviesResponses
{
    private array $movies_responses;

    public function __construct(MoviesResponse ...$movies_responses)
    {
        $this->movies_responses = $movies_responses;
    }

    public function getMovies(): array
    {
        return $this->movies_responses;
    }

    public function toArray(): array
    {
        $movies_response_array = [];
        foreach ($this->movies_responses as $movies_response) {
            $movies_response_array[] = $movies_response->toArray();
        }
        return $movies_response_array;
    }
}