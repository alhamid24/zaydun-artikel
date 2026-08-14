@extends('admin.layout')

@section('content')
<div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Kelola Tim</h1>
            <p class="text-sm text-gray-500">Daftar anggota tim atau pengurus website.</p>
        </div>
        <a href="{{ route('teams.create') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold px-4 py-2 rounded-xl text-sm transition">
            + Tambah Anggota
        </a>
    </div>

    @if(session('success'))
        <div class="flex items-center gap-2.5 bg-emerald-50 border border-emerald-200 text-emerald-700 p-3.5 rounded-xl mb-4 text-sm font-medium">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-gray-200 bg-gray-50 text-gray-600 text-xs font-bold uppercase tracking-wider">
                    <th class="p-4">Foto</th>
                    <th class="p-4">Nama Lengkap</th>
                    <th class="p-4">Jabatan</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($teams as $team)
                <tr class="border-b border-gray-100 hover:bg-gray-50 text-sm transition">
                    <td class="p-4">
                        <img src="{{ asset('uploads/teams/'.$team->image) }}" class="w-12 h-12 object-cover rounded-lg ring-1 ring-gray-200">
                    </td>
                    <td class="p-4 font-semibold text-gray-800">{{ $team->name }}</td>
                    <td class="p-4 text-gray-600">{{ $team->position }}</td>
                    <td class="p-4">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('teams.edit', $team->id) }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold bg-cyan-50 text-cyan-700 border border-cyan-200 hover:bg-cyan-600 hover:text-white transition">
                                Edit
                            </a>
                            <form action="{{ route('teams.destroy', $team->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus anggota ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold bg-red-50 text-red-600 border border-red-200 hover:bg-red-600 hover:text-white transition">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-10 text-center text-gray-400 font-medium">Belum ada anggota tim.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection