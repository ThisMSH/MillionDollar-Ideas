<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostsRequest;
use App\Http\Requests\UpdatePostsRequest;
use App\Http\Resources\CommentsResource;
use App\Http\Resources\PostsResource;
use App\Models\Posts;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use MailPoet\API\JSON\Response;

class PostsController extends Controller
{
    use HttpResponses;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->success(
            PostsResource::collection(
                Posts::with('category', 'user')->withCount('comments')->orderByDesc('id')->get()
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostsRequest $request)
    {
        // dump($request);
        $request->validated($request->all());
        
        // Image name
        if ($request->hasFile('Image')) {
            $imageName = "posts/" . time() . "-" . Str::random(5) . "." . $request->Image->getClientOriginalExtension();

            // $request->Image->move(dirname(base_path()) . '\Front-end\src\assets\uploads', $image); // To move the uploaded image to the frontend (bad method)
            Storage::disk('public')->put($imageName, file_get_contents($request->Image)); // Saving the image in the storage folder server side
        } else {
            $imageName = null;
        }
        
        // Insert ID of the user
        // $data = $request->all();
        // $data['User_id'] = Auth::id();
        // $request->merge($data);
        
        $post = Posts::create([
            'Title' => $request->Title,
            'Topic' => $request->Topic,
            'Image' => $imageName,
            'Category_id' => $request->Category_id,
            'User_id' => Auth::id(),
        ]);

        return $this->success(new PostsResource($post));
    }

    /**
     * Display the specified resource.
     */
    public function show(Posts $post)
    {
        $comments = $post->comments()
            ->with('user')
            ->withCount('likes')
            ->with(['likes' => function ($query) {
                $query->where('User_id', Auth::id());
            }])
            ->orderByDesc('id')->get();

        // dump($comments);
        
        return $this->success([
            'post' => new PostsResource($post),
            'comments' => CommentsResource::collection($comments)
        ]);
    }

    /**
     * Display all posts of a specific category.
     */
    public function filter($id)
    {
        return $this->success(
            PostsResource::collection(
                Posts::with('category', 'user')->where('Category_id', $id)->get()
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostsRequest $request, Posts $post)
    {
        if (Auth::user()->id != $post->User_id) {
            return $this->error('', 'You are not authorized to make this request.', 403);
        }

        $request->validated($request->all());

        // Image name
        if ($request->hasFile('Image')) {
            $imageName = "posts/" . time() . "-" . Str::random(5) . "." . $request->Image->getClientOriginalExtension();

            Storage::disk('public')->put($imageName, file_get_contents($request->Image)); // Saving the image in the storage folder server side
        } else {
            $imageName = null;
        }

        $post->update([
            'Title' => $request->Title,
            'Topic' => $request->Topic,
            'Image' => $imageName,
            'Category_id' => $request->Category_id,
        ]);

        return $this->success(new PostsResource($post));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Posts $post)
    {
        return $this->userNotAuthorized($post) ? $this->userNotAuthorized($post) : $post->delete();
    }

    /**
     * Search for a specific post.
     */
    public function search($search)
    {
        // dump($request);
        $search = Posts::where('Title', 'LIKE', '%' . $search . '%')->get();

        return $this->success($search);
    }

    private function userNotAuthorized($post)
    {
        if (Auth::user()->id != $post->User_id) {
            return $this->error('', 'You are not authorized to make this request.', 403);
        }
    }
}
