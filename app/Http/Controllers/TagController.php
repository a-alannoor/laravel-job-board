<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        return view(
            'tag/index',
            [
                'tags' => $tags,
                'pageTitle' => 'Tags Page'
            ]
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tag = Tag::findOrFail($id);
        return view('tag.show', [
            'tag' => $tag,
            'pageTitle' => 'Tag - Show',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    function attach(string $postId)
    {
        $post = Post::findOrFail($postId);
        $post->tags()->attach(['01979d71-a2a8-71a4-8326-38ee72d4df3d', '01979d71-a2ad-7233-9728-e12e4aec88af']);

        $post->load('tags');

        return response()->json($post);

    }
}
