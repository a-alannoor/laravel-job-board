<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::paginate(10);
        // $comments = Comment::simplePaginate(10);
        return view(
            'comment.index',
            [
                'comments' => $comments,
                'pageTitle' => 'Comments'
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comment.create', [
            'psgeTitle' => 'Comment - Create New One', 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Comment::create([
            'content' => 'Comment Content',
            'post_id' => 13,
            'author' => 'Abdullah',
        ]);

        return redirect('posts');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $commnet = Comment::findOrFail($id);
        return view(
            'comment.show',
            [
                'comment' => $commnet,
                'pageTitle' => 'Comment Show'
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('comment.edit' , [
            'pageTitle' => 'Comment - Update this Comment', 
        ]);
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
}
