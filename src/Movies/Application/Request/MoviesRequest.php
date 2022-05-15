<?php

declare(strict_types=1);

namespace App\Movies\Application\Request;

final class MoviesRequest
{
    public function __construct(
        private ?int $id,
        private string $name,
        private ?string $created_at,
        private ?string $updated_at,
    )
    {
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getCreatedAt(): ?string
    {
        return $this->created_at;
    }

    /**
     * @return string|null
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updated_at;
    }

}