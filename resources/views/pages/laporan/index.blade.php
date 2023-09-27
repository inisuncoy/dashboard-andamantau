@extends('layout.main.index')

@push('scripts')
@vite(['resources/js/twoLineChart.js', 'resources/js/piecharts.js'])
@endpush

@section('pages')
<div class="flex flex-col gap-y-10">
    <h1 class="text-white text-[30px] font-semibold">Laporan</h1>

  <div class="px-5 py-10 bg-white rounded-xl">
    <div class="grid items-center justify-around grid-cols-3 gap-x-10">
        <div class="border-2 border-black rounded-md ">
            <div class="bg-[#F2CF00] w-full h-2 rounded-t-md"></div>
            <div class="flex flex-col items-center justify-center my-5 gap-y-2">
                <h4 class="text-[24px]">Total Pemasukkan</h4>
                <h1 class="text-[30px] font-bold">Rp @currencyNonRp(21123000)</h1>
            </div>
        </div>
        <div class="border-2 border-black rounded-md ">
            <div class="bg-[#00C22B] w-full h-2 rounded-t-md"></div>
            <div class="flex flex-col items-center justify-center my-5 gap-y-2">
                <h4 class="text-[24px]">Total Pengeluaran</h4>
                <h1 class="text-[30px] font-bold">Rp @currencyNonRp(21123000)</h1>
            </div>
        </div>
        <div class="border-2 border-black rounded-md ">
            <div class="bg-[#FF0000BD] w-full h-2 rounded-t-md"></div>
            <div class="flex flex-col items-center justify-center my-5 gap-y-2">
                <h4 class="text-[24px]">Laba Bersih</h4>
                <h1 class="text-[30px] font-bold">Rp @currencyNonRp(21123000)</h1>
            </div>
        </div>
    </div>
    <div class="mt-10">
      <div class="border-2 border-blue-500 px-[10px] py-[29px] rounded-2xl text-center">
        <h1 class="text-2xl font-semibold">Laporan Per Bulan</h1>
        <canvas id="twoLineChart" class="mt-5"></canvas>
      </div>
    </div>
  </div>
</div>
@endsection
