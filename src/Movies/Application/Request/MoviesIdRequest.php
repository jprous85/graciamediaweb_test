<?php

declare(strict_types=1);

namespace App\Movies\Application\Request;

final class MoviesIdRequest
{
    public function __construct(
        private int $id
    )
    {
    }

    public function getId(): int
    {
        return $this->id;
    }
}