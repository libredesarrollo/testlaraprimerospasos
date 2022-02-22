<?php

namespace App\Http\Controllers;

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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();

        $categories = Category::pluck('id', 'title');
        return view('dashboard/post/create', compact('post', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {

        //$requestData['url_clean'] = $urlClean;

        //$validator = Validator::make($requestData, StorePostPost::myRules());

        $validated = $request->validate([
            // 'slug' => 'max:500|unique:posts',
            'content' => 'required|min:5',
            'description' => 'required|min:5|max:500',
            //'category_id' => 'required',
            // 'posted' => 'required',
            'title' => [
                'required',
                'min:5',
                'max:500',
                //new Uppercase()
            ]
        ]);

        dd($validated);

        // if ($validated->fails()) {
        //     return "Error";
        // }


        // if ($validator->fails()) {
        //     return redirect('dashboard/post/create')
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        $requestData = $request->validated();

        $post = Post::create($requestData);

        $post->tags()->sync($request->tags_id);

        return back()->with('status', 'Post creado con exito');
        echo request("title");
        echo $request->input('title');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
