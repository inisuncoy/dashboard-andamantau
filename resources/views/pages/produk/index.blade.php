@extends('layout.main.index')

@section('pages')
<div class="flex flex-col gap-y-10">
  <div class="flex justify-between">
    <h1 class="text-white text-[30px] font-semibold">Produk</h1>
    <a href="/produk/tambah"
      class="bg-white text-[#2D76E5] text-[20px] px-5 rounded-lg font-bold flex justify-center items-center">+ Tambah
      Produk</a>
  </div>

  <div class="flex flex-col mt-3 bg-white p-10 rounded-xl">
    <div class="-m-1.5 overflow-x-auto">
      <div class="p-1.5 min-w-full inline-block align-middle">
        <div class="overflow-hidden border-2 border-blue-500 rounded-xl">
          <table class="min-w-full divide-y divide-blue-500 ">
            <thead class="bg-[#2D76E5] text-white rounded-lg">
              <tr>
                <th class="py-4 rounded-tl-lg w-12"></th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium  uppercase ">Nama Item</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium  uppercase">Stok</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium  uppercase">Harga</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium  uppercase">SKU</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium  uppercase">Status</th>
                <th scope="col" class="px-6 py-3 text-center text-xs font-medium  uppercase">Opsi Lain</th>
                <th class="py-4 rounded-tr-lg"></th>

              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 ">
              <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">
                  <svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L6 6L1 11" stroke="#646464" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round" />
                  </svg>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">
                  <div class="flex items-center gap-5">
                    <img src={{ url("assets/images/products/Ikan-arwana-1.jpg") }} class="w-14 h-14 rounded-lg" alt="">
                    <p>Ikan Arwana</p>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">10</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">Rp.23.000.00</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">IWN01</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-green-500 font-bold ">Aktif</td>
                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                  <a href="/produk/edit">
                    <svg class="w-5" viewBox="0 0 16 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <circle cx="1.5643" cy="1.89585" r="1.52329" fill="black" />
                      <circle cx="7.65708" cy="1.89585" r="1.52329" fill="black" />
                      <circle cx="13.7508" cy="1.89585" r="1.52329" fill="black" />
                    </svg>
                  </a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection