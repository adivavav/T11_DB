@extends('layouts.admin')

@section('content')

<div class="p-6">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Daftar Transaksi</h2>
    </div>

    @if(session('success'))
        <div class="mb-5 rounded-lg bg-green-100 border border-green-200 p-4 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full bg-white rounded-xl shadow border border-gray-200">

            <thead class="bg-gray-50">
                <tr class="border-b">
                    <th class="px-4 py-3 text-left">Order ID</th>
                    <th class="px-4 py-3 text-left">Event</th>
                    <th class="px-4 py-3 text-left">Nama Pemesan</th>
                    <th class="px-4 py-3 text-left">Email</th>
                    <th class="px-4 py-3 text-left">No. HP</th>
                    <th class="px-4 py-3 text-left">Total</th>
                    <th class="px-4 py-3 text-center">Status</th>
                    <th class="px-4 py-3 text-center">Tanggal</th>
                </tr>
            </thead>

            <tbody>

                @forelse($transactions as $transaction)

                <tr class="border-b hover:bg-gray-50">

                    <td class="px-4 py-3 font-semibold">
                        {{ $transaction->order_id }}
                    </td>

                    <td class="px-4 py-3">
                        {{ $transaction->event->title ?? '-' }}
                    </td>

                    <td class="px-4 py-3">
                        {{ $transaction->customer_name }}
                    </td>

                    <td class="px-4 py-3">
                        {{ $transaction->customer_email }}
                    </td>

                    <td class="px-4 py-3">
                        {{ $transaction->customer_phone }}
                    </td>

                    <td class="px-4 py-3 font-semibold text-indigo-600">
                        Rp {{ number_format($transaction->total_price,0,',','.') }}
                    </td>

                    <td class="px-4 py-3 text-center">

                        @if($transaction->status == 'Pending')
                            <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-sm font-semibold">
                                Pending
                            </span>

                        @elseif($transaction->status == 'Paid')
                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm font-semibold">
                                Paid
                            </span>

                        @elseif($transaction->status == 'Expired')
                            <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-sm font-semibold">
                                Expired
                            </span>

                        @else
                            <span class="px-3 py-1 rounded-full bg-gray-100 text-gray-700 text-sm font-semibold">
                                {{ $transaction->status }}
                            </span>
                        @endif

                    </td>

                    <td class="px-4 py-3">
                        {{ $transaction->created_at->format('d M Y H:i') }}
                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="8" class="text-center py-10 text-gray-500">
                        Belum ada transaksi.
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>
    </div>

    <div class="mt-6">
        {{ $transactions->links() }}
    </div>

</div>

@endsection