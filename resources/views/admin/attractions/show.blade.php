<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $attraction->nome_pt }} | Admin - Turismo pelo Mundo</title>
    
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
        .btn-danger {
            background: linear-gradient(135deg, #f56565 0%, #e53e3e 100%);
            transition: all 0.3s ease;
        }
        .btn-danger:hover {
            transform: translateY(-1px);
            box-shadow: 0 5px 15px rgba(245, 101, 101, 0.4);
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-white">{{ $attraction->nome_pt }}</h1>
                            <p class="text-white/80 text-sm">Detalhes do Ponto Turístico</p>
                        </div>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.attractions.edit', $attraction) }}" class="btn-primary text-white px-6 py-3 rounded-xl font-semibold flex items-center space-x-2 shadow-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        <span>Editar</span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Content -->
    <main class="container mx-auto px-6 py-8">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover">
                <!-- Image Section -->
                <div class="relative h-64 bg-gradient-to-br {{ $attraction->gradient }}">
                    @if($attraction->imagem_url)
                        <img src="{{ $attraction->imagem_url }}" alt="{{ $attraction->nome_pt }}" class="w-full h-full object-cover">
                    @else
                        <div class="absolute inset-0 flex items-center justify-center text-white text-9xl">
                            {{ $attraction->icon }}
                        </div>
                    @endif
                    <!-- Category Badge -->
                    <div class="absolute top-6 right-6">
                        <span class="px-4 py-2 bg-white/90 backdrop-blur-sm text-{{ $attraction->category_color }}-800 text-sm font-semibold rounded-full shadow-lg">
                            {{ $attraction->categoria }}
                        </span>
                    </div>
                </div>

                <!-- Details Section -->
                <div class="p-6">
                    <!-- Basic Information -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                        <div class="lg:col-span-2">
                            <h2 class="text-lg font-semibold text-gray-800 mb-3 flex items-center space-x-2">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>Informações Básicas</span>
                            </h2>
                            
                            <div class="space-y-4">
                                <div class="bg-gray-50 rounded-xl p-4">
                                    <h3 class="text-base font-semibold text-gray-700 mb-2 flex items-center space-x-2">
                                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <span>Localização</span>
                                    </h3>
                                    <p class="text-gray-800 text-lg font-medium">{{ $attraction->cidade }}, {{ $attraction->pais }}</p>
                                    @if($attraction->endereco)
                                        <p class="text-gray-600 mt-2">{{ $attraction->endereco }}</p>
                                    @endif
                                </div>

                                <div class="bg-gray-50 rounded-xl p-4">
                                    <h3 class="text-base font-semibold text-gray-700 mb-2 flex items-center space-x-2">
                                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                        </svg>
                                        <span>Categoria</span>
                                    </h3>
                                    <span class="px-4 py-2 inline-flex text-sm font-semibold rounded-full bg-{{ $attraction->category_color }}-100 text-{{ $attraction->category_color }}-800 shadow-sm">
                                        {{ $attraction->categoria }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-xl p-4">
                            <h2 class="text-base font-semibold text-gray-800 mb-2 flex items-center space-x-2">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"></path>
                                </svg>
                                <span>Nomes</span>
                            </h2>
                            <div class="space-y-3">
                                <div class="bg-white rounded-lg p-3">
                                    <h3 class="text-sm font-medium text-gray-500 mb-1">Português</h3>
                                    <p class="text-gray-800 font-semibold">{{ $attraction->nome_pt }}</p>
                                </div>
                                <div class="bg-white rounded-lg p-3">
                                    <h3 class="text-sm font-medium text-gray-500 mb-1">Inglês</h3>
                                    <p class="text-gray-800 font-semibold">{{ $attraction->nome_en }}</p>
                                </div>
                                <div class="bg-white rounded-lg p-3">
                                    <h3 class="text-sm font-medium text-gray-500 mb-1">Espanhol</h3>
                                    <p class="text-gray-800 font-semibold">{{ $attraction->nome_es }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Descriptions -->
                    <div class="border-t border-gray-200 pt-6">
                        <h2 class="text-lg font-semibold text-gray-800 mb-3 flex items-center space-x-2">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <span>Descrições</span>
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="bg-gray-50 rounded-xl p-4">
                                <h3 class="text-sm font-semibold text-gray-700 mb-2 flex items-center space-x-2">
                                    <span class="text-lg">🇧🇷</span>
                                    <span>Português</span>
                                </h3>
                                @if($attraction->descricao_pt)
                                    <p class="text-gray-700 leading-relaxed">{{ $attraction->descricao_pt }}</p>
                                @else
                                    <p class="text-gray-400 italic">Nenhuma descrição em português disponível.</p>
                                @endif
                            </div>

                            <div class="bg-gray-50 rounded-xl p-4">
                                <h3 class="text-sm font-semibold text-gray-700 mb-2 flex items-center space-x-2">
                                    <span class="text-lg">🇺🇸</span>
                                    <span>Inglês</span>
                                </h3>
                                @if($attraction->descricao_en)
                                    <p class="text-gray-700 leading-relaxed">{{ $attraction->descricao_en }}</p>
                                @else
                                    <p class="text-gray-400 italic">No English description available.</p>
                                @endif
                            </div>

                            <div class="bg-gray-50 rounded-xl p-4">
                                <h3 class="text-sm font-semibold text-gray-700 mb-2 flex items-center space-x-2">
                                    <span class="text-lg">🇪🇸</span>
                                    <span>Espanhol</span>
                                </h3>
                                @if($attraction->descricao_es)
                                    <p class="text-gray-700 leading-relaxed">{{ $attraction->descricao_es }}</p>
                                @else
                                    <p class="text-gray-400 italic">No hay descripción en español disponible.</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="border-t border-gray-200 pt-6 mt-6">
                        <div class="flex items-center justify-between">
                            <div class="text-sm text-gray-500 bg-gray-50 rounded-lg p-3">
                                <div class="flex items-center space-x-4">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>Criado em: {{ $attraction->created_at->format('d/m/Y H:i') }}</span>
                                    </div>
                                    @if($attraction->updated_at != $attraction->created_at)
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                            </svg>
                                            <span>Atualizado em: {{ $attraction->updated_at->format('d/m/Y H:i') }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="flex items-center space-x-4">
                                <a href="{{ route('admin.attractions.edit', $attraction) }}" 
                                   class="btn-primary text-white px-6 py-3 rounded-xl font-semibold flex items-center space-x-2 shadow-lg">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                    <span>Editar</span>
                                </a>
                                <form action="{{ route('admin.attractions.destroy', $attraction) }}" method="POST" class="inline" 
                                      onsubmit="return confirm('Tem certeza que deseja excluir este ponto turístico?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-danger text-white px-6 py-3 rounded-xl font-semibold flex items-center space-x-2 shadow-lg">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        <span>Excluir</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
