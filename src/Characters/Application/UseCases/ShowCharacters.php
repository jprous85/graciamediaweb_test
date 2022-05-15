<?php

declare(strict_types=1);

namespace App\Characters\Application\UseCases;

use App\Characters\Application\Request\CharacterIdRequest;
use App\Characters\Application\Response\CharacterResponse;

use App\Characters\Domain\Characters;
use App\Characters\Domain\CharactersInterface;
use App\Characters\Domain\ValueObjetcs\CharactersIdVO;


final class ShowCharacters
{
    public function __construct(private CharactersInterface $repository)
    {
    }

    public function __invoke(CharacterIdRequest $id_request): ?CharacterResponse
    {
        $id_vo     = new CharactersIdVO($id_request->getId());
        $character = $this->repository->Show($id_vo);

        if (!$character) {
            throw new \Exception('No exist this ID');
        }

        return self::mapping($character);
    }

    public static function mapping(Characters $character): CharacterResponse
    {
        return new CharacterResponse(
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

}