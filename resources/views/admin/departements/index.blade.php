@extends('layouts.app')

@section('content')
<section class="py-12 px-4 bg-gray-100 min-h-screen">
    <div class="max-w-7xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-emerald-700">Kelola Departemen</h1>
            <a href="{{ route('admin.departements.create') }}" class="bg-emerald-600 text-white px-4 py-2 rounded hover:bg-emerald-700">
                + Tambah Departemen
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <!-- Daftar Departemen -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="overflow-x-auto">
                <table class="w-full table-auto border-collapse">
                    <thead>
                        <tr class="bg-emerald-100 text-emerald-700">
                            <th class="p-3 border text-left">Nama Departemen</th>
                            <th class="p-3 border text-left">Deskripsi</th>
                            <th class="p-3 border text-left">Program Kerja</th>
                            <th class="p-3 border text-left">Gambar</th>
                            <th class="p-3 border text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($departements as $departement)
                        <tr class="hover:bg-gray-50">
                            <td class="p-3 border">
                                <div class="font-medium text-gray-900">{{ $departement->name }}</div>
                                <div class="text-sm text-gray-500">{{ $departement->slug }}</div>
                            </td>
                            <td class="p-3 border">
                                <div class="text-sm text-gray-600">
                                    {{ Str::limit($departement->description, 100) ?? 'Tidak ada deskripsi' }}
                                </div>
                            </td>
                            <td class="p-3 border">
                                <div class="text-sm text-gray-600">
                                    {{ Str::limit($departement->program_work, 100) ?? 'Tidak ada program kerja' }}
                                </div>
                            </td>
                            <td class="p-3 border">
                                @if($departement->image)
                                    <img src="{{ asset('storage/' . $departement->image) }}" 
                                         alt="{{ $departement->name }}" 
                                         class="w-16 h-16 object-cover rounded">
                                @else
                                    <div class="w-16 h-16 bg-gray-200 rounded flex items-center justify-center">
                                        <span class="text-gray-500 text-xs">No Image</span>
                                    </div>
                                @endif
                            </td>
                            <td class="p-3 border text-center">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('admin.departements.edit', $departement->id) }}" 
                                       class="text-yellow-600 hover:text-yellow-800 text-sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.departements.destroy', $departement->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="text-red-600 hover:text-red-800 text-sm"
                                                onclick="return confirm('Yakin ingin menghapus departemen ini?')">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="p-6 text-center text-gray-500">
                                Belum ada departemen. <a href="{{ route('admin.departements.create') }}" class="text-emerald-600 hover:underline">Tambah departemen pertama</a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($departements->hasPages())
                <div class="mt-6">
                    {{ $departements->links() }}
                </div>
            @endif
        </div>
    </div>
</section>
@endsection