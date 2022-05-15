<?php

declare(strict_types=1);


namespace App\Characters\Application\UseCases;


use App\Characters\Application\Request\CharactersRequest;

use App\Characters\Domain\Characters;
use App\Characters\Domain\CharactersInterface;
use App\Characters\Domain\ValueObjetcs\CharactersGenderVO;
use App\Characters\Domain\ValueObjetcs\CharactersHeightVO;
use App\Characters\Domain\ValueObjetcs\CharactersMassVO;
use App\Characters\Domain\ValueObjetcs\CharactersNameVO;
use App\Characters\Domain\ValueObjetcs\CharactersPictureVO;


final class CreateCharacters
{
    public function __construct(
        private CharactersInterface $repository
    )
    {
    }

    public function __invoke(
        CharactersRequest $characters_request
    ): void
    {
        $character = Characters::create(
            new CharactersNameVO($characters_request->getName()),
            new CharactersMassVO($characters_request->getMass()),
            new CharactersHeightVO($characters_request->getHeight()),
            new CharactersGenderVO($characters_request->getGender()),
            new CharactersPictureVO($characters_request->getPicture()),
        );

        $this->repository->save($character);
    }
}