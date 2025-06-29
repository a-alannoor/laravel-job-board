<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(5);
        return view(
            'post/index',
            [
                'posts' => $posts,
                'pageTitle' => 'Posts Page'
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create', [
            'pageTitle' => 'Post - Create New One'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post = new Post();
        $post->title = $request->input('title');
        $post->author = $request->input('author');
        $post->body = $request->input(key: 'body');
        $post->published = $request->has('published');

        $post->save();

        return redirect('/post')->with('success', 'The post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);

        return view(
            'post/show',
            [
                'post' => $post,
                'pageTitle' => 'Post Show',
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('post.edit', [
            'pageTitle' => 'Post - Edit Post: ' . $post->title,
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request, string $id)
    {
        $post = Post::findOrFail($id);

        $post->title = $request->input('title');
        $post->author = $request->input('author');
        $post->body = $request->input(key: 'body');
        $post->published = $request->has('published');

        $post->update();

        return redirect('/post')->with('success', 'The post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::findOrFail($id)->delete();
        return redirect('/post')->with('success', 'Post deleted successfully');
    }
}
