@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-gray-900 p-8 rounded-lg shadow-md border border-gray-700">
    <a href="{{ route('courses.index') }}" class="text-blue-400 hover:underline">&larr; Volver a la lista</a>

    <h2 class="text-2xl font-bold text-gray-100 mt-4 mb-1">{{ $course->title }}</h2>
    <p class="text-blue-400 text-sm mb-4">{{ $course->instructor }}</p>

    <p class="text-gray-300 mb-6">{{ $course->description }}</p>

    {{-- Mostrar estrellas promedio --}}
    @if ($course->reviews->count() > 0)
        <div class="flex items-center mb-6">
            @php
                $average = round($course->reviews->avg('rating'), 1);
            @endphp
            @for ($i = 1; $i <= 5; $i++)
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-6 w-6 {{ $i <= $average ? 'text-yellow-400' : 'text-gray-600' }}"
                     fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 .587l3.668 7.431L24 9.753l-6 5.848L19.335 24 12 19.897 4.665 24 6 15.601 0 9.753l8.332-1.735z" />
                </svg>
            @endfor
            <span class="text-gray-400 ml-2 text-sm">Promedio: {{ $average }} / 5</span>
        </div>
    @endif

    <hr class="border-gray-700 mb-6">

    <h3 class="text-xl font-semibold text-gray-200 mb-3">Reseñas</h3>

    {{-- Formulario de reseña --}}
    <h4 class="text-lg font-semibold text-gray-300 mb-2">Agregar reseña</h4>
    <form action="{{ route('reviews.store', $course) }}" method="POST" class="space-y-4 mb-6">
        @csrf

        <div>
            <label for="rating" class="block text-gray-300 font-semibold mb-1">Puntuación (1 a 5)</label>
            <select name="rating" id="rating"
                class="w-24 rounded-md border border-gray-700 bg-gray-800 text-white px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                <option value="">--</option>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>

        <div>
            <label for="comment" class="block text-gray-300 font-semibold mb-1">Comentario</label>
            <textarea name="comment" id="comment" rows="3"
                class="w-full rounded-md border border-gray-700 bg-gray-800 text-white px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                placeholder="Escribe tu opinión..."></textarea>
        </div>

        <button type="submit"
            class="px-5 py-2 rounded-md bg-blue-600 text-white font-semibold hover:bg-blue-500 transition">
            Enviar reseña
        </button>
    </form>

    {{-- Mostrar reseñas --}}
    @foreach ($course->reviews as $review)
        <div class="bg-gray-800 border border-gray-700 rounded-md p-4 mb-3">
            <div class="flex justify-between">
                <p class="text-gray-100 font-semibold">
                    {{ $review->user->name ?? 'Anónimo' }}
                </p>

                {{-- Mostrar estrellas --}}
                <div class="flex">
                    @for ($i = 1; $i <= 5; $i++)
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-4 w-4 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-600' }}"
                             fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 .587l3.668 7.431L24 9.753l-6 5.848L19.335 24 12 19.897 4.665 24 6 15.601 0 9.753l8.332-1.735z" />
                        </svg>
                    @endfor
                </div>
            </div>
            <p class="text-gray-300 mt-2">{{ $review->comment }}</p>

            @if ($review->user_id == auth()->id())
                <form action="{{ route('reviews.destroy', $review) }}" method="POST" class="mt-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-3 py-1 rounded-md bg-red-600 text-white font-semibold hover:bg-red-500 transition">
                        Eliminar
                    </button>
                </form>
            @endif
        </div>
    @endforeach
</div>
@endsection
