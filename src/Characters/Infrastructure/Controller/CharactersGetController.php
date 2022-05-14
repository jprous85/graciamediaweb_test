<?php

namespace App\Characters\Infrastructure\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

use App\Characters\Application\UseCases\ShowCharacters;

final class CharactersGetController extends AbstractController
{
    public function __construct(
        private ShowCharacters $show_user
    )
    {
    }

    /**
     * @Route("/character", methods={"GET"})
     */
    public function showCharacter(int $id): JsonResponse
    {
        $
        return new JsonResponse(($this->showCharacter())(), 200);
    }
}