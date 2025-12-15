<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Post;
use App\Models\Portfolio;
use App\Models\Warning;
use App\Http\Controllers\PostController;
use Exception;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalOpenPosts = Post::where('status', 'open')->count();
        $totalNeedHelpPosts = Post::where('type', 'need_help')->count();
        $totalPortfolioItems = Portfolio::count();
        $totalWarnings = Warning::count();
        $pendingWarnings = Warning::where('status', 'pending_action')->count(); 

        $latestPosts = Post::with('user')->latest()->take(5)->get();
        $latestUsers = User::latest()->take(5)->get();
        $latestPortfolios = Portfolio::with('user')->latest()->take(5)->get();
        $latestWarnings = Warning::with('user')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalOpenPosts',
            'totalNeedHelpPosts',
            'totalPortfolioItems',
            'totalWarnings',
            'pendingWarnings',
            'latestPosts',
            'latestUsers',
            'latestPortfolios',
            'latestWarnings'
        ));
    }

    public function users()
    {
        $users = User::paginate(20);
        return view('admin.users.index', compact('users'));
    }

    public function destroyUser(User $user)
    {
        if (Auth::check() && Auth::user()->id === $user->id) {
            return back()->with('error', 'Anda tidak bisa menghapus akun Anda sendiri!');
        }

        try {
            $user->delete(); 
            return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil dihapus.');
        } catch (\Exception $e) {
            \Log::error('Error deleting user: ' . $e->getMessage(), ['user_id' => $user->id]);
            return back()->with('error', 'Gagal menghapus pengguna: ' . $e->getMessage());
        }
    }

    public function posts()
    {
        try {
            $posts = Post::with('user')->latest()->paginate(20);
            return view('admin.posts.index', compact('posts'));
        } catch (\Exception $e) {
            \Log::error('Error fetching posts: ' . $e->getMessage());
            return back()->with('error', 'Gagal memuat daftar postingan: ' . $e->getMessage());
        }
    }

    public function destroyPost(Post $post)
    {
        return (new PostController())->destroy($post);
        try {
            $post->delete();
            return redirect()->route('admin.posts.index')->with('success', 'Postingan berhasil dihapus.');
        } catch (\Exception $e) {
            $post->delete(); 
            return redirect()->route('admin.posts.index')->with('success', 'Postingan berhasil dihapus.');
        } catch (\Exception $e) {
            \Log::error('Error deleting post: ' . $e->getMessage(), ['post_id' => $post->id]);
            return back()->with('error', 'Gagal menghapus postingan: ' . $e->getMessage());
        }
    }

    public function portfolios()
    {
        try {
            $portfolios = Portfolio::with('user')->latest()->paginate(20);
            return view('admin.portfolios.index', compact('portfolios'));
        } catch (\Exception $e) {
            \Log::error('Error fetching portfolios: ' . $e->getMessage());
            return back()->with('error', 'Gagal memuat daftar portfolio: ' . $e->getMessage());
        }
    }

    public function destroyPortfolio(Portfolio $portfolio)
    {
        try {
            $portfolio->delete();
            return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio berhasil dihapus.');
        } catch (\Exception $e) {
            $portfolio->delete(); 
            return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio berhasil dihapus.');
        } catch (\Exception $e) {
            \Log::error('Error deleting portfolio: ' . $e->getMessage(), ['portfolio_id' => $portfolio->id]);
            return back()->with('error', 'Gagal menghapus portfolio: ' . $e->getMessage());
        }
    }

    public function warnings()
    {
        $warnings = Warning::with(['user', 'admin'])->latest()->paginate(20);
        return view('admin.warnings.index', compact('warnings'));
    }

    public function createWarningForm()
    {
        $users = User::orderBy('name')->get();
        return view('admin.warnings.create', compact('users'));
    }

    public function storeWarning(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'required|exists:users,id',
                'warning_type' => [ 
                    'required',
                    'string',
                    Rule::in(['Tindakan Akun (Blokir/Suspend)', 'Pelanggaran Aturan', 'Pengumuman Penting', 'Lain-lain']),
                ],
                'subject' => 'required|string|max:255',
                'message' => 'required|string',
                'expires_at' => 'nullable|date|after_or_equal:today',
            ], [
                'user_id.required' => 'Pilih pengguna yang akan diberi peringatan.',
                'user_id.exists' => 'Pengguna yang dipilih tidak valid.',
                'warning_type.required' => 'Tipe peringatan harus dipilih.',
                'warning_type.in' => 'Tipe peringatan yang dipilih tidak valid.',
                'subject.required' => 'Subjek/Judul peringatan harus diisi.',
                'subject.string' => 'Subjek/Judul harus berupa teks.',
                'subject.max' => 'Subjek/Judul peringatan tidak boleh lebih dari :max karakter.',
                'message.required' => 'Pesan peringatan harus diisi.',
                'message.string' => 'Pesan harus berupa teks.',
                'expires_at.date' => 'Format tanggal kadaluarsa tidak valid.',
                'expires_at.after_or_equal' => 'Tanggal kadaluarsa tidak boleh sebelum hari ini.',
            ]);

            $warning = new Warning();
            $warning->user_id = $request->input('user_id');
            $warning->subject = $request->input('subject');
            $warning->message = $request->input('message');
            $warning->warning_type = $request->input('warning_type');

            $warning->expires_at = $request->input('expires_at');

            if (Auth::check()) {
                $warning->admin_id = Auth::id();
            } else {
                $warning->admin_id = null;
            }
            $warning->status = 'sent';

            $warning->save();

            return redirect()->route('admin.warnings.index')->with('success', 'Peringatan berhasil disimpan!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Validation error in storeWarning: ' . json_encode($e->errors()));
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            \Log::error('General error in storeWarning: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan peringatan: ' . $e->getMessage());
        }
    }

    public function editWarning(Warning $warning)
    {
        $users = User::orderBy('name')->get();
        return view('admin.warnings.edit', compact('warning', 'users'));
    }

    public function updateWarning(Request $request, Warning $warning)
    {
        try {
            $request->validate([
                'user_id' => 'required|exists:users,id',
                'warning_type' => [
                    'required',
                    'string',
                    Rule::in(['Tindakan Akun (Blokir/Suspend)', 'Pelanggaran Aturan', 'Pengumuman Penting', 'Lain-lain']),
                ],
                'subject' => 'required|string|max:255',
                'message' => 'required|string',
                'expires_at' => 'nullable|date|after_or_equal:today',
                'status' => ['required', 'string', Rule::in(['sent', 'read', 'resolved', 'pending_action'])],
            ], [
                'user_id.required' => 'Pilih pengguna yang akan diberi peringatan.',
                'user_id.exists' => 'Pengguna yang dipilih tidak valid.',
                'warning_type.required' => 'Tipe peringatan harus dipilih.',
                'warning_type.in' => 'Tipe peringatan yang dipilih tidak valid.',
                'subject.required' => 'Subjek/Judul peringatan harus diisi.',
                'subject.string' => 'Subjek/Judul harus berupa teks.',
                'subject.max' => 'Subjek/Judul peringatan tidak boleh lebih dari :max karakter.',
                'message.required' => 'Pesan peringatan harus diisi.',
                'message.string' => 'Pesan harus berupa teks.',
                'expires_at.date' => 'Format tanggal kadaluarsa tidak valid.',
                'expires_at.after_or_equal' => 'Tanggal kadaluarsa tidak boleh sebelum hari ini.',
                'status.required' => 'Status peringatan harus dipilih.',
                'status.in' => 'Status peringatan yang dipilih tidak valid.',
            ]);

            $warning->user_id = $request->input('user_id');
            $warning->subject = $request->input('subject'); 
            $warning->message = $request->input('message');
            $warning->warning_type = $request->input('warning_type'); 
            $warning->expires_at = $request->input('expires_at');
            $warning->status = $request->input('status');

            $warning->save();

            return redirect()->route('admin.warnings.index')->with('success', 'Peringatan berhasil diperbarui!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Validation error in updateWarning: ' . json_encode($e->errors()));
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            \Log::error('Error updating warning: ' . $e->getMessage(), ['warning_id' => $warning->id]);
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui peringatan: ' . $e->getMessage());
        }
    }

    public function destroyWarning(Warning $warning)
    {
        try {
            $warning->delete();
            return redirect()->route('admin.warnings.index')->with('success', 'Peringatan berhasil dihapus.');
        } catch (\Exception $e) {
            \Log::error('Error deleting warning: ' . $e->getMessage(), ['warning_id' => $warning->id]);
            return back()->with('error', 'Gagal menghapus peringatan: ' . $e->getMessage());
        }
    }
}