<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Pontos Turísticos | Turismo pelo Mundo</title>
    
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
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }
        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
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
        .table-row-hover {
            transition: all 0.2s ease;
        }
        .table-row-hover:hover {
            background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
        }
        
        /* Forçar tamanhos dos ícones em desktop */
        @media (min-width: 1024px) {
            .header-icon-container {
                width: 4rem !important;
                height: 4rem !important;
            }
            
            .header-icon {
                width: 2.5rem !important;
                height: 2.5rem !important;
            }
            
            .button-icon-container {
                width: 2.5rem !important;
                height: 2.5rem !important;
            }
            
            .button-icon {
                width: 1.25rem !important;
                height: 1.25rem !important;
            }
            
            .status-indicator {
                width: 1.25rem !important;
                height: 1.25rem !important;
            }
            
            /* Forçar layout horizontal dos botões em desktop */
            .header-buttons {
                flex-direction: row !important;
                align-items: center !important;
            }
            
            .header-buttons > * {
                margin-bottom: 0 !important;
            }
        }
        
        /* Forçar visibilidade dos botões de ações no mobile */
        @media (max-width: 640px) {
            .table-actions {
                display: flex !important;
                flex-direction: row !important;
                align-items: center !important;
                justify-content: flex-start !important;
                gap: 0.25rem !important;
                min-width: auto !important;
                overflow: visible !important;
            }
            
            .table-actions a,
            .table-actions button {
                display: inline-flex !important;
                align-items: center !important;
                justify-content: center !important;
                min-width: 2rem !important;
                min-height: 2rem !important;
                padding: 0.25rem !important;
                border-radius: 0.5rem !important;
                background-color: transparent !important;
                border: none !important;
                cursor: pointer !important;
                text-decoration: none !important;
            }
            
            .table-actions svg {
                width: 1rem !important;
                height: 1rem !important;
                display: block !important;
            }
            
            /* Garantir que a tabela tenha scroll horizontal se necessário */
            .overflow-x-auto {
                overflow-x: auto !important;
                -webkit-overflow-scrolling: touch !important;
            }
            
            /* Forçar largura mínima da coluna de ações */
            .actions-column {
                min-width: 8rem !important;
                width: auto !important;
            }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
    <!-- Header -->
    <header class="relative overflow-hidden bg-gradient-to-r from-slate-900 via-purple-900 to-slate-900 shadow-2xl" style="background: linear-gradient(135deg, #1e293b 0%, #7c3aed 50%, #1e293b 100%) !important;">
        <!-- Decorative background elements -->
        <div class="absolute inset-0 bg-black/10"></div>
        <div class="absolute top-0 right-0 w-96 h-96 bg-white/5 rounded-full -translate-y-48 translate-x-48"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-white/5 rounded-full translate-y-32 -translate-x-32"></div>
        
        <div class="relative z-10 container mx-auto px-4 sm:px-6 lg:px-8 py-4 sm:py-6 lg:py-8">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between space-y-4 lg:space-y-0 lg:gap-8">
                <!-- Left section with logo and title -->
                <div class="flex items-center space-x-4 sm:space-x-6 lg:space-x-8">
                    <div class="flex items-center space-x-3 sm:space-x-4 lg:space-x-6">
                        <div class="relative">
                            <div class="header-icon-container w-10 h-10 sm:w-12 sm:h-12 lg:w-16 lg:h-16 bg-gradient-to-br from-white/20 to-white/10 backdrop-blur-sm rounded-xl sm:rounded-2xl flex items-center justify-center border border-white/20 shadow-xl">
                                <svg class="header-icon w-5 h-5 sm:w-6 sm:h-6 lg:w-10 lg:h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                            <div class="status-indicator absolute -top-1 -right-1 w-3 h-3 sm:w-4 sm:h-4 lg:w-5 lg:h-5 bg-green-400 rounded-full border-2 border-white"></div>
                        </div>
                        <div class="space-y-1">
                            <h1 class="text-xl sm:text-2xl lg:text-3xl font-black text-white tracking-tight">Painel Administrativo</h1>
                            <div class="flex flex-col sm:flex-row sm:items-center space-y-1 sm:space-y-0 sm:space-x-3">
                                <p class="text-white/80 text-xs sm:text-sm font-medium">Gerenciamento de Pontos Turísticos</p>
                                <div class="flex items-center space-x-1">
                                    <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                                    <span class="text-green-400 text-xs font-semibold uppercase tracking-wider">Online</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Right section with buttons -->
                <div class="header-buttons flex flex-col sm:flex-row lg:flex-row items-stretch sm:items-center lg:items-center space-y-3 sm:space-y-0 lg:space-y-0 sm:space-x-4 lg:space-x-6">
                    @if(auth()->check())
                    <div class="flex items-center bg-white/10 backdrop-blur-sm text-white px-4 py-2 rounded-xl sm:rounded-2xl shadow-lg">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span class="text-sm font-semibold">Olá, {{ auth()->user()->name }}</span>
                    </div>
                    @endif
                    <a href="{{ route('home') }}" 
                       class="group relative bg-white/10 backdrop-blur-sm text-white px-4 sm:px-6 py-2 sm:py-3 rounded-xl sm:rounded-2xl hover:bg-white/20 transition-all duration-300 flex items-center justify-center sm:justify-start space-x-2 sm:space-x-3 shadow-lg hover:shadow-xl">
                        <div class="button-icon-container w-6 h-6 sm:w-8 sm:h-8 lg:w-10 lg:h-10 bg-white/20 rounded-lg sm:rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <svg class="button-icon w-3 h-3 sm:w-4 sm:h-4 lg:w-5 lg:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                        </div>
                        <span class="font-semibold text-xs sm:text-sm lg:text-base">Voltar ao Site</span>
                    </a>
                    
                    <a href="{{ route('admin.attractions.create') }}" 
                        class="group relative bg-gradient-to-r from-emerald-500 to-teal-600 text-white px-6 sm:px-8 py-2 sm:py-3 rounded-xl sm:rounded-2xl font-bold flex items-center justify-center sm:justify-start space-x-2 sm:space-x-3 shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                         <div class="button-icon-container w-6 h-6 sm:w-8 sm:h-8 lg:w-10 lg:h-10 bg-white/20 rounded-lg sm:rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                             <svg class="button-icon w-3 h-3 sm:w-4 sm:h-4 lg:w-5 lg:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                             </svg>
                         </div>
                         <span class="text-xs sm:text-sm lg:text-base">Novo Ponto Turístico</span>
                         <div class="absolute inset-0 bg-gradient-to-r from-emerald-400 to-teal-500 rounded-xl sm:rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                     </a>

                     <a href="{{ route('admin.users.index') }}" 
                        class="group relative bg-white/10 backdrop-blur-sm text-white px-6 sm:px-8 py-2 sm:py-3 rounded-xl sm:rounded-2xl font-semibold flex items-center justify-center sm:justify-start space-x-2 sm:space-x-3 shadow-xl hover:bg-white/20 transition-all duration-300">
                         <div class="button-icon-container w-6 h-6 sm:w-8 sm:h-8 lg:w-10 lg:h-10 bg-white/20 rounded-lg sm:rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                             <svg class="button-icon w-3 h-3 sm:w-4 sm:h-4 lg:w-5 lg:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z"></path>
                             </svg>
                         </div>
                         <span class="text-xs sm:text-sm lg:text-base">Usuários</span>
                     </a>

                     <form action="{{ route('logout') }}" method="POST" class="flex">
                         @csrf
                         <button type="submit" class="group relative bg-red-500/90 hover:bg-red-600 text-white px-6 sm:px-8 py-2 sm:py-3 rounded-xl sm:rounded-2xl font-semibold flex items-center justify-center sm:justify-start space-x-2 sm:space-x-3 shadow-xl transition-all duration-300">
                             <div class="button-icon-container w-6 h-6 sm:w-8 sm:h-8 lg:w-10 lg:h-10 bg-white/20 rounded-lg sm:rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                 <svg class="button-icon w-3 h-3 sm:w-4 sm:h-4 lg:w-5 lg:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 11-4 0v-1m4-10V5a2 2 0 10-4 0v1"></path>
                                 </svg>
                             </div>
                             <span class="text-xs sm:text-sm lg:text-base">Sair</span>
                         </button>
                     </form>
                </div>
            </div>
        </div>
    </header>

    <!-- Content -->
    <main class="container mx-auto px-6 py-8">
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 mb-8 sm:mb-12">
            <div class="group relative bg-gradient-to-br from-blue-100 to-indigo-200 rounded-3xl p-8 card-hover border border-blue-300" style="background: linear-gradient(135deg, #dbeafe 0%, #c7d2fe 100%) !important; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06) !important; border-color: #93c5fd !important;">
                <!-- Background pattern -->
                <div class="absolute inset-0 bg-gradient-to-br from-blue-200 to-indigo-300 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                
                <!-- Top accent line -->
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-t-3xl"></div>
                
                <div class="relative z-10">
                    <div class="flex items-start justify-between mb-6">
                        <div class="flex-1">
                            <div class="flex items-center space-x-3 mb-4">
                                <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center shadow-lg">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wider">Total de Atrações</h3>
                                    <div class="flex items-center space-x-2 mt-1">
                                        <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                                        <span class="text-xs text-gray-600 font-medium">Sistema Ativo</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="space-y-2">
                                <div class="flex items-baseline space-x-2">
                                    <span class="text-4xl font-bold text-gray-800">{{ $stats['total_attractions'] }}</span>
                                    <span class="text-lg text-gray-600 font-medium">pontos</span>
                                </div>
                                <p class="text-sm text-gray-700">Cadastrados no sistema</p>
                            </div>
                        </div>
                        
                        <!-- Trend indicator -->
                        <div class="flex flex-col items-end space-y-2">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-100 to-indigo-100 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="group relative bg-gradient-to-br from-emerald-100 to-teal-200 rounded-3xl p-8 card-hover border border-emerald-300" style="background: linear-gradient(135deg, #d1fae5 0%, #99f6e4 100%) !important; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06) !important; border-color: #6ee7b7 !important;">
                <!-- Background pattern -->
                <div class="absolute inset-0 bg-gradient-to-br from-emerald-200 to-teal-300 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                
                <!-- Top accent line -->
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-t-3xl"></div>
                
                <div class="relative z-10">
                    <div class="flex items-start justify-between mb-6">
                        <div class="flex-1">
                            <div class="flex items-center space-x-3 mb-4">
                                <div class="w-10 h-10 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center shadow-lg">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wider">Categorias</h3>
                                    <div class="flex items-center space-x-2 mt-1">
                                        <div class="w-2 h-2 bg-emerald-500 rounded-full"></div>
                                        <span class="text-xs text-gray-600 font-medium">Variedade</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="space-y-2">
                                <div class="flex items-baseline space-x-2">
                                    <span class="text-4xl font-bold text-gray-800">{{ $stats['total_categories'] }}</span>
                                    <span class="text-lg text-gray-600 font-medium">tipos</span>
                                </div>
                                <p class="text-sm text-gray-700">Diferentes categorias</p>
                            </div>
                        </div>
                        
                        <!-- Trend indicator -->
                        <div class="flex flex-col items-end space-y-2">
                            <div class="w-12 h-12 bg-gradient-to-br from-emerald-100 to-teal-100 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="group relative bg-gradient-to-br from-orange-100 to-amber-200 rounded-3xl p-8 card-hover border border-orange-300" style="background: linear-gradient(135deg, #fed7aa 0%, #fde68a 100%) !important; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06) !important; border-color: #fdba74 !important;">
                <!-- Background pattern -->
                <div class="absolute inset-0 bg-gradient-to-br from-orange-200 to-amber-300 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                
                <!-- Top accent line -->
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-orange-500 to-amber-600 rounded-t-3xl"></div>
                
                <div class="relative z-10">
                    <div class="flex items-start justify-between mb-6">
                        <div class="flex-1">
                            <div class="flex items-center space-x-3 mb-4">
                                <div class="w-10 h-10 bg-gradient-to-br from-orange-500 to-amber-600 rounded-xl flex items-center justify-center shadow-lg">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wider">Países</h3>
                                    <div class="flex items-center space-x-2 mt-1">
                                        <div class="w-2 h-2 bg-orange-500 rounded-full"></div>
                                        <span class="text-xs text-gray-600 font-medium">Mundial</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="space-y-2">
                                <div class="flex items-baseline space-x-2">
                                    <span class="text-4xl font-bold text-gray-800">{{ $stats['total_countries'] }}</span>
                                    <span class="text-lg text-gray-600 font-medium">países</span>
                                </div>
                                <p class="text-sm text-gray-700">Representados</p>
                            </div>
                        </div>
                        
                        <!-- Trend indicator -->
                        <div class="flex flex-col items-end space-y-2">
                            <div class="w-12 h-12 bg-gradient-to-br from-orange-100 to-amber-100 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9v-9m0-9v9"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Separator -->
        <div style="height: 2rem; margin: 1rem 0;"></div>

        <!-- Search and Filters Section -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
            <form method="GET" action="{{ route('admin.attractions.index') }}" class="space-y-6">
                <!-- Search Bar -->
                <div class="flex flex-col lg:flex-row gap-4">
                    <div class="flex-1">
                        <label for="search" class="block text-sm font-medium text-gray-700 mb-2">Buscar Pontos Turísticos</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input type="text" 
                                   name="search" 
                                   id="search" 
                                   value="{{ request('search') }}"
                                   placeholder="Buscar por nome, cidade, país ou categoria..."
                                   class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                        </div>
                    </div>
                    
                    <!-- Category Filter -->
                    <div class="lg:w-48">
                        <label for="categoria" class="block text-sm font-medium text-gray-700 mb-2">Categoria</label>
                        <select name="categoria" id="categoria" class="block w-full px-3 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                            <option value="">Todas as categorias</option>
                            @foreach($categories as $category)
                                <option value="{{ $category }}" {{ request('categoria') == $category ? 'selected' : '' }}>
                                    {{ $category }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <!-- Country Filter -->
                    <div class="lg:w-48">
                        <label for="pais" class="block text-sm font-medium text-gray-700 mb-2">País</label>
                        <select name="pais" id="pais" class="block w-full px-3 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                            <option value="">Todos os países</option>
                            @foreach($countries as $country)
                                <option value="{{ $country }}" {{ request('pais') == $country ? 'selected' : '' }}>
                                    {{ $country }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-3">
                    <button type="submit" 
                            class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-3 rounded-xl font-semibold hover:from-blue-600 hover:to-indigo-700 transition-all duration-300 flex items-center justify-center space-x-2 shadow-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <span>Buscar</span>
                    </button>
                    
                    <a href="{{ route('admin.attractions.index') }}" 
                       class="bg-gray-500 text-white px-6 py-3 rounded-xl font-semibold hover:bg-gray-600 transition-all duration-300 flex items-center justify-center space-x-2 shadow-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        <span>Limpar Filtros</span>
                    </a>
                </div>
                
                <!-- Search Results Info -->
                @if(request('search') || request('categoria') || request('pais'))
                    <div class="bg-blue-50 border border-blue-200 rounded-xl p-4">
                        <div class="flex items-center space-x-2 text-blue-800">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="font-medium">
                                @if(request('search'))
                                    Buscando por: <strong>"{{ request('search') }}"</strong>
                                @endif
                                @if(request('categoria'))
                                    @if(request('search')) | @endif
                                    Categoria: <strong>{{ request('categoria') }}</strong>
                                @endif
                                @if(request('pais'))
                                    @if(request('search') || request('categoria')) | @endif
                                    País: <strong>{{ request('pais') }}</strong>
                                @endif
                            </span>
                        </div>
                    </div>
                @endif
            </form>
        </div>

        @if(session('success'))
            <div class="bg-green-50 border border-green-200 text-green-800 px-6 py-4 rounded-xl mb-6 flex items-center space-x-3">
                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        @if($attractions->count() > 0)

            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                            <tr>
                                <th class="px-4 sm:px-8 lg:px-16 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <span class="hidden sm:inline">Imagem</span>
                                    </div>
                                </th>
                                <th class="px-4 sm:px-8 lg:px-16 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                        </svg>
                                        <span class="hidden sm:inline">Nome (PT)</span>
                                    </div>
                                </th>
                                <th class="px-4 sm:px-8 lg:px-12 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <span class="hidden sm:inline">Localização</span>
                                    </div>
                                </th>
                                <th class="px-4 sm:px-8 lg:px-12 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                        </svg>
                                        <span class="hidden sm:inline">Categoria</span>
                                    </div>
                                </th>
                                <th class="px-4 sm:px-8 lg:px-12 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
                                        </svg>
                                        <span class="hidden sm:inline">Ações</span>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($attractions as $attraction)
                            <tr class="table-row-hover">
                                <td class="px-4 sm:px-8 lg:px-16 py-4 sm:py-6 whitespace-nowrap">
                                    <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-xl overflow-hidden bg-gray-200 shadow-md">
                                        @if($attraction->imagem_url)
                                            <img src="{{ $attraction->imagem_url }}" alt="{{ $attraction->nome_pt }}" class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-2xl sm:text-3xl bg-gradient-to-br from-gray-300 to-gray-400">
                                                {{ $attraction->icon }}
                                            </div>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-4 sm:px-8 lg:px-16 py-4 sm:py-6 whitespace-nowrap">
                                    <div class="text-sm font-semibold text-gray-900 mb-1">{{ $attraction->nome_pt }}</div>
                                    <div class="text-xs sm:text-sm text-gray-500">{{ $attraction->nome_en }}</div>
                                </td>
                                <td class="px-4 sm:px-8 lg:px-12 py-4 sm:py-6 whitespace-nowrap">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <div class="text-xs sm:text-sm text-gray-900">{{ $attraction->cidade }}, {{ $attraction->pais }}</div>
                                    </div>
                                </td>
                                <td class="px-4 sm:px-8 lg:px-12 py-4 sm:py-6 whitespace-nowrap">
                                    <span class="px-2 sm:px-4 py-1 sm:py-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{ $attraction->category_color }}-100 text-{{ $attraction->category_color }}-800 shadow-sm">
                                        {{ $attraction->categoria }}
                                    </span>
                                </td>
                                <td class="px-4 sm:px-8 lg:px-12 py-4 sm:py-6 whitespace-nowrap text-sm font-medium actions-column">
                                    <div class="flex items-center space-x-1 sm:space-x-3 table-actions">
                                        <a href="{{ route('admin.attractions.show', $attraction) }}" 
                                           class="text-blue-600 hover:text-blue-900 p-1 sm:p-2 rounded-lg hover:bg-blue-50 transition-colors" 
                                           title="Visualizar">
                                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </a>
                                        <a href="{{ route('admin.attractions.edit', $attraction) }}" 
                                           class="text-indigo-600 hover:text-indigo-900 p-1 sm:p-2 rounded-lg hover:bg-indigo-50 transition-colors" 
                                           title="Editar">
                                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                        </a>
                                        <form action="{{ route('admin.attractions.destroy', $attraction) }}" method="POST" class="inline" onsubmit="return confirm('Tem certeza que deseja excluir este ponto turístico?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="text-red-600 hover:text-red-900 p-1 sm:p-2 rounded-lg hover:bg-red-50 transition-colors" 
                                                    title="Excluir">
                                                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            <div class="mt-8 flex flex-col items-center space-y-4">
                <!-- Info sobre paginação -->
                <div class="text-sm text-gray-600">
                    @if(request('search') || request('categoria') || request('pais'))
                        Mostrando {{ $attractions->firstItem() ?? 0 }} a {{ $attractions->lastItem() ?? 0 }} de {{ $attractions->total() }} resultados encontrados
                    @else
                        Mostrando {{ $attractions->firstItem() ?? 0 }} a {{ $attractions->lastItem() ?? 0 }} de {{ $attractions->total() }} pontos turísticos
                    @endif
                </div>
                <!-- Links de paginação -->
                <div class="bg-white rounded-xl shadow-lg px-6 py-4">
                {{ $attractions->links() }}
                </div>
            </div>
        @else
            <div class="text-center py-16">
                <div class="w-24 h-24 bg-gradient-to-br from-blue-100 to-purple-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-12 h-12 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-3">Nenhum ponto turístico cadastrado</h3>
                <p class="text-gray-600 mb-8 max-w-md mx-auto">Comece adicionando o primeiro ponto turístico para gerenciar sua coleção de destinos incríveis.</p>
                <a href="{{ route('admin.attractions.create') }}" class="btn-success text-white px-8 py-4 rounded-xl font-semibold inline-flex items-center space-x-2 shadow-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    <span>Adicionar Primeiro Ponto Turístico</span>
                </a>
            </div>
        @endif
    </main>

    <!-- JavaScript para busca automática -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search');
            const categoriaSelect = document.getElementById('categoria');
            const paisSelect = document.getElementById('pais');
            let searchTimeout;

            // Função para submeter o formulário
            function submitForm() {
                const form = document.querySelector('form[method="GET"]');
                if (form) {
                    form.submit();
                }
            }

            // Busca automática após parar de digitar (500ms)
            searchInput.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(submitForm, 500);
            });

            // Filtros automáticos ao mudar
            categoriaSelect.addEventListener('change', submitForm);
            paisSelect.addEventListener('change', submitForm);

            // Foco no campo de busca
            searchInput.focus();
        });
    </script>
</body>
</html>
