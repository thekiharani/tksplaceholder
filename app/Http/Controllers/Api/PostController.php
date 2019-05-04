<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return PostResource::collection($posts);
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'body' => 'required',
        ]);
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return response()->json(['message' => 'Resource Created','created' => $post], 201);
    }

    // Display the specified resource.
    public function show(Post $post)
    {
        return new PostResource($post);
    }

    // Update the specified resource in storage.
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string',
            'body' => 'required',
        ]);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return response()->json(['message' => 'Resource Updated','updated' => $post], 200);
    }

    // Remove the specified resource from storage.
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json(['message' => 'Resource Deleted'], 204);
    }
    
}
