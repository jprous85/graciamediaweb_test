<?php

declare(strict_types=1);

namespace App\Characters\Application\Response;

final class CharacterResponse
{
    public function __construct(
        private ?int    $id,
        private string  $name,
        private int     $mass,
        private int     $height,
        private string  $gender,
        private string  $picture,
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
            "mass"       => $this->mass,
            "height"     => $this->height,
            "gender"     => $this->gender,
            "picture"    => $this->picture,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at
        ];
    }
}