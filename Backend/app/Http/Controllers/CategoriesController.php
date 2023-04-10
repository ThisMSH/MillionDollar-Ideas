<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    use HttpResponses;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->success(Categories::all());
    }
}
