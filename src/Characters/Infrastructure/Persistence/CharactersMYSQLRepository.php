<?php

declare(strict_types=1);

namespace App\Characters\Infrastructure\Persistence;


use App\Characters\Domain\ValueObjetcs\CharactersGenderVO;
use App\Characters\Domain\ValueObjetcs\CharactersHeightVO;
use App\Characters\Domain\ValueObjetcs\CharactersIdVO;
use App\Characters\Domain\ValueObjetcs\CharactersMassVO;
use App\Characters\Domain\ValueObjetcs\CharactersNameVO;
use App\Characters\Domain\ValueObjetcs\CharactersPictureVO;
use App\Shared\Domain\ValueObjects\SharedCratedAtVO;
use App\Shared\Domain\ValueObjects\SharedUpdatedAtVO;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Characters\Domain\Characters;
use App\Characters\Domain\CharactersInterface;


final class CharactersMYSQLRepository extends AbstractController implements CharactersInterface
{
    private ObjectManager $entity_manager;

    public function __construct(
        EntityManagerInterface $doctrine
    )
    {
        $this->entity_manager = $doctrine;
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
        $character_entity = new CharactersORMEntity();
        $character_entity->setParameters(
            null,
            $character->getName()->value(),
            $character->getMass()->value(),
            $character->getHeight()->value(),
            $character->getGender()->value(),
            null,
            null,
            null
        );

        $this->entity_manager->persist($character_entity);
        $this->entity_manager->flush();
    }

    public static function mapping(CharactersORMEntity $request)
    {
        return $request ? new Characters(
            new CharactersIdVO($request->getId()),
            new CharactersNameVO($request->getName()),
            new CharactersMassVO($request->getMass()),
            new CharactersHeightVO($request->getHeight()),
            new CharactersGenderVO($request->getGender()),
            new CharactersPictureVO($request->getPicture()),
            new SharedCratedAtVO($request->getCreatedAt()?->format('Y-m-d h:i')),
            new SharedUpdatedAtVO($request->getUpdatedAt()?->format('Y-m-d h:i'))
        ) : null;
    }
}