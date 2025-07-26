@extends('layouts.app')

@section('content')
<div x-data="{ tab: 'admin', showRegister: {{ session('showRegister') ? 'true' : 'false' }} }">
    <h2 class="text-2xl font-bold mb-4 text-center">Login Panel</h2>
    @if(session('success'))
    <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">{{ session('success') }}</div>
    @endif

    @if($errors->any())
    <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">
        {{ $errors->first() }}
    </div>
    @endif

    <!-- Tab Selector -->
    <div class="flex justify-center mb-4 space-x-2">
        <button @click="tab = 'admin'" :class="tab === 'admin' ? 'bg-emerald-600 text-white' : 'bg-gray-200 text-black'" class="px-4 py-2 rounded">
            Admin
        </button>
        <button @click="tab = 'master'" :class="tab === 'master' ? 'bg-emerald-600 text-white' : 'bg-gray-200 text-black'" class="px-4 py-2 rounded">
            Master Admin
        </button>
    </div>

    <!-- Admin Login Form -->
    <form x-show="tab === 'admin'" method="POST" action="{{ route('admin.login') }}">
        @csrf
        <input type="email" name="email" placeholder="Email Admin" class="w-full p-2 mb-4 border rounded" required>
        <input type="password" name="password" placeholder="Password" class="w-full p-2 mb-4 border rounded" required>
        <button class="w-full bg-emerald-600 text-white p-2 rounded">Login Admin</button>
        <p class="text-center mt-4 text-sm">
            Belum punya akun?
            <button type="button" @click="showRegister = true" class="text-emerald-600 hover:underline">Daftar di sini</button>
        </p>
    </form>

    <form x-show="tab === 'master'" method="POST" action="{{ route('master.login') }}" x-cloak>
        @csrf
        <input type="email" name="email" placeholder="Email Master Admin" class="w-full p-2 mb-4 border rounded" required>
        <input type="password" name="password" placeholder="Password" class="w-full p-2 mb-4 border rounded" required>
        <button class="w-full bg-emerald-600 text-white p-2 rounded">Login Master Admin</button>
    </form>


    <!-- Modal Register -->
    <div x-show="showRegister" @click.away="showRegister = false" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
        <div class="bg-white rounded-lg p-6 max-w-md w-full">
            <h3 class="text-xl font-bold mb-4 text-center">Daftar Admin Baru</h3>
            <form method="POST" action="{{ route('admin.register') }}">
                @csrf
                <input type="text" name="name" placeholder="Nama" class="w-full p-2 mb-4 border rounded" required>
                <input type="email" name="email" placeholder="Email" class="w-full p-2 mb-4 border rounded" required>
                <input type="password" name="password" placeholder="Password" class="w-full p-2 mb-4 border rounded" required>
                <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" class="w-full p-2 mb-4 border rounded" required>
                <div class="flex justify-end">
                    <button type="button" @click="showRegister = false" class="px-4 py-2 bg-gray-300 rounded mr-2">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-emerald-600 text-white rounded">Daftar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection