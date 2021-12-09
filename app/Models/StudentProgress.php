<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentProgress extends Model
{
    use HasFactory;

    protected $table = 'student_progresses';

    protected $fillable = [
        'user_id','course_id' ,'material_id', 'status'
    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function course()
    {
      return $this->belongsTo(Course::class);
    }

    public function materi()
    {
      return $this->belongsTo(Materi::class, 'material_id', 'id');
    }

    public function done()
    {
      return $this->hasMany(StudentDone::class, 'course_id', 'course_id');
    }
}
