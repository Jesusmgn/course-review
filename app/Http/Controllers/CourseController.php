<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Mostrar todos los cursos
    public function index()
    { 
        $courses = Course::with('reviews')->get();
        return view('courses.index', compact('courses'));
    }

   // Mostrar formulario de creación
    public function create()
    {
        return view('courses.create');
    }

    // Guardar curso nuevo
    public function store(Request $request)
    {
         $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'instructor' => 'nullable|string|max:255',
        ]);

        Course::create($request->all());
        return redirect()->route('courses.index')->with('success', 'Curso creado correctamente.');
    }

    // Mostrar detalles del curso
    public function show(Course $course)
    {
        $course->load('reviews.user');
        return view('courses.show', compact('course'));
    }

    // Mostrar formulario de edición
    public function edit(Course $course)
    {
         return view('courses.edit', compact('course'));
    }

    // Actualizar curso
    public function update(Request $request, Course $course)
    {
         $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'instructor' => 'nullable|string|max:255',
        ]);

        $course->update($request->all());
        return redirect()->route('courses.index')->with('success', 'Curso actualizado correctamente.');
    }

    // Eliminar curso
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Curso eliminado.');
    }
}
