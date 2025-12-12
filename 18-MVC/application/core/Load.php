<?php

class Load {
    public function view($nameView, $data = null) {
        // Hacer disponible $data en la vista
        if ($data !== null) {
            extract(['data' => $data]);
        }
        include_once __DIR__ . '/../../views/' . $nameView;
    }
}

