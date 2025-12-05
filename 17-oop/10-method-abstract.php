<?php 
$title = '10- Method abstract';
$description = "Method Abstract: A method declared without a body, requiring child implementation.";
include 'template/header.php';

abstract class TechProduct {
    protected $name;
    protected $company;
    protected $year;

    public function __construct($nm, $cp, $yr) {
        $this->name     = $nm;
        $this->company = $cp;
        $this->year     = $yr;
    }

    public abstract function getInfoProduct();
}

class TeslaProduct extends TechProduct {
    public function getInfoProduct() {
        return $this->name." | ".$this->company." | ".$this->year;
    }
}

$tp1 = new TeslaProduct('Model S', 'Tesla', 2012);
echo "<li>".$tp1->getInfoProduct()."</li>";

$tp2 = new TeslaProduct('Model 3', 'Tesla', 2017);
echo "<li>".$tp2->getInfoProduct()."</li>";

$tp3 = new TeslaProduct('Model X', 'Tesla', 2015);
echo "<li>".$tp3->getInfoProduct()."</li>";

$tp4 = new TeslaProduct('Cybertruck', 'Tesla', 2024);
echo "<li>".$tp4->getInfoProduct()."</li>";   

include 'template/footer.php';