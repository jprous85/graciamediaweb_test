<?php

declare(strict_types=1);

namespace App\Shared\Domain\ValueObjects;

final class SharedCratedAtVO
{
    public function __construct(private string $created_at)
    {
    }

    public function value(): string
    {
        return $this->created_at;
    }
}