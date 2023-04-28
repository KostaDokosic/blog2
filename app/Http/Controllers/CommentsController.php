<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Auth::check()) {
            return redirect('/' . $request->post_id)->withErrors('Only authenticated user can post comments');
        }

        $request->validate([
            'body' => 'required|min:2|max:2000|string',
            'post_id' => 'required|exists:posts,id'
        ]);

        $post = Post::find($request->post_id);

        $user = User::find(Auth::user()->id);

        $comment = new Comment();
        $comment->body = $request->body;
        $comment->post()->associate($post);
        $comment->user()->associate($user);
        $comment->save();

        return redirect('/' . $request->post_id)->with('status', 'Comment successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:comments,id',
            'body' => 'required|min:1'
        ]);

        $comment = Comment::find($request->id);
        $comment->body = $request->body;
        $comment->save();

        return redirect('/'. $comment->post_id)->with('status', 'Comment successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
