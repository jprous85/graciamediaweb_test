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
    private ?\DateTime $created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private ?\DateTime $updated_at;

    public function setParameters(
        ?int    $id,
        string $name,
        int    $mass,
        int    $height,
        string $gender,
        ?string $picture,
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
        $this->created_at = $created_at ?? new \DateTime(date("Y-m-d H:i:s"), \DateTimeZone::EUROPE);
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
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->created_at;
    }

    /**
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updated_at;
    }
}