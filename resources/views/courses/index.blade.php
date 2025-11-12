@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Lista de Cursos</h1>

    <a href="{{ route('courses.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Nuevo Curso</a>

    <ul class="mt-6 space-y-3">
        @foreach($courses as $course)
            <li class="border p-4 rounded shadow-sm">
                <h2 class="text-xl font-semibold">{{ $course->title }}</h2>
                <p class="text-gray-600">{{ $course->instructor }}</p>
                <a href="{{ route('courses.show', $course) }}" class="text-blue-500 hover:underline">Ver detalles</a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
