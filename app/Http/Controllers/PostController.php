<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
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
     * @param $request
     * @param $post
     */
    public function setImage($request, $post)
    {
        $postImg = $request->file('postImg');
        $filename = time() . '.' . 'png';
        $filename2 = 'pixelated_' . $filename;
        $path = public_path('uploads/PostImages/');
        Image::make($postImg)->fit(700, 300)->encode('png')->insert(public_path('/img/watermark_new.png'), 'bottom-right')->save($path . $filename);
        Image::make($path . $filename)->pixelate(8)->save($path . $filename2);
        $post->image = $filename;
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        //Validation is done in the CreatePostRequest.php request
        $post = new Post;
        $post->title = $request->title; /*post'e esanciame title priskiriame is request gauto title reiksme*/
        $post->body = $request->body;
        $post->user_id = Auth::id(); //Gets and sets the current active user's id

        if ($request->hasFile('postImg')) {
            $this->setImage($request, $post);
        }

        $post->save();
        $id = $post->id; //gets and sets the id from the Post object

        return redirect()->action(
            'PostController@show', ['id' => $id]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $post = Post::findOrFail($id);
        $author = User::where('id', $post->user_id)->first()->nickname; //gets the author's nickname
        $name = User::where('id', $post->user_id)->first()->name;
        return view('posts.show')
            ->with(compact('post'))
            ->with(compact('user'))
            ->with(compact('author'))
            ->with(compact('name'))
            ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $user = Auth::user();

        if ($user->can('update', $post) || $user->isAdmin()) {
            return view('posts.edit', compact('post'));
        } else {
            return redirect('posts')->with('message', 'You are not authorised for this action');
        }
    }

    /**
     * Update the specified resource    in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreatePostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        if ($request->hasFile('postImg')) {
            if ($post->image != null && $post->image != 'Default.jpg') {
                $filename = $post->image;
                Storage::delete('/public/uploads/PostImages/' . $filename);
                Storage::delete('/public/uploads/PostImages/' . 'pixelated_' . $filename);
            }
            $this->setImage($request, $post);
        }

        $post->update($request->all());

        return redirect()->action(
            'PostController@show', ['id' => $id]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $post = Post::find($id);
        if ($user->can('delete', $post) || $user->isAdmin()) {
            if ($post->image != null) {
                $filename = $post->image;
                Storage::delete('/public/uploads/PostImages/' . $filename);
                Storage::delete('/public/uploads/PostImages/' . 'pixelated_' . $filename);
            }
            $post->delete();
            return redirect()->route('posts.index');
        } else {
            return redirect('posts')->with('message', 'You are not authorised for this action');
        }
    }

    /**
     *
     *
     *
     * @param $id
     * @return string
     */
    public function deleteImage($id)
    {
        //I call this method from edit.blade when deleting an image directly
        $user = Auth::user();
        $post = Post::find($id);

        if ($user->can('delete', $post) || $user->isAdmin()) {
            if ($post->image != null) {
                $filename = $post->image;
                Storage::delete('/public/uploads/PostImages/' . $filename);
                Storage::delete('/public/uploads/PostImages/' . 'pixelated_' . $filename);
                $post->image = null;
                $post->save();
                return redirect()->action(
                    'PostController@edit', ['id' => $id]
                )->withMessage('The image has been deleted');
            }
            return redirect()->action(
                'PostController@edit', ['post' => $post]
            )->withMessage('There is no image');
        } else {
            return redirect('posts')->with('message', 'You are not authorised for this action');
        }
    }
}
