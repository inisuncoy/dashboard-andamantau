@extends('layout.main.index')

@section('pages')
<div class="flex flex-col gap-y-10">
    <h1 class="text-white text-[30px] font-semibold">Detail Transaksi</h1>
    <div class="bg-white rounded-xl py-7 px-10">
        <table class="table-fixed w-full font-inter">
            <thead class="bg-[#2D76E5] text-white rounded-lg">
              <tr>
                <th class="py-4 rounded-tl-lg">ID Pesanan</th>
                <th class="py-4">Tanggal & Waktu</th>
                <th class="py-4">Harga</th>
                <th class="py-4">Metode Pembayaran</th>
                <th class="py-4">Status</th>
                <th class="py-4 rounded-tr-lg"></th>
              </tr>
            </thead>
            <tbody>
              <tr class="text-center border-2 border-[#2B7FFF]">
                <td class="py-6">#2023-ABC-001</td>
                <td class="py-6">23 Sep 2023, 18:08</td>
                <td class="py-6">1.000.000</td>
                <td class="py-6">QRIS</td>
                <td class="py-6 text-[#16E043] font-bold">Lunas</td>
                <td class="py-6">
                    <a href="/transaksi/detail" class="bg-[#2D76E5] py-3 px-7 rounded-full text-white font-semibold text-[15px]">Detail</a>
                </td>
              </tr>
              <tr class="text-center border-2 border-[#2B7FFF]">
                <td class="py-6">#2023-XYZ-002</td>
                <td class="py-6">12 Agu 2023, 09:49</td>
                <td class="py-6">2.000.000</td>
                <td class="py-6">GoPay</td>
                <td class="py-6 text-[#16E043] font-bold">Lunas</td>
                <td class="py-6">
                    <a href="/transaksi/detail" class="bg-[#2D76E5] py-3 px-7 rounded-full text-white font-semibold text-[15px]">Detail</a>
                </td>
              </tr>
              <tr class="text-center border-2 border-[#2B7FFF]">
                <td class="py-6">#2023-XYZ-002</td>
                <td class="py-6">12 Agu 2023, 09:49</td>
                <td class="py-6">2.000.000</td>
                <td class="py-6">GoPay</td>
                <td class="py-6 text-[#FF0000] font-bold">Gagal</td>
                <td class="py-6">
                    <a href="/transaksi/detail" class="bg-[#2D76E5] py-3 px-7 rounded-full text-white font-semibold text-[15px]">Detail</a>
                </td>
              </tr>
              <tr class="text-center border-2 border-[#2B7FFF]">
                <td class="py-6">#2023-XYZ-002</td>
                <td class="py-6">12 Agu 2023, 09:49</td>
                <td class="py-6">2.000.000</td>
                <td class="py-6">GoPay</td>
                <td class="py-6 text-[#FF0000] font-bold">Gagal</td>
                <td class="py-6">
                    <a href="/transaksi/detail" class="bg-[#2D76E5] py-3 px-7 rounded-full text-white font-semibold text-[15px]">Detail</a>
                </td>
              </tr>
              <tr class="text-center border-2 border-[#2B7FFF]">
                <td class="py-6">#2023-XYZ-002</td>
                <td class="py-6">12 Agu 2023, 09:49</td>
                <td class="py-6">2.000.000</td>
                <td class="py-6">GoPay</td>
                <td class="py-6 text-[#16E043] font-bold">Lunas</td>
                <td class="py-6">
                    <a href="/transaksi/detail" class="bg-[#2D76E5] py-3 px-7 rounded-full text-white font-semibold text-[15px]">Detail</a>
                </td>
              </tr>
            </tbody>
          </table>
    </div>
</div>
@endsection
