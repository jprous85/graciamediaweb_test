<?php

namespace App\Characters\Infrastructure\Controller;

use App\Characters\Application\Request\CharacterIdRequest;
use App\Characters\Application\UseCases\ShowAllCharacters;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

use App\Characters\Application\UseCases\ShowCharacters;

final class CharactersGetController extends AbstractController
{
    public function __construct(
        private ShowAllCharacters $show_all_character,
        private ShowCharacters $show_character
    )
    {
    }

    /**
     * @Route("/characters", methods={"GET"})
     */
    public function showAllCharacters(): JsonResponse
    {
        return new JsonResponse(($this->show_all_character)()->toArray(), 200);
    }

    /**
     * @Route("/character/{id}", methods={"GET"})
     */
    public function showCharacter(int $id): JsonResponse
    {
        $id_request = new CharacterIdRequest($id);
        return new JsonResponse(($this->show_character)($id_request)->toArray(), 200);
    }
}