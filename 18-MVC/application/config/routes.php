<?php

return [
    // Rutas más específicas primero (con más segmentos)
    
    // Editar pokemon
    ['GET', '/pokemons/{id}/edit', 'PokemonController', 'edit'],
    ['POST', '/pokemons/{id}/update', 'PokemonController', 'update'],
    ['POST', '/pokemons/{id}/delete', 'PokemonController', 'destroy'],
    
    // Crear pokemon
    ['GET', '/pokemons/create', 'PokemonController', 'add'],
    ['POST', '/pokemons/store', 'PokemonController', 'store'],
    
    // Mostrar pokemon (debe ir después de las rutas más específicas)
    ['GET', '/pokemons/{id}', 'PokemonController', 'show'],
    
    // Página principal - listar pokemons
    ['GET', '/', 'Controller', null],
    ['GET', '/pokemons', 'Controller', null],
];

