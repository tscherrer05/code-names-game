<?php

namespace App\DataFixtures;

use App\CodeNames\GameStatus;
use App\Entity\Card;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Game;
use App\Entity\Player;
use App\Entity\GamePlayer;

use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

class DefaultFixtures extends Fixture implements FixtureGroupInterface
{
    public static function getGroups(): array
    {
        return ['test'];
    }
 
    const GameKey1 = "ad0abce2-f458-4d02-8cb4-ee3e0df495e6";
    const PlayerKey1 = "299c6679-62a9-43d0-9a28-4299d25672eb";

    public function load(ObjectManager $manager)
    {
        // A game in lobby state
        $game = new Game();
        $game->setPublicKey(self::GameKey1);
        $game->setStatus(GameStatus::Lobby);
        
        // player
        $player = new Player();
        $player->setName('Tim');
        $player->setPlayerKey(self::PlayerKey1);

        // game player
        $gamePlayer1 = new GamePlayer();
        $gamePlayer1->setGame($game);
        $gamePlayer1->setPlayer($player);
        $gamePlayer1->setSessionId("1234");

        // card
        $dataCards = [
            ['orange',0, 0],
            ['chimpanzé',0, 1],
            ['orteil',0, 2],
            ['courgette',0, 3]
        ];
        foreach ($dataCards as $value) {
            $card = new Card();
            $card->setWord($value[0]);
            $card->setX($value[1]);
            $card->setY($value[2]);
            $card->setGame($game);
            $card->setColor(0);
            $card->setReturned(false);
            $manager->persist($card);
        }

        $manager->persist($game);
        $manager->persist($player);
        $manager->persist($gamePlayer1);
        $manager->flush();
    }
}