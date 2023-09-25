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
    <div class="flex justify-between w-full px-5 py-8 bg-white rounded-xl">
        <div class="">
            <table class="table-fixed w-[500px]">
                <tbody>
                  <tr class="text-[20px]">
                    <td class="font-bold">No. Faktur</td>
                    <td>: FKT-2023-004</td>
                  </tr>
                  <tr class="text-[20px]">
                    <td class="font-bold">Tanggal & Waktu</td>
                    <td>: 23 Agustus 2023, 18:29</td>
                  </tr>
                </tbody>
              </table>
        </div>
        <div class="flex items-center">
            <button class="bg-[#2D76E5] rounded-[20px] py-3 px-10 text-lg font-bold text-white">Faktur</button>
        </div>
    </div>
    <div class="flex flex-col pt-5 pb-8 pl-5 pr-8 bg-white rounded-xl gap-y-2">
        <div class="flex justify-between">
            <h1 class="font-bold text-[27px] text-black">Detail Produk</h1>
            <p class="text-[#2DCE94] font-bold text-[32px]">Lunas</p>
        </div>
        <div>
            <div class="flex gap-x-10">
                <img src={{ url('assets/images/products/ikan-arwana-1.jpg') }} alt="" class="object-cover w-32 h-32 rounded-md">
                <div class="flex flex-col justify-between w-full">
                    <div class="">
                        <div class="flex items-center gap-x-14">
                            <h1 class="font-bold text-[25px]">Ikan Arwana</h1>
                            <p class="text-[22px] font-bold">1x</p>
                        </div>
                        <p class="text-[#A6A6A6] text-sm">Minta yang jantan Bang</p>
                    </div>

                    <div class="flex items-end justify-between">
                        <div class="flex flex-col gap-y-3">
                            <div>
                                <span class="bg-[#2DCE94] text-white text-[18px] py-2 px-3 rounded-lg font-semibold">Sudah Dikirim</span>
                            </div>
                        </div>
                        <div class="text-end">
                            <p class="text-[24px] font-bold">Rp 1.000.000</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                    <p>GoPay</p>
                </div>
                <div class="flex justify-between text-[20px]">
                    <h1>Total Harga (Rp)</h1>
                    <p>1.000.000</p>
                </div>
                <div class="flex justify-between text-[20px]">
                    <h1>Total Biaya Pengiriman (Rp)</h1>
                    <p>12.000</p>
                </div>
            </div>
            <div class="text-[24px] font-bold flex justify-between">
                <h1>Total Belanja (Rp)</h1>
                <p>1.012.000</p>
            </div>
        </div>
    </div>
</div>

@endsection
