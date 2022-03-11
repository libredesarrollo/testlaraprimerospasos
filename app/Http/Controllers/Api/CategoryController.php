<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\PutRequest;
use App\Http\Requests\Category\StoreRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        return response()->json(Category::paginate(10));
    }


    public function store(StoreRequest $request)
    {
        return response()->json(Category::create($request->validated()));
    }


    public function show(Category $category)
    {
        return response()->json($category);
    }


    public function update(PutRequest $request, Category $category)
    {
        $category->update($request->validated());
        return response()->json($category);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json("ok");
    }

    public function posts(Category $category)
    {

        // $posts = Post::join('categories', 'categories.id', '=', 'posts.category_id')
        //     ->select('posts.*', 'categories.title as category')
        //     ->orderBy('posts.created_at', 'desc')->where('categories.id', $category->id)
        //     ->paginate(10);
        $posts = Post::with("category")
            ->orderBy('posts.created_at', 'desc')->where('category_id', $category->id)
            //->toSql();
            ->paginate(10);

           // dd($posts);

        return response()->json(["posts" => $posts, "category" => $category]);

        // sin relaciones
        // return $this->successResponse(["posts" => $category->post()->paginate(10), "category" => $category]);
    }
}
