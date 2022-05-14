<?php

declare(strict_types=1);


final class CharactersMassVO
{
    public function __construct(
        private ?int $mass
    )
    {}

    public function value(): ?int
    {
        return $this->mass;
    }
}