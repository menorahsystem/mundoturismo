<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $attraction->nome }} - ExploreNow</title>
    
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-9K8HP18JEE"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-9K8HP18JEE');
    </script>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    
    <!-- Styles -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
    @endif
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b">
        <div class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <a href="{{ route('home') }}" class="text-blue-600 hover:text-blue-800">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                    </a>
                    <h1 class="text-2xl font-bold text-gray-800">{{ $attraction->nome }}</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <!-- Language Selector -->
                    <div class="flex items-center space-x-2">
                        <span class="text-lg">🌍</span>
                        <select id="language-selector" class="text-sm border border-gray-300 rounded px-2 py-1">
                            <option value="pt" {{ app()->getLocale() == 'pt' ? 'selected' : '' }}>PT</option>
                            <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>EN</option>
                            <option value="es" {{ app()->getLocale() == 'es' ? 'selected' : '' }}>ES</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Content -->
    <main class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <!-- Hero Image -->
                <div class="relative h-96 bg-gradient-to-br {{ $attraction->gradient }}">
                    @if($attraction->imagem_url)
                        <img src="{{ $attraction->imagem_url }}" alt="{{ $attraction->nome }}" class="w-full h-full object-cover">
                    @else
                        <div class="absolute inset-0 flex items-center justify-center text-white text-9xl">
                            {{ $attraction->icon }}
                        </div>
                    @endif
                    <div class="absolute top-4 right-4">
                        <span class="px-3 py-1 bg-{{ $attraction->category_color }}-100 text-{{ $attraction->category_color }}-800 text-sm font-medium rounded-full">
                            {{ $attraction->categoria }}
                        </span>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-8">
                    <!-- Title and Location -->
                    <div class="mb-8">
                        <h1 class="text-4xl font-bold text-gray-800 mb-4">{{ $attraction->nome }}</h1>
                        <div class="flex items-center text-gray-600 mb-4">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="text-lg">{{ $attraction->localizacao }}</span>
                        </div>
                        @if($attraction->endereco)
                            <p class="text-gray-600">{{ $attraction->endereco }}</p>
                        @endif
                    </div>

                    <!-- Description -->
                    @if($attraction->descricao)
                        <div class="mb-8">
                            <h2 class="text-2xl font-semibold text-gray-800 mb-4">
                                @if(app()->getLocale() == 'pt')
                                    Sobre
                                @elseif(app()->getLocale() == 'en')
                                    About
                                @else
                                    Acerca de
                                @endif
                            </h2>
                            <div class="prose max-w-none">
                                <p class="text-gray-700 text-lg leading-relaxed">{{ $attraction->descricao }}</p>
                            </div>
                        </div>
                    @endif

                    <!-- Action Buttons -->
                    <div class="mb-8">
                        <div class="flex flex-col sm:flex-row gap-4">
                            <!-- Navigation Buttons -->
                            <div class="flex flex-col sm:flex-row items-center gap-4">
                                <!-- Como Chegar Text -->
                                <span class="text-lg font-semibold text-gray-700">
                                    @if(app()->getLocale() == 'pt') 🗺️ Como Chegar: @elseif(app()->getLocale() == 'en') 🗺️ Get Directions: @else 🗺️ Cómo Llegar: @endif
                                </span>
                                
                                <div class="flex items-center space-x-3">
                                    <!-- Waze Button -->
                                    <a href="{{ $attraction->waze_url }}" 
                                       target="_blank" 
                                       class="flex items-center justify-center bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg text-lg font-semibold transition-colors duration-200 shadow-lg hover:shadow-xl transform hover:scale-105"
                                       title="Navegar com Waze">
                                        <i class="fa-brands fa-waze text-3xl mr-2"></i>
                                        <span>Waze</span>
                                    </a>
                                    
                                    <!-- Google Maps Button -->
                                    <a href="{{ $attraction->google_maps_navigation_url }}" 
                                       target="_blank" 
                                       class="flex items-center justify-center bg-red-500 hover:bg-red-600 text-white px-6 py-3 rounded-lg text-lg font-semibold transition-colors duration-200 shadow-lg hover:shadow-xl transform hover:scale-105"
                                       title="Navegar com Google Maps">
                                                                    <svg class="w-8 h-8 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                            </svg>
                                        <span>Google Maps</span>
                                    </a>
                                </div>
                            </div>
                            
                            <!-- Back to Home Button -->
                            <a href="{{ route('home') }}" 
                               class="flex items-center justify-center space-x-3 bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg text-lg font-semibold transition-colors duration-200 shadow-lg hover:shadow-xl transform hover:scale-105">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                </svg>
                                <span>
                                    @if(app()->getLocale() == 'pt') Voltar ao Início @elseif(app()->getLocale() == 'en') Back to Home @else Volver al Inicio @endif
                                </span>
                            </a>
                        </div>
                    </div>

                    <!-- Additional Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">
                                @if(app()->getLocale() == 'pt')
                                    Informações
                                @elseif(app()->getLocale() == 'en')
                                    Information
                                @else
                                    Información
                                @endif
                            </h3>
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <span class="text-gray-600 w-24">
                                        @if(app()->getLocale() == 'pt')
                                            Categoria:
                                        @elseif(app()->getLocale() == 'en')
                                            Category:
                                        @else
                                            Categoría:
                                        @endif
                                    </span>
                                    <span class="px-3 py-1 bg-{{ $attraction->category_color }}-100 text-{{ $attraction->category_color }}-800 text-sm font-medium rounded-full">
                                        {{ $attraction->categoria }}
                                    </span>
                                </div>
                                <div class="flex items-center">
                                    <span class="text-gray-600 w-24">
                                        @if(app()->getLocale() == 'pt')
                                            Cidade:
                                        @elseif(app()->getLocale() == 'en')
                                            City:
                                        @else
                                            Ciudad:
                                        @endif
                                    </span>
                                    <span class="text-gray-800">{{ $attraction->cidade }}</span>
                                </div>
                                @if($attraction->estado)
                                <div class="flex items-center">
                                    <span class="text-gray-600 w-24">
                                        @if(app()->getLocale() == 'pt')
                                            Estado:
                                        @elseif(app()->getLocale() == 'en')
                                            State:
                                        @else
                                            Estado:
                                        @endif
                                    </span>
                                    <span class="text-gray-800">{{ $attraction->estado }}</span>
                                </div>
                                @endif
                                <div class="flex items-center">
                                    <span class="text-gray-600 w-24">
                                        @if(app()->getLocale() == 'pt')
                                            País:
                                        @elseif(app()->getLocale() == 'en')
                                            Country:
                                        @else
                                            País:
                                        @endif
                                    </span>
                                    <span class="text-gray-800">{{ $attraction->pais }}</span>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">
                                @if(app()->getLocale() == 'pt')
                                    Nomes em Outros Idiomas
                                @elseif(app()->getLocale() == 'en')
                                    Names in Other Languages
                                @else
                                    Nombres en Otros Idiomas
                                @endif
                            </h3>
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <span class="text-gray-600 w-16">PT:</span>
                                    <span class="text-gray-800">{{ $attraction->nome_pt }}</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="text-gray-600 w-16">EN:</span>
                                    <span class="text-gray-800">{{ $attraction->nome_en }}</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="text-gray-600 w-16">ES:</span>
                                    <span class="text-gray-800">{{ $attraction->nome_es }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Back Button -->
                    <div class="mt-12 pt-8 border-t">
                        <a href="{{ route('home') }}" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            @if(app()->getLocale() == 'pt')
                                Voltar à Página Inicial
                            @elseif(app()->getLocale() == 'en')
                                Back to Homepage
                            @else
                                Volver a la Página Principal
                            @endif
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Language selector functionality
        document.getElementById('language-selector').addEventListener('change', function() {
            const locale = this.value;
            const currentUrl = window.location.href;
            const newUrl = currentUrl.replace(/\/[a-z]{2}\//, '/' + locale + '/');
            window.location.href = newUrl;
        });
    </script>
</body>
</html>

