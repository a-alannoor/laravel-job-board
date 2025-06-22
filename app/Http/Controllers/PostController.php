<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function index()
    {
        $posts = Post::cursorPaginate(5);
        return view(
            'post/index',
            [
                'posts' => $posts,
                'pageTitle' => 'Posts Page'
            ]
        );
    }

    function create()
    {
        Post::create([
            'title' => 'Post Title',
            'body' => 'Post Bodyyyyyyyyyyyyyyyyy',
            'published' => true,
            'author' => 'Abdullah',
        ]);

        return redirect('posts');
    }

    function show(int $id)
    {
        $post = Post::findOrFail($id);

        return view(
            'post/show',[
                'post' => $post,
                'pageTitle' => 'Post Show',
            ]);
    }

    function delete(int $id)
    {
        Post::destroy($id);
    }
}
