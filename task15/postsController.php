<?php

//api.php
use App\Http\Controllers\PostController;

Route::apiResource('posts', PostController::class);

//php artisan make:controller PostController --api

//PostController.php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return Post::all(); //возвращает все посты
    }

    public function show($id)
    {
        return Post::findOrFail($id);
    }

    public function store(Request $request)
    {
        $post = Post::create($request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]));

        return response()->json($post, 201);
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->validate([
            'title' => 'sometimes|required|string',
            'body' => 'sometimes|required|string',
        ]));

        return response()->json($post);
    }

    public function destroy($id)
    {
        Post::destroy($id);
        return response()->json(null, 204);
    }
}

//get-запрос через fetch

<script>
fetch('/api/posts')
  .then(response => response.json())
  .then(data => {
    console.log(data);
    //здесь можно отрисовать данные на странице
  })
  .catch(error => console.error('Error:', error));
</script>