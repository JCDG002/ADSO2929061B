<?php

class PokemonModel extends Database {
    protected $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function listPokemons() {
        $stmt = $this->db->query("SELECT * FROM pokemons ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    public function listTrainers() {
        $stmt = $this->db->prepare("SELECT * FROM trainers ORDER BY name ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function show($id) {
        $stmt = $this->db->prepare(
            "SELECT p.*, t.name as tname, t.id as tid 
             FROM pokemons as p 
             INNER JOIN trainers as t ON t.id = p.trainer_id 
             WHERE p.id = ?"
        );
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function store($data) {
        $stmt = $this->db->prepare(
            "INSERT INTO pokemons (name, type, strength, staming, speed, accuracy, trainer_id)
             VALUES (:name, :type, :strength, :staming, :speed, :accuracy, :trainer_id)"
        );

        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':type', $data['type']);
        $stmt->bindParam(':strength', $data['strength']);
        $stmt->bindParam(':staming', $data['staming']);
        $stmt->bindParam(':speed', $data['speed']);
        $stmt->bindParam(':accuracy', $data['accuracy']);
        $stmt->bindParam(':trainer_id', $data['trainer_id']);
        
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare(
            "UPDATE pokemons 
             SET name = :name, type = :type, strength = :strength, staming = :staming, 
                 speed = :speed, accuracy = :accuracy, trainer_id = :trainer_id 
             WHERE id = :id"
        );

        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':type', $data['type']);
        $stmt->bindParam(':strength', $data['strength']);
        $stmt->bindParam(':staming', $data['staming']);
        $stmt->bindParam(':speed', $data['speed']);
        $stmt->bindParam(':accuracy', $data['accuracy']);
        $stmt->bindParam(':trainer_id', $data['trainer_id']);
        $stmt->bindParam(':id', $id);

        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    public function destroy($id) {
        $stmt = $this->db->prepare("DELETE FROM pokemons WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->rowCount() > 0;
    }
}

