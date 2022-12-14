<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index($id)
    {

        $posts = Post::with('likes', 'author')->get();
        $post =  $posts->where('id', '=', $id)->first();
        $comments = $posts->where('reply_id', '=', $id)->reverse();

        return view('post', [
            'posts' => $posts,
            'post' => $post,
            'comments' => $comments,
            'post_id' => $post->id,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $post = new Post;
        $post->body = $request->body;
        $post->user_id = auth()->user()->id;

        if ($request->comment_id != -1) {
            $post->reply_id = $request->comment_id;
            $post->is_reply = true;
        }else{
            $post->is_reply = false;
        }

        $post->save();

        return back();
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $post = Post::all()
            ->where('id', '=', $id)
            ->first();
        $user_id = auth()->id();

        if ($post->user_id == $user_id) {
            $post->delete();
        }
        return back();
    }
}
