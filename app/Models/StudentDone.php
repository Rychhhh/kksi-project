<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentDone extends Model
{
    use HasFactory;

    protected $table = 'student_dones';
    protected $fillable = [
        'user_id', 'course_id', 'progress', 
    ];

    public function user()
    {
      return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function course()
    {
      return $this->belongsTo(Course::class);
    }

    public function progress()
    {
      return $this->belongsTo(StudentProgress::class, 'course_id', 'course_id');
    }
}
