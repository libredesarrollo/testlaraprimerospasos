<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PutRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      return response()->json(Post::paginate(10));
   }




   public function store(StoreRequest $request)
   {
      return response()->json(Post::create($request->validated()));
   }


   public function show(Post $post)
   {
      return response()->json($post);
   }

   public function slug(Post $post)
   {
      //$post = Post::with("category")->where('slug', $slug)->firstOrFail();
      $post->category;
      return response()->json($post);
   }





   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Post  $post
    * @return \Illuminate\Http\Response
    */
   public function update(PutRequest $request, Post $post)
   {
      $post->update($request->validated());
      return response()->json($post);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Post  $post
    * @return \Illuminate\Http\Response
    */
   public function destroy(Post $post)
   {
      $post->delete();
      return response()->json("ok");
   }
}
