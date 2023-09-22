@extends('layout.main.index')

@section('pages')
<div class="flex flex-col gap-y-10">
  <h1 class="text-white text-[30px] font-semibold">Detail Transaksi</h1>
  <div class="bg-white rounded-xl py-7 px-10">

    <div class="flex flex-col ">
      <div class="-m-1.5 overflow-x-auto">
        <div class="p-1.5 min-w-full inline-block align-middle">
          <div class="overflow-hidden border-2 border-blue-500 rounded-xl">
            <table class="min-w-full divide-y divide-blue-500 ">
              <thead class="bg-[#2D76E5] text-white rounded-lg">
                <tr>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium  uppercase rounded-tl-lg">ID Pesanan
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium  uppercase">Tanggal & Waktu</th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium  uppercase">Harga</th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium  uppercase">Metode Pembayaran </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium  uppercase">Status</th>
                  <th class="py-4 rounded-tr-lg"></th>

                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 ">
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">#2023-XYZ-002</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">12 Agu 2023, 09:49</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">2.000.000</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">GoPay</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-green-500 font-semibold ">Lunas</td>
                  <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                    <a class="text-white px-5 py-3 bg-blue-500 rounded-lg" href="/transaksi/detail">Detail</a>
                  </td>
                </tr>

                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">#2023-XYZ-002</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">12 Agu 2023, 09:49</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">2.000.000</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">GoPay</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-green-500 font-semibold ">Lunas</td>
                  <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                    <a class="text-white px-5 py-3 bg-blue-500 rounded-lg" href="/transaksi/detail">Detail</a>
                  </td>
                </tr>

                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">#2023-XYZ-002</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">12 Agu 2023, 09:49</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">2.000.000</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">GoPay</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-green-500 font-semibold ">Lunas</td>
                  <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                    <a class="text-white px-5 py-3 bg-blue-500 rounded-lg" href="/transaksi/detail">Detail</a>
                  </td>
                </tr>

                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">#2023-XYZ-002</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">12 Agu 2023, 09:49</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">2.000.000</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">GoPay</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-green-500 font-semibold ">Lunas</td>
                  <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                    <a class="text-white px-5 py-3 bg-blue-500 rounded-lg" href="/transaksi/detail">Detail</a>
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