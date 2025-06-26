<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::latest()->paginate(10);
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
        return redirect("/post");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request)
    {
        $comment = new Comment();
        $comment->post_id = $request->input('post_id');
        $comment->author = $request->input('author');
        $comment->content = $request->input('content');

        $comment->save();

        return redirect("/post/$comment->post_id")->with('success', 'The comment is created successfully.');
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
