<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests\CreatePostRequest;
use Request;

use Illuminate\Routing\Controller;
use App\Post;
use App\User;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Post::all()->sortByDesc('created_at'); //retrieves the model data and sorts it descending by date.
        return view('posts.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        if ()
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
        $article = Post::findOrFail($id);
        $author = User::where('id', $article->user_id)->first();
        return view('posts.show')
            ->with(compact('article'))
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
        $article = Post::findOrFail($id);

        return view('posts.edit', compact('article'));
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
        $article = Post::findOrFail($id);

        $article->update($request->all());

        return redirect('posts');
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
