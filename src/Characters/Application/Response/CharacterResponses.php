<?php

declare(strict_types=1);


final class CharacterResponses
{
    private array $character_responses;

    public function __construct(CharacterResponse ...$character_responses)
    {
        $this->character_responses = $character_responses;
    }

    public function getCharacter(): array
    {
        return $this->character_responses;
    }

    public function toArray(): array
    {
        $character_response_array = [];
        foreach ($this->character_responses as $character_response) {
            $character_response_array[] = $character_response->toArray();
        }
        return $character_response_array;
    }
}