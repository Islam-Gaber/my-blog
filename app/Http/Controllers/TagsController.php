<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Resources\TagResource;
use App\Http\Requests\TagRequest;

class TagsController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return TagResource::collection($tags);
    }

    public function store(TagRequest $request)
    {
        $tag = new Tag([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        $tag->save();

        return new TagResource($tag);
    }

    public function show($id)
    {
        $tag = Tag::findOrFail($id);
        return new TagResource($tag);
    }

    public function update(TagRequest $request, $id)
    {
        $tag = Tag::findOrFail($id);

        $tag->name = $request->name;
        $tag->slug = $request->slug;

        $tag->save();

        return new TagResource($tag);
    }

    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();

        return response()->json(null, 204);
    }
}
