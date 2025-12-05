<?php 
$title = 'High Cohesion, low coupling';
$description = 'COCO Exercise';
include 'template/header.php';






// 1. Ataque (interfaz = bajo acoplamiento)

interface Attack {
    public function execute(): string;
}


// 2. Ataques concretos (alta cohesión)

class ElectricShock implements Attack {
    public function execute(): string {
        return "Descarga un rayo eléctrico";
    }
}

class RocketLaunch implements Attack {
    public function execute(): string {
        return "Lanza un cohete al espacio";
    }
}

class NeuralLink implements Attack {
    public function execute(): string {
        return "Conecta una interfaz neuronal";
    }
}


// 3. Personaje (depende de una abstracción, no de una clase concreta)

class Fighter {
    private string $name;
    private Attack $attack;
    
    public function __construct(string $name, Attack $attack) {
        $this->name = $name;
        $this->attack = $attack;
    }
    
    public function performAttack(): void {
        echo "<div class='p-3 mb-2 bg-gray-800/50 rounded border border-gray-700 text-gray-200'>";
        echo "<span class='text-blue-400 font-semibold'>{$this->name}</span>: <span class='text-gray-300'>{$this->attack->execute()}</span>";
        echo "</div>";
    }
}


// 4. Uso del sistema

$tesla = new Fighter("Tesla", new ElectricShock());
$spacex = new Fighter("SpaceX", new RocketLaunch());
$neuralink = new Fighter("Neuralink", new NeuralLink());

// Ejecutar ataques
$tesla->performAttack();  
$spacex->performAttack();
$neuralink->performAttack();
include 'template/footer.php';