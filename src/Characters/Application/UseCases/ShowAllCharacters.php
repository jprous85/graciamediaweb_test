<?php

declare(strict_types=1);

namespace App\Characters\Application\UseCases;

use App\Characters\Application\Response\CharacterResponse;
use App\Characters\Application\Response\CharacterResponses;
use App\Characters\Domain\Characters;
use App\Characters\Domain\CharactersInterface;


final class ShowAllCharacters
{
    public function __construct(private CharactersInterface $repository)
    {
    }

    public function __invoke(): ?CharacterResponses
    {
        return new CharacterResponses(...self::mapping($this->repository->ShowAll()));
    }

    public static function mapping(array $characters): array
    {
        $array_response = [];

        foreach ($characters as $character) {
            $array_response[] = new CharacterResponse(
                $character->getId()->value(),
                $character->getName()->value(),
                $character->getMass()->value(),
                $character->getHeight()->value(),
                $character->getGender()->value(),
                $character->getPicture()->value(),
                $character->getCreateAt()->value(),
                $character->getUpdateAt()->value(),
            );
        }

        return $array_response;

    }

}