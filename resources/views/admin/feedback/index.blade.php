@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
  <div class="flex items-center justify-between mb-4">
    <h1 class="text-2xl font-bold">Feedback</h1>
    @if(session('success'))
      <div class="px-3 py-2 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
    @endif
  </div>

  <form method="GET" class="bg-white rounded shadow p-4 mb-4 grid grid-cols-1 md:grid-cols-4 gap-3">
    <div>
      <label class="block text-sm text-gray-600">Tipo</label>
      <select name="tipo" class="w-full border rounded px-3 py-2">
        <option value="">Todos</option>
        <option value="comentario" {{ request('tipo')=='comentario'?'selected':'' }}>Comentários</option>
        <option value="sugestao" {{ request('tipo')=='sugestao'?'selected':'' }}>Sugestões</option>
      </select>
    </div>
    <div>
      <label class="block text-sm text-gray-600">Status</label>
      <select name="status" class="w-full border rounded px-3 py-2">
        <option value="">Todos</option>
        <option value="pendente" {{ request('status')=='pendente'?'selected':'' }}>Pendente</option>
        <option value="aprovado" {{ request('status')=='aprovado'?'selected':'' }}>Aprovado</option>
      </select>
    </div>
    <div class="md:col-span-2 flex items-end">
      <button class="bg-gray-800 text-white px-4 py-2 rounded">Filtrar</button>
    </div>
  </form>

  <div class="bg-white rounded shadow overflow-x-auto">
    <table class="min-w-full">
      <thead>
        <tr class="text-left bg-gray-50">
          <th class="px-4 py-2">Data</th>
          <th class="px-4 py-2">Tipo</th>
          <th class="px-4 py-2">Nome</th>
          <th class="px-4 py-2">Conteúdo</th>
          <th class="px-4 py-2">Relacionado</th>
          <th class="px-4 py-2">Status</th>
          <th class="px-4 py-2">Status Sugestão</th>
          <th class="px-4 py-2">Ações</th>
        </tr>
      </thead>
      <tbody>
        @forelse($feedback as $f)
          <tr class="border-t">
            <td class="px-4 py-2 text-sm text-gray-600">{{ $f->created_at->format('d/m/Y H:i') }}</td>
            <td class="px-4 py-2">{{ ucfirst($f->tipo) }}</td>
            <td class="px-4 py-2">{{ $f->nome ?: 'Anônimo' }}</td>
            <td class="px-4 py-2 max-w-sm">
              <div class="text-gray-800 line-clamp-3">{{ $f->conteudo }}</div>
              @if($f->atracao_sugerida)
                <div class="text-xs text-gray-500">Sugestão: {{ $f->atracao_sugerida }}</div>
              @endif
            </td>
            <td class="px-4 py-2">
              @if($f->touristAttraction)
                {{ $f->touristAttraction->nome }}
              @else
                -
              @endif
            </td>
            <td class="px-4 py-2">
              @if($f->tipo === 'sugestao')
                <span class="text-blue-700 bg-blue-100 px-2 py-1 rounded text-xs">Enviada</span>
              @elseif($f->aprovado)
                <span class="text-green-700 bg-green-100 px-2 py-1 rounded text-xs">Aprovado</span>
              @else
                <span class="text-yellow-700 bg-yellow-100 px-2 py-1 rounded text-xs">Pendente</span>
              @endif
            </td>
            <td class="px-4 py-2">
              @if($f->tipo === 'sugestao')
                <form method="POST" action="{{ route('admin.feedback.suggestion_status', $f) }}" class="flex items-center gap-2">
                  @csrf
                  <select name="sugestao_status" class="border rounded px-2 py-1 text-sm">
                    <option value="pendente" {{ $f->sugestao_status==='pendente'?'selected':'' }}>Pendente</option>
                    <option value="inserido" {{ $f->sugestao_status==='inserido'?'selected':'' }}>Inserido</option>
                  </select>
                  <button class="px-2 py-1 bg-gray-800 text-white rounded text-xs">Salvar</button>
                </form>
              @else
                -
              @endif
            </td>
            <td class="px-4 py-2">
              <div class="flex items-center gap-2">
                @if($f->tipo === 'comentario')
                  @if(!$f->aprovado)
                    <form method="POST" action="{{ route('admin.feedback.approve', $f) }}">
                      @csrf
                      <button class="px-3 py-1 bg-blue-600 text-white rounded">Aprovar</button>
                    </form>
                  @else
                    <form method="POST" action="{{ route('admin.feedback.reject', $f) }}">
                      @csrf
                      <button class="px-3 py-1 bg-yellow-600 text-white rounded">Reverter</button>
                    </form>
                  @endif
                @else
                  <span class="text-gray-500 text-sm">Aprovada automaticamente</span>
                @endif
                <form method="POST" action="{{ route('admin.feedback.destroy', $f) }}" onsubmit="return confirm('Excluir este feedback?')">
                  @csrf
                  @method('DELETE')
                  <button class="px-3 py-1 bg-red-600 text-white rounded">Excluir</button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="7" class="px-4 py-6 text-center text-gray-600">Nenhum feedback encontrado.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="mt-4">
    {{ $feedback->links() }}
  </div>
</div>
@endsection





