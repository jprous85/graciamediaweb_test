<?php

declare(strict_types=1);

namespace App\Characters\Domain\ValueObjetcs;

final class CharactersGenderVO
{
    public function __construct(
        private string $name
    )
    {
    }

    public function value(): string
    {
        return $this->name;
    }
}