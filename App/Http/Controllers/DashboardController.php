<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::with(['user', 'skills']);

        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhereHas('skills', function($skillQuery) use ($search) {
                      $skillQuery->where('name', 'like', "%{$search}%");
                  });
            });
        }

        if ($request->has('type') && $request->type !== 'all') {
            $query->where('type', $request->type);
        }

        $posts = $query->orderBy('created_at', 'desc')->paginate(12);
        $skills = Skill::all();

        return view('dashboard', compact('posts', 'skills'));
    }
}