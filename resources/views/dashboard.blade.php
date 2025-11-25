{{-- resources/views/dashboard.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="py-10 max-w-7xl mx-auto px-6">

        {{-- TÍTULO PRINCIPAL --}}
        <div class="bg-gradient-to-r from-indigo-500 to-blue-600 p-6 rounded-xl shadow-lg text-center mb-10">
            <h1 class="text-3xl font-bold text-white flex items-center justify-center gap-3">
                📘 Panel de Cursos
            </h1>
            <p class="text-gray-200 mt-2 text-lg">
                Administra tus cursos, revisa reseñas y controla tu información.
            </p>
        </div>

        {{-- TARJETAS --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            {{-- Cursos registrados --}}
            <div class="bg-blue-600 p-6 rounded-xl shadow hover:scale-[1.02] transition">
                <h3 class="text-white text-lg font-semibold flex items-center gap-2">
                    📚 Cursos registrados
                </h3>
                <p class="text-4xl font-bold text-white mt-3">
                    {{ \App\Models\Course::count() }}
                </p>

                <a href="{{ route('courses.index') }}"
                   class="mt-4 inline-block bg-white text-blue-700 font-semibold px-4 py-2 rounded-lg shadow hover:bg-gray-100 transition">
                    Ver cursos
                </a>
            </div>

            {{-- Reseñas --}}
            <div class="bg-green-600 p-6 rounded-xl shadow hover:scale-[1.02] transition">
                <h3 class="text-white text-lg font-semibold flex items-center gap-2">
                    ⭐ Reseñas enviadas
                </h3>
                <p class="text-4xl font-bold text-white mt-3">
                    {{ \App\Models\Review::count() }}
                </p>

                <a href="{{ route('courses.index') }}"
                   class="mt-4 inline-block bg-white text-green-700 font-semibold px-4 py-2 rounded-lg shadow hover:bg-gray-100 transition">
                    Ver reseñas
                </a>
            </div>

            {{-- Usuario --}}
            <div class="bg-purple-600 p-6 rounded-xl shadow hover:scale-[1.02] transition">
                <h3 class="text-white text-lg font-semibold flex items-center gap-2">
                    👤 Usuario activo
                </h3>
                <p class="text-3xl font-bold text-white mt-3">
                     {{ auth()->check() ? auth()->user()->name : 'Invitado' }}
                </p>

                <a href="{{ route('profile.edit') }}"
                   class="mt-4 inline-block bg-white text-purple-700 font-semibold px-4 py-2 rounded-lg shadow hover:bg-gray-100 transition">
                    Editar perfil
                </a>
            </div>

        </div>

        {{-- CONSEJOS --}}
        <div class="mt-10 bg-gray-800 border border-gray-700 p-6 rounded-xl shadow">
            <h3 class="text-xl font-semibold text-white mb-4">💡 Consejos rápidos</h3>

            <ul class="text-gray-300 space-y-2">
                <li>• Usa el menú superior para navegar entre tus cursos.</li>
                <li>• Edita los cursos desde el botón “Editar”.</li>
                <li>• Mantén actualizada la información de cada curso.</li>
            </ul>
        </div>
         <div class="mt-10 bg-gray-800 border border-gray-700 p-6 rounded-xl shadow">
            <h3 class="text-xl font-semibold text-white mb-4">ℹ Informacion Adicional</h3>

            <ul class="text-gray-300 space-y-2">
                <li>• Para ver el codigo fuente presione ctrl + U.</li>
            </ul>
        </div>

    </div>
@endsection
