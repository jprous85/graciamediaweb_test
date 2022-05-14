<?php

declare(strict_types=1);


namespace App\Characters\Infrastructure\Persistence;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class User
 * @ORM\Entity
 * @ORM\Table(name="characters")
 */
class CharactersORMEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private string $name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $mass;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private ?int $height;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private ?string $gender;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private ?string $picture;

    /**
     * @ORM\Column(type="datetime")
     */
    private ?string $created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private ?string $updated_at;

    public function setParameters(
        ?int    $id,
        string $name,
        int    $mass,
        int    $height,
        string $gender,
        string $picture,
        ?string $created_at,
        ?string $updated_at,
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->mass = $mass;
        $this->height = $height;
        $this->gender = $gender;
        $this->picture = $picture;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param int|null $mass
     */
    public function setMass(?int $mass): void
    {
        $this->mass = $mass;
    }

    /**
     * @param int|null $height
     */
    public function setHeight(?int $height): void
    {
        $this->height = $height;
    }

    /**
     * @param string|null $gender
     */
    public function setGender(?string $gender): void
    {
        $this->gender = $gender;
    }

    /**
     * @param string|null $picture
     */
    public function setPicture(?string $picture): void
    {
        $this->picture = $picture;
    }

    /**
     * @param string|null $created_at
     */
    public function setCreatedAt(?string $created_at): void
    {
        $this->created_at = $created_at;
    }

    /**
     * @param string|null $updated_at
     */
    public function setUpdatedAt(?string $updated_at): void
    {
        $this->updated_at = $updated_at;
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
     * @return int|null
     */
    public function getMass(): ?int
    {
        return $this->mass;
    }

    /**
     * @return int|null
     */
    public function getHeight(): ?int
    {
        return $this->height;
    }

    /**
     * @return string|null
     */
    public function getGender(): ?string
    {
        return $this->gender;
    }

    /**
     * @return string|null
     */
    public function getPicture(): ?string
    {
        return $this->picture;
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