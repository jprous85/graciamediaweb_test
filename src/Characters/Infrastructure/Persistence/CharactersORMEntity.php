<?php

declare(strict_types=1);


namespace App\User\Infrastructure\Persistence;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class User
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
final class UserORMEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="integer", , nullable=true)
     */
    private $mass;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $height;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $gender;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $picture;

    /**
     * @ORM\Column(type="datetime")
     */
}