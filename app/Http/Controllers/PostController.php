<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Post;
use App\User;
use Auth;
use Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $posts = Post::all()->sortByDesc('created_at'); //retrieves the model data and sorts it descending by date.
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        //Validation is done in the CreatePostRequest.php request
        //store in the database
        $post = new Post;

        $post->title = $request->title; /*post'e esanciame title priskiriame is request gauto title reiksme*/
        $post->body = $request->body;
        $post->user_id = Auth::id(); //Gets and sets the current active user's id
        $post->save();

        $id = $post->id; //gets and sets the id from the Post object

        return redirect()->action(
            'PostController@show', ['id' => $id]
        );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $author = User::where('id', $post->user_id)->first()->nickname; //gets the author's nickname
        return view('posts.show')
            ->with(compact('post'))
            ->with(compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $user = Auth::user();
        if ($user->can('update', $post)){
            return view('posts.edit', compact('post'));
        } else {
            return redirect('posts')->with('message', 'You are not authorised for this action');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreatePostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->all());

        return redirect()->action(
            'PostController@show', ['id' => $id]
        );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = Auth::user();
        $post = Post::find($id);
        if ($user->can('delete', $post)) {
            $post->delete();
            return redirect()->route('posts.index');
        } else {
            return redirect('posts')->with('message', 'You are not authorised for this action');
        }
    }
}
