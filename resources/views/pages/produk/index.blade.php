@extends('layout.main.index')

@section('pages')
<div class="flex flex-col gap-y-10">
    <div class="flex justify-between">
        <h1 class="text-white text-[30px] font-semibold">Produk</h1>
        <a href="/produk/tambah" class="bg-white text-[#2D76E5] text-[20px] px-5 rounded-lg font-bold flex justify-center items-center">+ Tambah Produk</a>
    </div>

    <div class="bg-white rounded-xl py-7 px-10">
        <table class="table-auto w-full font-inter">
            <thead class="bg-[#2D76E5] text-white rounded-lg">
                <tr>
                    <th class="py-4 rounded-tl-lg w-12"></th>
                    <th class="py-4 text-left">Nama Item</th>
                    <th class="py-4">Stok</th>
                    <th class="py-4">Harga</th>
                    <th class="py-4">SKU</th>
                    <th class="py-4">Status</th>
                    <th class="py-4 rounded-tr-lg">Opsi Lain</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center border border-[#2B7FFF]">
                    <td class="pl-5">
                        <svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L6 6L1 11" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </td>
                    <td class="py-6 text-left flex items-center gap-x-5">
                        <img src={{ url("assets/images/products/Ikan-arwana-1.jpg") }} class="w-14 h-14 rounded-lg" alt="">
                        <p>Ikan Arwana</p>
                    </td>
                    <td class="py-6">10</td>
                    <td class="py-6">1.000.000</td>
                    <td class="py-6">IWN01</td>
                    <td class="py-6 text-[#16E043] font-bold">Aktif</td>
                    <td class="py-6">
                        <button class="">
                            <svg class="w-5" viewBox="0 0 16 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="1.5643" cy="1.89585" r="1.52329" fill="black"/>
                                <circle cx="7.65708" cy="1.89585" r="1.52329" fill="black"/>
                                <circle cx="13.7508" cy="1.89585" r="1.52329" fill="black"/>
                            </svg>
                        </button>
                    </td>
                </tr>
                <tr class="text-center border border-[#2B7FFF]">
                    <td class="pl-5">
                        <svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L6 6L1 11" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </td>
                    <td class="py-6 text-left flex items-center gap-x-5">
                        <img src={{ url("assets/images/products/Ikan-arwana-2.jpg") }} class="w-14 h-14 rounded-lg" alt="">
                        <p>Ikan Cubung</p>
                    </td>
                    <td class="py-6">20</td>
                    <td class="py-6">5.000.000</td>
                    <td class="py-6">TWG01</td>
                    <td class="py-6 text-[#FF0000] font-bold">Tidak Aktif</td>
                    <td class="py-6">
                        <button class="">
                            <svg class="w-5" viewBox="0 0 16 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="1.5643" cy="1.89585" r="1.52329" fill="black"/>
                                <circle cx="7.65708" cy="1.89585" r="1.52329" fill="black"/>
                                <circle cx="13.7508" cy="1.89585" r="1.52329" fill="black"/>
                            </svg>
                        </button>
                    </td>
                </tr>
            </tbody>
          </table>
    </div>
</div>
@endsection
