<?php

namespace App\DataFixtures;

use App\CodeNames\GameStatus;
use App\Entity\Card;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Game;
use App\Entity\GamePlayer;
use App\Entity\Roles;
use App\Entity\Teams;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Ramsey\Uuid\Nonstandard\Uuid;

class TestFixtures extends Fixture implements FixtureGroupInterface
{
    public static function getGroups(): array
    {
        return ['test'];
    }
 
    const GameKey1 = "ad0abce2-f458-4d02-8cb4-ee3e0df495e6";
    const PlayerKey1 = "299c6679-62a9-43d0-9a28-4299d25672eb";
    const PlayerKey2 = "900c6679-62a9-43d0-9a28-4299d25672ai";
    const PlayerKey3 = "900c6679-62a9-43d0-9a28-4299d25609ja";
    const PlayerKey4 = "900c6679-62a9-43d0-9a28-4299d21323lm";
    const Cards = [
        ['orange', 0, 0, 1],
        ['chimpanzé', 0, 1, 2],
        ['orteil', 0, 2, 2],
        ['courgette', 0, 3, 1]
    ];

    public function load(ObjectManager $manager)
    {
        // A game in lobby state
        $game = new Game();
        $game->setPublicKey(self::GameKey1);
        $game->setStatus(GameStatus::OnGoing);
        $game->setCurrentWord('Acme');
        $game->setCurrentNumber(42);
        $game->setCurrentTeam(Teams::Blue);

        // player
        $this->createFakeSpy($manager, $game, 'Spy'.self::PlayerKey1, self::PlayerKey1);
        $this->createFakeSpy($manager, $game, 'Spy'.self::PlayerKey3, self::PlayerKey3);
        $this->createFakeSpy($manager, $game, 'Spy'.self::PlayerKey4, self::PlayerKey4);
        $this->createFakeMaster($manager, $game, 'Player2', self::PlayerKey2);

        // card
        $dataCards = self::Cards;
        foreach ($dataCards as $value) {
            $card = new Card();
            $card->setWord($value[0]);
            $card->setX($value[1]);
            $card->setY($value[2]);
            $card->setGame($game);
            $card->setColor($value[3]);
            $card->setReturned(false);
            $manager->persist($card);
        }

        $manager->persist($game);
        $manager->flush();
    }

    private function createFakeSpy(ObjectManager $manager,
        Game $game, string $name, string $playerKey)
    {
        $gamePlayer = new GamePlayer();
        $gamePlayer->setGame($game);
        $gamePlayer->setName($name);
        $gamePlayer->setPublicKey($playerKey);
        $gamePlayer->setSessionId(Uuid::uuid1()->toString());
        $gamePlayer->setTeam(Teams::Blue);
        $gamePlayer->setRole(Roles::Spy);
        $gamePlayer->setX(null);
        $gamePlayer->setY(null);
        $manager->persist($gamePlayer);
    }

    private function createFakeMaster(ObjectManager $manager,
        Game $game, string $name, string $playerKey)
    {
        $gamePlayer = new GamePlayer();
        $gamePlayer->setGame($game);
        $gamePlayer->setName($name);
        $gamePlayer->setPublicKey($playerKey);
        $gamePlayer->setSessionId(Uuid::uuid1()->toString());
        $gamePlayer->setTeam(Teams::Blue);
        $gamePlayer->setRole(Roles::Master);
        $gamePlayer->setX(null);
        $gamePlayer->setY(null);
        $manager->persist($gamePlayer);
    }
}