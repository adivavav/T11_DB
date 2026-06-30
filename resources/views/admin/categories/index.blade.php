@extends('layouts.admin')

@section('content')

<div class="flex justify-between items-center mb-10">
    <div>
        <h1 class="text-3xl font-black">Manajemen Kategori</h1>
        <p class="text-slate-500">Kelola kategori event di sini</p>
    </div>
</div>

<!-- SEARCH + TAMBAH -->
<div class="flex flex-col md:flex-row gap-4 justify-between mb-6">

    <!-- SEARCH -->
    <form method="GET"
          action="{{ url('/admin/categories') }}"
          class="flex items-center gap-3 flex-1">

        <input type="text"
               name="search"
               value="{{ request('search') }}"
               placeholder="Cari kategori..."
               class="w-full px-5 py-3 rounded-2xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500">

        <button type="submit"
            class="px-6 py-3 bg-slate-900 text-white rounded-2xl font-bold hover:bg-slate-700 transition">

            Search

        </button>

    </form>

    <!-- BUTTON TAMBAH -->
    <button
        onclick="document.getElementById('modal-create').classList.remove('hidden')"
        class="px-6 py-3 bg-indigo-600 text-white rounded-2xl font-bold hover:bg-indigo-700 transition">

        Tambah Kategori

    </button>

</div>

<!-- TABLE -->
<div class="bg-white rounded-[2.5rem] border border-slate-200 shadow-lg overflow-hidden">

    <table class="w-full text-left border-collapse">

        <thead class="bg-gradient-to-r from-indigo-600 to-indigo-700 text-white uppercase text-[10px] font-black tracking-widest">

            <tr>
                <th class="px-8 py-4">No</th>
                <th class="px-8 py-4">Nama Kategori</th>
                <th class="px-8 py-4">Created At</th>
                <th class="px-8 py-4">Updated At</th>
                <th class="px-8 py-4">Aksi</th>
            </tr>

        </thead>

        <tbody class="divide-y divide-slate-200">

           @forelse($categories as $category)

<!-- DATA -->
<tr class="hover:bg-indigo-50/50 transition">

    <td class="px-8 py-6 font-semibold text-slate-500">
        {{ $loop->iteration }}
    </td>

    <td class="px-8 py-6 font-semibold text-slate-800">
        {{ $category->name }}
    </td>

    <td class="px-8 py-6 text-slate-500">
        {{ $category->created_at }}
    </td>

    <td class="px-8 py-6 text-slate-500">
        {{ $category->updated_at }}
    </td>

    <td class="px-8 py-6 flex gap-2">

        <!-- EDIT -->
        <button
            onclick="document.getElementById('modal-{{ $category->id }}').classList.remove('hidden')"
            class="p-2.5 bg-indigo-50 text-indigo-600 rounded-xl hover:bg-indigo-600 hover:text-white transition">

            <i class="fa-solid fa-pen-to-square w-4 h-4"></i>

        </button>

        <!-- DELETE -->
        <form action="{{ route('admin.categories.destroy', $category->id) }}"
              method="POST">

            @csrf
            @method('DELETE')

            <button type="submit"
                onclick="return confirm('Hapus kategori ini?')"
                class="p-2.5 bg-rose-50 text-rose-600 rounded-xl hover:bg-rose-600 hover:text-white transition">

                <i class="fa-solid fa-trash w-4 h-4"></i>

            </button>

        </form>

    </td>

</tr>

<!-- MODAL EDIT -->
<div id="modal-{{ $category->id }}"
     class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-6">

    <div class="bg-white rounded-[2rem] w-full max-w-2xl p-8 relative shadow-2xl">

        <!-- CLOSE -->
        <button
            onclick="document.getElementById('modal-{{ $category->id }}').classList.add('hidden')"
            class="absolute top-5 right-5 text-slate-400 hover:text-red-500 text-3xl font-bold">

            &times;

        </button>

        <h2 class="text-3xl font-black mb-8 text-slate-800">
            Edit Kategori
        </h2>

        <form action="{{ route('admin.categories.update', $category->id) }}"
              method="POST"
              class="space-y-5">

            @csrf
            @method('PUT')

            <div>

                <label class="block font-bold mb-2 text-slate-700">
                    Nama Kategori
                </label>

                <input type="text"
                       name="name"
                       value="{{ $category->name }}"
                       class="w-full px-5 py-4 rounded-2xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500">

            </div>

            <button type="submit"
                class="w-full py-4 rounded-2xl bg-indigo-600 text-white font-black hover:bg-indigo-700 transition">

                Simpan Perubahan

            </button>

        </form>

    </div>

</div>

@empty

<tr>
    <td colspan="5" class="text-center py-10 text-slate-500">
        Data kategori belum tersedia.
    </td>
</tr>

@endforelse

        </tbody>

    </table>

</div>
<!-- MODAL CREATE -->
<div id="modal-create"
     class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-6">

    <div class="bg-white rounded-[2rem] w-full max-w-2xl p-8 relative shadow-2xl">

        <!-- CLOSE -->
        <button
            onclick="document.getElementById('modal-create').classList.add('hidden')"
            class="absolute top-5 right-5 text-slate-400 hover:text-red-500 text-3xl font-bold">

            &times;

        </button>

        <h2 class="text-3xl font-black mb-8 text-slate-800">
            Tambah Kategori
        </h2>

        <form action="{{ route('admin.categories.store') }}"
              method="POST"
              class="space-y-5">

            @csrf

            <div>

                <label class="block font-bold mb-2 text-slate-700">
                    Nama Kategori
                </label>

                <input type="text"
                       name="name"
                       placeholder="Masukkan nama kategori"
                       class="w-full px-5 py-4 rounded-2xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500">

            </div>

            <button type="submit"
                class="w-full py-4 rounded-2xl bg-indigo-600 text-white font-black hover:bg-indigo-700 transition">

                Simpan Kategori

            </button>

        </form>

    </div>

</div>

@endsection