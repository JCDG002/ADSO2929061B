<?php
$title = '07- Overwrite method';
$description = "Overwrite Method: Redefining a parent class's method in the child class.";
include 'template/header.php';
class VideoGame
{
    protected $name;
    protected $platform;

    public function __construct($name, $platform)
    {
        $this->name     = $name;
        $this->platform = $platform;
    }
    public function showVideoGame()
    {
        echo "Platform: {$this->platform} </li></ul>";
    }
}
class GameConsole extends VideoGame
{
    public function showVideoGame()
    {
        echo "<ul><li> Name: {$this->name} <br>";
        parent::showVideoGame();
    }
}
$gm = new GameConsole('Tesla Model S', 'Electric Vehicle');
$gm->showVideoGame();
$gm = new GameConsole('SpaceX Falcon 9', 'Rocket');
$gm->showVideoGame();
$gm = new GameConsole('Neuralink N1', 'Brain Chip');
$gm->showVideoGame();
$gm = new GameConsole('Tesla Cybertruck', 'Electric Truck');
$gm->showVideoGame();










include 'template/footer.php';
