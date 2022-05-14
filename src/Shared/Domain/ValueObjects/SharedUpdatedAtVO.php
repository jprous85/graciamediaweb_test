<?php

declare(strict_types=1);


final class SharedUpdatedAtVO
{
    public function __construct(
        private ?string $updated_at
    )
    {
    }

    public function value(): ?string
    {
        return $this->updated_at;
    }
}