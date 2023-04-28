<?php

namespace App\Http\Controllers;

use App\Mail\CreatePostMail;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(3);
        foreach ($posts as $post) {
            $post->body = substr($post->body, 0, 100) . '...';
        }
        return view('posts', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:255|string',
            'body' => 'required|min:20|max:5000|string',
            'image_url' => 'required'
        ]);

        $post = new Post();
        $user = User::find(Auth::user()->id);

        $post->title = $request->title;
        $post->body = $request->body;
        $post->image_url = $request->image_url;
        $post->user()->associate($user);
        $post->save();

        foreach($request->tags as $tagId) {
            $post->tags()->attach($tagId);
        }

        $mailData = $post->only('title', 'body', 'image_url');
        // Mail::to($user->email)->send(new CreatePostMail($mailData));

        return redirect('createpost')->with('status', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $post = Post::find($id);
        $post = Post::with('comments')->find($id);
        return view('singlepost', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    public function createPost() {
        $tags = Tag::all();
        return view('createpost', compact('tags'));
    }

    public function getUserPosts($id) {
        $posts = Post::where('user_id', $id)->get();
        return view('posts', compact('posts'));
    }
}
