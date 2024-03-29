<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    use HasFactory;

    protected $table = "likes";

    protected $fillable = [
        'User_id',
        'Comment_id'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'User_id');
    }

    public function comment() {
        return $this->belongsTo(Comments::class, 'Comment_id');
    }
}
