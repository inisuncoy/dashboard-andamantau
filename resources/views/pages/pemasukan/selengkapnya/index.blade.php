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
        <a href="/pemasukan/tambah" class="loadButton px-5 py-2 text-lg text-[#2D76E5] bg-white font-bold flex items-center justify-center gap-x-3 rounded-lg">
            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7.5 13.0825V7.47985L7.5 1.8772M2 7.47985H13" stroke="#2D76E5" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <p>Tambah Pemasukan</p>
        </a>
        {{-- @if (empty($incomesData))
        <div class="relative">
            <select name="month" id="month" class="px-4 appearance-none py-3 w-[200px] bg-white rounded-lg text-[#2D76E5] font-bold shadow-2xl">
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
        @endif --}}

    </div>
    {{-- @if (empty($incomesData))
    <div class="flex flex-col items-center justify-center px-10 py-[20px] bg-white rounded-lg">
        <div class="text-center">
            <h1 class="font-bold text-[32px]">Halaman Pemasukan Kosong</h1>
            <p class="text-[20px]">Ayo mulai jualan kamu melalui website</p>
            <p class="text-[20px]">“Anda Mantau”</p>
        </div>
        <img src={{ url('assets/images/empty-pemasukan.png') }} alt="empty-pemasukan">
    </div>
    @else --}}
    <div class="px-10 py-5 bg-white rounded-lg">
        <div class="overflow-hidden border-2 border-blue-500 rounded-xl">
            <table class="min-w-full divide-y divide-blue-500">
              <thead class="bg-[#2D76E5] text-white rounded-lg font-inter">
                <tr>
                  <th scope="col" class="px-6 py-4 font-semibold text-center rounded-tl-lg text-md">No</th>
                  <th scope="col" class="px-6 py-4 font-semibold text-center text-md">Tanggal</th>
                  <th scope="col" class="px-6 py-4 font-semibold text-center text-md">Nominal (Rp)</th>
                  <th scope="col" class="px-6 py-4 font-semibold text-center text-md ">Deskripsi</th>
                  <th scope="col" class="px-3 py-3 font-bold text-center text-md whitespace-nowrap"></th>
                  <th scope="col" class="px-3 py-3 font-bold text-center text-md whitespace-nowrap"></th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 ">
                @foreach ($paginatedPlaces as $index => $income)
                    <tr>
                        <td class="px-6 py-6 font-medium text-center text-gray-800 text-md whitespace-nowrap ">{{ $index + 1 }}</td>
                        <td class="px-6 py-6 text-center text-gray-800 text-md whitespace-nowrap">{{ \Carbon\Carbon::parse($income['date'])->format('d M Y') }}</td>
                        <td class="px-6 py-6 text-center text-gray-800 text-md whitespace-nowrap">@currencyNonRp($income['nominal'])</td>
                        <td class="px-6 py-6 text-center text-gray-800 text-md whitespace-nowrap">{{$income['notes']}}</td>
                        <td class="px-6 py-6 font-medium text-center text-md whitespace-nowrap">
                            <a class="px-8 py-3 text-white bg-blue-500 rounded-full loadButton" href="/pemasukan/{{ $income['id'] }}/detail">Detail</a>
                        </td>
                        <td class="px-3 py-6 font-bold text-center text-md whitespace-nowrap">
                            <div class="relative">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.334 20L13.334 16" stroke="#FF6767" stroke-width="2.66667" stroke-linecap="round"/>
                                    <path d="M18.666 20L18.666 16" stroke="#FF6767" stroke-width="2.66667" stroke-linecap="round"/>
                                    <path d="M4 9.3335H28V9.3335C26.7575 9.3335 26.1362 9.3335 25.6462 9.53648C24.9928 9.80713 24.4736 10.3263 24.203 10.9797C24 11.4697 24 12.091 24 13.3335V21.3335C24 23.8477 24 25.1047 23.219 25.8858C22.4379 26.6668 21.1808 26.6668 18.6667 26.6668H13.3333C10.8192 26.6668 9.5621 26.6668 8.78105 25.8858C8 25.1047 8 23.8477 8 21.3335V13.3335C8 12.091 8 11.4697 7.79701 10.9797C7.52636 10.3263 7.00723 9.80713 6.35382 9.53648C5.86377 9.3335 5.24251 9.3335 4 9.3335V9.3335Z" stroke="#FF6767" stroke-width="2.66667" stroke-linecap="round"/>
                                    <path d="M13.4235 4.49412C13.5755 4.35237 13.9103 4.2271 14.376 4.13776C14.8417 4.04843 15.4123 4 15.9993 4C16.5864 4 17.157 4.04842 17.6227 4.13776C18.0884 4.2271 18.4232 4.35236 18.5752 4.49412" stroke="#FF6767" stroke-width="2.66667" stroke-linecap="round"/>
                                </svg>
                                <a href="/pemasukan/{{ $income['id'] }}/delete" data-confirm-delete="true" class="absolute top-0 left-0 opacity-0">
                                    Hello
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        <div class="mt-5 pagination">
            {{ $paginatedPlaces->onEachSide(1)->links('pagination::tailwind') }}
        </div>
    </div>
    {{-- @endif --}}
</div>
@endsection
