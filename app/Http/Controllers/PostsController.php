<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::with('user', 'categories', 'tags')->get();
        return PostResource::collection($posts);
    }

    public function store(PostRequest $request)
    {
        $post = new Post();
        $post->user_id = auth()->user()->id;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->slug = Str::slug($request->title);
        $post->image_url = $request->image_url;
        $post->save();

        $post->categories()->attach($request->categories);
        $post->tags()->attach($request->tags);

        return new PostResource($post);
    }

    public function show(Post $post)
    {
        $post->load('user', 'categories', 'tags');
        return new PostResource($post);
    }

    public function update(PostRequest $request, Post $post)
    {
        $post->title = $request->title;
        $post->body = $request->body;
        $post->slug = Str::slug($request->title);
        $post->image_url = $request->image_url;
        $post->save();

        $post->categories()->sync($request->categories);
        $post->tags()->sync($request->tags);

        return new PostResource($post);
    }

    public function search(Request $request)
    {
        $query = $request->get('query');

        $posts = Post::where('title', 'like', '%' . $query . '%')
            ->orWhere('body', 'like', '%' . $query . '%')
            ->with('user', 'categories', 'tags')
            ->get();

        return PostResource::collection($posts);
    }



    public function destroy(Post $post)
    {
        $post->categories()->detach();
        $post->tags()->detach();
        $post->delete();

        return response(null, 204);
    }
}
