@extends('layouts.template')

@section('content')
    @if (Session::get('failed'))
        <div class="bg-red-500 text-white p-4 rounded-lg mb-4 shadow-lg">
            {{ Session::get('failed') }}
        </div>
    @endif

    <div class="bg-gradient-to-r from-indigo-500 to-indigo-700 p-6 rounded-lg shadow-md text-white">
        <h1 class="text-4xl font-extrabold mb-4">Selamat Datang {{-- {{ Auth::user()->name }} --}}!</h1>
        <hr class="my-4 border-blue-300">
        <p class="text-lg font-light">Aplikasi ini digunakan hanya oleh pegawai administrator PERPUSTAKAAN. Digunakan untuk mengelola data buku, peminjaman, dan lainnya.</p>
    </div>

    <div class="mt-8 flex gap-3">
        <div class="bg-white rounded-lg shadow-lg p-6 w-1/3 text-center hover:bg-gray-100 transition-all">
            <h3 class="text-xl font-semibold text-gray-700 mb-2">Kelola Data Buku</h3>
            <p class="text-gray-500">Tambah, hapus, dan kelola buku perpustakaan dengan mudah.</p>
            <a href="{{ route('book.index') }}" class="block mt-4 text-blue-600 hover:underline">Lihat Data Buku</a>
        </div>
    
        <div class="bg-white rounded-lg shadow-lg p-6 w-1/3 text-center hover:bg-gray-100 transition-all">
            <h3 class="text-xl font-semibold text-gray-700 mb-2">Kelola Peminjaman</h3>
            <p class="text-gray-500">Atur peminjaman dan pengembalian buku dengan efisien.</p>
            <a href="#" class="block mt-4 text-blue-600 hover:underline">Lihat Data Peminjaman</a>
        </div>
    
        <div class="bg-white rounded-lg shadow-lg p-6 w-1/3 text-center hover:bg-gray-100 transition-all">
            <h3 class="text-xl font-semibold text-gray-700 mb-2">Kelola Anggota</h3>
            <p class="text-gray-500">Kelola data anggota perpustakaan secara terorganisir.</p>
            <a href="#" class="block mt-4 text-blue-600 hover:underline">Lihat Data Anggota</a>
        </div>
    </div>
    
@endsection
