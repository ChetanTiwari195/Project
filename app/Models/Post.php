<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\FriendRequest;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $primarykey = 'id';


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function friendRequest()
    {
        return $this->belongsTo(FriendRequest::class);
    }
}
