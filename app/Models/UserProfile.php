<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;
    protected $table = 'userprofile';
    protected $primarykey = 'profile_id';
   
    // relation with user table
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
