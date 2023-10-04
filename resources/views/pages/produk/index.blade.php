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
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="overflow-hidden border-2 border-[#99C1FF] rounded-xl">
                    <table class="min-w-full divide-y divide-[#99C1FF] ">
                        <thead class="bg-[#2D76E5] text-white rounded-lg">
                            <tr>
                                <th scope="col" class="px-6 py-3 font-bold text-center text-md font-inter">Daftar Produk</th>
                                <th scope="col" class="px-6 py-3 font-bold text-center text-md font-inter">
                                    <div class="flex justify-center">
                                        <button class="flex items-center justify-center gap-x-3">
                                            <p>Stok</p>
                                            <svg width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13 1L7 7L1 0.999999" stroke="white" stroke-width="2" stroke-linecap="round"/>
                                            </svg>
                                        </button>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3 font-bold text-center text-md font-inter">Harga</th>
                                <th scope="col" class="px-6 py-3 font-bold text-center text-md font-inter">SKU</th>
                                <th scope="col" class="px-6 py-3 font-bold text-center text-md font-inter">Status</th>
                                <th scope="col" class="px-6 py-3 font-bold text-center text-md font-inter"></th>
                                <th class="py-4 rounded-tr-lg"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#99C1FF]">
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
                                <td class="px-6 py-4 font-bold text-center text-[#16E043] text-md">Tidak Aktif</td>
                                @endif
                                <td class="px-6 py-4 font-medium text-center text-md">
                                    <a href="/produk/{{ $product['id'] }}/edit" class="bg-[#2D76E5] text-white py-2 px-7 rounded-full">Ubah</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif


</div>
@endsection
