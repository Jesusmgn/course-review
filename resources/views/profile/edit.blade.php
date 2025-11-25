@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-gray-900 p-8 rounded-lg shadow-md border border-gray-700">

    <h2 class="text-2xl font-bold text-gray-100 mb-6">Perfil de usuario</h2>

    {{-- =====================
        ACTUALIZAR INFORMACIÓN
    ====================== --}}
    <section class="mb-10">
        <header>
            <h3 class="text-xl font-semibold text-gray-200 mb-2">Información del perfil</h3>
            <p class="text-gray-400 text-sm mb-4">
                Actualiza tu información personal y correo electrónico.
            </p>
        </header>

        <form method="post" action="{{ route('profile.update') }}" class="space-y-4">
            @csrf
            @method('patch')

            {{-- Nombre --}}
            <div>
                <label class="block text-gray-200 font-semibold mb-1">Nombre</label>
                <input class="w-full bg-gray-800 border border-gray-700 text-gray-100 px-4 py-2 rounded-lg"
                       name="name" type="text" value="{{ old('name', auth()->user()->name) }}" required>
            </div>

            {{-- Email --}}
            <div>
                <label class="block text-gray-200 font-semibold mb-1">Correo electrónico</label>
                <input class="w-full bg-gray-800 border border-gray-700 text-gray-100 px-4 py-2 rounded-lg"
                       name="email" type="email" value="{{ old('email', auth()->user()->email) }}" required>
            </div>

            <button
                class="px-5 py-2 rounded-md bg-blue-600 text-white font-semibold hover:bg-blue-500 transition">
                Guardar cambios
            </button>
        </form>
    </section>


    {{-- =====================
        ACTUALIZAR CONTRASEÑA
    ====================== --}}
    <section class="mb-10">
        <header>
            <h3 class="text-xl font-semibold text-gray-200 mb-2">Actualizar contraseña</h3>
            <p class="text-gray-400 text-sm mb-4">
                Asegúrate de usar una contraseña segura.
            </p>
        </header>

        <form method="post" action="{{ route('password.update') }}" class="space-y-4">
            @csrf
            @method('put')

            {{-- Contraseña actual --}}
            <div>
                <label class="block text-gray-200 font-semibold mb-1">Contraseña actual</label>
                <input name="current_password" type="password"
                       class="w-full bg-gray-800 border border-gray-700 text-gray-100 px-4 py-2 rounded-lg">
            </div>

            {{-- Nueva contraseña --}}
            <div>
                <label class="block text-gray-200 font-semibold mb-1">Nueva contraseña</label>
                <input name="password" type="password"
                       class="w-full bg-gray-800 border border-gray-700 text-gray-100 px-4 py-2 rounded-lg">
            </div>

            {{-- Confirmación --}}
            <div>
                <label class="block text-gray-200 font-semibold mb-1">Confirmar nueva contraseña</label>
                <input name="password_confirmation" type="password"
                       class="w-full bg-gray-800 border border-gray-700 text-gray-100 px-4 py-2 rounded-lg">
            </div>

            <button
                class="px-5 py-2 rounded-md bg-green-600 text-white font-semibold hover:bg-green-500 transition">
                Actualizar contraseña
            </button>
        </form>
    </section>


    {{-- =====================
        ELIMINAR CUENTA
    ====================== --}}
    <section>
        <header>
            <h3 class="text-xl font-semibold text-red-400 mb-2">Eliminar cuenta</h3>
            <p class="text-gray-400 text-sm mb-4">
                Una vez eliminada, no podrás recuperar tu información.
            </p>
        </header>

        <form method="post" action="{{ route('profile.destroy') }}">
            @csrf
            @method('delete')

            <button
                class="px-5 py-2 rounded-md bg-red-600 text-white font-semibold hover:bg-red-500 transition"
                onclick="return confirm('¿Seguro que deseas eliminar tu cuenta?')">
                Eliminar cuenta
            </button>
        </form>
    </section>

</div>
@endsection
