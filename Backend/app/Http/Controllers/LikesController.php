<?php

namespace App\Http\Controllers;

use App\Http\Resources\LikesResource;
use App\Models\Likes;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    use HttpResponses;

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $like = Likes::create([
            'Comment_id' => $request->Comment_id,
            'User_id' => Auth::id()
        ]);
        
        return $this->success(new LikesResource($like));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Likes $like)
    {
        return $this->userNotAuthorized($like) ? $this->userNotAuthorized($like) : $like->delete();
    }

    private function userNotAuthorized($like)
    {
        if (Auth::user()->id != $like->User_id) {
            return $this->error('', 'You are not authorized to make this request.', 403);
        }
    }
}
