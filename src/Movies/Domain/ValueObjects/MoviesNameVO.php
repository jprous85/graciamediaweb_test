<?php

declare(strict_types=1);

namespace App\Movies\Domain\ValueObjects;

final class MoviesNameVO
{
    public function __construct(private string $name)
    {
    }

    public function value(): string
    {
        return $this->name;
    }
}