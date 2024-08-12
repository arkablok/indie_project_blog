<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return view('admin.read-posts', compact('comments'));
    }

    public function comment_store(Request $request, Post $post)
    {
        $this->validate($request, [
            'content' => 'required',
        ]);

        Comment::create([
            'content' => $request->input('content'),
            'user_id' => Auth::user()->id,
            'post_id' => $post->id,
            'comment_num' => rand(0, 999999999),
        ]);

        return back()->with('success', 'Comment has been posted');
    }


    public function update_comments(Request $request, Comment $comment,$slug)
    {
        $this->validate($request, [
            'content' => 'required',
        ]);

       $array=[
         'content'=>$request->content,
       ];

       $comment->update($array);

       
       return redirect()->route('posts',[$slug."#".$comment->comment_num]);

    }
}


