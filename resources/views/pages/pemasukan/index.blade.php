@extends('layout.main.index')

@section('pages')
<div class="flex flex-col gap-y-10">
  <div class="flex justify-between">
    <h1 class="text-white text-[30px] font-semibold">Pemasukan</h1>
    <a href="/pemasukan/tambah"
      class="bg-white text-[#2D76E5] text-[20px] px-5 rounded-lg font-bold flex justify-center items-center">+ Tambah
      Pemasukan</a>
  </div>

  <div class="bg-white px-5 py-10 rounded-xl">
    <div class="flex justify-around items-center ">
      <div class="border-2 border-blue-500 px-10 py-5 flex flex-col items-center gap-5 rounded-xl shadow-lg">
        <h1 class="text-xl">Total Pemasukan</h1>
        <h1 class="text-3xl font-bold">Rp.21.000.00</h1>
      </div>
      <div class="border-2 border-blue-500 px-10 py-5 flex flex-col items-center gap-5 rounded-xl shadow-lg">
        <h1 class="text-xl">Total Pemasukan</h1>
        <h1 class="text-3xl font-bold">Rp.21.000.00</h1>
      </div>
      <div class="border-2 border-blue-500 px-10 py-5 flex flex-col items-center gap-5 rounded-xl shadow-lg">
        <h1 class="text-xl">Total Pemasukan</h1>
        <h1 class="text-3xl font-bold">Rp.21.000.00</h1>
      </div>
    </div>
    <div class="flex gap-10 mt-10">
      <div class="flex-1">
        <canvas id="myChart"></canvas>
      </div>
      <div class="flex-1">
        <div class="flex justify-between items-center">
          <h1 class="text-xl font-semibold">Pilih Tanggal</h1>
          <input type="date" id="tgl" name="tgl" class="bg-blue-500 text-white px-5 py-3">
        </div>
        <div>
          <h1 class="text-xl font-semibold">Detail Pemasukan</h1>
          <br>
          <div class="flex justify-between">
            <p class="text-xl">Listrik</p>
            <p class="text-xl">Rp.20.000.00</p>
          </div>
          <div class="flex justify-between">
            <p class="text-xl">Air</p>
            <p class="text-xl">Rp.20.000.00</p>
          </div>
          <div class="flex justify-between">
            <p class="text-xl">Pajak</p>
            <p class="text-xl">Rp.20.000.00</p>
          </div>
          <div class="flex justify-between">
            <p class="text-xl">Bensin</p>
            <p class="text-xl">Rp.20.000.00</p>
          </div>
          <br>
          <div class="flex justify-between">
            <p class="text-xl font-semibold">Total</p>
            <p class="text-xl font-semibold">Rp.20.000.00</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection