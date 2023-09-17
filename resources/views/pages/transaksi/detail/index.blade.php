@extends('layout.main.index')

@section('pages')
<div class="flex flex-col gap-y-10">
    <div>
        <h1 class="text-white text-[30px] font-semibold">Transaksi</h1>
        <div class="text-white text-[18px] flex gap-x-2 font-semibold">
            <a href="/transaksi">Transaksi</a>
            >
            <p>Detail Transaksi</p>
        </div>
    </div>
    <div class="bg-white pl-5 pt-5 pb-10 pr-10 rounded-xl font-inter flex flex-col gap-y-5">
        <div class="flex justify-between">
            <h1 class="font-bold text-[27px] text-black">Detail Produk</h1>
            <p class="text-[#2DCE94] font-bold text-[32px]">Lunas</p>
        </div>
        <div class="">
            <div class="flex gap-x-10">
                <img src={{ url('assets/images/products/ikan-arwana-1.jpg') }} alt="" class="w-32 h-32 rounded-md object-cover">
                <div class="flex flex-col justify-between w-full">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-x-14">
                            <h1 class="font-bold text-[25px]">Ikan Arwana</h1>
                            <p class="text-[20px]">1x</p>
                        </div>
                        <p class="text-[#2D76E5] text-[18px] font-bold">Telah sampai tujuan 3 hari yang lalu</p>
                    </div>
                    <div class="flex justify-between items-end">
                        <div class="flex flex-col gap-y-3">
                            <p class="text-[22px]">Jantan</p>
                            <div class="">
                                <span class="bg-[#2DCE94] text-white text-[18px] py-2 px-3 rounded-lg font-semibold">Sudah Dikirim</span>
                            </div>
                        </div>
                        <div class="text-end">
                            <h1 class="text-[24px]">Total Harga</h1>
                            <p class="text-[24px] font-bold">Rp 1.000.000</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-2 gap-x-10  font-inter">
        <div class="bg-white rounded-xl p-5">
            <h1 class="font-bold text-[27px] text-black">Info Pengiriman</h1>
            <table class="table-fixed w-full my-5">
                <tbody class="text-[18px]">
                    <tr>
                        <td class="py-2">Kurir</td>
                        <td>SiCepat</td>
                    </tr>
                    <tr>
                        <td class="py-2">Nomor Resi</td>
                        <td>SHIP-2023-0001</td>
                    </tr>
                    <tr>
                        <td class="py-2 flex">Alamat</td>
                        <td>Jl. Pahlawan I, Kel. Tebet, RT06/RW09, Kota Jakarta Selatan, 12830, DKI Jakarta, Indonesia</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="bg-white rounded-xl p-5 flex flex-col justify-between">
            <div>
                <h1 class="font-bold text-[27px] text-black">Ringkasan Pembayaran</h1>
                <table class="table-fixed w-full my-5">
                    <tbody class="text-[18px]">
                        <tr>
                            <td class="py-2 w-3/4">Metode Pembayaran</td>
                            <td>GoPay</td>
                        </tr>
                        <tr>
                            <td class="py-2 w-3/4">Total Harga</td>
                            <td>Rp 1.000.000</td>
                        </tr>
                        <tr>
                            <td class="py-2 flex w-3/4">Total Biaya Pengiriman</td>
                            <td>Rp 12.000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="text-[24px] font-bold flex justify-between">
                <h1>Total Belanja</h1>
                <h1>Rp 1.012.000</h1>
            </div>
        </div>
    </div>
</div>

@endsection
