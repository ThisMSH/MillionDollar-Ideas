<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $table = "comments";

    protected $fillable = [
        'Comment',
        'User_id',
        'Post_id',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'User_id');
    }

    public function post() {
        return $this->belongsTo(Posts::class, 'Post_id');
    }

    public function likes() {
        return $this->hasMany(Likes::class, 'Comment_id');
    }
}
