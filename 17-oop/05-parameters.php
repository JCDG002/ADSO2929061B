<?php 
$title = '05- Parameter';
$description = 'Parameters: Values passed into a function to customize its operation.';
include 'template/header.php';

class Country {
    public $name;

    public function __construct($name){
        $this->name = $name;
    }
    

}

class fifaWorldCup {
    private $country;
    private $year;
    private $winner;

    #country & year are mandatory
    public function __construct($country, $year, $winner = 'Tesla'){
        $this->country = $country;
        $this->year = $year;
        $this->winner = $winner;
    }

    public function showEvent(){
        echo "<ul class='border p-5'> 
                <li class='flex flex-col'> 
                    <span><b>Company:</b> {$this->country->name} </span> 
                    <span><b>Year:</b>$this->year</span> 
                    <span><b>Product:</b>$this->winner</span> 
                </li>
              </ul><br>";
    }
}

$company = new Country('Tesla');
$launch = new fifaWorldCup($company, 2020, 'Model Y') ;
$launch->showEvent();


$company = new Country('SpaceX');
$launch = new fifaWorldCup($company, 2021) ;
$launch->showEvent();

$company = new Country('Neuralink');
$launch = new fifaWorldCup($company, 2022, 'N1 Chip') ;
$launch->showEvent();

$company = new Country('The Boring Company');
$launch = new fifaWorldCup($company, 2023) ;
$launch->showEvent();

$company = new Country('X (Twitter)');
$launch = new fifaWorldCup($company, 2024, 'X Premium') ;
$launch->showEvent();


include 'template/footer.php';