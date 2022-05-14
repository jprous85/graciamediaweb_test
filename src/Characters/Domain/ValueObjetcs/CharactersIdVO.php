<?php

declare(strict_types=1);


final class CharactersIdVO
{
    public function __construct(
        private ?int $id
    )
    {}

    public function value(): ?int
    {
        return $this->id;
    }
}