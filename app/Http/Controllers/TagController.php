<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    function index()
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

    function attach(int $postId)
    {
        $post = Post::findOrFail($postId);
        $post->tags()->attach(['1', '2']);

        $post->load('tags');

        return response()->json($post);

    }
}
