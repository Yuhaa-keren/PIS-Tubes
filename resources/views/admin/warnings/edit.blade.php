@extends('layouts.app')

@section('title', 'Admin - Edit Peringatan')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold text-gray-900 mb-6">Edit Peringatan</h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                <strong class="font-bold">Oops!</strong>
                <span class="block sm:inline">Ada beberapa masalah dengan input Anda.</span>
                <ul class="mt-3 list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <form action="{{ route('admin.warnings.update', $warning) }}" method="POST">
            @csrf
            @method('PUT') {{-- Penting untuk operasi update --}}

            <div class="mb-4">
                <label for="user_id" class="block text-gray-700 text-sm font-bold mb-2">Pilih Pengguna:</label>
                <select name="user_id" id="user_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('user_id') border-red-500 @enderror" required>
                    <option value="">-- Pilih Pengguna --</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id', $warning->user_id) == $user->id ? 'selected' : '' }}>
                            {{ $user->name }} ({{ $user->email }})
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="warning_type" class="block text-gray-700 text-sm font-bold mb-2">Tipe Peringatan:</label>
                <select name="warning_type" id="warning_type" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('warning_type') border-red-500 @enderror" required>
                    <option value="">-- Pilih Tipe --</option>
                    <option value="Pelanggaran Aturan" {{ old('warning_type', $warning->level) == 'Pelanggaran Aturan' ? 'selected' : '' }}>Pelanggaran Aturan</option>
                    <option value="Tindakan Akun (Blokir/Suspend)" {{ old('warning_type', $warning->level) == 'Tindakan Akun (Blokir/Suspend)' ? 'selected' : '' }}>Tindakan Akun (Blokir/Suspend)</option>
                    <option value="Pengumuman Penting" {{ old('warning_type', $warning->level) == 'Pengumuman Penting' ? 'selected' : '' }}>Pengumuman Penting</option>
                    <option value="Lain-lain" {{ old('warning_type', $warning->level) == 'Lain-lain' ? 'selected' : '' }}>Lain-lain</option>
                </select>
                @error('warning_type')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="subject" class="block text-gray-700 text-sm font-bold mb-2">Subjek/Judul:</label>
                <input type="text" name="subject" id="subject" value="{{ old('subject', $warning->title) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('subject') border-red-500 @enderror" placeholder="Subjek peringatan (misal: Pelanggaran Spam)" required>
                @error('subject')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="message" class="block text-gray-700 text-sm font-bold mb-2">Pesan:</label>
                <textarea name="message" id="message" rows="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('message') border-red-500 @enderror" placeholder="Isi pesan peringatan lengkap" required>{{ old('message', $warning->description) }}</textarea>
                @error('message')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="expires_at" class="block text-gray-700 text-sm font-bold mb-2">Kadaluarsa Pada (Opsional):</label>
                <input type="datetime-local" name="expires_at" id="expires_at" value="{{ old('expires_at', $warning->expires_at ? $warning->expires_at->format('Y-m-d\TH:i') : '') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('expires_at') border-red-500 @enderror">
                @error('expires_at')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status:</label>
                <select name="status" id="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('status') border-red-500 @enderror" required>
                    <option value="active" {{ old('status', $warning->status) == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="resolved" {{ old('status', $warning->status) == 'resolved' ? 'selected' : '' }}>Resolved</option>
                    <option value="expired" {{ old('status', $warning->status) == 'expired' ? 'selected' : '' }}>Expired</option>
                    <option value="pending" {{ old('status', $warning->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="flex items-center justify-between mt-6">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300">
                    <i class="fas fa-save mr-2"></i> Perbarui Peringatan
                </button>
                <a href="{{ route('admin.warnings.index') }}" class="inline-block align-baseline font-bold text-sm text-gray-600 hover:text-gray-800">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
