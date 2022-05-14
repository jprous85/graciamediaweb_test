<?php

declare(strict_types=1);

namespace App\Characters\Application\UseCases;

use App\Characters\Domain\CharactersInterface;

final class ShowCharacters
{
    public function __construct(
        private CharactersInterface $repository
    )
    {
    }

    public function __invoke()
    {
        return $this->repository->Show();
    }
}