<?php 
$title = 'Edit Pokémon - MVC';
$trainers = $data['trainers'];
$pokemon  = $data['pokemon'];
include __DIR__ . '/partials/types.php';
include __DIR__ . '/partials/header.php';
?>
  <div class="container mx-auto px-4 max-w-6xl py-8">
    <div class="bg-slate-600 rounded-lg border border-slate-500 overflow-hidden">
      <div class="bg-slate-500 border-b border-slate-400 p-6">
        <h2 class="text-3xl font-bold text-gray-100 capitalize">
          Edit Pokémon: <?= htmlspecialchars($pokemon['name']) ?>
        </h2>
        <p class="text-gray-200 mt-1 text-sm">Modifica la información del Pokémon</p>
      </div>

      <div class="p-6">
        <form action="/pokemons/<?= $pokemon['id'] ?>/update" method="POST">
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Columna Izquierda: Información Básica -->
            <div class="space-y-6">
              <h3 class="text-xl font-bold text-gray-100 border-l-4 border-amber-500 pl-3">Información Básica</h3>
              
              <div class="space-y-5">
                <div>
                  <label class="block text-xs font-semibold text-gray-200 mb-2 uppercase tracking-wide">
                    NAME
                  </label>
                  <input 
                    type="text" 
                    name="name" 
                    required 
                    class="w-full px-4 py-3 bg-slate-500 border border-slate-400 rounded-lg text-gray-100 placeholder-gray-300 focus:outline-none focus:border-amber-500"
                    value="<?= htmlspecialchars($pokemon['name']) ?>"
                  >
                </div>

                <div>
                  <label class="block text-xs font-semibold text-gray-200 mb-2 uppercase tracking-wide">
                    TYPE
                  </label>
                  <select name="type" class="w-full px-4 py-3 bg-slate-500 border border-slate-400 rounded-lg text-gray-100 focus:outline-none focus:border-amber-500" required>
                    <?php foreach ($types as $type => $class): ?>
                      <option value="<?= $type ?>" 
                        <?= $pokemon['type'] === $type ? 'selected' : '' ?>
                        class="bg-slate-600">
                        <?= $type ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div>
                  <label class="block text-xs font-semibold text-gray-200 mb-2 uppercase tracking-wide">
                    TRAINER
                  </label>
                  <select name="trainer_id" class="w-full px-4 py-3 bg-slate-500 border border-slate-400 rounded-lg text-gray-100 focus:outline-none focus:border-amber-500" required>
                    <?php foreach ($trainers as $t): ?>
                      <option value="<?= $t['id'] ?>"
                        <?= $pokemon['trainer_id'] == $t['id'] ? 'selected' : '' ?>
                        class="bg-slate-600">
                        <?= htmlspecialchars($t['name']) ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div>

            <!-- Columna Derecha: Estadísticas -->
            <div class="space-y-6">
              <h3 class="text-xl font-bold text-gray-100 border-l-4 border-cyan-500 pl-3">Estadísticas</h3>
              
              <div class="space-y-5">
                <div class="bg-slate-500 border border-slate-400 rounded-lg p-5 space-y-3">
                  <div class="flex items-center justify-between">
                    <label class="text-xs font-semibold text-gray-200 uppercase tracking-wide">STRENGTH</label>
                    <span class="badge bg-cyan-500 text-white text-base px-3 py-1 rounded-full"><?= $pokemon['strength'] ?></span>
                  </div>
                  <input 
                    type="range" 
                    name="strength" 
                    class="range range-primary w-full" 
                    min="1" 
                    max="1000"
                    value="<?= $pokemon['strength'] ?>"
                  >
                  <div class="flex justify-between text-xs text-gray-300 px-1">
                    <span>1</span>
                    <span>1000</span>
                  </div>
                </div>

                <div class="bg-slate-500 border border-slate-400 rounded-lg p-5 space-y-3">
                  <div class="flex items-center justify-between">
                    <label class="text-xs font-semibold text-gray-200 uppercase tracking-wide">STAMINA</label>
                    <span class="badge bg-cyan-500 text-white text-base px-3 py-1 rounded-full"><?= $pokemon['staming'] ?></span>
                  </div>
                  <input 
                    type="range" 
                    name="staming" 
                    class="range range-primary w-full" 
                    min="1" 
                    max="1000"
                    value="<?= $pokemon['staming'] ?>"
                  >
                  <div class="flex justify-between text-xs text-gray-300 px-1">
                    <span>1</span>
                    <span>1000</span>
                  </div>
                </div>

                <div class="bg-slate-500 border border-slate-400 rounded-lg p-5 space-y-3">
                  <div class="flex items-center justify-between">
                    <label class="text-xs font-semibold text-gray-200 uppercase tracking-wide">SPEED</label>
                    <span class="badge bg-cyan-500 text-white text-base px-3 py-1 rounded-full"><?= $pokemon['speed'] ?></span>
                  </div>
                  <input 
                    type="range" 
                    name="speed" 
                    class="range range-primary w-full" 
                    min="1" 
                    max="1000"
                    value="<?= $pokemon['speed'] ?>"
                  >
                  <div class="flex justify-between text-xs text-gray-300 px-1">
                    <span>1</span>
                    <span>1000</span>
                  </div>
                </div>

                <div class="bg-slate-500 border border-slate-400 rounded-lg p-5 space-y-3">
                  <div class="flex items-center justify-between">
                    <label class="text-xs font-semibold text-gray-200 uppercase tracking-wide">ACCURACY</label>
                    <span class="badge bg-cyan-500 text-white text-base px-3 py-1 rounded-full"><?= $pokemon['accuracy'] ?></span>
                  </div>
                  <input 
                    type="range" 
                    name="accuracy" 
                    class="range range-primary w-full" 
                    min="1" 
                    max="1000"
                    value="<?= $pokemon['accuracy'] ?>"
                  >
                  <div class="flex justify-between text-xs text-gray-300 px-1">
                    <span>1</span>
                    <span>1000</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Botones -->
          <div class="flex flex-col sm:flex-row justify-between gap-4 pt-6 mt-6 border-t border-slate-500">
            <a href="/pokemons" class="btn bg-slate-500 border-none text-white btn-lg order-2 sm:order-1">
              Cancel
            </a>
            <button type="submit" class="btn bg-amber-600 border-none text-white btn-lg order-1 sm:order-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="size-5 mr-2" viewBox="0 0 24 24">
                <path fill="#ffffff" d="M9 16.17L4.83 12l-1.42 1.41L9 19L21 7l-1.41-1.41z"/>
              </svg>
              Update Pokémon
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

<script>
    const inputs = document.querySelectorAll('input[type="range"]');
    inputs.forEach(i => {
        i.addEventListener('input', () => {
            const badge = i.parentElement.querySelector('.badge');
            if (badge) {
                badge.textContent = i.value;
            }
        });
    });
</script>
<?php include __DIR__ . '/partials/footer.php'; ?>
