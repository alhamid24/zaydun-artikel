@extends('admin.layout')

@section('content')
<div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-200">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Data Admin Kategori</h1>
            <p class="text-sm text-gray-500">Kelola admin untuk halaman Ikan Cupang & Tumbuhan</p>
        </div>
        <a href="{{ url('admin/category-admins/create') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold px-5 py-2.5 rounded-xl text-sm transition shadow-sm">
            + Tambah Admin
        </a>
    </div>

    @if(session('success'))
        <div class="flex items-center gap-2.5 bg-emerald-50 border border-emerald-200 text-emerald-700 p-3.5 rounded-xl mb-4 text-sm font-medium">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ session('success') }}
        </div>
    @endif

    @if($admins->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-gray-200 text-left text-gray-600 text-xs font-bold uppercase tracking-wider">
                        <th class="p-4">Foto</th>
                        <th class="p-4">Nama</th>
                        <th class="p-4">Jabatan</th>
                        <th class="p-4">Kategori</th>
                        <th class="p-4">No. WA</th>
                        <th class="p-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admins as $admin)
                        <tr class="border-b border-gray-100 hover:bg-gray-50 transition">
                            <td class="py-3 px-4">
                                @if($admin->photo)
                                    <img loading="lazy" decoding="async" src="{{ asset('uploads/admins/'.$admin->photo) }}" alt="{{ $admin->name }}" class="w-10 h-10 object-cover rounded-full ring-1 ring-gray-200">
                                @else
                                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-cyan-500 to-emerald-500 flex items-center justify-center text-sm text-white font-bold">
                                        {{ substr($admin->name, 0, 1) }}
                                    </div>
                                @endif
                            </td>
                            <td class="py-3 px-4 font-semibold text-gray-800">{{ $admin->name }}</td>
                            <td class="py-3 px-4 text-gray-500">{{ $admin->title ?? '-' }}</td>
                            <td class="py-3 px-4">
                                @if($admin->category == 'ikan')
                                    <span class="bg-cyan-50 text-cyan-700 text-xs font-bold px-2.5 py-1 rounded-full">Ikan</span>
                                @else
                                    <span class="bg-emerald-50 text-emerald-700 text-xs font-bold px-2.5 py-1 rounded-full">Tumbuhan</span>
                                @endif
                            </td>
                            <td class="py-3 px-4 text-gray-500">{{ $admin->phone ?? '-' }}</td>
                            <td class="py-3 px-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ url('admin/category-admins/'.$admin->id.'/edit') }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold bg-cyan-50 text-cyan-700 border border-cyan-200 hover:bg-cyan-600 hover:text-white transition">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                        Edit
                                    </a>
                                    <form action="{{ url('admin/category-admins/'.$admin->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus admin ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold bg-red-50 text-red-600 border border-red-200 hover:bg-red-600 hover:text-white transition">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="flex flex-col items-center gap-3 p-12 text-center border-2 border-dashed border-gray-200 rounded-2xl">
            <div class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center">
                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
            </div>
            <p class="text-sm text-gray-400 font-medium">Belum ada admin. Tambahkan admin pertama untuk Ikan Cupang atau Tumbuhan.</p>
            <a href="{{ url('admin/category-admins/create') }}" class="text-emerald-600 hover:text-emerald-700 text-sm font-semibold mt-1">+ Tambah Admin</a>
        </div>
    @endif
</div>
@endsection
