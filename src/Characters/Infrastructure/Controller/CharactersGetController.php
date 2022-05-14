<?php

namespace App\Characters\Infrastructure\Controller;

use CharacterIdRequest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

use App\Characters\Application\UseCases\ShowCharacters;

final class CharactersGetController extends AbstractController
{
    public function __construct(
        private ShowCharacters $show_character
    )
    {
    }

    /**
     * @Route("/character", methods={"GET"})
     */
    public function showCharacter(int $id): JsonResponse
    {
        $id_request = new CharacterIdRequest($id);
        return new JsonResponse(($this->show_character)($id_request)(), 200);
    }
}