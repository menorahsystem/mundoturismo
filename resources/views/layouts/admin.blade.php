<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - ExploreNow</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen">
  <nav class="bg-white border-b">
    <div class="container mx-auto px-4 py-3 flex items-center justify-between">
      <div class="flex items-center gap-6">
        <a href="{{ route('admin.dashboard') }}" class="font-semibold hover:text-blue-600">Dashboard</a>
        <a href="{{ route('admin.users.index') }}" class="hover:text-blue-600">Usuários</a>
        <a href="{{ route('admin.attractions.index') }}" class="hover:text-blue-600">Pontos Turísticos</a>
        <a href="{{ route('admin.feedback.index') }}" class="hover:text-blue-600">Feedback</a>
        <a href="/" class="text-blue-600 hover:underline">Voltar ao site</a>
      </div>
      <div class="flex items-center gap-3">
        <span class="text-sm text-gray-600 hidden sm:inline">{{ auth()->user()->name ?? 'Admin' }}</span>
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button class="px-3 py-1 bg-gray-800 text-white rounded hover:bg-gray-700">Sair</button>
        </form>
      </div>
    </div>
  </nav>

  <main>
    @yield('content')
  </main>
</body>
</html>
