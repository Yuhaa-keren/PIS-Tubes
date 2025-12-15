<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:open,need',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'deadline' => 'required|date|after:today',
            'preference' => 'required|in:online,offline,both',
            'skills' => 'required|array|min:1',
            'skills.*' => 'exists:skills,id',
        ]);

        $post = Post::create([
            'user_id' => Auth::id(),
            'type' => $request->type,
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'preference' => $request->preference,
        ]);

        $post->skills()->attach($request->skills);

        return redirect()->route('dashboard')->with('success', 'Post created successfully!');
    }

    public function update(Request $request, Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'type' => 'required|in:open,need',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'deadline' => 'required|date|after:today',
            'preference' => 'required|in:online,offline,both',
            'skills' => 'required|array|min:1',
            'skills.*' => 'exists:skills,id',
        ]);

        $post->update([
            'type' => $request->type,
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'preference' => $request->preference,
        ]);

        $post->skills()->sync($request->skills);

        return redirect()->route('dashboard')->with('success', 'Post updated successfully!');
    }

    public function destroy(Post $post)
    {
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
        if (Auth::id() !== $post->user_id && !(Auth::check() && Auth::user()->is_admin)) {
            return back()->with('error', 'Anda tidak memiliki izin untuk menghapus postingan ini.');
=======
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
        if ($post->user_id !== Auth::id()) {
            abort(403);
>>>>>>> Stashed changes
        }

        try {
            $post->delete();
            if (Auth::check() && Auth::user()->is_admin) {
                return redirect()->route('admin.posts.index')->with('success', 'Postingan berhasil dihapus oleh Admin.');
            } else {
                return redirect()->route('dashboard')->with('success', 'Postingan Anda berhasil dihapus.');
            }
        } catch (\Exception $e) {
            Log::error('Error deleting post: ' . $e->getMessage(), ['post_id' => $post->id, 'user_id' => Auth::id()]);
            return back()->with('error', 'Gagal menghapus postingan: ' . $e->getMessage());
        }
    }
}