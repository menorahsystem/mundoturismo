<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-adsense-account" content="ca-pub-3039233942822179">
    <title>
        @if(app()->getLocale() == 'pt')
            ExploreNow
        @elseif(app()->getLocale() == 'en')
            ExploreNow
        @else
            ExploreNow
        @endif
    </title>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-9K8HP18JEE"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-9K8HP18JEE');
    </script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3039233942822179"
     crossorigin="anonymous"></script>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Simple responsive grid */
        .attractions-grid {
            display: grid;
            gap: 1.5rem;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            max-width: 100%;
        }
        
        /* Ensure consistent card sizes */
        .attractions-grid > div {
            width: 100%;
            max-width: 400px;
            justify-self: center;
        }
        
        /* Force consistent sizing on all screen sizes */
        @media (min-width: 768px) {
            .attractions-grid {
                grid-template-columns: repeat(auto-fit, minmax(300px, 350px));
                justify-content: center;
            }
        }
        
        @media (min-width: 1024px) {
            .attractions-grid {
                grid-template-columns: repeat(auto-fit, minmax(300px, 350px));
                justify-content: center;
            }
        }
        
        @media (min-width: 1280px) {
            .attractions-grid {
                grid-template-columns: repeat(auto-fit, minmax(300px, 350px));
                justify-content: center;
            }
        }
        
        /* Image Carousel Styles */
        .carousel-container {
            position: relative;
            overflow: hidden;
            border-radius: 1rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .carousel-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }
        
        .carousel-slide.active {
            opacity: 1;
        }
        
        .carousel-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .carousel-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
            color: white;
            padding: 2rem;
            text-align: center;
        }
        
        .carousel-indicators {
            position: absolute;
            bottom: 1rem;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 0.5rem;
        }
        
        .carousel-indicator {
            width: 0.75rem;
            height: 0.75rem;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: background 0.3s ease;
        }
        
        .carousel-indicator.active {
            background: white;
        }
        
        .carousel-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
            padding: 0.75rem;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }
        
        .carousel-nav:hover {
            background: rgba(255, 255, 255, 0.3);
        }
        
        .carousel-nav.prev {
            left: 1rem;
        }
        
        .carousel-nav.next {
            right: 1rem;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Header Section -->
    <header class="relative bg-gradient-to-br from-blue-500 via-blue-600 to-green-600 overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        </div>
        
        <!-- Language Selector -->
        <div class="absolute top-3 sm:top-4 right-3 sm:right-4 z-20">
            <div class="flex items-center space-x-2 bg-white/20 backdrop-blur-sm rounded-lg px-2 sm:px-3 py-1.5 sm:py-2 border border-white/30">
                <div class="relative">
                    @php
                        $currentLocale = app()->getLocale();
                        $currentFlag = $currentLocale === 'pt' ? 'br' : ($currentLocale === 'en' ? 'us' : 'es');
                        $currentLabel = $currentLocale === 'pt' ? 'PT - Português' : ($currentLocale === 'en' ? 'EN - English' : 'ES - Español');
                    @endphp
                    <button id="lang-btn" type="button" class="flex items-center space-x-2 text-white text-xs sm:text-sm font-medium">
                        <img src="https://flagcdn.com/w20/{{ $currentFlag }}.png" alt="flag" class="w-5 h-4 rounded-sm"/>
                        <span>{{ $currentLabel }}</span>
                        <svg class="w-3 h-3 sm:w-4 sm:h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div id="lang-menu" class="absolute right-0 mt-2 w-44 bg-white text-gray-800 rounded-lg shadow-lg overflow-hidden hidden">
                        <a href="{{ route('language.change', 'pt') }}" class="flex items-center px-3 py-2 hover:bg-gray-100 gap-2">
                            <img src="https://flagcdn.com/w20/br.png" alt="BR" class="w-5 h-4 rounded-sm"/>
                            <span class="text-sm">PT - Português</span>
                        </a>
                        <a href="{{ route('language.change', 'en') }}" class="flex items-center px-3 py-2 hover:bg-gray-100 gap-2">
                            <img src="https://flagcdn.com/w20/us.png" alt="US" class="w-5 h-4 rounded-sm"/>
                            <span class="text-sm">EN - English</span>
                        </a>
                        <a href="{{ route('language.change', 'es') }}" class="flex items-center px-3 py-2 hover:bg-gray-100 gap-2">
                            <img src="https://flagcdn.com/w20/es.png" alt="ES" class="w-5 h-4 rounded-sm"/>
                            <span class="text-sm">ES - Español</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Header Content -->
        <div class="relative z-10 container mx-auto px-4 py-16">
            <div class="flex items-center justify-end mb-4 gap-4 text-white/90 text-sm">
                <a href="{{ route('home') }}" class="hover:underline">
                    @if(app()->getLocale() == 'pt') Início @elseif(app()->getLocale() == 'en') Home @else Inicio @endif
                </a>
                <a href="{{ route('feedback.index') }}" class="hover:underline">
                    @if(app()->getLocale() == 'pt') Comentários e Sugestões @elseif(app()->getLocale() == 'en') Comments and Suggestions @else Comentarios y Sugerencias @endif
                </a>
            </div>
            <div class="text-center text-white">
                <h1 class="text-5xl md:text-6xl font-bold mb-6">
                    @if(app()->getLocale() == 'pt')
                        ExploreNow
                    @elseif(app()->getLocale() == 'en')
                        ExploreNow
                    @else
                        ExploreNow
                    @endif
                </h1>
                <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto">
                    @if(app()->getLocale() == 'pt')
                        Descubra os destinos mais incríveis do mundo e planeje sua próxima aventura inesquecível
                    @elseif(app()->getLocale() == 'en')
                        Discover the most amazing destinations in the world and plan your next unforgettable adventure
                    @else
                        Descubre los destinos más increíbles del mundo y planifica tu próxima aventura inolvidable
                    @endif
                </p>
                
                <!-- Search Section -->
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 max-w-4xl mx-auto">
                    <h2 class="text-2xl font-semibold mb-6">
                        @if(app()->getLocale() == 'pt')
                            Encontre seu destino perfeito
                        @elseif(app()->getLocale() == 'en')
                            Find your perfect destination
                        @else
                            Encuentra tu destino perfecto
                        @endif
                    </h2>
                    
                    <form id="search-form" action="{{ route('search') }}" method="GET" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-4">
                        @csrf
                        <input type="text" name="search" 
                               value="{{ request('search') }}"
                               placeholder="@if(app()->getLocale() == 'pt')Buscar por nome...@elseif(app()->getLocale() == 'en')Search by name...@else Buscar por nombre...@endif" 
                               class="px-4 py-3 text-black rounded-lg border-0 focus:ring-2 focus:ring-blue-300 focus:outline-none">
                        
                        <select name="categoria" class="px-4 text-black py-3 rounded-lg border-0 focus:ring-2 focus:ring-blue-300 focus:outline-none">
                            <option value="">
                                @if(app()->getLocale() == 'pt')
                                    Todas as categorias
                                @elseif(app()->getLocale() == 'en')
                                    All categories
                                @else
                                    Todas las categorías
                                @endif
                            </option>
                            <option value="Histórico" {{ request('categoria') == 'Histórico' ? 'selected' : '' }}>
                                @if(app()->getLocale() == 'pt')
                                    Histórico
                                @elseif(app()->getLocale() == 'en')
                                    Historical
                                @else
                                    Histórico
                                @endif
                            </option>
                            <option value="Natural" {{ request('categoria') == 'Natural' ? 'selected' : '' }}>
                                @if(app()->getLocale() == 'pt')
                                    Natural
                                @elseif(app()->getLocale() == 'en')
                                    Natural
                                @else
                                    Natural
                                @endif
                            </option>
                            <option value="Cultural" {{ request('categoria') == 'Cultural' ? 'selected' : '' }}>
                                @if(app()->getLocale() == 'pt')
                                    Cultural
                                @elseif(app()->getLocale() == 'en')
                                    Cultural
                                @else
                                    Cultural
                                @endif
                            </option>
                            <option value="Religioso" {{ request('categoria') == 'Religioso' ? 'selected' : '' }}>
                                @if(app()->getLocale() == 'pt')
                                    Religioso
                                @elseif(app()->getLocale() == 'en')
                                    Religious
                                @else
                                    Religioso
                                @endif
                            </option>
                            <option value="Moderno" {{ request('categoria') == 'Moderno' ? 'selected' : '' }}>
                                @if(app()->getLocale() == 'pt')
                                    Moderno
                                @elseif(app()->getLocale() == 'en')
                                    Modern
                                @else
                                    Moderno
                                @endif
                            </option>
                        </select>
                        
                        <select name="pais" class="px-4 text-black py-3 rounded-lg border-0 focus:ring-2 focus:ring-blue-300 focus:outline-none">
                            <option value="">
                                @if(app()->getLocale() == 'pt')
                                    Todos os países
                                @elseif(app()->getLocale() == 'en')
                                    All countries
                                @else
                                    Todos los países
                                @endif
                            </option>
                            @foreach($touristAttractions->pluck('pais')->unique()->sort() as $pais)
                                <option value="{{ $pais }}" {{ request('pais') == $pais ? 'selected' : '' }}>
                                    @if(app()->getLocale() == 'pt')
                                        @switch($pais)
                                            @case('Brasil')
                                                Brasil
                                                @break
                                            @case('Estados Unidos')
                                                Estados Unidos
                                                @break
                                            @case('Reino Unido')
                                                Reino Unido
                                                @break
                                            @case('França')
                                                França
                                                @break
                                            @case('Alemanha')
                                                Alemanha
                                                @break
                                            @case('Itália')
                                                Itália
                                                @break
                                            @case('Espanha')
                                                Espanha
                                                @break
                                            @case('Portugal')
                                                Portugal
                                                @break
                                            @case('México')
                                                México
                                                @break
                                            @case('Argentina')
                                                Argentina
                                                @break
                                            @case('Chile')
                                                Chile
                                                @break
                                            @case('Peru')
                                                Peru
                                                @break
                                            @case('Colômbia')
                                                Colômbia
                                                @break
                                            @case('Japão')
                                                Japão
                                                @break
                                            @case('China')
                                                China
                                                @break
                                            @case('Índia')
                                                Índia
                                                @break
                                            @case('Austrália')
                                                Austrália
                                                @break
                                            @case('Canadá')
                                                Canadá
                                                @break
                                            @default
                                                {{ $pais }}
                                        @endswitch
                                    @elseif(app()->getLocale() == 'en')
                                        @switch($pais)
                                            @case('Brasil')
                                                Brazil
                                                @break
                                            @case('Estados Unidos')
                                                United States
                                                @break
                                            @case('Reino Unido')
                                                United Kingdom
                                                @break
                                            @case('França')
                                                France
                                                @break
                                            @case('Alemanha')
                                                Germany
                                                @break
                                            @case('Itália')
                                                Italy
                                                @break
                                            @case('Espanha')
                                                Spain
                                                @break
                                            @case('Portugal')
                                                Portugal
                                                @break
                                            @case('México')
                                                Mexico
                                                @break
                                            @case('Argentina')
                                                Argentina
                                                @break
                                            @case('Chile')
                                                Chile
                                                @break
                                            @case('Peru')
                                                Peru
                                                @break
                                            @case('Colômbia')
                                                Colombia
                                                @break
                                            @case('Japão')
                                                Japan
                                                @break
                                            @case('China')
                                                China
                                                @break
                                            @case('Índia')
                                                India
                                                @break
                                            @case('Austrália')
                                                Australia
                                                @break
                                            @case('Canadá')
                                                Canada
                                                @break
                                            @default
                                                {{ $pais }}
                                        @endswitch
                                    @else
                                        @switch($pais)
                                            @case('Brasil')
                                                Brasil
                                                @break
                                            @case('Estados Unidos')
                                                Estados Unidos
                                                @break
                                            @case('Reino Unido')
                                                Reino Unido
                                                @break
                                            @case('França')
                                                Francia
                                                @break
                                            @case('Alemanha')
                                                Alemania
                                                @break
                                            @case('Itália')
                                                Italia
                                                @break
                                            @case('Espanha')
                                                España
                                                @break
                                            @case('Portugal')
                                                Portugal
                                                @break
                                            @case('México')
                                                México
                                                @break
                                            @case('Argentina')
                                                Argentina
                                                @break
                                            @case('Chile')
                                                Chile
                                                @break
                                            @case('Peru')
                                                Perú
                                                @break
                                            @case('Colômbia')
                                                Colombia
                                                @break
                                            @case('Japão')
                                                Japón
                                                @break
                                            @case('China')
                                                China
                                                @break
                                            @case('Índia')
                                                India
                                                @break
                                            @case('Austrália')
                                                Australia
                                                @break
                                            @case('Canadá')
                                                Canadá
                                                @break
                                            @default
                                                {{ $pais }}
                                        @endswitch
                                    @endif
                                </option>
                            @endforeach
                        </select>
                        
                        <select name="cidade" class="px-4 text-black py-3 rounded-lg border-0 focus:ring-2 focus:ring-blue-300 focus:outline-none">
                            <option value="">
                                @if(app()->getLocale() == 'pt')
                                    Todas as cidades
                                @elseif(app()->getLocale() == 'en')
                                    All cities
                                @else
                                    Todas las ciudades
                                @endif
                            </option>
                            @foreach($touristAttractions->pluck('cidade')->unique()->sort() as $cidade)
                                <option value="{{ $cidade }}" {{ request('cidade') == $cidade ? 'selected' : '' }}>
                                    @if(app()->getLocale() == 'pt')
                                        {{ $cidade }}
                                    @elseif(app()->getLocale() == 'en')
                                        @switch($cidade)
                                            @case('Rio de Janeiro')
                                                Rio de Janeiro
                                                @break
                                            @case('São Paulo')
                                                São Paulo
                                                @break
                                            @case('Brasília')
                                                Brasília
                                                @break
                                            @case('Salvador')
                                                Salvador
                                                @break
                                            @case('Recife')
                                                Recife
                                                @break
                                            @case('Fortaleza')
                                                Fortaleza
                                                @break
                                            @case('Belo Horizonte')
                                                Belo Horizonte
                                                @break
                                            @case('Curitiba')
                                                Curitiba
                                                @break
                                            @case('Porto Alegre')
                                                Porto Alegre
                                                @break
                                            @case('Manaus')
                                                Manaus
                                                @break
                                            @case('Nova York')
                                                New York
                                                @break
                                            @case('Los Angeles')
                                                Los Angeles
                                                @break
                                            @case('Chicago')
                                                Chicago
                                                @break
                                            @case('Miami')
                                                Miami
                                                @break
                                            @case('Las Vegas')
                                                Las Vegas
                                                @break
                                            @case('San Francisco')
                                                San Francisco
                                                @break
                                            @case('Londres')
                                                London
                                                @break
                                            @case('Paris')
                                                Paris
                                                @break
                                            @case('Roma')
                                                Rome
                                                @break
                                            @case('Madri')
                                                Madrid
                                                @break
                                            @case('Barcelona')
                                                Barcelona
                                                @break
                                            @case('Berlim')
                                                Berlin
                                                @break
                                            @case('Munique')
                                                Munich
                                                @break
                                            @case('Amsterdã')
                                                Amsterdam
                                                @break
                                            @case('Viena')
                                                Vienna
                                                @break
                                            @case('Praga')
                                                Prague
                                                @break
                                            @case('Budapeste')
                                                Budapest
                                                @break
                                            @case('Cidade do México')
                                                Mexico City
                                                @break
                                            @case('Buenos Aires')
                                                Buenos Aires
                                                @break
                                            @case('Santiago')
                                                Santiago
                                                @break
                                            @case('Lima')
                                                Lima
                                                @break
                                            @case('Bogotá')
                                                Bogotá
                                                @break
                                            @case('Tóquio')
                                                Tokyo
                                                @break
                                            @case('Pequim')
                                                Beijing
                                                @break
                                            @case('Xangai')
                                                Shanghai
                                                @break
                                            @case('Hong Kong')
                                                Hong Kong
                                                @break
                                            @case('Singapura')
                                                Singapore
                                                @break
                                            @case('Bangkok')
                                                Bangkok
                                                @break
                                            @case('Seul')
                                                Seoul
                                                @break
                                            @case('Sydney')
                                                Sydney
                                                @break
                                            @case('Melbourne')
                                                Melbourne
                                                @break
                                            @case('Toronto')
                                                Toronto
                                                @break
                                            @case('Vancouver')
                                                Vancouver
                                                @break
                                            @case('Montreal')
                                                Montreal
                                                @break
                                            @default
                                                {{ $cidade }}
                                        @endswitch
                                    @else
                                        @switch($cidade)
                                            @case('Rio de Janeiro')
                                                Río de Janeiro
                                                @break
                                            @case('São Paulo')
                                                São Paulo
                                                @break
                                            @case('Brasília')
                                                Brasilia
                                                @break
                                            @case('Salvador')
                                                Salvador
                                                @break
                                            @case('Recife')
                                                Recife
                                                @break
                                            @case('Fortaleza')
                                                Fortaleza
                                                @break
                                            @case('Belo Horizonte')
                                                Belo Horizonte
                                                @break
                                            @case('Curitiba')
                                                Curitiba
                                                @break
                                            @case('Porto Alegre')
                                                Porto Alegre
                                                @break
                                            @case('Manaus')
                                                Manaus
                                                @break
                                            @case('Nova York')
                                                Nueva York
                                                @break
                                            @case('Los Angeles')
                                                Los Ángeles
                                                @break
                                            @case('Chicago')
                                                Chicago
                                                @break
                                            @case('Miami')
                                                Miami
                                                @break
                                            @case('Las Vegas')
                                                Las Vegas
                                                @break
                                            @case('San Francisco')
                                                San Francisco
                                                @break
                                            @case('Londres')
                                                Londres
                                                @break
                                            @case('Paris')
                                                París
                                                @break
                                            @case('Roma')
                                                Roma
                                                @break
                                            @case('Madri')
                                                Madrid
                                                @break
                                            @case('Barcelona')
                                                Barcelona
                                                @break
                                            @case('Berlim')
                                                Berlín
                                                @break
                                            @case('Munique')
                                                Múnich
                                                @break
                                            @case('Amsterdã')
                                                Ámsterdam
                                                @break
                                            @case('Viena')
                                                Viena
                                                @break
                                            @case('Praga')
                                                Praga
                                                @break
                                            @case('Budapeste')
                                                Budapest
                                                @break
                                            @case('Cidade do México')
                                                Ciudad de México
                                                @break
                                            @case('Buenos Aires')
                                                Buenos Aires
                                                @break
                                            @case('Santiago')
                                                Santiago
                                                @break
                                            @case('Lima')
                                                Lima
                                                @break
                                            @case('Bogotá')
                                                Bogotá
                                                @break
                                            @case('Tóquio')
                                                Tokio
                                                @break
                                            @case('Pequim')
                                                Pekín
                                                @break
                                            @case('Xangai')
                                                Shanghái
                                                @break
                                            @case('Hong Kong')
                                                Hong Kong
                                                @break
                                            @case('Singapura')
                                                Singapur
                                                @break
                                            @case('Bangkok')
                                                Bangkok
                                                @break
                                            @case('Seul')
                                                Seúl
                                                @break
                                            @case('Sydney')
                                                Sídney
                                                @break
                                            @case('Melbourne')
                                                Melbourne
                                                @break
                                            @case('Toronto')
                                                Toronto
                                                @break
                                            @case('Vancouver')
                                                Vancouver
                                                @break
                                            @case('Montreal')
                                                Montreal
                                                @break
                                            @default
                                                {{ $cidade }}
                                        @endswitch
                                    @endif
                                </option>
                            @endforeach
                        </select>
                        
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-200 shadow-lg hover:shadow-xl">
                                   @if(app()->getLocale() == 'pt')
                                       Buscar
                                   @elseif(app()->getLocale() == 'en')
                                       Search
                                   @else
                                       Buscar
                                   @endif
                               </button>
                    </form>
                    
                    <!-- Clear Filters -->
                               @if(request('search') || request('categoria') || request('pais') || request('cidade'))
                        <div class="mt-4 text-center">
                            <a href="{{ route('home') }}" class="text-white/80 hover:text-white text-sm underline">
                                       @if(app()->getLocale() == 'pt')
                                    Limpar filtros
                                       @elseif(app()->getLocale() == 'en')
                                    Clear filters
                                       @else
                                    Limpiar filtros
                                       @endif
                                   </a>
                        </div>
                               @endif
                </div>
            </div>
        </div>
    </header>

    <!-- Image Carousel Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-8">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                    @if(app()->getLocale() == 'pt')
                        Destinos em Destaque
                    @elseif(app()->getLocale() == 'en')
                        Featured Destinations
                    @else
                        Destinos Destacados
                    @endif
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    @if(app()->getLocale() == 'pt')
                        Conheça alguns dos pontos turísticos mais incríveis do mundo
                    @elseif(app()->getLocale() == 'en')
                        Discover some of the most amazing tourist attractions in the world
                    @else
                        Conoce algunos de los puntos turísticos más increíbles del mundo
                    @endif
                </p>
            </div>
            
            <div class="carousel-container h-64 md:h-80 lg:h-96 max-w-4xl mx-auto">
                @php
                    $featuredAttractions = $touristAttractions->take(4);
                @endphp
                
                @foreach($featuredAttractions as $index => $attraction)
                    <div class="carousel-slide {{ $index === 0 ? 'active' : '' }}" data-slide="{{ $index }}">
                        @if($attraction->imagem_url)
                            <img src="{{ $attraction->imagem_url }}" alt="{{ $attraction->nome }}" class="carousel-image">
                        @else
                            <div class="carousel-image bg-gradient-to-br {{ $attraction->gradient }} flex items-center justify-center">
                                <span class="text-8xl">{{ $attraction->icon }}</span>
                            </div>
                        @endif
                        
                        <div class="carousel-overlay">
                            <h3 class="text-2xl md:text-3xl font-bold mb-2">{{ $attraction->nome }}</h3>
                            <p class="text-lg mb-3">
                                {{ $attraction->cidade }}
                                @if($attraction->estado)
                                    , {{ $attraction->estado }}
                                @endif
                                , {{ $attraction->pais }}
                            </p>
                            <span class="inline-block px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full text-sm font-medium">
                                {{ $attraction->categoria }}
                            </span>
                        </div>
                    </div>
                @endforeach
                
                <!-- Navigation Buttons -->
                <button class="carousel-nav prev" onclick="changeSlide(-1)">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
                <button class="carousel-nav next" onclick="changeSlide(1)">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
                
                <!-- Indicators -->
                <div class="carousel-indicators">
                    @foreach($featuredAttractions as $index => $attraction)
                        <div class="carousel-indicator {{ $index === 0 ? 'active' : '' }}" onclick="goToSlide({{ $index }})"></div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="container mx-auto px-4 py-8">
        <!-- Anúncio Horizontal Topo (Home) -->
        <div class="mb-8 flex justify-center">
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-3039233942822179"
                 data-ad-slot="4188511345"
                 data-ad-format="auto"
                 data-full-width-responsive="true"></ins>
            <script>
                 (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>

        @if($touristAttractions->count() > 0)
            <div class="attractions-grid w-full">
                @foreach($touristAttractions as $attraction)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="relative h-48 bg-gradient-to-br {{ $attraction->gradient }}">
                        @if($attraction->imagem_url)
                            <img src="{{ $attraction->imagem_url }}" alt="{{ $attraction->nome }}" class="w-full h-full object-cover">
                        @else
                            <div class="absolute inset-0 flex items-center justify-center text-white text-6xl">
                                {{ $attraction->icon }}
                            </div>
                        @endif
                    </div>
                    
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="text-xl font-semibold text-gray-800">{{ $attraction->nome }}</h3>
                            <span class="px-3 py-1 bg-{{ $attraction->category_color }}-100 text-{{ $attraction->category_color }}-800 text-xs font-medium rounded-full">{{ $attraction->categoria }}</span>
                        </div>
                        
                        <p class="text-sm text-gray-600 mb-3">
                            {{ $attraction->cidade }}
                            @if($attraction->estado)
                                , {{ $attraction->estado }}
                            @endif
                            , {{ $attraction->pais }}
                        </p>
                        
                        @if($attraction->descricao)
                            <p class="text-sm text-gray-500 mb-4 line-clamp-2">{{ Str::limit($attraction->descricao, 120) }}</p>
                        @endif
                        
                        <!-- Action Buttons -->
                        <div class="flex items-center justify-between">
                            <!-- Navigation Buttons - Only on Mobile -->
                            <div class="flex items-center space-x-2 sm:hidden">
                                <span class="text-sm font-medium text-gray-700">
                                    @if(app()->getLocale() == 'pt') Como Chegar: @elseif(app()->getLocale() == 'en') Get Directions: @else Cómo Llegar: @endif
                                </span>
                                
                                <!-- Waze Button -->
                                <a href="{{ $attraction->waze_url }}" 
                                   target="_blank" 
                                   class="flex items-center justify-center bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-lg transition-colors duration-200 shadow-md hover:shadow-lg"
                                   title="Navegar com Waze">
                                    <i class="fa-brands fa-waze text-2xl"></i>
                                </a>
                                
                                <!-- Google Maps Button -->
                                <a href="{{ $attraction->google_maps_navigation_url }}" 
                                   target="_blank" 
                                   class="flex items-center justify-center bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg transition-colors duration-200 shadow-md hover:shadow-lg"
                                   title="Navegar com Google Maps">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                    </svg>
                                </a>
                    </div>
                    
                            <!-- View Details Button -->
                        <button onclick="openModal({{ $attraction->id }})" 
                                    class="bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-lg transition-colors duration-200 shadow-md hover:shadow-lg"
                                    title="@if(app()->getLocale() == 'pt') Ver Detalhes @elseif(app()->getLocale() == 'en') View Details @else Ver Detalles @endif">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Anúncio Horizontal Meio (após os cards - Home) -->
            <div class="mt-8 mb-8 flex justify-center">
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-3039233942822179"
                     data-ad-slot="4126584552"
                     data-ad-format="horizontal"
                     data-full-width-responsive="true"></ins>
                <script>
                     (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
        @else
            <div class="text-center py-12">
                <div class="text-6xl mb-4">🔍</div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">
                    @if(app()->getLocale() == 'pt')
                        Nenhum ponto turístico encontrado
                    @elseif(app()->getLocale() == 'en')
                        No tourist attractions found
                    @else
                        No se encontraron atracciones turísticas
                    @endif
                </h3>
                <p class="text-gray-600">
                    @if(app()->getLocale() == 'pt')
                        Tente ajustar os filtros de busca para encontrar mais resultados.
                    @elseif(app()->getLocale() == 'en')
                        Try adjusting the search filters to find more results.
                    @else
                        Intenta ajustar los filtros de búsqueda para encontrar más resultados.
                    @endif
                </p>
            </div>
        @endif
    </section>

    <!-- Modal -->
    <div id="attractionModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg max-w-4xl w-full max-h-[90vh] overflow-y-auto">
            <div class="p-6">
                <div class="flex justify-between items-start mb-6">
                    <h2 id="modalTitle" class="text-3xl font-bold text-gray-800"></h2>
                    <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                
                <div id="modalContent" class="space-y-6">
                    <!-- Content will be loaded here -->
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-100 mt-16">
        <div class="container mx-auto px-4 py-8">
            <div class="text-center text-gray-600">
                <p>&copy; 2024 
                    @if(app()->getLocale() == 'pt')
                        ExploreNow. Todos os direitos reservados.
                    @elseif(app()->getLocale() == 'en')
                        ExploreNow. All rights reserved.
                    @else
                        ExploreNow. Todos los derechos reservados.
                    @endif
                </p>
                <p class="mt-2">
                    <a href="{{ route('feedback.index') }}" class="text-blue-600 hover:underline">
                        @if(app()->getLocale() == 'pt')
                            Comentários e Sugestões
                        @elseif(app()->getLocale() == 'en')
                            Comments and Suggestions
                        @else
                            Comentarios y Sugerencias
                        @endif
                    </a>
                </p>
            </div>
        </div>
    </footer>

    <script>
        // Language selector functionality
        // Old select removed; toggle custom dropdown
        const langBtn = document.getElementById('lang-btn');
        const langMenu = document.getElementById('lang-menu');
        if (langBtn && langMenu) {
            langBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                langMenu.classList.toggle('hidden');
            });
            document.addEventListener('click', function() {
                if (!langMenu.classList.contains('hidden')) {
                    langMenu.classList.add('hidden');
                }
            });
        }

        // Modal functionality
        function openModal(attractionId) {
            // Find the attraction data from the page
            const attractions = @json($touristAttractions);
            const attraction = attractions.find(a => a.id === attractionId);
            
            if (attraction) {
                // Get current language
                const currentLang = '{{ app()->getLocale() }}';
                
                // Get language-specific name and description
                const name = attraction[`nome_${currentLang}`] || attraction.nome_pt || 'Nome não disponível';
                const description = attraction[`descricao_${currentLang}`] || attraction.descricao_pt || '';
                
                // Ensure all required properties are available
                const location = attraction.localizacao || `${attraction.cidade || ''}, ${attraction.pais || ''}`;
                const categoryColor = attraction.category_color || 'gray';
                const gradient = attraction.gradient || 'from-gray-400 to-gray-600';
                const icon = attraction.icon || '📍';
                
                document.getElementById('modalTitle').textContent = name;
                
                const modalContent = document.getElementById('modalContent');
                modalContent.innerHTML = `
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div>
                            <div class="relative h-64 bg-gradient-to-br ${gradient} rounded-lg overflow-hidden">
                                ${attraction.imagem_url ? 
                                    `<img src="${attraction.imagem_url}" alt="${name}" class="w-full h-full object-cover">` :
                                    `<div class="absolute inset-0 flex items-center justify-center text-white text-8xl">${icon}</div>`
                                }
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">
                                    @if(app()->getLocale() == 'pt')
                                        Localização
                                    @elseif(app()->getLocale() == 'en')
                                        Location
                                    @else
                                        Ubicación
                                    @endif
                                </h3>
                                <p class="text-gray-600">${location}</p>
                                ${attraction.endereco ? `<p class="text-sm text-gray-500 mt-1">${attraction.endereco}</p>` : ''}
                            </div>
                            
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">
                                    @if(app()->getLocale() == 'pt')
                                        Categoria
                                    @elseif(app()->getLocale() == 'en')
                                        Category
                                    @else
                                        Categoría
                                    @endif
                                </h3>
                                <span class="px-3 py-1 bg-${categoryColor}-100 text-${categoryColor}-800 text-sm font-medium rounded-full">
                                    ${attraction.categoria || 'Sem categoria'}
                                </span>
                            </div>
                            
                            ${description ? `
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-800 mb-2">
                                        @if(app()->getLocale() == 'pt')
                                            Sobre
                                        @elseif(app()->getLocale() == 'en')
                                            About
                                        @else
                                            Acerca de
                                        @endif
                                    </h3>
                                    <p class="text-gray-700 leading-relaxed">${description}</p>
                                </div>
                            ` : ''}
                        </div>
                    </div>
                `;
                
                document.getElementById('attractionModal').classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }
        }

        function closeModal() {
            document.getElementById('attractionModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside
        document.getElementById('attractionModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModal();
            }
        });

        // Carousel functionality
        let currentSlide = 0;
        const slides = document.querySelectorAll('.carousel-slide');
        const indicators = document.querySelectorAll('.carousel-indicator');
        let slideInterval;

        function showSlide(index) {
            slides.forEach(slide => slide.classList.remove('active'));
            indicators.forEach(indicator => indicator.classList.remove('active'));
            
            slides[index].classList.add('active');
            indicators[index].classList.add('active');
        }

        function changeSlide(direction) {
            currentSlide = (currentSlide + direction + slides.length) % slides.length;
            showSlide(currentSlide);
        }

        function goToSlide(index) {
            currentSlide = index;
            showSlide(currentSlide);
        }

        function startCarousel() {
            slideInterval = setInterval(() => {
                changeSlide(1);
            }, 5000);
        }

        function stopCarousel() {
            clearInterval(slideInterval);
        }

        // Start carousel on load
        document.addEventListener('DOMContentLoaded', function() {
            startCarousel();
            
            // Pause on hover
            const carousel = document.querySelector('.carousel-container');
            carousel.addEventListener('mouseenter', stopCarousel);
            carousel.addEventListener('mouseleave', startCarousel);
        });
    </script>

</body>
</html>
        