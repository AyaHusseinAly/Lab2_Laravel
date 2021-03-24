<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;


class PostController extends Controller
{


    public function index()
    {
        //dd(Post::paginate(3));
        $posts=Post::with('myUserRelation')->paginate(3);
        return view('posts.index', [
            //'posts' => Post::all()
            'posts' => $posts
        ]);
    }

    public function show($postId)
    {
        $post = Post::find($postId);

        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function create()
    {
        
        return view('posts.create',[
            'users'=>User::all()
            ]);
    }

    public function store(StorePostRequest $request)
    {/*
        $validated = $request->validate([
            'title' =>  ['required','unique:posts', 'regex:/^[a-zA-Z0-9\s]+$/','min:3'],
            'description' => ['required','min:10'],
        ]);*/
        /*
        $requestData=$request->all();
        Post::create($requestData);
        */
        //$slug = Str::slug($request->title, '-');
        //dd($slug);
        $post= new Post;
        $post->title=$request->title;
        $post->slug=Str::slug($request->title, '-');
        $post->description=$request->description;
        $post->user_id=$request->user_id;

        $post->save();
        
        return redirect()->route('posts.index');
    }

    public function edit($postId)
    {
        $post = Post::find($postId);
        
        return view('posts.edit', [
            'post' => $post,
        ],[
            'users'=>User::all()
            ]);
    }
    public function update($postId,UpdatePostRequest $request)
    {  /*
        $validated = $request->validate([
            'title' =>  ['required','unique:posts','regex:/^[a-zA-Z0-9\s]+$/','min:3'],
            'description' => ['required','min:10'],
        ]);
        
        $this->validate($request, [
            'title' => [
                'required',
                Rule::unique('posts')->ignore($postId),
                'regex:/^[a-zA-Z0-9\s]+$/',
                'min:3'
            ],
        ]);*/
        //$requestData=request()->all();
        //dd($requestData);
     
        $slug=Str::slug($request->title, '-');

        Post::find($postId)->update(['title'=>$request->title,'slug'=>$slug,'description'=>$request->description,'user_id'=>$request->user_id ]);
            
        return redirect()->route('posts.index');
    
    }

    public function delete($postId)
    {
        Post::find($postId)->delete();
            
        return redirect()->route('posts.index');
    
    }

}
