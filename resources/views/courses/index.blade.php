@extends('layouts.app')

@section('content')
<div class="py-8 max-w-7xl mx-auto sm:px-6 lg:px-8 text-[17px]">

    {{-- Encabezado --}}
    <div class="flex justify-between mb-6 items-center">
        <h2 class="font-semibold text-2xl text-gray-100">Listado de cursos</h2>

        {{-- Botón Nuevo Curso --}}
        <a href="{{ route('courses.create') }}"
           class="px-5 py-3 bg-green-600 text-white rounded-lg shadow-md hover:bg-green-700 transition-all duration-200 text-[16px] font-medium">
            ➕ Nuevo curso
        </a>
    </div>

    {{-- Mensaje de éxito --}}
    @if (session('status'))
        <div class="mb-5 p-4 rounded-lg font-semibold text-white bg-green-600 dark:bg-green-700 shadow-lg text-center text-lg">
            {{ session('status') }}
        </div>
    @endif

    {{-- Tabla de cursos --}}
    <div class="bg-gray-100 dark:bg-gray-800 shadow-xl rounded-xl p-6 overflow-x-auto border border-gray-700">
        <table class="w-full border-collapse text-[16px]">
            <thead>
                <tr class="bg-gray-300 dark:bg-gray-700 text-gray-900 dark:text-gray-100 text-lg">
                    <th class="px-4 py-3 text-left">Título</th>
                    <th class="px-4 py-3 text-left">Instructor</th>
                    <th class="px-4 py-3 text-left">Descripción</th>
                    <th class="px-4 py-3 text-center">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($courses as $course)
                    <tr class="border-b dark:border-gray-700 text-gray-900 dark:text-gray-100 hover:bg-gray-200 dark:hover:bg-gray-700 transition-all">
                        <td class="px-4 py-3 font-semibold">{{ $course->title }}</td>
                        <td class="px-4 py-3">{{ $course->instructor }}</td>
                        <td class="px-4 py-3">{{ Str::limit($course->description, 80) }}</td>

                        <td class="px-4 py-3 text-center space-y-2 flex flex-col items-center">
                            {{-- Ver detalles --}}
                            <a href="{{ route('courses.show', $course) }}"
                               class="w-32 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 font-medium">
                                📘 Ver detalles
                            </a>

                            {{-- Editar --}}
                            <a href="{{ route('courses.edit', $course) }}"
                               class="w-32 px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition duration-200 font-medium">
                                ✏️ Editar
                            </a>

                            {{-- Eliminar --}}
                            <form action="{{ route('courses.destroy', $course) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Eliminar este curso?')"
                                        class="w-32 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-200 font-medium">
                                    🗑️ Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-4 text-center text-gray-500 dark:text-gray-400 text-lg">
                            No hay cursos registrados.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
