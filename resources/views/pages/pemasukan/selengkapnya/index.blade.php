@extends('layout.main.index')

@section('pages')
<div class="flex flex-col gap-y-10">
    <div class="flex items-end justify-between">
        <div>
            <h1 class="text-white text-[30px] font-semibold">Pemasukan</h1>
            <div class="text-white text-[18px] flex gap-x-2 font-semibold">
                <a href="/pemasukan" class="loadButton">Pemasukan</a>
                >
                <p>Lihat Selengkapnya</p>
            </div>
        </div>
        @if (empty($incomesData))
        <div class="relative">
            <select name="month" id="month" class="px-4 appearance-none  py-3 w-[200px] bg-white rounded-lg text-[#2D76E5] font-bold shadow-2xl">
                <option value="" selected class="text-black">Semua Bulan</option>
                <option value="Januari" class="text-black">Januari</option>
                <option value="Febuari" class="text-black">Febuari</option>
                <option value="Maret" class="text-black">Maret</option>
                <option value="April" class="text-black">April</option>
                <option value="Mei" class="text-black">Mei</option>
                <option value="Juni" class="text-black">Juni</option>
                <option value="Juli" class="text-black">Juli</option>
                <option value="Agustus" class="text-black">Agustus</option>
                <option value="September" class="text-black">September</option>
                <option value="Oktober" class="text-black">Oktober</option>
                <option value="November" class="text-black">November</option>
                <option value="Desember" class="text-black">Desember</option>
            </select>
            <div class="absolute top-4 right-3">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15 7.5L10 12.5L5 7.5" stroke="black" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </div>
        </div>
        @endif

    </div>
    @if (empty($incomesData))
    <div class="flex flex-col items-center justify-center px-10 py-[20px] bg-white rounded-lg">
        <div class="text-center">
            <h1 class="font-bold text-[32px]">Halaman Pemasukan Kosong</h1>
            <p class="text-[20px]">Ayo mulai jualan kamu melalui website</p>
            <p class="text-[20px]">“Anda Mantau”</p>
        </div>
        <img src={{ url('assets/images/empty-pemasukan.png') }} alt="empty-pemasukan">
    </div>
    @else
    <div class="px-10 py-5 bg-white rounded-lg">
        <div class="overflow-hidden border-2 border-blue-500 rounded-xl">
            <table class="min-w-full divide-y divide-blue-500">
              <thead class="bg-[#2D76E5] text-white rounded-lg font-inter">
                <tr>
                  <th scope="col" class="px-6 py-4 font-semibold text-center rounded-tl-lg text-md">No</th>
                  <th scope="col" class="px-6 py-4 font-semibold text-center text-md">Tanggal & Waktu</th>
                  <th scope="col" class="px-6 py-4 font-semibold text-center text-md">Total Harga (Rp)</th>
                  <th scope="col" class="px-6 py-4 font-semibold text-center text-md ">Tipe Pembayaran</th>
                  <th class="py-4 rounded-tr-lg"></th>
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
        <div class="mt-5 pagination">
            {{ $incomesData->onEachSide(1)->links('pagination::tailwind') }}
        </div>
    </div>
    @endif

</div>


@endsection
