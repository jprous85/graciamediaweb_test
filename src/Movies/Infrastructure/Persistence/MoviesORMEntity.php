<?php

declare(strict_types=1);

namespace App\Movies\Infrastructure\Persistence;


use Doctrine\ORM\Mapping as ORM;

/**
 * Class User
 * @ORM\Entity
 * @ORM\Table(name="movies")
 */
final class MoviesORMEntity
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
     * @ORM\Column(type="datetime")
     */
    private ?\DateTime $created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private ?\DateTime $updated_at;


    public function setParameters(
        ?int    $id,
        string  $name,
        ?string $created_at,
        ?string $updated_at,
    )
    {
        $this->id         = $id;
        $this->name       = $name;
        $this->created_at = $created_at ?? new \DateTime(date("Y-m-d H:i:s"));
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