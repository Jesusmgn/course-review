@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-gray-900 rounded-lg shadow-lg p-8 border border-gray-700">
    <h2 class="text-2xl font-bold text-gray-100 mb-6 border-b border-gray-700 pb-2">
        Agregar nuevo curso
    </h2>

    <form action="{{ route('courses.store') }}" method="POST" class="space-y-6">
        @csrf

        {{-- Título --}}
        <div>
            <label for="title" class="block text-gray-200 font-semibold mb-2">Título:</label>
            <input type="text" name="title" id="title"
                class="w-full rounded-md border border-gray-700 bg-gray-800 text-gray-100 px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                required>
        </div>

        {{-- Descripción --}}
        <div>
            <label for="description" class="block text-gray-200 font-semibold mb-2">Descripción:</label>
            <textarea name="description" id="description" rows="4"
                class="w-full rounded-md border border-gray-700 bg-gray-800 text-gray-100 px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
        </div>

        {{-- Instructor --}}
        <div>
            <label for="instructor" class="block text-gray-200 font-semibold mb-2">Instructor:</label>
            <input type="text" name="instructor" id="instructor"
                class="w-full rounded-md border border-gray-700 bg-gray-800 text-gray-100 px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                required>
        </div>

        {{-- Calificación con estrellas --}}
        <div>
            <label class="block text-gray-200 font-semibold mb-2">Calificación:</label>
            <div id="rating" class="flex items-center space-x-2">
                @for ($i = 1; $i <= 5; $i++)
                    <svg data-value="{{ $i }}" xmlns="http://www.w3.org/2000/svg"
                        class="h-8 w-8 cursor-pointer text-gray-500 hover:text-yellow-400 transition"
                        fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 .587l3.668 7.431L24 9.753l-6 5.848L19.335 24 12 19.897 4.665 24 6 15.601 0 9.753l8.332-1.735z" />
                    </svg>
                @endfor
            </div>
            <input type="hidden" name="rating" id="rating-value" value="0">
            <p id="rating-text" class="text-gray-400 mt-1 text-sm">Selecciona una calificación</p>
        </div>

        {{-- Botones --}}
        <div class="flex items-center justify-end space-x-4 mt-6">
            <a href="{{ route('courses.index') }}"
                class="px-5 py-2 rounded-md bg-gray-700 text-gray-200 hover:bg-gray-600 transition font-semibold">
                Cancelar
            </a>
            <button type="submit"
                class="px-5 py-2 rounded-md bg-blue-600 text-white font-semibold hover:bg-blue-500 transition">
                Guardar
            </button>
        </div>
    </form>
</div>

{{-- Script interactivo para las estrellas --}}
<script>
    const stars = document.querySelectorAll('#rating svg');
    const ratingValue = document.getElementById('rating-value');
    const ratingText = document.getElementById('rating-text');

    stars.forEach(star => {
        star.addEventListener('click', () => {
            const value = star.getAttribute('data-value');
            ratingValue.value = value;
            ratingText.textContent = `Calificación: ${value} / 5`;

            stars.forEach(s => {
                if (s.getAttribute('data-value') <= value) {
                    s.classList.add('text-yellow-400');
                    s.classList.remove('text-gray-500');
                } else {
                    s.classList.remove('text-yellow-400');
                    s.classList.add('text-gray-500');
                }
            });
        });

        star.addEventListener('mouseover', () => {
            const value = star.getAttribute('data-value');
            stars.forEach(s => {
                if (s.getAttribute('data-value') <= value) {
                    s.classList.add('text-yellow-300');
                } else {
                    s.classList.remove('text-yellow-300');
                }
            });
        });

        star.addEventListener('mouseout', () => {
            stars.forEach(s => s.classList.remove('text-yellow-300'));
        });
    });
</script>
@endsection
