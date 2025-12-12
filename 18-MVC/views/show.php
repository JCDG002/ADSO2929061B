<?php 
$title = 'Pokémon Details - MVC';
include __DIR__ . '/partials/types.php';
include __DIR__ . '/partials/header.php';
?>
    <div class="container mx-auto px-4 max-w-6xl py-8">
        <a href="/pokemons" class="btn bg-green-600 border-none text-white mb-6 gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 48 48">
                <path fill="none" stroke="#ffffff" stroke-linejoin="round" stroke-width="4" d="M44 40.836q-7.34-8.96-13.036-10.168t-10.846-.365V41L4 23.545L20.118 7v10.167q9.523.075 16.192 6.833q6.668 6.758 7.69 16.836Z" clip-rule="evenodd"/>
            </svg>
            Back to pokemons
        </a>

        <div class="bg-slate-600 rounded-lg border border-slate-500 overflow-hidden">
            <div class="bg-slate-500 border-b border-slate-400 p-6">
                <h2 class="text-3xl font-bold text-gray-100 capitalize">
                    <?= htmlspecialchars($data['name']) ?>
                </h2>
                <p class="text-gray-200 mt-1 text-sm">Detalles del Pokémon</p>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Columna Izquierda: Información Básica -->
                    <div class="space-y-6">
                        <h3 class="text-xl font-bold text-gray-100 border-l-4 border-purple-500 pl-3">Información Básica</h3>
                        
                        <div class="space-y-5">
                            <div>
                                <label class="block text-xs font-semibold text-gray-200 mb-2 uppercase tracking-wide">
                                    NAME
                                </label>
                                <div class="px-4 py-3 bg-slate-500 border border-slate-400 rounded-lg text-gray-100">
                                    <span class="text-lg font-semibold capitalize"><?= htmlspecialchars($data['name']) ?></span>
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-gray-200 mb-2 uppercase tracking-wide">
                                    TYPE
                                </label>
                                <div class="px-4 py-3 bg-slate-500 border border-slate-400 rounded-lg">
                                    <span class="<?= $types[$data['type']] ?? 'badge badge-outline' ?> text-base font-semibold px-3 py-1">
                                        <?= htmlspecialchars($data['type']) ?>
                                    </span>
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-gray-200 mb-2 uppercase tracking-wide">
                                    TRAINER
                                </label>
                                <div class="px-4 py-3 bg-slate-500 border border-slate-400 rounded-lg text-gray-100">
                                    <span class="text-lg font-semibold capitalize"><?= htmlspecialchars($data['tname']) ?></span>
                                </div>
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
                                    <span class="badge bg-cyan-500 text-white text-base px-3 py-1 rounded-full"><?=$data['strength']?></span>
                                </div>
                                <progress class="progress progress-primary w-full h-2 rounded-full bg-slate-400" value="<?=$data['strength']?>" max="1000"></progress>
                                <div class="flex justify-between text-xs text-gray-300 px-1">
                                    <span>1</span>
                                    <span>1000</span>
                                </div>
                            </div>

                            <div class="bg-slate-500 border border-slate-400 rounded-lg p-5 space-y-3">
                                <div class="flex items-center justify-between">
                                    <label class="text-xs font-semibold text-gray-200 uppercase tracking-wide">STAMINA</label>
                                    <span class="badge bg-cyan-500 text-white text-base px-3 py-1 rounded-full"><?=$data['staming']?></span>
                                </div>
                                <progress class="progress progress-primary w-full h-2 rounded-full bg-slate-400" value="<?=$data['staming']?>" max="1000"></progress>
                                <div class="flex justify-between text-xs text-gray-300 px-1">
                                    <span>1</span>
                                    <span>1000</span>
                                </div>
                            </div>

                            <div class="bg-slate-500 border border-slate-400 rounded-lg p-5 space-y-3">
                                <div class="flex items-center justify-between">
                                    <label class="text-xs font-semibold text-gray-200 uppercase tracking-wide">SPEED</label>
                                    <span class="badge bg-cyan-500 text-white text-base px-3 py-1 rounded-full"><?=$data['speed']?></span>
                                </div>
                                <progress class="progress progress-primary w-full h-2 rounded-full bg-slate-400" value="<?=$data['speed']?>" max="1000"></progress>
                                <div class="flex justify-between text-xs text-gray-300 px-1">
                                    <span>1</span>
                                    <span>1000</span>
                                </div>
                            </div>

                            <div class="bg-slate-500 border border-slate-400 rounded-lg p-5 space-y-3">
                                <div class="flex items-center justify-between">
                                    <label class="text-xs font-semibold text-gray-200 uppercase tracking-wide">ACCURACY</label>
                                    <span class="badge bg-cyan-500 text-white text-base px-3 py-1 rounded-full"><?=$data['accuracy']?></span>
                                </div>
                                <progress class="progress progress-primary w-full h-2 rounded-full bg-slate-400" value="<?=$data['accuracy']?>" max="1000"></progress>
                                <div class="flex justify-between text-xs text-gray-300 px-1">
                                    <span>1</span>
                                    <span>1000</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include __DIR__ . '/partials/footer.php'; ?>
