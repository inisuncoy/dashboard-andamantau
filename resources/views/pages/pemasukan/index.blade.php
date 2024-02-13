@extends('layout.main.index')

@push('scripts')
@vite(['resources/js/pemasukanChart.js'])
@endpush

@section('pages')
<div class="flex flex-col gap-y-10">
    <h1 class="text-white text-[30px] font-semibold">Pemasukan</h1>


  <div class="px-5 py-10 bg-white rounded-xl">
    <div class="grid items-center justify-around grid-cols-3 gap-x-10">
        <div class="border-2 border-black rounded-md ">
            <div class="bg-[#F2CF00] w-full h-2 rounded-t-md"></div>
            <div class="flex flex-col items-center justify-center my-5 gap-y-2">
                <h4 class="text-[24px]">Total Pemasukan</h4>
                <h1 class="text-[30px] font-bold">@currency($totalPemasukan)</h1>
            </div>
        </div>
        <div class="border-2 border-black rounded-md ">
            <div class="bg-[#00C22B] w-full h-2 rounded-t-md"></div>
            <div class="flex flex-col items-center justify-center my-5 gap-y-2">
                <h4 class="text-[24px]">Pemasukan Bulan Ini</h4>
                <h1 class="text-[30px] font-bold">@currency($totalPemasukanBulanIni)</h1>
            </div>
        </div>
        <div class="border-2 border-black rounded-md ">
            <div class="bg-[#FF0000BD] w-full h-2 rounded-t-md"></div>
            <div class="flex flex-col items-center justify-center my-5 gap-y-2">
                <h4 class="text-[24px]">Pemasukan Minggu Ini</h4>
                <h1 class="text-[30px] font-bold">@currency($totalPengeluaranMingguIni)</h1>
            </div>
        </div>
    </div>
    <div class="mt-10">
      <div class="border-2 border-blue-500 px-[10px] pb-[10px] rounded-2xl text-center">
        <canvas id="pemasukanChart" class="w-full h-full mt-5"></canvas>
      </div>
      <div class="mt-10 ">

        <div class="flex flex-col mt-3">
          <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
              <div class="overflow-hidden border-2 border-blue-500 rounded-xl">
                <table class="min-w-full divide-y divide-blue-500 ">
                  <thead class="bg-[#2D76E5] text-white rounded-lg">
                    <tr>
                        <th scope="col" class="px-6 py-3 font-bold text-center rounded-tl-lg text-md">No</th>
                        <th scope="col" class="px-6 py-3 font-bold text-center text-md">Tanggal & Waktu</th>
                        <th scope="col" class="px-6 py-3 font-bold text-center text-md">Total Harga (Rp)</th>
                        <th scope="col" class="px-6 py-3 font-bold text-center text-md">Tipe Pembayaran</th>
                        <th scope="col" class="px-6 py-3 font-bold text-center text-md"></th>

                    </tr>
                  </thead>
                  <tbody class="divide-y divide-gray-200 ">
                    @foreach ($incomesData as $index => $income)
                    <tr>
                        <td class="px-6 py-6 font-medium text-center text-gray-800 text-md whitespace-nowrap ">{{ $index + 1 }}</td>
                        <td class="px-6 py-6 text-center text-gray-800 text-md whitespace-nowrap">{{ \Carbon\Carbon::parse($income['transaction_date'] . ' ' . $income['timestamp'])->format('d M Y, H:i') }}</td>
                        <td class="px-6 py-6 text-center text-gray-800 text-md whitespace-nowrap">@currencyNonRp($income['total'])</td>
                        <td class="px-6 py-6 text-center text-gray-800 text-md whitespace-nowrap">
                            @foreach ($paymentTypes as $paymentType)
                            @if ($paymentType['id'] == $income['id_payment_type'])
                            <p class="uppercase">{{ $paymentType['name'] }}</p>
                            @endif
                            @endforeach
                        </td>
                        <td class="px-6 py-6 font-medium text-center text-md whitespace-nowrap">
                            <a class="px-8 py-3 text-white bg-blue-500 rounded-full loadButton" href="/pemasukan/{{ $income['id'] }}/detail">Detail</a>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="mt-5">
            <a href="/pemasukan/selengkapnya" class="bg-[#2D76E5] loadButton py-2 px-8 font-bold rounded-xl text-lg text-white float-right">Lihat selengkapnya</a>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
<script>
    const chartDataPendapatanPerBulanSatuTahun = @json($pendapatanPerBulanSatuTahun);
</script>
@endpush
