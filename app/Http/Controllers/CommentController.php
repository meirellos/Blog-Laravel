<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //

    public function store(Request $request, Post $post)
    {
        //dd('Create comment');

        $validated = $request->validate([
            'comment' => 'required',
        ]);

        $created =  Comment::create([
            'comment' => $validated['comment'],
            'user_id' => auth()->user()->id,
            'post_id' => $post->id
        ]);

        if ($created) {
            return back();
        }
        return back()->with('error_create_comment', 'Ocorreu um erro ao cadastrar comentário, tente novamente.');
    }

    public function destroy(Comment $comment)
    {
        //dd($id);
        //$comment = Comment::find($id);

        $comment->delete();

        return back();
    }
}
