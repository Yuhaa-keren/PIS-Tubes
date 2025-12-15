<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; // Tambahkan ini untuk Auth::attempt

class AuthApiController extends Controller
{
    // ... (method register, login, logout Anda yang sudah ada) ...

    // Tambahkan method ini jika Anda ingin ada endpoint 'showLogin' di API
    public function showLogin()
    {
        // Karena ini API, Anda tidak akan merender view Blade di sini.
        // Anda bisa mengembalikan JSON yang mengindikasikan bahwa user perlu login,
        // atau jika ini endpoint yang tidak seharusnya diakses langsung, kembalikan error.
        return response()->json([
            'message' => 'Endpoint API login. Silakan kirim kredensial POST ke /api/login.',
            'status' => 'info_api_usage'
        ], 200); // 200 OK karena ini adalah informasi tentang API
    }

    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255', // Tambahkan max:255
                'email' => 'required|string|email|max:255|unique:users', // Tambahkan max:255
                'password' => 'required|string|min:6|confirmed',
                'department' => 'required|string|max:255', // Tambahkan max:255
                'batch' => 'required|string|max:255', // Tambahkan max:255
                'description' => 'nullable|string|max:1000', // Tambahkan nullable dan max:1000
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'department' => $request->department,
                'batch' => $request->batch,
                'description' => $request->description ?? null,
                'role' => 'user', // Tambahkan role default jika belum ada di migrasi/model
            ]);

            // Pastikan User model menggunakan HasApiTokens trait untuk createToken
            // di app/Models/User.php: use Laravel\Sanctum\HasApiTokens;

            return response()->json([
                'message' => 'Registrasi berhasil!', // Tambahkan pesan sukses
                'user' => $user,
                'token' => $user->createToken('api_token')->plainTextToken
            ], 201); 

        } catch (\Illuminate\Validation\ValidationException $e) { // Tangkap ValidationException
            return response()->json([
                'message' => 'Validasi gagal',
                'errors' => $e->errors() // Mengembalikan error validasi yang spesifik
            ], 422); // 422 Unprocessable Entity
        } catch (\Throwable $e) {
            // Log error untuk debugging lebih lanjut
            \Log::error('Error pada register: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return response()->json([
                'message' => 'Terjadi kesalahan server saat registrasi.',
                // 'error' => $e->getMessage(), // Jangan tampilkan error mentah di produksi
                // 'line' => $e->getLine() // Jangan tampilkan line di produksi
            ], 500);
        }
    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email|max:255', // Tambahkan max:255
                'password' => 'required|string', // Tambahkan string
            ]);

            // Gunakan Auth::attempt untuk autentikasi kredensial
            if (!Auth::attempt($request->only('email', 'password'))) {
                return response()->json(['message' => 'Kredensial tidak valid.'], 401);
            }

            $user = Auth::user(); // Ambil user yang sudah terautentikasi

            return response()->json([
                'message' => 'Login berhasil!', // Tambahkan pesan sukses
                'user' => $user,
                'token' => $user->createToken('api_token')->plainTextToken
            ], 200); // 200 OK

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);
        } catch (\Throwable $e) {
            \Log::error('Error pada login: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return response()->json([
                'message' => 'Terjadi kesalahan server saat login.',
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        // Pastikan user terautentikasi dan tokennya ada sebelum delete
        if ($request->user()) {
            $request->user()->currentAccessToken()->delete();
            return response()->json(['message' => 'Berhasil logout.'], 200);
        }

        return response()->json(['message' => 'Tidak ada user yang terautentikasi.'], 401); // Unauthorized
    }
}