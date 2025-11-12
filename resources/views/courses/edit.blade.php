@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Editar curso</h1>

    <form action="{{ route('courses.update', $course) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-semibold">Título:</label>
            <input type="text" name="title" value="{{ $course->title }}" class="border rounded p-2 w-full" required>
        </div>

        <div>
            <label class="block font-semibold">Descripción:</label>
            <textarea name="description" class="border rounded p-2 w-full">{{ $course->description }}</textarea>
        </div>

        <div>
            <label class="block font-semibold">Instructor:</label>
            <input type="text" name="instructor" value="{{ $course->instructor }}" class="border rounded p-2 w-full">
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Actualizar</button>
        <a href="{{ route('courses.index') }}" class="text-gray-600 ml-3">Cancelar</a>
    </form>
</div>
@endsection
