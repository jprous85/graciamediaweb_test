<?php

namespace App\User\Infrastructure\Controller;

use App\User\Application\UseCases\ShowUser;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

final class UserGetController extends AbstractController
{
    public function __construct(
        private ShowUser $show_user
    )
    {
    }

    /**
     * @Route("/user", name="user", methods={"GET"})
     */
    public function showUser(): JsonResponse
    {
        return new JsonResponse(($this->show_user)(), 200);
    }
}