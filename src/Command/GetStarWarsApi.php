<?php

namespace App\Command;


use App\Characters\Application\UseCases\CreateCharacters;
use App\Characters\Infrastructure\Persistence\CharactersMYSQLRepository;
use CharactersRequest;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

#[AsCommand(
    name: 'starwars:import',
    description: 'Import star wars info',
    hidden: false,
    aliases: ['starwars:import']
)]
final class GetStarWarsApi extends Command
{
    protected static $defaultName = 'starwars:import';

    private HttpClientInterface $client;
    private EntityManagerInterface $entity_manager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();

        $this->entity_manager = $entityManager;
        $this->client = HttpClient::create();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {

        $this->createCharacters();

        return Command::SUCCESS;
    }

    public function createCharacters()
    {
        $response = $this->client->request('GET', 'https://swapi.dev/api/people');
        $content = $response->toArray();

        $repository = new CharactersMYSQLRepository($this->entity_manager);
        $create_characters = new CreateCharacters($repository);

        foreach ($content['results'] as $result) {
            $character_request = new CharactersRequest(
                null,
                $result['name'],
                (int) $result['mass'],
                (int) $result['height'],
                $result['gender'],
                null,
                null,
                null
            );

            ($create_characters)($character_request);
        }
    }
}