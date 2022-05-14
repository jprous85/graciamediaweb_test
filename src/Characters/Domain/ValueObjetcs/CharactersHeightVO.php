<?php

declare(strict_types=1);


final class CharactersHeightVO
{
    public function __construct(
        private ?int $height
    )
    {}

    public function value(): ?int
    {
        return $this->height;
    }
}