<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCredential extends Model
{
    use HasFactory;

    protected $table = 'user_credentials';
    protected $fillable = [
        'description', 'gender', 'academy', 'mobile', 'location', 'fb_acc', 'ig_acc', 'twit_acc', 'git_acc'
    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
