@extends('layout.main.index')

@push('scripts')
@vite(['resources/js/twoLineChart.js', 'resources/js/piecharts.js'])
@endpush

@section('pages')
<div class="flex flex-col gap-y-10">
  <div class="flex justify-between">
    <h1 class="text-white text-[30px] font-semibold">Laporan</h1>
  </div>

  <div class="bg-white px-5 py-10 rounded-xl">
    <div class="flex justify-around items-center ">
      <div class="border-2 border-blue-500 px-10 py-5 flex flex-col items-center gap-5 rounded-xl shadow-lg">
        <h1 class="text-xl">Total Pemasukan</h1>
        <h1 class="text-3xl font-bold">Rp.21.000.00</h1>
      </div>
      <div class="border-2 border-blue-500 px-10 py-5 flex flex-col items-center gap-5 rounded-xl shadow-lg">
        <h1 class="text-xl">Total Pengeluaran</h1>
        <h1 class="text-3xl font-bold">Rp.21.000.00</h1>
      </div>
      <div class="border-2 border-blue-500 px-10 py-5 flex flex-col items-center gap-5 rounded-xl shadow-lg">
        <h1 class="text-xl">Laba Bersih</h1>
        <h1 class="text-3xl font-bold">Rp.21.000.00</h1>
      </div>
    </div>
    <div class="border-2 border-blue-500 rounded-xl px-10 py-10 mt-10">
      <div class="flex-1 text-center">
        <h1 class="text-lg font-semibold ">Total Laba Bersih per Bulan</h1>
        <canvas id="twoLineChart" class="mt-5"></canvas>
      </div>
    </div>
    <div class="flex flex-col mt-10">
      <div class="-m-1.5 overflow-x-auto">
        <div class="p-1.5 min-w-full inline-block align-middle">
          <div class="overflow-hidden border-2 border-blue-500 rounded-xl">
            <table class="min-w-full divide-y divide-blue-500 ">
              <thead class="bg-[#2D76E5] text-white rounded-lg">
                <tr>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium  uppercase rounded-tl-lg">Kode
                    Pemasukan</th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium  uppercase">Tipe Pemasukan</th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium  uppercase">Tanggal</th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium  uppercase">Jumlah </th>
                  <th scope="col" class="px-6 py-3 text-center text-xs font-medium  uppercase">Opsi</th>
                  <th class="py-4 rounded-tr-lg"></th>

                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 ">
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">EXP202304-001</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">Air</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">24/08/2023</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">Rp.23.000.00</td>
                  <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                    <a class="text-white px-5 py-3 bg-blue-500 rounded-lg" href="#">Detail</a>
                  </td>
                </tr>
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">EXP202304-001</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">Air</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">24/08/2023</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">Rp.23.000.00</td>
                  <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                    <a class="text-white px-5 py-3 bg-blue-500 rounded-lg" href="#">Detail</a>
                  </td>
                </tr>
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">EXP202304-001</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">Air</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">24/08/2023</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">Rp.23.000.00</td>
                  <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                    <a class="text-white px-5 py-3 bg-blue-500 rounded-lg" href="#">Detail</a>
                  </td>
                </tr>
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">EXP202304-001</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">Air</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">24/08/2023</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">Rp.23.000.00</td>
                  <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                    <a class="text-white px-5 py-3 bg-blue-500 rounded-lg" href="#">Detail</a>
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