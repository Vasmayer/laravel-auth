<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $posts = Post::All(); 
         return view('admin.posts.index',compact('posts')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
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
            'title' => 'required|min:5|max:50',
            'image' => 'url|max:255|nullable',
            'description' => 'required|min:5'
        ],[
            'required'=>':attribute il campo è obbligatorio',
            'image.url'=>'l \'url dell \'immagine è sbagliato',
            'description.min'=>'Cè una lunghezza minima di caratteri per la descrizione'
        ]);

        $data = $request->all(); 
        $post  = Post::create($data);
        
        return redirect()->route('admin.posts.show',$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Post $post)
    {
        $request->validate([
            'title' => 'required|min:5|max:50',
            'image' => 'url|max:255|nullable',
            'description' => 'required|min:5'
        ],[
            'required'=>':attribute il campo è obbligatorio',
            'image.url'=>'l \'url dell \'immagine è sbagliato',
            'description.min'=>'Cè una lunghezza minima di caratteri per la descrizione'
        ]);

        $data = $request->all(); 
        $post->update($data);
        
        return redirect()->route('admin.posts.index');
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
