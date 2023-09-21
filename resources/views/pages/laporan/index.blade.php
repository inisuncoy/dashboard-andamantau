@extends('layout.main.index')

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
        <canvas id="twoLineChart"></canvas>
      </div>
    </div>
    <div class="mt-10">
      <div class="flex justify-center items-center ">
        <div class=" w-[300px]">
          <canvas id="piechart" class=""></canvas>
        </div>
      </div>
    </div>

  </div>

</div>
@endsection