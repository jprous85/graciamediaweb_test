<?php

declare(strict_types=1);


namespace App\Movies\Domain;

use App\Movies\Domain\ValueObjects\MoviesIdVO;
use App\Movies\Domain\ValueObjects\MoviesNameVO;
use App\Shared\Domain\ValueObjects\SharedCratedAtVO;
use App\Shared\Domain\ValueObjects\SharedUpdatedAtVO;


final class Movies
{
    public function __construct(
        private MoviesIdVO        $id,
        private MoviesNameVO      $name,
        private SharedCratedAtVO  $create_at,
        private SharedUpdatedAtVO $update_at
    )
    {
    }

    /**
     * @return MoviesIdVO
     */
    public function getId(): MoviesIdVO
    {
        return $this->id;
    }

    /**
     * @return MoviesNameVO
     */
    public function getName(): MoviesNameVO
    {
        return $this->name;
    }

    /**
     * @return SharedCratedAtVO
     */
    public function getCreateAt(): SharedCratedAtVO
    {
        return $this->create_at;
    }

    /**
     * @return SharedUpdatedAtVO
     */
    public function getUpdateAt(): SharedUpdatedAtVO
    {
        return $this->update_at;
    }


    public static function create(MoviesNameVO $name)
    {
        return new self(
            new MoviesIdVO(null),
            $name,
            new SharedCratedAtVO(date('now')),
            new SharedUpdatedAtVO(null),
        );
    }

    public function update(MoviesNameVO $name)
    {

    }

}