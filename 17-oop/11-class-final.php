<?php 
$title  = '11-class-final';
$descripcion = " A class that cannot be extended by any other class.";
include 'template/header.php';
final class TeslaModel {
    private $name;
    private $color;

    public function __construct($name, $color) {
        $this->name = $name;
        $this->color = $color;
    }

    public function showInfoModel() {
        return "<li> 
                     <b>Model Name:</b>{$this->name} <br>
                     <b>Model Color:</b>{$this->color}
                </li>";
    }
}
# Error: Class ModelS cannot extend final class TeslaModel
# class ModelS extends TeslaModel { }
$tm = new TeslaModel('Model S', 'Midnight Silver');
echo $tm->showInfoModel();

$tm = new TeslaModel('Model 3', 'Pearl White');
echo $tm->showInfoModel();

$tm = new TeslaModel('Model X', 'Deep Blue');
echo $tm->showInfoModel();


include 'template/footer.php';