@extends('layout.main.index')

@section('pages')
<div class="flex flex-col gap-y-10">
  <h1 class="text-white text-[30px] font-semibold">Transaksi</h1>
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
                <tr>
                  <td class="px-6 py-5 font-medium text-center text-md">#2023-XYZ-002</td>
                  <td class="px-6 py-5 text-center text-md">12 Agu 2023, 09:49</td>
                  <td class="px-6 py-5 text-center text-md">2.000.000</td>
                  <td class="px-6 py-5 text-center text-md">GoPay</td>
                  <td class="px-6 py-5 text-center text-md font-semibold text-[#16E043]">Lunas</td>
                  <td class="px-6 py-5 font-medium text-center text-md">
                    <a class="px-7 py-3 text-white bg-[#2D76E5] text-md rounded-full" href="/transaksi/detail">Detail</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
