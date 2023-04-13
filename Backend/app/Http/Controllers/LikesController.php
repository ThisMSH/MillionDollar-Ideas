<?php

namespace App\Http\Controllers;

use App\Models\Likes;
use App\Models\Posts;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    use HttpResponses;

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = Posts::find($id);
        $post->likes()->create(["user_id" => Auth::user()->id, "post_id" => $post->id]);
        return $this->sendResponse(new LikesResource($post), 'Like created successfully.', 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Likes $likes)
    {
        $like = Like::findOrFail($id);
        if ($like->user_id == Auth::user()->id) {
            $like->delete();
            return $this->sendResponse([], 'Like deleted successfully.', 202);
        } else {
            return $this->sendError('Invalid credentials.', ['error' => "Like doesn't belongs to this user"]);
        }
    }
}
