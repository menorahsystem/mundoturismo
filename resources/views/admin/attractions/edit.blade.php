<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Ponto Turístico | Admin - Turismo pelo Mundo</title>
    
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-white">Editar Ponto Turístico</h1>
                            <p class="text-white/80 text-sm">{{ $attraction->nome_pt }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Content -->
    <main class="container mx-auto px-6 py-8">
        <div class="max-w-6xl mx-auto">
            <div class="bg-white rounded-xl shadow-lg card-hover">
                <form action="{{ route('admin.attractions.update', $attraction) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="p-8">
                        @if ($errors->any())
                            <div class="mb-6 rounded-xl border border-rose-200 bg-rose-50 text-rose-800 px-4 py-3">
                                <div class="font-semibold mb-1 flex items-center space-x-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                    </svg>
                                    <span>Corrija os campos destacados:</span>
                                </div>
                                <ul class="list-disc list-inside text-sm space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="mb-6 rounded-xl border border-green-200 bg-green-50 text-green-800 px-4 py-3">
                                <div class="font-semibold flex items-center space-x-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>{{ session('success') }}</span>
                                </div>
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 text-red-800 px-4 py-3">
                                <div class="font-semibold flex items-center space-x-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                    </svg>
                                    <span>{{ session('error') }}</span>
                                </div>
                            </div>
                        @endif

                        <!-- Basic Information -->
                        <div class="mb-6">
                            <h2 class="text-lg font-semibold text-gray-800 mb-4 flex items-center space-x-2">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>Informações Básicas</span>
                            </h2>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="bg-gray-50 rounded-xl p-4">
                                    <label for="cidade" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <span>Cidade *</span>
                                    </label>
                                    <input type="text" name="cidade" id="cidade" value="{{ old('cidade', $attraction->cidade) }}" required
                                           placeholder="Ex.: Marrakech"
                                           class="form-input w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white {{ $errors->has('cidade') ? 'border-red-500 focus:ring-red-500' : 'border-gray-300' }}">
                                    @error('cidade')
                                        <p class="text-red-500 text-sm mt-2 flex items-center space-x-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                            </svg>
                                            <span>{{ $message }}</span>
                                        </p>
                                    @enderror
                                </div>

                                <div class="bg-gray-50 rounded-xl p-4">
                                    <label for="estado" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                        </svg>
                                        <span>Estado/Província</span>
                                    </label>
                                    <input type="text" name="estado" id="estado" value="{{ old('estado', $attraction->estado) }}"
                                           placeholder="Ex.: RJ, SP, CA, NY (opcional)"
                                           class="form-input w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white {{ $errors->has('estado') ? 'border-red-500 focus:ring-red-500' : 'border-gray-300' }}">
                                    @error('estado')
                                        <p class="text-red-500 text-sm mt-2 flex items-center space-x-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                            </svg>
                                            <span>{{ $message }}</span>
                                        </p>
                                    @enderror
                                </div>

                                <div class="bg-gray-50 rounded-xl p-4">
                                    <label for="pais" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>País *</span>
                                    </label>
                                    <input type="text" name="pais" id="pais" value="{{ old('pais', $attraction->pais) }}" required
                                           placeholder="Ex.: Marrocos"
                                           class="form-input w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white {{ $errors->has('pais') ? 'border-red-500 focus:ring-red-500' : 'border-gray-300' }}">
                                    @error('pais')
                                        <p class="text-red-500 text-sm mt-2 flex items-center space-x-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                            </svg>
                                            <span>{{ $message }}</span>
                                        </p>
                                    @enderror
                                </div>

                                <div class="bg-gray-50 rounded-xl p-4">
                                    <label for="categoria" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                        </svg>
                                        <span>Categoria *</span>
                                    </label>
                                    <select name="categoria" id="categoria" required
                                            class="form-input w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white {{ $errors->has('categoria') ? 'border-red-500 focus:ring-red-500' : 'border-gray-300' }}">
                                        <option value="">Selecione uma categoria</option>
                                        <option value="Histórico" {{ old('categoria', $attraction->categoria) == 'Histórico' ? 'selected' : '' }}>Histórico</option>
                                        <option value="Religioso" {{ old('categoria', $attraction->categoria) == 'Religioso' ? 'selected' : '' }}>Religioso</option>
                                        <option value="Natural" {{ old('categoria', $attraction->categoria) == 'Natural' ? 'selected' : '' }}>Natural</option>
                                        <option value="Cultural" {{ old('categoria', $attraction->categoria) == 'Cultural' ? 'selected' : '' }}>Cultural</option>
                                        <option value="Arquitetônico" {{ old('categoria', $attraction->categoria) == 'Arquitetônico' ? 'selected' : '' }}>Arquitetônico</option>
                                        <option value="Gastronômico" {{ old('categoria', $attraction->categoria) == 'Gastronômico' ? 'selected' : '' }}>Gastronômico</option>
                                        <option value="Esportivo" {{ old('categoria', $attraction->categoria) == 'Esportivo' ? 'selected' : '' }}>Esportivo</option>
                                        <option value="Tecnológico" {{ old('categoria', $attraction->categoria) == 'Tecnológico' ? 'selected' : '' }}>Tecnológico</option>
                                    </select>
                                    @error('categoria')
                                        <p class="text-red-500 text-sm mt-2 flex items-center space-x-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                            </svg>
                                            <span>{{ $message }}</span>
                                        </p>
                                    @enderror
                                </div>

                                <div class="bg-gray-50 rounded-xl p-4">
                                    <label for="imagem_url" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <span>URL da Imagem</span>
                                    </label>
                                    <input type="url" name="imagem_url" id="imagem_url" value="{{ old('imagem_url', $attraction->imagem_url) }}"
                                           placeholder="https://exemplo.com/imagem.jpg"
                                           class="form-input w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white {{ $errors->has('imagem_url') ? 'border-red-500 focus:ring-red-500' : 'border-gray-300' }}">
                                    @error('imagem_url')
                                        <p class="text-red-500 text-sm mt-2 flex items-center space-x-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                            </svg>
                                            <span>{{ $message }}</span>
                                        </p>
                                    @enderror
                                    <p class="text-xs text-gray-500 mt-1">Deixe em branco se não quiser usar uma imagem</p>
                                </div>

                                <div class="bg-gray-50 rounded-xl p-4 md:col-span-2">
                                    <label for="endereco" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <span>Endereço</span>
                                    </label>
                                    <textarea name="endereco" id="endereco" rows="3"
                                              class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white">{{ old('endereco', $attraction->endereco) }}</textarea>
                                    @error('endereco')
                                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Multilingual Names -->
                        <div class="mb-6">
                            <h2 class="text-lg font-semibold text-gray-800 mb-4 flex items-center space-x-2">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"></path>
                                </svg>
                                <span>Nomes Multilíngues</span>
                            </h2>
                            
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="bg-gray-50 rounded-xl p-4">
                                    <label for="nome_pt" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center space-x-2">
                                        <span class="text-base">🇧🇷</span>
                                        <span>Português *</span>
                                    </label>
                                    <input type="text" name="nome_pt" id="nome_pt" value="{{ old('nome_pt', $attraction->nome_pt) }}" required
                                           class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white">
                                    @error('nome_pt')
                                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="bg-gray-50 rounded-xl p-4">
                                    <label for="nome_en" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center space-x-2">
                                        <span class="text-base">🇺🇸</span>
                                        <span>Inglês *</span>
                                    </label>
                                    <input type="text" name="nome_en" id="nome_en" value="{{ old('nome_en', $attraction->nome_en) }}" required
                                           class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white">
                                    @error('nome_en')
                                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="bg-gray-50 rounded-xl p-4">
                                    <label for="nome_es" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center space-x-2">
                                        <span class="text-base">🇪🇸</span>
                                        <span>Espanhol *</span>
                                    </label>
                                    <input type="text" name="nome_es" id="nome_es" value="{{ old('nome_es', $attraction->nome_es) }}" required
                                           class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white">
                                    @error('nome_es')
                                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Descriptions -->
                        <div class="mb-6">
                            <h2 class="text-lg font-semibold text-gray-800 mb-4 flex items-center space-x-2">
                                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <span>Descrições</span>
                            </h2>
                            
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="bg-gray-50 rounded-xl p-4">
                                    <label for="descricao_pt" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center space-x-2">
                                        <span class="text-base">🇧🇷</span>
                                        <span>Português</span>
                                    </label>
                                    <textarea name="descricao_pt" id="descricao_pt" rows="4"
                                              class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white">{{ old('descricao_pt', $attraction->descricao_pt) }}</textarea>
                                    @error('descricao_pt')
                                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="bg-gray-50 rounded-xl p-4">
                                    <label for="descricao_en" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center space-x-2">
                                        <span class="text-base">🇺🇸</span>
                                        <span>Inglês</span>
                                    </label>
                                    <textarea name="descricao_en" id="descricao_en" rows="4"
                                              class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white">{{ old('descricao_en', $attraction->descricao_en) }}</textarea>
                                    @error('descricao_en')
                                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="bg-gray-50 rounded-xl p-4">
                                    <label for="descricao_es" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center space-x-2">
                                        <span class="text-base">🇪🇸</span>
                                        <span>Espanhol</span>
                                    </label>
                                    <textarea name="descricao_es" id="descricao_es" rows="4"
                                              class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white">{{ old('descricao_es', $attraction->descricao_es) }}</textarea>
                                    @error('descricao_es')
                                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Submit Buttons -->
                        <div class="border-t border-gray-200 pt-8">
                            <div class="flex items-center justify-between">
                                <a href="{{ route('admin.attractions.index') }}" 
                                   class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors font-medium">
                                    Cancelar
                                </a>
                                <button type="submit" 
                                        class="btn-success text-white px-8 py-3 rounded-xl font-semibold flex items-center space-x-2 shadow-lg">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Atualizar Ponto Turístico</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
