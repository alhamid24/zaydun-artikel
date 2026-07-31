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
        <div class="bg-emerald-100 text-emerald-700 p-4 rounded-xl mb-6 text-sm font-medium">{{ session('success') }}</div>
    @endif

    @if($admins->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-gray-200 text-left text-gray-500 font-semibold">
                        <th class="pb-3 pr-4">Foto</th>
                        <th class="pb-3 pr-4">Nama</th>
                        <th class="pb-3 pr-4">Jabatan</th>
                        <th class="pb-3 pr-4">Kategori</th>
                        <th class="pb-3 pr-4">No. WA</th>
                        <th class="pb-3 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admins as $admin)
                        <tr class="border-b border-gray-100">
                            <td class="py-3 pr-4">
                                @if($admin->photo)
                                    <img src="{{ asset('uploads/admins/'.$admin->photo) }}" alt="{{ $admin->name }}" class="w-10 h-10 object-cover rounded-full">
                                @else
                                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-cyan-500 to-emerald-500 flex items-center justify-center text-sm text-white font-bold">
                                        {{ substr($admin->name, 0, 1) }}
                                    </div>
                                @endif
                            </td>
                            <td class="py-3 pr-4 font-semibold text-gray-800">{{ $admin->name }}</td>
                            <td class="py-3 pr-4 text-gray-500">{{ $admin->title ?? '-' }}</td>
                            <td class="py-3 pr-4">
                                @if($admin->category == 'ikan')
                                    <span class="bg-cyan-50 text-cyan-700 text-xs font-bold px-2.5 py-1 rounded-full">🐟 Ikan</span>
                                @else
                                    <span class="bg-emerald-50 text-emerald-700 text-xs font-bold px-2.5 py-1 rounded-full">🌱 Tumbuhan</span>
                                @endif
                            </td>
                            <td class="py-3 pr-4 text-gray-500">{{ $admin->phone ?? '-' }}</td>
                            <td class="py-3 text-right">
                                <a href="{{ url('admin/category-admins/'.$admin->id.'/edit') }}" class="text-cyan-600 hover:text-cyan-800 font-semibold text-xs mr-3 transition">Edit</a>
                                <form action="{{ url('admin/category-admins/'.$admin->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus admin ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 font-semibold text-xs transition">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="p-12 text-center text-sm text-gray-400 border-2 border-dashed border-gray-200 rounded-2xl">
            Belum ada admin. Tambahkan admin pertama untuk Ikan Cupang atau Tumbuhan.
        </div>
    @endif
</div>
@endsection
