<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = ['title'];

    public function materis()
    {
        return $this->hasMany(Materi::class, 'course_id', 'id');
    }

    public function progress()
    {
        return $this->hasMany(StudentProgress::class, 'course_id', 'id');
    }

    public function done()
    {
        return $this->hasMany(StudentDone::class, 'course_id', 'id');
    }
}
