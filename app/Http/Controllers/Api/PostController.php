<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Requests\StorePostRequest;



class PostController extends Controller
{
    public function index(){
        //dd("we're in post api");
        $posts=Post::all();
        return PostResource::collection($posts);

    }
    public function show(Post $post){
       // $post = Post::find($postId);
        return new PostResource($post);
    }

    public function store(StorePostRequest $request){
        $post= new Post;
        $post->title=$request->title;
        $post->slug=Str::slug($request->title, '-');
        $post->description=$request->description;
        $post->user_id=$request->user_id;

        $post->save();
        
        return new PostResource($post);;
    }

}
