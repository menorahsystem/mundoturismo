<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    @if(app()->getLocale() == 'pt') Comentários e Sugestões - ExploreNow
    @elseif(app()->getLocale() == 'en') Comments and Suggestions - ExploreNow
    @else Comentarios y Sugerencias - ExploreNow
    @endif
  </title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen">
  <nav class="bg-white border-b">
    <div class="container mx-auto px-4 py-3 flex items-center justify-between">
      <a href="{{ route('home') }}" class="font-semibold hover:text-blue-600">ExploreNow</a>
      <a href="{{ route('home') }}" class="text-blue-600 hover:underline">
        @if(app()->getLocale() == 'pt') Voltar @elseif(app()->getLocale() == 'en') Back @else Volver @endif
      </a>
    </div>
  </nav>

  <main class="container mx-auto px-4 py-8">
    @if(session('success'))
      <div class="mb-6 px-4 py-3 rounded bg-green-100 text-green-800">
        {{ session('success') }}
      </div>
    @endif

    <h1 class="text-3xl font-bold text-gray-900 mb-6">
      @if(app()->getLocale() == 'pt') Comentários e Sugestões
      @elseif(app()->getLocale() == 'en') Comments and Suggestions
      @else Comentarios y Sugerencias
      @endif
    </h1>

    <div class="bg-white rounded-lg shadow">
      <div class="border-b px-4 pt-4">
        <div class="flex gap-4">
          <button type="button" class="tab-btn px-4 py-2 rounded-t border-b-2 border-blue-600 text-blue-700 font-semibold" data-tab="comentarios">
            @if(app()->getLocale() == 'pt') Comentários @elseif(app()->getLocale() == 'en') Comments @else Comentarios @endif
          </button>
          <button type="button" class="tab-btn px-4 py-2 rounded-t text-gray-600 hover:text-gray-800" data-tab="sugestoes">
            @if(app()->getLocale() == 'pt') Sugestões @elseif(app()->getLocale() == 'en') Suggestions @else Sugerencias @endif
          </button>
        </div>
      </div>

      <div class="p-4">
        <div id="tab-comentarios" class="tab active">
          <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 space-y-4">
              @forelse($comentarios as $c)
                <div class="border rounded p-4 bg-gray-50">
                  <div class="flex items-center justify-between">
                    <div class="font-semibold text-gray-800">{{ $c->nome ?: 'Anônimo' }}</div>
                    <div class="text-xs text-gray-500">{{ $c->created_at->diffForHumans() }}</div>
                  </div>
                  <p class="mt-2 text-gray-700 whitespace-pre-line">{{ $c->conteudo }}</p>
                  @if($c->touristAttraction)
                    <div class="mt-2 text-sm text-gray-600">Sobre: <span class="font-medium">{{ $c->touristAttraction->nome }}</span></div>
                  @endif
                </div>
              @empty
                <p class="text-gray-600">
                  @if(app()->getLocale() == 'pt') Ainda não há comentários.
                  @elseif(app()->getLocale() == 'en') There are no comments yet.
                  @else Aún no hay comentarios.
                  @endif
                </p>
              @endforelse

              <div>
                {{ $comentarios->withQueryString()->links() }}
              </div>
            </div>

            <div>
              <h2 class="text-xl font-semibold mb-3">
                @if(app()->getLocale() == 'pt') Enviar um comentário
                @elseif(app()->getLocale() == 'en') Submit a comment
                @else Enviar un comentario
                @endif
              </h2>
              <form method="POST" action="{{ route('feedback.store') }}" class="space-y-3">
                @csrf
                <input type="hidden" name="tipo" value="comentario">
                <div>
                  <label class="block text-sm text-gray-700">@if(app()->getLocale() == 'pt') Nome @elseif(app()->getLocale() == 'en') Name @else Nombre @endif</label>
                  <input name="nome" class="w-full border rounded px-3 py-2" />
                </div>
                <div>
                  <label class="block text-sm text-gray-700">Email</label>
                  <input type="email" name="email" class="w-full border rounded px-3 py-2" />
                </div>
                <div>
                  <label class="block text-sm text-gray-700">@if(app()->getLocale() == 'pt') Ponto turístico (opcional) @elseif(app()->getLocale() == 'en') Tourist attraction (optional) @else Punto turístico (opcional) @endif</label>
                  <select name="tourist_attraction_id" class="w-full border rounded px-3 py-2">
                    <option value="">@if(app()->getLocale() == 'pt') Selecione... @elseif(app()->getLocale() == 'en') Select... @else Seleccione... @endif</option>
                    @foreach($atracoes as $a)
                      <option value="{{ $a->id }}">{{ $a->nome }}</option>
                    @endforeach
                  </select>
                </div>
                <div>
                  <label class="block text-sm text-gray-700">@if(app()->getLocale() == 'pt') Comentário @elseif(app()->getLocale() == 'en') Comment @else Comentario @endif</label>
                  <textarea name="conteudo" class="w-full border rounded px-3 py-2" rows="4" required></textarea>
                </div>
                <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                  @if(app()->getLocale() == 'pt') Enviar @elseif(app()->getLocale() == 'en') Submit @else Enviar @endif
                </button>
              </form>
            </div>
          </div>
        </div>

        <div id="tab-sugestoes" class="tab hidden">
          <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 space-y-4">
              @forelse($sugestoes as $s)
                <div class="border rounded p-4 bg-gray-50">
                  <div class="flex items-center justify-between">
                    <div class="font-semibold text-gray-800">{{ $s->nome ?: 'Anônimo' }}</div>
                    <div class="text-xs text-gray-500">{{ $s->created_at->diffForHumans() }}</div>
                  </div>
                  @if($s->atracao_sugerida)
                    <div class="text-sm text-gray-600">Sugestão: <span class="font-medium">{{ $s->atracao_sugerida }}</span></div>
                  @endif
                  <p class="mt-2 text-gray-700 whitespace-pre-line">{{ $s->conteudo }}</p>
                </div>
              @empty
                <p class="text-gray-600">
                  @if(app()->getLocale() == 'pt') Ainda não há sugestões.
                  @elseif(app()->getLocale() == 'en') There are no suggestions yet.
                  @else Aún no hay sugerencias.
                  @endif
                </p>
              @endforelse

              <div>
                {{ $sugestoes->withQueryString()->links() }}
              </div>
            </div>

            <div>
              <h2 class="text-xl font-semibold mb-3">
                @if(app()->getLocale() == 'pt') Sugerir um ponto turístico
                @elseif(app()->getLocale() == 'en') Suggest a tourist attraction
                @else Sugerir un punto turístico
                @endif
              </h2>
              <form method="POST" action="{{ route('feedback.store') }}" class="space-y-3">
                @csrf
                <input type="hidden" name="tipo" value="sugestao">
                <div>
                  <label class="block text-sm text-gray-700">@if(app()->getLocale() == 'pt') Nome @elseif(app()->getLocale() == 'en') Name @else Nombre @endif</label>
                  <input name="nome" class="w-full border rounded px-3 py-2" />
                </div>
                <div>
                  <label class="block text-sm text-gray-700">Email</label>
                  <input type="email" name="email" class="w-full border rounded px-3 py-2" />
                </div>
                <div>
                  <label class="block text-sm text-gray-700">@if(app()->getLocale() == 'pt') Nome do ponto sugerido @elseif(app()->getLocale() == 'en') Suggested attraction name @else Nombre del punto sugerido @endif</label>
                  <input name="atracao_sugerida" class="w-full border rounded px-3 py-2" />
                </div>
                <div>
                  <label class="block text-sm text-gray-700">@if(app()->getLocale() == 'pt') Detalhes @elseif(app()->getLocale() == 'en') Details @else Detalles @endif</label>
                  <textarea name="conteudo" class="w-full border rounded px-3 py-2" rows="4" required></textarea>
                </div>
                <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                  @if(app()->getLocale() == 'pt') Enviar @elseif(app()->getLocale() == 'en') Submit @else Enviar @endif
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script>
    const buttons = document.querySelectorAll('.tab-btn');
    const tabs = {
      comentarios: document.getElementById('tab-comentarios'),
      sugestoes: document.getElementById('tab-sugestoes'),
    };
    buttons.forEach(btn => {
      btn.addEventListener('click', () => {
        buttons.forEach(b => {
          b.classList.remove('border-blue-600','text-blue-700','font-semibold');
          b.classList.add('text-gray-600');
        });
        btn.classList.add('border-blue-600','text-blue-700','font-semibold');
        Object.values(tabs).forEach(tab => tab.classList.add('hidden'));
        tabs[btn.dataset.tab].classList.remove('hidden');
      });
    });
  </script>
</body>
</html>


