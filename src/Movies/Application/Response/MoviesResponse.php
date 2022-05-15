<?php

declare(strict_types=1);


final class MoviesResponse
{
    public function __construct(
        private ?int    $id,
        private string  $name,
        private string  $created_at,
        private ?string $updated_at,
    )
    {
    }

    public function toArray(): array
    {
        return [
            "id"         => $this->id,
            "name"       => $this->name,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at
        ];
    }
}