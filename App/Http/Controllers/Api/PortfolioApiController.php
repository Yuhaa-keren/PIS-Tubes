<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Portfolio;

class PortfolioApiController extends Controller
{
    public function index()
    {
        return response()->json(Portfolio::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'link' => 'nullable|string',
            'file_path' => 'nullable|string'
        ]);

        $portfolio = Portfolio::create([
            'user_id' => $request->user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'link' => $request->link,
            'file_path' => $request->file_path,
        ]);

        return response()->json($portfolio, 201);
    }

    public function show($id)
    {
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
=======
        $portfolio = Portfolio::findOrFail($id);
        return response()->json($portfolio);
>>>>>>> Stashed changes
=======
        $portfolio = Portfolio::findOrFail($id);
        return response()->json($portfolio);
>>>>>>> Stashed changes
=======
        $portfolio = Portfolio::findOrFail($id);
        return response()->json($portfolio);
>>>>>>> Stashed changes
=======
        $portfolio = Portfolio::findOrFail($id);
        return response()->json($portfolio);
>>>>>>> Stashed changes
=======
        $portfolio = Portfolio::findOrFail($id);
        return response()->json($portfolio);
>>>>>>> Stashed changes
        try {
            // Ambil data portfolio berdasarkan ID dan pastikan itu milik user yang sedang login
            // Gunakan ->with('skills') untuk memuat relasi skills
            $portfolio = Portfolio::where('user_id', Auth::id())
                                ->with('skills') // Memuat relasi skills
                                ->find($id);

            if (!$portfolio) {
                return response()->json(['message' => 'Portfolio not found or unauthorized.'], 404);
            }

            // Kembalikan data portfolio sebagai JSON
            return response()->json($portfolio, 200);

        } catch (\Exception $e) {
            // Log error untuk debugging di server
            Log::error('Error fetching single portfolio item via API:', [
                'user_id' => Auth::id(),
                'portfolio_id' => $id,
                'error_message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            // Kembalikan respons error 500 Internal Server Error
            return response()->json(['message' => 'Failed to fetch portfolio item due to a server error.'], 500);
        }
    }
}