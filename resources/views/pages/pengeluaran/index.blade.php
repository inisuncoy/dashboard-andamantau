@extends('layout.main.index')

@push('scripts')
@vite(['resources/js/pengeluaranChart.js'])
@endpush

@section('pages')
<div class="flex flex-col gap-y-10">
    <div class="flex items-center justify-between">
        <h1 class="text-white text-[30px] font-semibold">Pengeluaran</h1>
        <a href="/pengeluaran/tambah" class="px-5 py-2 text-lg text-[#2D76E5] bg-white font-bold flex items-center justify-center gap-x-3 rounded-lg">
            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7.5 13.0825V7.47985L7.5 1.8772M2 7.47985H13" stroke="#2D76E5" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <p>Tambah Pengeluaran</p>
        </a>
    </div>

  <div class="px-5 py-10 bg-white rounded-xl">
    <div class="grid items-center justify-around grid-cols-3 gap-x-10">
        <div class="border-2 border-black rounded-md ">
            <div class="bg-[#F2CF00] w-full h-2 rounded-t-md"></div>
            <div class="flex flex-col items-center justify-center my-5 gap-y-2">
                <h4 class="text-[24px]">Total Pengeluaran</h4>
                <h1 class="text-[30px] font-bold">@currency(21123000)</h1>
            </div>
        </div>
        <div class="border-2 border-black rounded-md ">
            <div class="bg-[#00C22B] w-full h-2 rounded-t-md"></div>
            <div class="flex flex-col items-center justify-center my-5 gap-y-2">
                <h4 class="text-[24px]">Pengeluaran Bulan Ini</h4>
                <h1 class="text-[30px] font-bold">@currency(21123000)</h1>
            </div>
        </div>
        <div class="border-2 border-black rounded-md ">
            <div class="bg-[#FF0000BD] w-full h-2 rounded-t-md"></div>
            <div class="flex flex-col items-center justify-center my-5 gap-y-2">
                <h4 class="text-[24px]">Pengeluaran Minggu Ini</h4>
                <h1 class="text-[30px] font-bold">@currency(21123000)</h1>
            </div>
        </div>
    </div>
    <div class="mt-10">
      <div class="border-2 border-blue-500 px-[10px] py-[29px] rounded-2xl text-center">
        <h1 class="text-2xl font-semibold">Total Pengeluaran per Bulan</h1>
        <canvas id="pengeluaranChart" class="mt-5"></canvas>
      </div>
      <div class="mt-10 ">

        <div class="flex flex-col mt-3">
          <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
              <div class="overflow-hidden border-2 border-blue-500 rounded-xl">
                <table class="w-full divide-blue-500 table-auto">
                  <thead class="bg-[#2D76E5] text-white rounded-lg">
                    <tr>
                        <th scope="col" class="px-6 py-3 font-bold text-center rounded-tl-lg text-md whitespace-nowrap">No</th>
                        <th scope="col" class="px-6 py-3 font-bold text-center text-md whitespace-nowrap">Tanggal & Waktu</th>
                        <th scope="col" class="px-6 py-3 font-bold text-center text-md whitespace-nowrap">Total Pengeluaran (Rp)</th>
                        <th scope="col" class="px-6 py-3 font-bold text-center text-md whitespace-nowrap">Deskripsi</th>
                        <th scope="col" class="px-6 py-3 font-bold text-center text-md whitespace-nowrap"></th>
                    </tr>
                  </thead>
                  <tbody class="divide-y divide-[#A3C8FF]">
                    @foreach ($expensesData as $index => $expense)
                    <tr class="">
                        <td class="px-6 py-6 font-medium text-center text-gray-800 text-md whitespace-nowrap">{{ $index + 1 }}</td>
                        <td class="px-6 py-6 text-center text-gray-800 text-md whitespace-nowrap">{{ $expense['date'] }} (Prototype)</td>
                        <td class="px-6 py-6 text-center text-gray-800 text-md whitespace-nowrap">@currencyNonRp($expense['nominal'])</td>
                        <td class="px-6 py-6 w-[300px] text-center text-gray-800 text-md">
                            <p class="line-clamp-1">
                                {{ $expense['notes'] }}
                            </p>
                        </td>
                        <td class="px-6 py-6 font-bold text-center text-md whitespace-nowrap">
                            <a class="px-8 py-3 text-white bg-blue-500 rounded-full" href="/pengeluaran/{{ $expense['id'] }}/detail">Detail</a>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="mt-5">
            <a href="/pengeluaran/selengkapnya" class="bg-[#2D76E5] py-2 px-8 font-bold rounded-xl text-lg text-white float-right">Lihat selengkapnya</a>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection



