<?php

namespace App\Models;

use App\Models\Posts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table = "categories";

    protected $fillable = [
        'Category',
        'Icon',
    ];

    public function posts() {
        return $this->hasMany(Posts::class);
    }
}
