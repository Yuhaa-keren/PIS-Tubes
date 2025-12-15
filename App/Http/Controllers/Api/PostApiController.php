<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostApiController extends Controller
{
    public function index()
    {
        return response()->json(Post::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:need_help,need_for_help',
            'title' => 'required|string',
            'description' => 'required|string',
            'deadline' => 'nullable|date',
            'preference' => 'nullable|string'
        ]);

        $post = Post::create([
            'user_id' => $request->user()->id,
            'type' => $request->type,
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'preference' => $request->preference,
        ]);

        return response()->json($post, 201);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return response()->json($post);
    }
}