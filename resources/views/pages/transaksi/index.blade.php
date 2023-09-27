@extends('layout.main.index')

@section('pages')
<div class="flex flex-col gap-y-10">
    <h1 class="text-white text-[30px] font-semibold">Transaksi</h1>
    @if (!empty($transactionsData))
    <div class="flex flex-col items-center justify-center px-10 py-[75px] bg-white rounded-lg">
        <div class="text-center">
            <h1 class="font-bold text-[32px]">Halaman Daftar Transaksi Kosong</h1>
            <p class="text-[20px]">Transaksimu masih kosong nih, ayo buat</p>
            <p class="text-[20px]">transaksimu melalui “Web Commerce”.</p>
        </div>
        <img src={{ url('assets/images/empty-transaksi.png') }} alt="empty-transaksi">
    </div>
    @else
    <div class="px-10 bg-white rounded-xl py-7">
        <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
            <div class="overflow-hidden border-2 border-blue-500 rounded-xl">
                <table class="min-w-full divide-y divide-blue-500">
                <thead class="bg-[#2D76E5] text-white rounded-lg font-inter">
                    <tr>
                    <th scope="col" class="px-6 py-4 font-semibold text-center rounded-tl-lg text-md">ID Pesanan</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-center text-md">Tanggal & Waktu</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-center text-md">Harga(Rp)</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-center text-md ">Metode Pembayaran</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-center text-md">Status</th>
                    <th class="py-4 rounded-tr-lg"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 ">
                    @foreach ($transactionsData as $transaction)
                    <tr>
                        <td class="px-6 py-5 font-medium text-center text-md">{{ $transaction['order_code'] }}</td>
                        <td class="px-6 py-5 text-center text-md">{{ \Carbon\Carbon::parse($transaction['transaction_date'] . ' ' . $transaction['timestamp'])->format('d M Y, H:i') }}</td>
                        <td class="px-6 py-5 text-center text-md">{{ $transaction['total'] }}</td>
                        <td class="px-6 py-5 text-center text-md">{{ $transaction['id_payment_type'] }}</td>
                        <td class="px-6 py-5 text-center text-md font-semibold text-[#16E043]">{{ $transaction['status'] }}</td>
                        <td class="px-6 py-5 font-medium text-center text-md">
                            <a class="px-7 py-3 text-white bg-[#2D76E5] text-md rounded-full" href="/transaksi/{{ $transaction['id'] }}">Detail</a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>
    </div>
    @endif

</div>
@endsection
