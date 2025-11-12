@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <a href="{{ route('courses.index') }}" class="text-blue-600 hover:underline">&larr; Volver a la lista</a>

    <div class="mt-4">
        <h1 class="text-3xl font-bold">{{ $course->title }}</h1>
        <p class="text-gray-600">{{ $course->instructor }}</p>
        <p class="mt-3">{{ $course->description }}</p>
    </div>

    <hr class="my-6">

    <h2 class="text-2xl font-semibold mb-4">Reseñas</h2>

    {{-- Mostrar reseñas --}}
    @foreach($course->reviews as $review)
        <div class="border p-4 rounded mb-3">
            <strong>{{ $review->user->name ?? 'Usuario desconocido' }}</strong>
            <span class="text-yellow-500 ml-2">★ {{ $review->rating }}/5</span>
            <p class="mt-2">{{ $review->comment }}</p>

            @if($review->user_id == auth()->id())
                <form action="{{ route('reviews.destroy', $review) }}" method="POST" class="mt-2">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-500 text-sm">Eliminar</button>
                </form>
            @endif
        </div>
    @endforeach

    {{-- Formulario de nueva reseña --}}
    <h3 class="text-xl font-bold mt-6 mb-2">Agregar reseña</h3>
    <form action="{{ route('reviews.store', $course) }}" method="POST" class="space-y-3">
        @csrf
        <div>
            <label class="block">Puntuación (1 a 5)</label>
            <input type="number" name="rating" min="1" max="5" class="border rounded p-2 w-20" required>
        </div>

        <div>
            <label class="block">Comentario</label>
            <textarea name="comment" class="border rounded p-2 w-full"></textarea>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Enviar reseña</button>
    </form>
</div>
@endsection
