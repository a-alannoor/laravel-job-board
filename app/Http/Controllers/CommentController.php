<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    function index()
    {
        $comments = Comment::cursorPaginate(10);
        // $comments = Comment::simplePaginate(10);
        return view(
            'comment.index',
            [
                'comments' => $comments,
                'pageTitle' => 'Comments'
            ]
        );
    }

    function create()
    {
        Comment::create([
            'content' => 'Comment Content',
            'post_id' => 13,
            'author' => 'Abdullah',
        ]);

        return redirect('posts');
    }

    function show(int $id)
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


}
