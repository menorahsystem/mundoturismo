@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-xl">
    <h1 class="text-2xl font-bold mb-6">Editar Usuário</h1>
    <form action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-4 bg-white p-6 rounded-lg shadow">
        @csrf
        @method('PUT')
        <div>
            <label class="block text-sm font-medium mb-1">Nome</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full px-4 py-2 border rounded" required>
            @error('name')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">E-mail</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full px-4 py-2 border rounded" required>
            @error('email')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
        <hr class="my-4">
        <div>
            <label class="block text-sm font-medium mb-1">Nova Senha (opcional)</label>
            <input type="password" name="password" class="w-full px-4 py-2 border rounded">
            @error('password')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Confirmar Nova Senha</label>
            <input type="password" name="password_confirmation" class="w-full px-4 py-2 border rounded">
        </div>
        <div class="flex gap-2">
            <button class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded">Salvar</button>
            <a href="{{ route('admin.users.index') }}" class="px-4 py-2 bg-gray-200 rounded">Cancelar</a>
        </div>
    </form>
</div>
@endsection

