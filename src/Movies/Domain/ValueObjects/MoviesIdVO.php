<?php

declare(strict_types=1);

namespace App\Movies\Domain\ValueObjects;

final class MoviesIdVO
{
    public function __construct(private ?int $id)
    {
    }

    public function value(): ?int
    {
        return $this->id;
    }
}