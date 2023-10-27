@extends('layout.main.index')

@section('pages')
<div class="flex flex-col gap-y-10">
    <div>
        <h1 class="text-white text-[30px] font-semibold">Transaksi</h1>
        <div class="text-white text-[18px] flex gap-x-2 font-semibold">
            <a href="/transaksi" class="loadButton">Transaksi</a>
            >
            <p>Detail Transaksi</p>
        </div>
    </div>
    <div class="flex justify-between w-full px-5 py-8 bg-white rounded-xl">
        <div class="">
            <table class="table-fixed w-[500px]">
                <tbody>
                  <tr class="text-[20px]">
                    <td class="font-bold">No. Faktur</td>
                    <td>: {{ $transactionData['order_code'] }}</td>
                  </tr>
                  <tr class="text-[20px]">
                    <td class="font-bold">Tanggal & Waktu</td>
                    <td>: {{ \Carbon\Carbon::parse($transactionData['transaction_date'] . ' ' . $transactionData['timestamp'])->isoFormat('D MMMM YYYY, HH:mm') }}
                    </td>
                  </tr>
                </tbody>
              </table>
        </div>
        <div class="flex items-center">
            @if ($transactionData['status'] == 1)
            <a href="/transaksi/{{ $transactionData['id'] }}/faktur" class="bg-[#2D76E5] loadButton  rounded-[20px] py-3 px-10 text-lg font-bold text-white">Faktur</a>
            @endif
        </div>
    </div>
    <div class="flex flex-col pt-5 pb-8 pl-5 pr-8 bg-white rounded-xl gap-y-5">
        <div class="flex justify-between">
            <h1 class="font-bold text-[30px] text-black">Detail Produk</h1>
            @if ($transactionData['status'] == 1)
                <h1 class="text-center text-[#2DCE94] font-bold text-[32px]">Lunas</h1>
            @else
                <h1 class="text-center text-[#FF0000] font-bold text-[32px]">Gagal</h1>
            @endif
        </div>
        <div class="flex flex-col gap-y-8">
            @if (!$productList)
            <h1>No Product Found</h1>
            @else
            @foreach ($productList as $product)
            <div class="flex gap-x-10">
                @if ($product['detail_product']['image'])
                <img src={{ url(config('backend.backend_url') . "/" . $product['detail_product']['image'] ) }} onerror="this.onerror=null;this.src='assets/images/default-placeholder.png';" class="object-cover w-32 h-32 rounded-md" alt="" />
                @else
                <img src={{ url("assets/images/default-placeholder.png")  }} class="object-cover w-32 h-32 rounded-md" alt="" />
                @endif
                <div class="flex flex-col justify-between w-full">
                    <div class="">
                        <div class="flex items-center gap-x-14">
                            <h1 class="font-bold text-[25px]">{{ $product['detail_product']['name'] }}</h1>
                            <p class="text-[22px] text-[#878787]">{{ $product['quantity'] }}x @currency( $product['current_price'])</p>
                        </div>
                        <p class="text-[#A6A6A6] text-sm">Minta yang jantan Bang</p>
                    </div>

                    <div class="flex items-end justify-between">
                        <div class="flex flex-col gap-y-3">

                            <div>
                                @if ($transactionData['status'] == 1)
                                <span class="bg-[#2DCE94] text-white text-[18px] py-2 px-3 rounded-lg font-semibold">Sudah Dikirim</span>
                                @endif

                            </div>
                        </div>
                        <div class="text-end">
                            <p class="text-[24px] font-bold">@currency($product['quantity'] * $product['current_price'])</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif

        </div>
    </div>

    @if ($transactionData['status'] == 1)
    <div class="grid grid-cols-2 gap-x-10 font-inter">
        <div class="px-8 py-5 bg-white rounded-xl">
            <h1 class="font-bold text-[27px] text-black">Info Pengiriman</h1>
            <table class="w-full my-5 table-fixed">
                <tbody class="text-[20px]">
                    <tr>
                        <td class="py-2">Kurir</td>
                        <td>SiCepat</td>
                    </tr>
                    <tr>
                        <td class="py-2">Nomor Resi</td>
                        <td>SHIP-2023-0001</td>
                    </tr>
                    <tr>
                        <td class="flex py-2">Alamat</td>
                        <td>Jl. Pahlawan I, Kel. Tebet, RT06/RW09, Kota Jakarta Selatan, 12830, DKI Jakarta, Indonesia</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="flex flex-col justify-between px-8 py-5 bg-white rounded-xl">
            <div class="flex flex-col gap-5">
                <h1 class="font-bold text-[27px] text-black">Ringkasan Pembayaran</h1>
                <div class="flex justify-between text-[20px]">
                    <h1>Metode Pembayaran</h1>
                    <p>
                        @if ($transactionData['id_payment_type'] == 1)
                            Cash
                        @elseif ($transactionData['id_payment_type'] == 2)
                            Transfer
                        @elseif ($transactionData['id_payment_type'] == 3)
                            QRIS
                        @else
                            Not yet set
                        @endif
                    </p>
                </div>
                <div class="flex justify-between text-[20px]">
                    <h1>Total Harga</h1>
                    <p>@currency($transactionData['total'])</p>
                </div>
                <div class="flex justify-between text-[20px]">
                    <h1>Total Biaya Pengiriman (Rp)</h1>
                    <p>@currency(12000)</p>
                </div>
            </div>
            <div class="text-[24px] font-bold flex justify-between">
                <h1>Total Belanja (Rp)</h1>
                <p>@currency($transactionData['total'] + 12000)</p>
            </div>
        </div>
    </div>
    @endif

</div>

@endsection
