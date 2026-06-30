@extends('layouts.admin')

@section('content')

<div class="p-6">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-black">Manajemen Partner</h2>
    </div>

    {{-- NOTIFIKASI --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded-2xl mb-5 border border-green-200">
            {{ session('success') }}
        </div>
    @endif

    <!-- SEARCH + FORM -->
    <div class="flex flex-col md:flex-row gap-4 justify-between mb-6">

        <!-- SEARCH -->
        <form method="GET"
      action="/admin/partners"
      class="flex items-center gap-3 flex-1">

            <input type="text"
       name="search"
       value="{{ request('search') }}"
       placeholder="Cari partner..."
       class="w-full px-5 py-3 rounded-2xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500">

       <button type="submit"
    class="px-6 py-3 bg-slate-900 text-white rounded-2xl font-bold hover:bg-slate-700 transition">

    Search

</button>
        </form>

       <!-- BUTTON TAMBAH -->
<button
    onclick="document.getElementById('modal-create').classList.remove('hidden')"
    class="px-6 py-3 bg-indigo-600 text-white rounded-2xl font-bold hover:bg-indigo-700 transition">

    Tambah Partner

</button>

    </div>

    <!-- TABLE -->
    <div class="overflow-x-auto bg-white rounded-[2rem] shadow border border-gray-200">

        <table class="w-full text-left">

            <thead class="bg-gradient-to-r from-indigo-600 to-indigo-700 text-white uppercase text-xs">

                <tr>
                    <th class="p-5">Logo</th>
                    <th class="p-5">Nama</th>
                    <th class="p-5">Logo URL</th>
                    <th class="p-5">Created At</th>
                    <th class="p-5">Updated At</th>
                    <th class="p-5">Aksi</th>
                </tr>

            </thead>

            <tbody>

 @forelse($partners as $partner)

<!-- DATA -->
<tr class="border-b hover:bg-gray-50 transition">

    <td class="p-5">
        <img src="{{ $partner->logo_url }}"
             class="w-16 h-16 rounded-xl object-cover">
    </td>

    <td class="p-5 font-semibold">
        {{ $partner->name }}
    </td>

    <td class="p-5 text-indigo-600 break-all">
        {{ $partner->logo_url }}
    </td>

    <td class="p-5 text-gray-500">
        {{ $partner->created_at }}
    </td>

    <td class="p-5 text-gray-500">
        {{ $partner->updated_at }}
    </td>

    <td class="p-5 flex gap-2">

        <!-- EDIT -->
        <button
            onclick="document.getElementById('modal-{{ $partner->id }}').classList.remove('hidden')"
            class="px-4 py-2 rounded-xl bg-indigo-50 text-indigo-600 hover:bg-indigo-600 hover:text-white transition">

            Edit

        </button>

        <!-- DELETE -->
        <form action="{{ route('admin.partners.destroy', $partner->id) }}"
              method="POST">

            @csrf
            @method('DELETE')

            <button type="submit"
                onclick="return confirm('Hapus partner ini?')"
                class="px-4 py-2 rounded-xl bg-rose-50 text-rose-600 hover:bg-rose-600 hover:text-white transition">

                Hapus

            </button>

        </form>

    </td>

</tr>

<!-- MODAL EDIT -->
<div id="modal-{{ $partner->id }}"
     class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-6">

    <div class="bg-white rounded-[2rem] w-full max-w-2xl p-8 relative shadow-2xl">

        <!-- CLOSE -->
        <button
            onclick="document.getElementById('modal-{{ $partner->id }}').classList.add('hidden')"
            class="absolute top-5 right-5 text-slate-400 hover:text-red-500 text-3xl font-bold">

            &times;

        </button>

        <h2 class="text-3xl font-black mb-8 text-slate-800">
            Edit Partner
        </h2>

        <form action="{{ route('admin.partners.update', $partner->id) }}"
              method="POST"
              class="space-y-5">

            @csrf
            @method('PUT')

            <div>

                <label class="block font-bold mb-2 text-slate-700">
                    Nama Partner
                </label>

                <input type="text"
                       name="name"
                       value="{{ $partner->name }}"
                       class="w-full px-5 py-4 rounded-2xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500">

            </div>

            <div>

                <label class="block font-bold mb-2 text-slate-700">
                    Logo URL
                </label>

                <input type="text"
                       name="logo_url"
                       value="{{ $partner->logo_url }}"
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
    <td colspan="6" class="text-center py-10 text-gray-500">
        Data partner belum tersedia.
    </td>
</tr>

@endforelse

            </tbody>

        </table>

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
            Tambah Partner
        </h2>

        <form action="/admin/partners"
              method="POST"
              class="space-y-5">

            @csrf

            <div>

                <label class="block font-bold mb-2 text-slate-700">
                    Nama Partner
                </label>

                <input type="text"
                       name="name"
                       placeholder="Masukkan nama partner"
                       class="w-full px-5 py-4 rounded-2xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500">

            </div>

            <div>

                <label class="block font-bold mb-2 text-slate-700">
                    Logo URL
                </label>

                <input type="text"
                       name="logo_url"
                       value="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ7AcXtPaYXnb3QJyhq9F2Bw6QcWGppWLqvaw&s"
                       class="w-full px-5 py-4 rounded-2xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500">

            </div>

            <button type="submit"
                class="w-full py-4 rounded-2xl bg-indigo-600 text-white font-black hover:bg-indigo-700 transition">

                Simpan Partner

            </button>

        </form>

    </div>

</div>

    </div>

</div>

@endsection