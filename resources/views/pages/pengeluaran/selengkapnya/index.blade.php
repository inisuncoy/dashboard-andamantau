@extends('layout.main.index')

@section('pages')
<div class="flex flex-col gap-y-10">
    <div class="flex items-end justify-between">
        <div>
            <h1 class="text-white text-[30px] font-semibold">Pengeluaran</h1>
            <div class="text-white text-[18px] flex gap-x-2 font-semibold">
                <a href="/pengeluaran" class="loadButton">Pengeluaran</a>
                >
                <p>Lihat Selengkapnya</p>
            </div>
        </div>

        <div class="relative">
            <form method="GET" action="/pengeluaran/selengkapnya">
                <select name="month" id="selected_option" class="px-4 appearance-none py-3 w-[200px] bg-white rounded-lg text-[#2D76E5] font-bold shadow-2xl">
                    <option value="" class="text-black">Semua Bulan</option>
                    <option value="Januari" class="text-black" {{ (request()->query('bulan') == "Januari") ? 'selected' : '' }}>Januari</option>
                    <option value="Februari" class="text-black" {{ (request()->query('bulan') == "Februari") ? 'selected' : '' }}>Februari</option>
                    <option value="Maret" class="text-black" {{ (request()->query('bulan') == "Maret") ? 'selected' : '' }}>Maret</option>
                    <option value="April" class="text-black" {{ (request()->query('bulan') == "April") ? 'selected' : '' }}>April</option>
                    <option value="Mei" class="text-black" {{ (request()->query('bulan') == "Mei") ? 'selected' : '' }}>Mei</option>
                    <option value="Juni" class="text-black" {{ (request()->query('bulan') == "Juni") ? 'selected' : '' }}>Juni</option>
                    <option value="Juli" class="text-black" {{ (request()->query('bulan') == "Juli") ? 'selected' : '' }}>Juli</option>
                    <option value="Agustus" class="text-black" {{ (request()->query('bulan') == "Agustus") ? 'selected' : '' }}>Agustus</option>
                    <option value="September" class="text-black" {{ (request()->query('bulan') == "September") ? 'selected' : '' }}>September</option>
                    <option value="Oktober" class="text-black" {{ (request()->query('bulan') == "Oktober") ? 'selected' : '' }}>Oktober</option>
                    <option value="November" class="text-black" {{ (request()->query('bulan') == "November") ? 'selected' : '' }}>November</option>
                    <option value="Desember" class="text-black" {{ (request()->query('bulan') == "Desember") ? 'selected' : '' }}>Desember</option>
                </select>
            </form>
            <div class="absolute top-4 right-3">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15 7.5L10 12.5L5 7.5" stroke="black" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </div>
        </div>

    </div>
    {{-- @if (empty($expensesData['data']))
    <div class="flex flex-col items-center justify-center px-10 h-[40vw] bg-white rounded-lg">
        <div class="text-center">
            <h1 class="font-bold text-[32px]">Halaman Pengeluaran Kosong</h1>
            <p class="text-[20px]">Ayo buat laporan pengeluaranmu melalui</p>
            <p class="text-[20px]">tombol “Tambah Pengeluaran”</p>
        </div>
        <img src={{ url('assets/images/empty-pengeluaran.png') }} alt="empty-pengeluaran">
    </div>
    @else --}}
    <div class="px-10 py-5 bg-white rounded-lg">
        <div class="border-2 border-blue-500 rounded-xl">
            <table class="w-full divide-blue-500 table-auto">
                <thead class="bg-[#2D76E5] text-white rounded-lg">
                    <tr>
                        <th scope="col" class="px-3 py-3 font-bold text-center rounded-tl-lg text-md whitespace-nowrap">No</th>
                        <th scope="col" class="px-3 py-3 font-bold text-center text-md whitespace-nowrap">Tanggal</th>
                        <th scope="col" class="px-3 py-3 font-bold text-center text-md whitespace-nowrap">Total Pengeluaran (Rp)</th>
                        <th scope="col" class="px-3 py-3 w-[200px] font-bold text-center text-md whitespace-nowrap">Deskripsi</th>
                        <th scope="col" class="px-3 py-3 font-bold text-center text-md whitespace-nowrap"></th>
                        <th scope="col" class="px-3 py-3 font-bold text-center text-md whitespace-nowrap"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#A3C8FF] ">
                    @foreach ($expensesData['data'] ?? $expensesData as $index => $expense)
                    <tr>
                        <td class="px-5 py-6 font-medium text-center text-gray-800 text-md whitespace-nowrap">{{ (((request()->page ?? 1) - 1 == 0) ? "" : request()->page - 1) . ($index + 1) }}</td>
                        <td class="px-3 py-6 text-center text-gray-800 text-md whitespace-nowrap">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $expense['date'])->format('d F Y') ?? "" }}</td>
                        <td class="px-3 py-6 text-center text-gray-800 text-md whitespace-nowrap">@currencyNonRp($expense['nominal'] ?? 0)</td>
                        <td class="text-center text-gray-800 text-md">
                            <p class="line-clamp-1 w-[200px]">
                                {{ $expense['notes'] }}
                            </p>
                        </td>
                        <td class="px-3 py-6 font-bold text-center text-md whitespace-nowrap">
                            <a class="px-8 py-3 text-white bg-blue-500 rounded-full loadButton" href="/pengeluaran/{{ $expense['id'] }}/detail">Detail</a>
                        </td>
                        <td class="px-3 py-6 font-bold text-center text-md whitespace-nowrap">
                            <div class="relative">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.334 20L13.334 16" stroke="#FF6767" stroke-width="2.66667" stroke-linecap="round"/>
                                    <path d="M18.666 20L18.666 16" stroke="#FF6767" stroke-width="2.66667" stroke-linecap="round"/>
                                    <path d="M4 9.3335H28V9.3335C26.7575 9.3335 26.1362 9.3335 25.6462 9.53648C24.9928 9.80713 24.4736 10.3263 24.203 10.9797C24 11.4697 24 12.091 24 13.3335V21.3335C24 23.8477 24 25.1047 23.219 25.8858C22.4379 26.6668 21.1808 26.6668 18.6667 26.6668H13.3333C10.8192 26.6668 9.5621 26.6668 8.78105 25.8858C8 25.1047 8 23.8477 8 21.3335V13.3335C8 12.091 8 11.4697 7.79701 10.9797C7.52636 10.3263 7.00723 9.80713 6.35382 9.53648C5.86377 9.3335 5.24251 9.3335 4 9.3335V9.3335Z" stroke="#FF6767" stroke-width="2.66667" stroke-linecap="round"/>
                                    <path d="M13.4235 4.49412C13.5755 4.35237 13.9103 4.2271 14.376 4.13776C14.8417 4.04843 15.4123 4 15.9993 4C16.5864 4 17.157 4.04842 17.6227 4.13776C18.0884 4.2271 18.4232 4.35236 18.5752 4.49412" stroke="#FF6767" stroke-width="2.66667" stroke-linecap="round"/>
                                </svg>
                                <a href="/pengeluaran/{{ $expense['id'] }}/delete" data-confirm-delete="true" class="absolute top-0 left-0 opacity-0">
                                    Hello
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if (!empty($expensesData['data']))
        <div class="mt-5 pagination">
            {{ $paginatedPlaces->links('pagination::tailwind') }}
        </div>
        @endif
    </div>
    {{-- @endif --}}
</div>
@endsection

@push('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectElement = document.getElementById('selected_option');

        selectElement.addEventListener('change', function() {
            const selectedValue = selectElement.value;
            const newUrl = `{{ url('/pengeluaran/selengkapnya') }}?bulan=${selectedValue}`;
            window.location.href = newUrl;
        });
    });
</script>
@endpush
