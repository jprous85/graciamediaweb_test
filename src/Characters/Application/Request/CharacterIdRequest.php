<?php

declare(strict_types=1);


final class CharacterIdRequest
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