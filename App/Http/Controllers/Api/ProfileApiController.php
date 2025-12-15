<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileApiController extends Controller
{
    public function show(Request $request)
    {
        return response()->json($request->user());
    }

    public function update(Request $request)
    {
        $user = $request->user();

        $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:users,email,' . $user->id,
            'department' => 'nullable|string',
            'batch' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $user->update($request->only(['name', 'email', 'department', 'batch', 'description']));

        return response()->json($user);
    }
}