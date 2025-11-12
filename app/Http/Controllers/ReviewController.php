<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, Course $course)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        Review::create([
            'user_id' => Auth::id(),
            'course_id' => $course->id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->route('courses.show', $course)->with('success', 'Reseña añadida correctamente.');
    }
    public function destroy(Review $review)
    {
        // Solo el autor puede eliminar su reseña
        if ($review->user_id == Auth::id()) {
            $review->delete();
            return back()->with('success', 'Reseña eliminada.');
        }

        return back()->with('error', 'No tienes permiso para eliminar esta reseña.');
    }
}
