<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $items = DB::table('posts')
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->select('posts.*', 'users.name')
        ->get();
        return response()->json([
        'data' => $items
        ], 200);
    }
    public function store(Request $request)
    {
        $item = Post::create($request->all());
        return response()->json([
        'data' => $item
        ], 201);
    }
    public function show(Post $post)
        {
        $item = Post::find($post);
        if ($item) {
        return response()->json([
        'data' => $item
        ], 200);
        } else {
        return response()->json([
        'message' => 'Not found',
        ], 404);
        }
    }
    public function destroy(Post $post)
    {
        $item = Post::where('id', $post->id)->delete();
        if ($item) {
        return response()->json([
        'message' => 'Deleted successfully',
        ], 200);
        } else {
        return response()->json([
        'message' => 'Not found',
        ], 404);
        }
    }
}
