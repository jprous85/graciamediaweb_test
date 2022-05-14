<?php

declare(strict_types=1);


namespace App\Characters\Application\UseCases;


use App\Characters\Domain\Characters;
use App\Characters\Domain\CharactersInterface;
use CharactersGenderVO;
use CharactersHeightVO;
use CharactersMassVO;
use CharactersNameVO;
use CharactersPictureVO;
use CharactersRequest;

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