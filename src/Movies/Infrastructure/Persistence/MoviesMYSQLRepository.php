<?php

declare(strict_types=1);


namespace App\Movies\Infrastructure\Persistence;


use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Movies\Domain\Movies;
use App\Movies\Domain\MoviesInterface;
use App\Movies\Domain\ValueObjects\MoviesIdVO;
use App\Movies\Domain\ValueObjects\MoviesNameVO;
use App\Shared\Domain\ValueObjects\SharedCratedAtVO;
use App\Shared\Domain\ValueObjects\SharedUpdatedAtVO;


final class MoviesMYSQLRepository extends AbstractController implements MoviesInterface
{

    private ObjectManager $entity_manager;

    public function __construct(EntityManagerInterface $doctrine)
    {
        $this->entity_manager = $doctrine;
    }

    public function showAll()
    {
        $entity_repository = $this->entity_manager->getRepository(MoviesORMEntity::class);
        $orm_query         = $entity_repository->findAll();

        $movies_array = [];
        foreach ($orm_query as $item) {
            $movies_array[] = self::mapping($item);
        }
        return $movies_array;
    }

    public function Show(MoviesIdVO $id_vo): Movies|null
    {
        $entity_repository = $this->entity_manager->getRepository(MoviesORMEntity::class);
        $orm_query         = $entity_repository->find($id_vo->value());
        return self::mapping($orm_query);
    }

    public function save(Movies $movies)
    {
        $movies_entity = new MoviesORMEntity();
        $movies_entity->setParameters(
            null,
            $movies->getName()->value(),
            null,
            null
        );

        $this->entity_manager->persist($movies_entity);
        $this->entity_manager->flush();
    }

    public static function mapping(MoviesORMEntity $request): Movies|null
    {
        return $request ? new Movies(
            new MoviesIdVO($request->getId()),
            new MoviesNameVO($request->getName()),
            new SharedCratedAtVO($request->getCreatedAt()?->format('Y-m-d h:i')),
            new SharedUpdatedAtVO($request->getUpdatedAt()?->format('Y-m-d h:i'))
        ) : null;
    }
}