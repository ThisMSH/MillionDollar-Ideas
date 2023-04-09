<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostsResource;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use MailPoet\API\JSON\Response;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return Posts::all();
        return PostsResource::collection(
            Posts::where('User_id', 1)->get()
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Title' => ['required', 'string', 'max:255'],
            'Created_by' => ['required', 'string', 'max:255'],
            'Topic' => ['required', 'string', 'max:2000'],
            'Image' => ['image', 'mimes:png,jpeg,jpg', 'max:2048'],
        ]);
        
        // Image name
        $imageName = time() . "-" . Str::random(5) . "." . $request->Image->getClientOriginalExtension();
        // $request->image->move(dirname(base_path()) . '\Front-end\src\assets\uploads', $image);
        
        // ID of the user
        $data = $request->all();
        $data['User_id'] = "55";
        $request->merge($data);
        
        try {
            // Moving the image inside storage/app/public folder
            // Storage::disk('public')->put($imageName, file_get_contents($request->Image));
            Posts::create($request->all());
            return "success";
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error occurred: ' . $e->getMessage(),
                'status' => false,
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Posts $posts)
    {
        return $posts;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Posts $posts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Posts $posts)
    {
        $request->validate([
            'Title' => ['string', 'max:255'],
            'Created_by' => ['string', 'max:255'],
            'Topic' => ['string', 'max:2000']
        ]);

        return $posts->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Posts $posts)
    {
        //
    }
}
