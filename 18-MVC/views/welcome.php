<?php 
$title = 'Pokémon List - MVC';
include __DIR__ . '/partials/types.php';
include __DIR__ . '/partials/header.php';
?>
  <div class="min-h-screen py-8 px-4">
    <div class="container mx-auto max-w-6xl">
      <div class="mb-8">
        <div class="flex flex-col md:flex-row items-center justify-between gap-4 mb-8">
          <div>
            <h1 class="text-4xl md:text-5xl font-bold text-gray-100 mb-2">
              Pokémon Manager
            </h1>
            <p class="text-gray-300 mt-2">Gestiona tu colección de Pokémon</p>
          </div>
          <a href="/pokemons/create" class="btn bg-green-600 border-none text-white btn-lg gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24">
              <path fill="#ffffff" d="M11 13v3q0 .425.288.713T12 17t.713-.288T13 16v-3h3q.425 0 .713-.288T17 12t-.288-.712T16 11h-3V8q0-.425-.288-.712T12 7t-.712.288T11 8v3H8q-.425 0-.712.288T7 12t.288.713T8 13zm1 9q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22"/>
            </svg>
            Add Pokémon
          </a>
        </div>

        <?php if (empty($data)): ?>
          <div class="bg-slate-600 border border-slate-500 rounded-lg p-6">
            <div class="flex items-center gap-4">
              <div class="bg-cyan-500/30 p-3 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-cyan-300 w-8 h-8">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
              </div>
              <div>
                <h3 class="font-bold text-xl text-gray-100">No hay pokémons registrados</h3>
                <div class="text-sm text-gray-300">¡Crea el primero haciendo clic en el botón de arriba!</div>
              </div>
            </div>
          </div>
        <?php else: ?>
          <div class="overflow-x-auto rounded-lg border border-slate-500 bg-slate-600">
            <table class="table">
              <thead>
                <tr class="bg-slate-500 border-b border-slate-400">
                  <th class="font-bold text-base text-gray-100">ID</th>
                  <th class="font-bold text-base text-gray-100">Name</th>
                  <th class="font-bold text-base text-gray-100">Type</th>
                  <th class="font-bold text-center text-base text-gray-100">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data as $pokemon): ?> 
                <tr class="border-b border-slate-500/50">
                  <td class="font-semibold text-lg text-gray-200"><?= htmlspecialchars($pokemon['id']) ?></td>
                  <td class="font-semibold capitalize text-lg text-gray-100"><?= htmlspecialchars($pokemon['name']) ?></td>
                  <td>
                    <span class="<?= $types[$pokemon['type']] ?? 'badge badge-outline' ?> font-semibold text-sm px-3 py-1">
                      <?= htmlspecialchars($pokemon['type']) ?>
                    </span>
                  </td>
                  <td>
                    <div class="flex gap-2 justify-center">
                      <a href="/pokemons/<?= $pokemon['id'] ?>" class="btn btn-sm bg-cyan-600 border-none text-white" title="Ver detalles">
                        <svg class="size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 26">
                          <path fill="#ffffff" d="M10 .188A9.81 9.81 0 0 0 .187 10A9.81 9.81 0 0 0 10 19.813c2.29 0 4.393-.811 6.063-2.125l.875.875a1.845 1.845 0 0 0 .343 2.156l4.594 4.625c.713.714 1.88.714 2.594 0l.875-.875a1.84 1.84 0 0 0 0-2.594l-4.625-4.594a1.82 1.82 0 0 0-2.157-.312l-.875-.875A9.812 9.812 0 0 0 10 .188M10 2a8 8 0 1 1 0 16a8 8 0 0 1 0-16M4.937 7.469a5.45 5.45 0 0 0-.812 2.875a5.46 5.46 0 0 0 5.469 5.469a5.5 5.5 0 0 0 3.156-1a7 7 0 0 1-.75.03a7.045 7.045 0 0 1-7.063-7.062c0-.104-.005-.208 0-.312"/>
                        </svg>
                      </a>
                      <a href="/pokemons/<?= $pokemon['id'] ?>/edit" class="btn btn-sm bg-amber-600 border-none text-white" title="Editar">
                        <svg class="size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                          <g fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M7 7H6a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-1"/>
                            <path d="M20.385 6.585a2.1 2.1 0 0 0-2.97-2.97L9 12v3h3zM16 5l3 3"/>
                          </g>
                        </svg>
                      </a>
                      <form method="post" class="inline" action="/pokemons/<?=$pokemon['id']?>/delete">
                        <button type="submit" class="btn btn-sm bg-red-600 border-none text-white" title="Eliminar" onclick="return confirm('¿Estás seguro de eliminar este pokémon?')">
                          <svg class="size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill="#ffffff" d="M7 21q-.825 0-1.412-.587T5 19V6q-.425 0-.712-.288T4 5t.288-.712T5 4h4q0-.425.288-.712T10 3h4q.425 0 .713.288T15 4h4q.425 0 .713.288T20 5t-.288.713T19 6v13q0 .825-.587 1.413T17 21zM17 6H7v13h10zm-7 11q.425 0 .713-.288T11 16V9q0-.425-.288-.712T10 8t-.712.288T9 9v7q0 .425.288.713T10 17m4 0q.425 0 .713-.288T15 16V9q0-.425-.288-.712T14 8t-.712.288T13 9v7q0 .425.288.713T14 17M7 6v13z"/>
                          </svg>
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
<?php include __DIR__ . '/partials/footer.php'; ?>