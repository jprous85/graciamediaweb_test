<?php

namespace App\Characters\Domain;


use App\Characters\Domain\ValueObjetcs\CharactersIdVO;

interface CharactersInterface
{
    public function showAll();

    public function Show(CharactersIdVO $id_vo): Characters|null;

    public function save(Characters $character);
}