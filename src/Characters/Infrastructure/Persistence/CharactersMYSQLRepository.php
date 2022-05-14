<?php

declare(strict_types=1);

namespace App\Characters\Infrastructure\Persistence;


use App\Characters\Domain\Characters;
use App\Characters\Domain\CharactersInterface;
use CharactersGenderVO;
use CharactersHeightVO;
use CharactersIdVO;
use CharactersMassVO;
use CharactersNameVO;
use CharactersPictureVO;
use Doctrine\Persistence\ObjectManager;
use SharedCratedAtVO;
use SharedUpdatedAtVO;
use Symfony\Bridge\Doctrine\ManagerRegistry;

final class CharactersMYSQLRespository implements CharactersInterface
{
    private ManagerRegistry $entity_manager;

    public function __construct(
        ManagerRegistry $doctrine
    )
    {
        $this->entity_manager = $doctrine->getManager();
    }

    public function showAll(): array
    {
        $entity_repository = $this->entity_manager->getRepository(CharactersORMEntity::class);
        $orm_query = $entity_repository->findAll();

        $characters_array = [];
        foreach ($orm_query as $item) {
            $characters_array[] = self::mapping($item);
        }
        return $characters_array;
    }

    public function Show(CharactersIdVO $id_vo): Characters|null
    {
        $entity_repository = $this->entity_manager->getRepository(CharactersORMEntity::class);
        $orm_query = $entity_repository->find($id_vo->value());
        return self::mapping($orm_query);
    }

    public function save(Characters $character)
    {
        $character = new CharactersORMEntity();
        $character->setParameters(
            null,
            $character->getName(),
            $character->getMass(),
            $character->getHeight(),
            $character->getGender(),
            $character->getPicture(),
            null,
            null
        );

        $this->entity_manager->persist($character);
        $this->entity_manager->flush();
    }

    public static function mapping($request)
    {
        return $request ? new Characters(
            new CharactersIdVO($request->id),
            new CharactersNameVO($request->name),
            new CharactersMassVO($request->mass),
            new CharactersHeightVO($request->height),
            new CharactersGenderVO($request->gender),
            new CharactersPictureVO($request->picture),
            new SharedCratedAtVO($request->created_at),
            new SharedUpdatedAtVO($request->updated_at ?? null)
        ) : null;
    }
}