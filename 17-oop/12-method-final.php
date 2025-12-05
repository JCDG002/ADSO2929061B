<?php 
$title  = '12-method-final';
$descripcion = " A method that cannot be overwritten by any child class.";
include 'template/header.php';

class TeslaModel {
    private $name;
    private $color;

    public function __construct($name, $color) {
        $this->name = $name;
        $this->color = $color;
    }

    public final function showInfoModel() {
        return '<li> <b>Model: </b>'.
                    $this->name.'  <b>Color:</b> '.
                    $this->color.
                '</li>';
    }
}
class ModelY extends TeslaModel {
    # Error: Cannot override final method
    # public function showInfoModel() {}
}
$tm = new TeslaModel('Model S', 'Red');
echo $tm->showInfoModel();

$tm = new TeslaModel('Model 3', 'White');
echo $tm->showInfoModel();

$tm = new TeslaModel('Model X', 'Black');
echo $tm->showInfoModel();

include 'template/footer.php';