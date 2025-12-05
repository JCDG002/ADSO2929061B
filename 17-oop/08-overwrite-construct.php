<?php
$title = '08- Overwrite Construct';
$description = "Overwrite Construct: Redefining the constructor method in a child class.";
include 'template/header.php';


class VideoGame
{
    protected $name;
    protected $platform;
    protected $year;

    public function __construct($name, $platform)
    {
        $this->name     = $name;
        $this->platform = $platform;
    }
}
class Game extends VideoGame
{
    public function __construct($name, $platform, $year)
    {
        parent::__construct($name, $platform);
        $this->year = $year;
    }
    public function showVideoGame()
    {
        echo "<ul><li> Name: {$this->name} <br>
                           Platform: {$this->platform} <br>
                           Year: {$this->year} </li></ul>";
    }
}

$gm = new Game('Tesla Model Y', 'Electric Vehicle', 2020);
$gm->showVideoGame();
$gm = new Game('SpaceX Starship', 'Rocket', 2023);
$gm->showVideoGame();
$gm = new Game('Neuralink N1 Chip', 'Brain Interface', 2024);
$gm->showVideoGame();

include 'template/footer.php';
