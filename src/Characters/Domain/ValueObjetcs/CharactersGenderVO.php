<?php

declare(strict_types=1);


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