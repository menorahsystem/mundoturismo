<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-Content-Type-Options" content="nosniff">
    <meta http-equiv="Referrer-Policy" content="same-origin">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Turismo pelo Mundo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .hp-field { position:absolute; left:-10000px; top:auto; width:1px; height:1px; overflow:hidden; }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800 flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <div class="bg-white/10 backdrop-blur-lg border border-white/20 rounded-2xl shadow-2xl p-8 text-white">
            <div class="text-center mb-6">
                <div class="text-4xl">🌎</div>
                <h1 class="text-2xl font-bold mt-2">Turismo pelo Mundo</h1>
                <p class="text-white/80 text-sm mt-1">Acesso ao painel administrativo</p>
            </div>

            @if ($errors->any())
                <div class="bg-red-500/20 border border-red-400/50 text-red-100 text-sm rounded-lg px-4 py-3 mb-4">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login.submit') }}" class="space-y-4">
                @csrf
                <div class="hp-field">
                    <label>Não preencha</label>
                    <input type="text" name="trap" autocomplete="off">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium mb-1">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus class="w-full px-4 py-3 rounded-lg bg-white text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-300">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium mb-1">Senha</label>
                    <input id="password" name="password" type="password" required class="w-full px-4 py-3 rounded-lg bg-white text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-300">
                </div>
                <div class="flex items-center justify-between text-sm">
                    <label class="inline-flex items-center gap-2">
                        <input type="checkbox" name="remember" class="rounded border-white/50 bg-transparent">
                        <span>Lembrar-me</span>
                    </label>
                    <a href="/" class="text-white/80 hover:text-white">Voltar ao site</a>
                </div>
                <button type="submit" class="w-full py-3 rounded-lg bg-blue-500 hover:bg-blue-600 transition-colors font-semibold shadow-lg">Entrar</button>
            </form>
        </div>
        <p class="text-center text-white/70 text-xs mt-4">© {{ date('Y') }} Turismo pelo Mundo</p>
    </div>
</body>
</html>
