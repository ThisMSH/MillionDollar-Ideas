<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentsResquest;
use App\Http\Requests\UpdateCommentsResquest;
use App\Http\Resources\CommentsResource;
use App\Models\Comments;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    use HttpResponses;

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentsResquest $request)
    {
        $request->validated($request->all());

        $comment = Comments::create([
            'Comment' => $request->Comment,
            'Post_id' => $request->Post_id,
            'User_id' => Auth::id()
        ]);

        return $this->success(new CommentsResource($comment));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentsResquest $request, Comments $comment)
    {
        if (Auth::user()->id != $comment->User_id) {
            return $this->error('', 'You are not authorized to update this comment.', 403);
        }

        $request->validated($request->all());

        $comment->update($request->all());

        return $this->success(new CommentsResource($comment));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comments $comment)
    {
        return $this->userNotAuthorized($comment) ? $this->userNotAuthorized($comment) : $comment->delete();
    }

    private function userNotAuthorized($comment)
    {
        if (Auth::user()->id != $comment->User_id) {
            return $this->error('', 'You are not authorized to make this request.', 403);
        }
    }
}
