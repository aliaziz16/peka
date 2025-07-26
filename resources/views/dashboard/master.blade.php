@extends('layouts.master')

@section('content')
<div class="relative max-w-7xl mx-auto pt-24 px-6 pb-16">

    <h1 class="text-3xl font-extrabold text-blue-700 mb-8 tracking-wide">Dashboard Master Admin</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded mb-6 shadow">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tambah Admin Form -->
    <div class="bg-white border border-gray-200 p-6 rounded-xl shadow-md mb-10">
        <h2 class="text-2xl font-semibold mb-4 text-gray-700">Tambah Admin Baru</h2>
        <form action="{{ route('master.admins.store') }}" method="POST" class="space-y-4">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <input type="text" name="name" placeholder="Nama"
                    class="border border-gray-300 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <input type="email" name="email" placeholder="Email"
                    class="border border-gray-300 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <input type="password" name="password" placeholder="Password"
                    class="border border-gray-300 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <button type="submit"
                class="mt-4 px-5 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg font-semibold transition">+ Tambah</button>
        </form>
    </div>

    <!-- List Admins -->
    <div class="bg-white border border-gray-200 p-6 rounded-xl shadow-md">
        <h2 class="text-2xl font-semibold mb-4 text-gray-700">Daftar Admin</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 text-sm rounded-lg">
                <thead>
                    <tr class="bg-blue-50 text-blue-800 text-left">
                        <th class="p-3 border-b">#</th>
                        <th class="p-3 border-b">Nama</th>
                        <th class="p-3 border-b">Email</th>
                        <th class="p-3 border-b">Status</th>
                        <th class="p-3 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admins as $index => $admin)
                    <tr class="hover:bg-gray-50 border-b">
                        <td class="p-3">{{ $index + 1 }}</td>
                        <td class="p-3">{{ $admin->name }}</td>
                        <td class="p-3">{{ $admin->email }}</td>
                        <td class="p-3">
                            <span class="px-3 py-1 rounded-full text-xs font-medium {{
                                $admin->status === 'approved' ? 'bg-green-100 text-green-700' :
                                ($admin->status === 'pending' ? 'bg-yellow-100 text-yellow-700' :
                                'bg-red-100 text-red-700')
                            }}">
                                {{ ucfirst($admin->status) }}
                            </span>
                        </td>
                        <td class="p-3 space-x-1">
                            @if($admin->status !== 'approved')
                            <form class="inline" method="POST" action="{{ route('master.admins.approve', $admin->id) }}">
                                @csrf
                                <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-xs">Setujui</button>
                            </form>
                            @endif
                            @if($admin->status !== 'rejected')
                            <form class="inline" method="POST" action="{{ route('master.admins.reject', $admin->id) }}">
                                @csrf
                                <button class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-xs">Tolak</button>
                            </form>
                            @endif
                            <form class="inline" method="POST" action="{{ route('master.admins.destroy', $admin->id) }}">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin ingin hapus?')"
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
