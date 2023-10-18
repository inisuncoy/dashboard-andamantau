@extends('layout.main.index')

@section('pages')

<div class="flex flex-col gap-y-10">
    <div class="flex justify-between">
        <h1 class="text-white text-[30px] font-semibold">Produk</h1>
        <a href="/produk/tambah"
        class="bg-white text-[#2D76E5] text-[20px] px-5 rounded-lg font-bold flex justify-center items-center">+ Tambah
        Produk</a>
    </div>

    @if (empty($productsData))
    <div class="flex flex-col items-center justify-center px-10 py-[74px] bg-white rounded-lg">
        <div class="text-center">
            <h1 class="font-bold text-[32px]">Halaman Daftar Produk Kosong</h1>
            <p class="text-[20px]">Mulai dengan menambah produk dengan</p>
            <p class="text-[20px]">menekan tombol “Tambah Produk”</p>
        </div>
        <img src={{ url('assets/images/empty-produk.png') }} alt="empty-produk">
    </div>
    @else
    <div class="flex flex-col p-10 mt-3 bg-white rounded-xl">
        <div class="flex justify-end mb-5">
            <form action="/produk" method="GET" class="relative w-[350px]">
                <input type="text" name="query" id="query" value="{{ request()->query('query') }}" class="w-full rounded-lg text-[17px] py-2 pl-12 border border-black" placeholder="Cari Nama Produk" value="{{ old('query') }}">
                <span class="absolute left-3 top-[5px]">
                    <svg class="w-[24px] h-[24px] md:w-[30px] md:h-[30px]" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="11" cy="11" r="6" stroke="#222222" stroke-opacity="0.5"/>
                        <path d="M20 20L17 17" stroke="#222222" stroke-opacity="0.5" stroke-linecap="round"/>
                    </svg>
                </span>
            </form>
        </div>
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="overflow-hidden border-2 border-[#99C1FF] rounded-xl">
                    <table class="min-w-full divide-y divide-[#99C1FF]">
                        <thead class="bg-[#2D76E5] text-white rounded-lg">
                            <tr>
                                <th scope="col" class="px-6 py-3 font-bold text-center text-md font-inter">
                                    <div class="flex justify-center">
                                        <button class="flex items-center justify-center gap-x-3" id="sortByNameButton">
                                            <p>Daftar Produk</p>
                                            @if (request()->query('sortByName'))
                                            <svg class="{{ (request()->query('sortByName') == "asc") ? 'rotate-180' : 'rotate-0' }}" width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13 1L7 7L1 0.999999" stroke="white" stroke-width="2" stroke-linecap="round"/>
                                            </svg>
                                            @endif
                                        </button>
                                    </div>

                                </th>
                                <th scope="col" class="px-6 py-3 font-bold text-center text-md font-inter">
                                    <div class="flex justify-center">
                                        <button class="flex items-center justify-center gap-x-3" id="sortByStockButton">
                                            <p>Stok</p>
                                            @if (request()->query('sortByStock'))
                                            <svg class="{{ (request()->query('sortByStock') == "asc") ? 'rotate-180' : 'rotate-0' }}" width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13 1L7 7L1 0.999999" stroke="white" stroke-width="2" stroke-linecap="round"/>
                                            </svg>
                                            @endif
                                        </button>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3 font-bold text-center text-md font-inter">
                                    <div class="flex justify-center">
                                        <button class="flex items-center justify-center gap-x-3" id="sortByPriceButton">
                                            <p>Harga</p>
                                            @if (request()->query('sortByPrice'))
                                            <svg class="{{ (request()->query('sortByPrice') == "asc") ? 'rotate-180' : 'rotate-0' }}" width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13 1L7 7L1 0.999999" stroke="white" stroke-width="2" stroke-linecap="round"/>
                                            </svg>
                                            @endif
                                        </button>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3 font-bold text-center text-md font-inter">
                                    <div class="flex justify-center">
                                        <button class="flex items-center justify-center gap-x-3" id="sortBySKUButton">
                                            <p>SKU</p>
                                            @if (request()->query('sortBySKU'))
                                            <svg class="{{ (request()->query('sortBySKU') == "asc") ? 'rotate-180' : 'rotate-0' }}" width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13 1L7 7L1 0.999999" stroke="white" stroke-width="2" stroke-linecap="round"/>
                                            </svg>
                                            @endif
                                        </button>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3 font-bold text-center text-md font-inter">
                                    <div class="flex justify-center">
                                        <button class="flex items-center justify-center gap-x-3" id="sortByStatusButton">
                                            <p>Status</p>
                                            @if (request()->query('sortByStatus'))
                                            <svg class="{{ (request()->query('sortByStatus') == "asc") ? 'rotate-180' : 'rotate-0' }}" width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13 1L7 7L1 0.999999" stroke="white" stroke-width="2" stroke-linecap="round"/>
                                            </svg>
                                            @endif
                                        </button>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3 font-bold text-center text-md font-inter"></th>
                                <th class="py-4 rounded-tr-lg"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#99C1FF]">
                            @if ($productsData->count() == 0)
                            <tr>
                                <td>
                                    <h1 class="px-5 py-4 text-[20px]">
                                        Produk Tidak Ditemukan
                                    </h1>
                                </td>
                            </tr>
                            @endif
                            @foreach ($productsData as $product)
                            <tr>
                                <td class="px-6 py-4 font-medium text-center text-md">
                                    <div class="flex items-center gap-5">
                                        @if ($product['image'])
                                        <img src={{ url(config('backend.backend_url') . "/" . $product['image'])  }} onerror="this.onerror=null;this.src='assets/images/default-placeholder.png';" class="object-cover rounded-lg w-14 h-14" alt="" />
                                        @else
                                        <img src={{ url("assets/images/default-placeholder.png")  }} class="object-cover rounded-lg w-14 h-14" alt="" />
                                        @endif

                                        <p>{{ $product['name'] }}</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center text-md">{{ $product['stock'] }}</td>
                                <td class="px-6 py-4 text-center text-md">@currencyNonRp($product['price'])</td>
                                <td class="px-6 py-4 text-center text-md">{{ $product['sku'] }}</td>
                                @if ($product['status'] == 1)
                                <td class="px-6 py-4 font-bold text-center text-[#16E043] text-md">Aktif</td>
                                @else
                                <td class="px-6 py-4 font-bold text-center text-[#FF0000] text-md">Tidak Aktif</td>
                                @endif
                                <td class="px-6 py-4 font-medium text-center text-md">
                                    <a href="/produk/{{ $product['id'] }}/edit" class="bg-[#2D76E5] text-white py-2 px-7 rounded-full">Ubah</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
                <div class="mt-5 pagination">
                    {{ $productsData->onEachSide(1)->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script>
        function toggleSortOrder(currentSort) {
            return currentSort === 'asc' ? 'desc' : 'asc';
        }

        // Function to update the URL with the new query parameters
        function updateURL(sortOrder, sortBy) {
            const url = new URL(window.location.href);
            url.searchParams.set(sortBy, sortOrder);

            // Preserve the 'query' parameter if it exists
            const queryParam = new URLSearchParams(window.location.search).get('query');
            if (queryParam) {
                url.searchParams.set('query', queryParam);
            }

            // Build the final URL
            const newUrl = url.toString();
            window.history.pushState({ path: newUrl }, '', newUrl);
        }

        // Click event handler for the sorting buttons
        document.getElementById('sortByNameButton').addEventListener('click', function() {
            const currentSort = new URLSearchParams(window.location.search).get('sortByName');
            const newSort = toggleSortOrder(currentSort || 'desc');
            updateURL(newSort, 'sortByName');
            const newUrl = `{{ url('/produk') }}?query={{ (request()->query('query')) ? request()->query('query') : '' }}&sortByName=${newSort}`;
            window.location.href = newUrl;
        });

        document.getElementById('sortByStockButton').addEventListener('click', function() {
            const currentSort = new URLSearchParams(window.location.search).get('sortByStock');
            const newSort = toggleSortOrder(currentSort || 'desc');
            updateURL(newSort, 'sortByStock');
            const newUrl = `{{ url('/produk') }}?query={{ (request()->query('query')) ? request()->query('query') : '' }}&sortByStock=${newSort}`;
            window.location.href = newUrl;
        });

        document.getElementById('sortByPriceButton').addEventListener('click', function() {
            const currentSort = new URLSearchParams(window.location.search).get('sortByPrice');
            const newSort = toggleSortOrder(currentSort || 'desc');
            updateURL(newSort, 'sortByPrice');
            const newUrl = `{{ url('/produk') }}?query={{ (request()->query('query')) ? request()->query('query') : '' }}&sortByPrice=${newSort}`;
            window.location.href = newUrl;
        });

        document.getElementById('sortBySKUButton').addEventListener('click', function() {
            const currentSort = new URLSearchParams(window.location.search).get('sortBySKU');
            const newSort = toggleSortOrder(currentSort || 'desc');
            updateURL(newSort, 'sortBySKU');
            const newUrl = `{{ url('/produk') }}?query={{ (request()->query('query')) ? request()->query('query') : '' }}&sortBySKU=${newSort}`;
            window.location.href = newUrl;
        });

        document.getElementById('sortByStatusButton').addEventListener('click', function() {
            const currentSort = new URLSearchParams(window.location.search).get('sortByStatus');
            const newSort = toggleSortOrder(currentSort || 'desc');
            updateURL(newSort, 'sortByStatus');
            const newUrl = `{{ url('/produk') }}?query={{ (request()->query('query')) ? request()->query('query') : '' }}&sortByStatus=${newSort}`;
            window.location.href = newUrl;
        });
    </script>
@endpush
