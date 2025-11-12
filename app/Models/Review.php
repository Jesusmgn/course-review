<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id',
        'rating',
        'comment',
    ];

    //Una reseña pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Una reseña pertenece a un curso
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
