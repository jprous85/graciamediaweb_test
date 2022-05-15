<?php

namespace App\Movies\Domain;

use App\Movies\Domain\ValueObjects\MoviesIdVO;

interface MoviesInterface
{
    public function showAll();

    public function Show(MoviesIdVO $id_vo): Movies|null;

    public function save(Movies $movies);
}