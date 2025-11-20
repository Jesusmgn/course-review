@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-gray-900 p-8 rounded-lg shadow-md border border-gray-700">
    <h2 class="text-2xl font-bold text-gray-100 mb-6">Editar curso</h2>

    <form action="{{ route('courses.update', $course) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        {{-- Título --}}
        <div>
            <label for="title" class="block text-gray-200 font-semibold mb-2">Título:</label>
            <input type="text" name="title" id="title" value="{{ old('title', $course->title) }}"
                class="w-full rounded-md border border-gray-700 bg-gray-800 text-gray-100 px-4 py-2 
                       focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        {{-- Descripción --}}
        <div>
            <label for="description" class="block text-gray-200 font-semibold mb-2">Descripción:</label>
            <textarea name="description" id="description" rows="4"
                class="w-full rounded-md border border-gray-700 bg-gray-800 text-gray-100 px-4 py-2 
                       focus:ring-2 focus:ring-blue-500 focus:outline-none">{{ old('description', $course->description) }}</textarea>
        </div>

        {{-- Instructor --}}
        <div>
            <label for="instructor" class="block text-gray-200 font-semibold mb-2">Instructor:</label>
            <input type="text" name="instructor" id="instructor" value="{{ old('instructor', $course->instructor) }}"
                class="w-full rounded-md border border-gray-700 bg-gray-800 text-gray-100 px-4 py-2 
                       focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        {{-- Botones --}}
        <div class="flex items-center justify-end space-x-4 mt-6">
            <a href="{{ route('courses.index') }}"
                class="px-5 py-2 rounded-md bg-gray-700 text-gray-200 hover:bg-gray-600 transition font-semibold">
                Cancelar
            </a>

            <button type="submit"
                class="px-5 py-2 rounded-md bg-blue-600 text-white font-semibold hover:bg-blue-500 transition">
                Actualizar
            </button>
        </div>
    </form>
</div>
@endsection
