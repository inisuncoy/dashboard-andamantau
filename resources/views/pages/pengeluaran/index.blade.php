@extends('layout.main.index')

@push('scripts')
@vite(['resources/js/pengeluaranChart.js'])

@endpush

@section('pages')
<div class="flex flex-col gap-y-10">
  <div class="flex justify-between">
    <h1 class="text-white text-[30px] font-semibold">Pengeluaran</h1>
    <a href="/pengeluaran/tambah"
      class="bg-white text-[#2D76E5] text-[20px] px-5 rounded-lg font-bold flex justify-center items-center">+ Tambah
      Pengeluaran</a>
  </div>

  <div class="px-5 py-10 bg-white rounded-xl">
    <div class="flex items-center justify-around ">
      <div class="flex flex-col items-center gap-5 px-10 py-5 border-2 border-red-500 shadow-lg rounded-xl">
        <h1 class="text-xl">Total Pengeluaran</h1>
        <h1 class="text-3xl font-bold">Rp.21.000.00</h1>
      </div>
      <div class="flex flex-col items-center gap-5 px-10 py-5 border-2 border-red-500 shadow-lg rounded-xl">
        <h1 class="text-xl">Total Pengeluaran</h1>
        <h1 class="text-3xl font-bold">Rp.21.000.00</h1>
      </div>
      <div class="flex flex-col items-center gap-5 px-10 py-5 border-2 border-red-500 shadow-lg rounded-xl">
        <h1 class="text-xl">Total Pengeluaran</h1>
        <h1 class="text-3xl font-bold">Rp.21.000.00</h1>
      </div>
    </div>
    <div class="mt-10">
      <div class="border-2 border-blue-500 px-[110px] py-[29px] rounded-2xl text-center">
        <h1 class="text-2xl font-semibold">Total Pengeluaran Per Bulan Maret</h1>
        <canvas id="pengeluaranChart" class="mt-5"></canvas>
      </div>
      <div class="mt-10 ">
        <div class="flex items-center justify-end gap-5">
          <h1 class="text-lg font-medium">Pilih</h1>
          <select name="" id="" class="px-5 py-3 text-black bg-white rounded-lg shadow-2xl">
            <option value="" selected>Silahkan Bulan</option>
            <option value="">Januari</option>
            <option value="">Febuari</option>
            <option value="">Maret</option>
            <option value="">April</option>
            <option value="">Mei</option>
            <option value="">Juni</option>
            <option value="">Juli</option>
            <option value="">Agustus</option>
            <option value="">September</option>
            <option value="">Oktober</option>
            <option value="">November</option>
            <option value="">Desember</option>
          </select>
        </div>
        <div class="flex flex-col mt-3">
          <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
              <div class="overflow-hidden border-2 border-blue-500 rounded-xl">
                <table class="min-w-full divide-y divide-blue-500 ">
                  <thead class="bg-[#2D76E5] text-white rounded-lg">
                    <tr>
                      <th scope="col" class="px-6 py-3 text-xs font-medium text-left uppercase rounded-tl-lg">Kode
                        Pemasukan</th>
                      <th scope="col" class="px-6 py-3 text-xs font-medium text-left uppercase">Tipe Pemasukan</th>
                      <th scope="col" class="px-6 py-3 text-xs font-medium text-left uppercase">Jumalh Pemasukan</th>
                      <th scope="col" class="px-6 py-3 text-xs font-medium text-center uppercase">Opsi</th>
                      <th class="py-4 rounded-tr-lg"></th>

                    </tr>
                  </thead>
                  <tbody class="divide-y divide-gray-200 ">
                    <tr>
                      <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap ">EXP202304-001</td>
                      <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap ">Air</td>
                      <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap ">Rp.23.000.00</td>
                      <td class="px-6 py-4 text-sm font-medium text-center whitespace-nowrap">
                        <a class="px-5 py-3 text-white bg-blue-500 rounded-lg" href="#">Detail</a>
                      </td>
                    </tr>
                    <tr>
                      <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap ">EXP202304-001</td>
                      <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap ">Air</td>
                      <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap ">Rp.23.000.00</td>
                      <td class="px-6 py-4 text-sm font-medium text-center whitespace-nowrap">
                        <a class="px-5 py-3 text-white bg-blue-500 rounded-lg" href="#">Detail</a>
                      </td>
                    </tr>
                    <tr>
                      <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap ">EXP202304-001</td>
                      <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap ">Air</td>
                      <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap ">Rp.23.000.00</td>
                      <td class="px-6 py-4 text-sm font-medium text-center whitespace-nowrap">
                        <a class="px-5 py-3 text-white bg-blue-500 rounded-lg" href="#">Detail</a>
                      </td>
                    </tr>
                    <tr>
                      <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap ">EXP202304-001</td>
                      <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap ">Air</td>
                      <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap ">Rp.23.000.00</td>
                      <td class="px-6 py-4 text-sm font-medium text-center whitespace-nowrap">
                        <a class="px-5 py-3 text-white bg-blue-500 rounded-lg" href="#">Detail</a>
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
  </div>
</div>
@endsection
