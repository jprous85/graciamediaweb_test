<?php

declare(strict_types=1);


final class CharactersPictureVO
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