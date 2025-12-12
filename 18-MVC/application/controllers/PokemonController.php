<?php

class PokemonController extends Controller {
    public $load;
    public $model;

    public function __construct() {
        $this->load = new Load;
        $this->model = new PokemonModel;
    }
    
    public function show($id) {
        $pokemon = $this->model->show($id);
        if (!$pokemon) {
            header('Location: /pokemons');
            exit;
        }
        return $this->load->view('show.php', $pokemon);
    }

    public function add() {
        $trainers = $this->model->listTrainers();
        return $this->load->view('add.php', $trainers);
    }

    public function store() {
        $data = [
            "name" => $_POST['name'] ?? '',
            "type" => $_POST['type'] ?? '',
            "strength" => (int)($_POST['strength'] ?? 0),
            "staming" => (int)($_POST['staming'] ?? 0),
            "speed" => (int)($_POST['speed'] ?? 0),
            "accuracy" => (int)($_POST['accuracy'] ?? 0),
            "trainer_id" => (int)($_POST['trainer_id'] ?? 1)
        ];

        if ($this->model->store($data)) {
            header('Location: /pokemons');
            exit;
        } else {
            // Si falla, redirigir de todas formas o mostrar error
            header('Location: /pokemons/create?error=1');
            exit;
        }
    }

    public function edit($id) {
        $pokemon = $this->model->show($id);
        if (!$pokemon) {
            header('Location: /pokemons');
            exit;
        }
        
        $data = [
            "pokemon" => $pokemon,
            "trainers" => $this->model->listTrainers()
        ];

        return $this->load->view('edit.php', $data);
    }

    public function update($id) {
        $data = [
            "name" => $_POST['name'] ?? '',
            "type" => $_POST['type'] ?? '',
            "strength" => (int)($_POST['strength'] ?? 0),
            "staming" => (int)($_POST['staming'] ?? 0),
            "speed" => (int)($_POST['speed'] ?? 0),
            "accuracy" => (int)($_POST['accuracy'] ?? 0),
            "trainer_id" => (int)($_POST['trainer_id'] ?? 1)
        ];

        if ($this->model->update($id, $data)) {
            header('Location: /pokemons');
            exit;
        } else {
            header('Location: /pokemons/' . $id . '/edit?error=1');
            exit;
        }
    }

    public function destroy($id) {
        if ($this->model->destroy($id)) {
            header('Location: /pokemons');
            exit;
        }
    }
}
