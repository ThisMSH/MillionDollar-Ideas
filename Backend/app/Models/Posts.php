<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $table = "posts";
    
    protected $fillable = [
        'Title',
        'Created_by',
        'Topic',
        'Image',
        'User_id',
        'Category_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function category() {
        return $this->belongsTo(Categories::class);
    }

    public function comments() {
        return $this->hasMany(Comments::class);
    }
}
