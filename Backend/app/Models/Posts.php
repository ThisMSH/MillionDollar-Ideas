<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $table = "posts";
    
    protected $fillable = [
        'Title',
        'Topic',
        'Image',
        'User_id',
        'Category_id',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'User_id');
    }
    
    public function category() {
        return $this->belongsTo(Categories::class, 'Category_id');
    }

    public function comments() {
        return $this->hasMany(Comments::class);
    }
}
