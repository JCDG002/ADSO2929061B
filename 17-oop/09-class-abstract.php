<?php 
$title = '09- Class abstract';
$description = "Class Abstract: A class that cannot be instantiated, only extended from.";
include 'template/header.php';

abstract class Database{
    protected $user = 'root';
    protected $dsn = 'mysql:host=localhost;dbname=pokeadso';
    protected $password = '';
    protected $table = 'pokemons';
    
    // Método abstracto que debe ser implementado por las clases hijas
    abstract public function select();
    
    // Método concreto para la conexión
    public function connect(){
        try{
            return new PDO($this->dsn, $this->user, $this->password);
        }catch(PDOException $e ){
            echo "<div class='p-4 bg-red-900/30 border border-red-500 rounded text-red-300'>Error: " . $e->getMessage() . "</div>";
            return null;
        }
    }
    
    // Método protegido para ejecutar consultas
    protected function executeQuery($sql, $params = []){
        if($this->connect()){
            $conx = $this->connect();
            $stmt = $conx->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return [];
    }
}

class PokemonConnection extends Database{
    
    public function select(){
        $sql = "SELECT id, name, type FROM {$this->table} ORDER BY id ASC";
        return $this->executeQuery($sql);
    }
    
    public function selectByType($type){
        $sql = "SELECT id, name, type FROM {$this->table} WHERE type = :type ORDER BY id ASC";
        return $this->executeQuery($sql, ['type' => $type]);
    }
    
    public function getTotalCount(){
        $sql = "SELECT COUNT(*) as total FROM {$this->table}";
        $result = $this->executeQuery($sql);
        return $result[0]['total'] ?? 0;
    }
}

$pokemonDB = new PokemonConnection();

// Mostrar información de la conexión
$total = $pokemonDB->getTotalCount();
echo "<div class='mb-4 p-4 bg-blue-900/30 rounded-lg border border-blue-500/50'>
        <h2 class='text-2xl font-bold text-blue-400 mb-2'>Pokémon Database</h2>
        <p class='text-gray-300'>Total Pokémons: <span class='text-green-400 font-bold'>{$total}</span></p>
      </div>";

// Obtener y mostrar todos los pokémones
$pokemons = $pokemonDB->select();

if(!empty($pokemons)){
    echo "<div class='overflow-x-auto rounded-lg border border-gray-600 shadow-xl'>
            <table class='w-full border-collapse'>
                <thead>
                    <tr class='bg-gradient-to-r from-blue-900/50 to-indigo-900/50 border-b-2 border-blue-500'>
                        <th class='p-4 text-left text-blue-300 font-bold text-lg uppercase tracking-wider'>ID</th>
                        <th class='p-4 text-left text-blue-300 font-bold text-lg uppercase tracking-wider'>NAME</th>
                        <th class='p-4 text-left text-blue-300 font-bold text-lg uppercase tracking-wider'>TYPE</th>
                    </tr>
                </thead>
                <tbody>";
    
    foreach($pokemons as $index => $pokemon){
        $rowClass = $index % 2 === 0 ? 'bg-gray-800/40' : 'bg-gray-900/40';
        $hoverClass = 'hover:bg-gradient-to-r hover:from-blue-900/30 hover:to-indigo-900/30';
        echo "<tr class='{$rowClass} {$hoverClass} border-b border-gray-700/50 transition-all duration-200 cursor-pointer'> 
                <td class='p-4 text-gray-400 font-mono text-sm'>{$pokemon['id']}</td>
                <td class='p-4 text-gray-100 font-semibold text-base'>{$pokemon['name']}</td>
                <td class='p-4'>
                    <span class='inline-block px-3 py-1 rounded-full text-sm font-medium bg-blue-900/50 text-blue-300 border border-blue-700/50'>
                        {$pokemon['type']}
                    </span>
                </td>
              </tr>"; 
    }
    
    echo "</tbody>
          </table>
        </div>";
} else {
    echo "<div class='p-4 bg-yellow-900/30 border border-yellow-500 rounded text-yellow-300'>
            No se encontraron pokémones en la base de datos.
          </div>";
}






include 'template/footer.php';