<?php

declare(strict_types=1);

namespace App\Characters\Domain\ValueObjetcs;

final class CharactersPictureVO
{
    public function __construct(
        private ?string $picture
    )
    {
    }

    public function value(): ?string
    {
        return $this->picture;
    }
}