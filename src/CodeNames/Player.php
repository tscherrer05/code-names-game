<?php
declare(strict_types=1);
namespace App\CodeNames;

class Player
{
    public $id;
    public $name;

    // Team can be 1 or 2
    public $team;

    // Role can be 1 or 2
    public $role;

    // Unique id (in whole application) to identify a player
    public $guid;

    function __construct(int $id, string $guid, string $name, int $team = null, int $role = null)
    {
        // TODO : throw exception if invalid values
        $this->id = $id;
        $this->guid = $guid;
        $this->name = $name;
        $this->team = $team;
        $this->role = $role;
    }
}

?>