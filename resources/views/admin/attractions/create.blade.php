<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Ponto Turístico | Admin - Turismo pelo Mundo</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
    
    <!-- Styles -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
    @endif
    
    <style>
        body {
            font-family: 'Inter', ui-sans-serif, system-ui, sans-serif;
        }
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        .btn-success {
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            transition: all 0.3s ease;
        }
        .btn-success:hover {
            transform: translateY(-1px);
            box-shadow: 0 5px 15px rgba(72, 187, 120, 0.4);
        }
        .form-input {
            transition: all 0.3s ease;
        }
        .form-input:focus {
            transform: translateY(-1px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.2);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
    <!-- Header -->
    <header class="gradient-bg shadow-lg">
        <div class="container mx-auto px-6 py-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-6">
                    <a href="{{ route('admin.attractions.index') }}" class="flex items-center space-x-2 text-white/90 hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        <span>Voltar à Lista</span>
                    </a>
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-white">Criar Novo Ponto Turístico</h1>
                            <p class="text-white/80 text-sm">Adicione um novo destino incrível</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Content -->
    <main class="container mx-auto px-6 py-8">
        <div class="max-w-6xl mx-auto">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover">
                <form action="{{ route('admin.attractions.store') }}" method="POST" id="createAttractionForm">
                    @csrf
                    
                    <div class="p-8">
                        @if ($errors->any())
                            <div class="mb-6 rounded-xl border border-rose-200 bg-rose-50 text-rose-800 px-4 py-3">
                                <div class="font-semibold mb-1">Corrija os campos destacados:</div>
                                <ul class="list-disc list-inside text-sm">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            <!-- Basic Information -->
                            <div class="space-y-6">
                                <div class="flex items-center space-x-3 mb-6">
                                    <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <h2 class="text-xl font-semibold text-gray-800">Informações Básicas</h2>
                                </div>
                                
                                <div class="bg-gray-50 rounded-xl p-6 space-y-4">
                                    <div>
                                        <label for="cidade" class="block text-sm font-medium text-gray-700 mb-2 flex items-center space-x-2">
                                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            <span>Cidade *</span>
                                        </label>
                                        <input type="text" name="cidade" id="cidade" value="{{ old('cidade') }}" required placeholder="Ex.: Rio de Janeiro"
                                               class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" maxlength="80">
                                        @error('cidade')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="pais" class="block text-sm font-medium text-gray-700 mb-2 flex items-center space-x-2">
                                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span>País *</span>
                                        </label>
                                        <input type="text" name="pais" id="pais" value="{{ old('pais') }}" required placeholder="Ex.: Brasil"
                                               class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" maxlength="80">
                                        @error('pais')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="categoria" class="block text-sm font-medium text-gray-700 mb-2 flex items-center space-x-2">
                                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                            </svg>
                                            <span>Categoria *</span>
                                        </label>
                                        <select name="categoria" id="categoria" required
                                                class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                            <option value="">Selecione uma categoria</option>
                                            <option value="Histórico" {{ old('categoria') == 'Histórico' ? 'selected' : '' }}>Histórico</option>
                                            <option value="Religioso" {{ old('categoria') == 'Religioso' ? 'selected' : '' }}>Religioso</option>
                                            <option value="Natural" {{ old('categoria') == 'Natural' ? 'selected' : '' }}>Natural</option>
                                            <option value="Cultural" {{ old('categoria') == 'Cultural' ? 'selected' : '' }}>Cultural</option>
                                            <option value="Arquitetônico" {{ old('categoria') == 'Arquitetônico' ? 'selected' : '' }}>Arquitetônico</option>
                                            <option value="Gastronômico" {{ old('categoria') == 'Gastronômico' ? 'selected' : '' }}>Gastronômico</option>
                                            <option value="Esportivo" {{ old('categoria') == 'Esportivo' ? 'selected' : '' }}>Esportivo</option>
                                            <option value="Tecnológico" {{ old('categoria') == 'Tecnológico' ? 'selected' : '' }}>Tecnológico</option>
                                        </select>
                                        @error('categoria')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="imagem_url" class="block text-sm font-medium text-gray-700 mb-2 flex items-center space-x-2">
                                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            <span>URL da Imagem</span>
                                        </label>
                                        <input type="url" name="imagem_url" id="imagem_url" value="{{ old('imagem_url') }}" placeholder="https://exemplo.com/imagem.jpg" pattern="https?://.+"
                                               class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                        @error('imagem_url')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="endereco" class="block text-sm font-medium text-gray-700 mb-2 flex items-center space-x-2">
                                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            <span>Endereço</span>
                                        </label>
                                        <textarea name="endereco" id="endereco" rows="3" placeholder="Rua / Número / Bairro / CEP"
                                                  class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" maxlength="180">{{ old('endereco') }}</textarea>
                                        <div class="text-xs text-gray-400 mt-1"><span id="enderecoCount">0</span>/180</div>
                                        @error('endereco')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Multilingual Names -->
                            <div class="space-y-6">
                                <div class="flex items-center space-x-3 mb-6">
                                    <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"></path>
                                        </svg>
                                    </div>
                                    <h2 class="text-xl font-semibold text-gray-800">Nomes</h2>
                                </div>
                                
                                <div class="bg-gray-50 rounded-xl p-6 space-y-4">
                                    <div>
                                        <label for="nome_pt" class="block text-sm font-medium text-gray-700 mb-2 flex items-center space-x-2">
                                            <span class="text-2xl">🇧🇷</span>
                                            <span>Nome (Português) *</span>
                                        </label>
                                        <input type="text" name="nome_pt" id="nome_pt" value="{{ old('nome_pt') }}" required placeholder="Ex.: Cristo Redentor" maxlength="100"
                                               class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                        <div class="text-xs text-gray-400 mt-1"><span id="nomePtCount">0</span>/100</div>
                                        @error('nome_pt')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="nome_en" class="block text-sm font-medium text-gray-700 mb-2 flex items-center space-x-2">
                                            <span class="text-2xl">🇺🇸</span>
                                            <span>Nome (Inglês) *</span>
                                        </label>
                                        <input type="text" name="nome_en" id="nome_en" value="{{ old('nome_en') }}" required placeholder="Ex.: Christ the Redeemer" maxlength="100"
                                               class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                        <div class="text-xs text-gray-400 mt-1"><span id="nomeEnCount">0</span>/100</div>
                                        @error('nome_en')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="nome_es" class="block text-sm font-medium text-gray-700 mb-2 flex items-center space-x-2">
                                            <span class="text-2xl">🇪🇸</span>
                                            <span>Nome (Espanhol) *</span>
                                        </label>
                                        <input type="text" name="nome_es" id="nome_es" value="{{ old('nome_es') }}" required placeholder="Ex.: Cristo Redentor" maxlength="100"
                                               class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                        <div class="text-xs text-gray-400 mt-1"><span id="nomeEsCount">0</span>/100</div>
                                        @error('nome_es')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Descriptions -->
                        <div class="mt-8">
                            <div class="flex items-center space-x-3 mb-6">
                                <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <h2 class="text-xl font-semibold text-gray-800">Descrições</h2>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div class="bg-gray-50 rounded-xl p-6">
                                    <label for="descricao_pt" class="block text-sm font-medium text-gray-700 mb-2 flex items-center space-x-2">
                                        <span class="text-2xl">🇧🇷</span>
                                        <span>Descrição (Português)</span>
                                    </label>
                                    <textarea name="descricao_pt" id="descricao_pt" rows="4" placeholder="Conte um pouco sobre o ponto turístico (PT)" maxlength="600"
                                              class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('descricao_pt') }}</textarea>
                                    <div class="text-xs text-gray-400 mt-1"><span id="descPtCount">0</span>/600</div>
                                    @error('descricao_pt')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="bg-gray-50 rounded-xl p-6">
                                    <label for="descricao_en" class="block text-sm font-medium text-gray-700 mb-2 flex items-center space-x-2">
                                        <span class="text-2xl">🇺🇸</span>
                                        <span>Descrição (Inglês)</span>
                                    </label>
                                    <textarea name="descricao_en" id="descricao_en" rows="4" placeholder="Tell a bit about the place (EN)" maxlength="600"
                                              class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('descricao_en') }}</textarea>
                                    <div class="text-xs text-gray-400 mt-1"><span id="descEnCount">0</span>/600</div>
                                    @error('descricao_en')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="bg-gray-50 rounded-xl p-6">
                                    <label for="descricao_es" class="block text-sm font-medium text-gray-700 mb-2 flex items-center space-x-2">
                                        <span class="text-2xl">🇪🇸</span>
                                        <span>Descrição (Espanhol)</span>
                                    </label>
                                    <textarea name="descricao_es" id="descricao_es" rows="4" placeholder="Cuenta un poco sobre el lugar (ES)" maxlength="600"
                                              class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('descricao_es') }}</textarea>
                                    <div class="text-xs text-gray-400 mt-1"><span id="descEsCount">0</span>/600</div>
                                    @error('descricao_es')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Submit Buttons -->
                        <div class="mt-8 pt-8 border-t border-gray-200 flex justify-end space-x-4">
                            <a href="{{ route('admin.attractions.index') }}" 
                               class="px-6 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition-all duration-300 flex items-center space-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                <span>Cancelar</span>
                            </a>
                            <button type="submit" id="submitBtn"
                                    class="btn-success text-white px-8 py-3 rounded-xl font-semibold flex items-center space-x-2 shadow-lg">
                                <svg id="submitIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <svg id="spinner" class="w-5 h-5 animate-spin hidden" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                                </svg>
                                <span id="submitText">Criar Ponto Turístico</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script>
        // contadores de caracteres
        function bindCounter(idInput, idCounter) {
            const el = document.getElementById(idInput);
            const counter = document.getElementById(idCounter);
            if (!el || !counter) return;
            const update = () => counter.textContent = (el.value || '').length;
            el.addEventListener('input', update);
            update();
        }
        bindCounter('endereco', 'enderecoCount');
        bindCounter('nome_pt', 'nomePtCount');
        bindCounter('nome_en', 'nomeEnCount');
        bindCounter('nome_es', 'nomeEsCount');
        bindCounter('descricao_pt', 'descPtCount');
        bindCounter('descricao_en', 'descEnCount');
        bindCounter('descricao_es', 'descEsCount');

        // spinner no submit
        const form = document.getElementById('createAttractionForm');
        const btn = document.getElementById('submitBtn');
        const spinner = document.getElementById('spinner');
        const icon = document.getElementById('submitIcon');
        const text = document.getElementById('submitText');
        if (form) {
            form.addEventListener('submit', function(){
                btn.setAttribute('disabled', 'disabled');
                icon.classList.add('hidden');
                spinner.classList.remove('hidden');
                text.textContent = 'Salvando...';
            });
        }
    </script>
</body>
</html>
