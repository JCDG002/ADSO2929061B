<?php 
$title = '01 - Class';
$description = 'CLASS';
include 'template/header.php';


class Vehicle {
    # Attributes

    public $brand;
    public $refer;
    public $color;
    public $model;

    # Methods

    public function setAttributes($b, $r, $c, $m) {
        $this->brand = $b;
        $this->refer = $r;
        $this->color = $c;
        $this->model = $m;
    }

    public function getAttributes() {
        return "<ul>
                    <li>Brand: $this->brand</li>
                    <li>Brand: $this->refer</li>
                    <li>Brand: $this->color</li>
                    <li>Brand: $this->model</li>
                </ul>";
    }
}
# Object Instance
$vh1 = new Vehicle;

$vh1->setAttributes('Tesla', 'Model S', 'Midnight Blue', 2024);

echo $vh1->getAttributes();


$vh2 = new Vehicle;

$vh2->setAttributes('SpaceX', 'Starship', 'Silver', 2025);

echo $vh2->getAttributes();

//
$vh3 = new Vehicle;

$vh3->brand = 'Neuralink';
$vh3->refer = 'N1 Chip';
$vh3->color = 'Black';
$vh3->model = '2023';

echo $vh3->getAttributes();


include 'template/footer.php';