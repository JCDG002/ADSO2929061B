<?php 
$title = '04- Collaboration';
$description = "Collaboration: Objects working together by calling each other's methods.";
include 'template/header.php';

class Evolve {
    public function evolvePokemon($origin, $evolution){
        echo "<ul class='bg-[#0002] flex w-full'><li class='flex w-full justify-evenly'><span>$origin</span> <span>➡️</span> <span>$evolution</span></li></ul>";
    }
}

class Pokemon 
{
    private $origin;
    private $evolution;
    private $collaboration;
    public function __construct($origin, $evolution)
    {
        $this->origin = $origin;
        $this->evolution = $evolution;
        //collaboration
        $this->collaboration = new Evolve;
    }

    public function nextLevel(){
        $this->collaboration->evolvePokemon($this->origin, $this->evolution);
    }
}

$ev = new Pokemon('Tesla Model 3', 'Tesla Model S');
$ev->nextLevel();


$ev = new Pokemon('SpaceX Falcon 9', 'SpaceX Starship');
$ev->nextLevel();

$ev = new Pokemon('Neuralink V1', 'Neuralink N1');
$ev->nextLevel();

$ev = new Pokemon('SolarCity Panel', 'Tesla Solar Roof');
$ev->nextLevel();


include 'template/footer.php';