<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'course';

    protected $guarded = ['id'];

    public function materis()
    {
        return $this->hasMany(Materi::class, 'course_id', 'id');
    }
}
