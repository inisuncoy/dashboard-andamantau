@extends('layout.main.index')

@section('pages')
<div class="flex flex-col gap-y-10">
  <div class="flex justify-between">
    <h1 class="text-white text-[30px] font-semibold">Produk</h1>
    <a href="/produk/tambah"
      class="bg-white text-[#2D76E5] text-[20px] px-5 rounded-lg font-bold flex justify-center items-center">+ Tambah
      Produk</a>
  </div>

  <div class="flex flex-col p-10 mt-3 bg-white rounded-xl">
    <div class="-m-1.5 overflow-x-auto">
      <div class="p-1.5 min-w-full inline-block align-middle">
        <div class="overflow-hidden border-2 border-[#99C1FF] rounded-xl">
          <table class="min-w-full divide-y divide-[#99C1FF] ">
            <thead class="bg-[#2D76E5] text-white rounded-lg">
              <tr>
                <th class="w-12 py-4 rounded-tl-lg"></th>
                <th scope="col" class="px-6 py-3 font-bold text-left text-md font-inter">Nama Item</th>
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
                <th scope="col" class="px-6 py-3 font-bold text-center text-md font-inter">Opsi Lain</th>
                <th class="py-4 rounded-tr-lg"></th>
              </tr>
            </thead>
            <tbody class="divide-y divide-[#99C1FF]">
              <tr>
                <td class="px-6 py-4 font-medium text-center text-md">
                  <svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L6 6L1 11" stroke="#646464" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round" />
                  </svg>
                </td>
                <td class="px-6 py-4 font-medium text-center text-md">
                  <div class="flex items-center gap-5">
                    <img src={{ url("assets/images/products/Ikan-arwana-1.jpg") }} class="rounded-lg w-14 h-14" alt="">
                    <p>Ikan Arwana</p>
                  </div>
                </td>
                <td class="px-6 py-4 text-center text-md">10</td>
                <td class="px-6 py-4 text-center text-md">Rp.23.000.00</td>
                <td class="px-6 py-4 text-center text-md">IWN01</td>
                <td class="px-6 py-4 font-bold text-center text-[#16E043] text-md">Aktif</td>
                <td class="px-6 py-4 font-medium text-center text-md">
                    <button type="button">
                        <svg class="w-5" viewBox="0 0 16 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <circle cx="1.5643" cy="1.89585" r="1.52329" fill="black" />
                          <circle cx="7.65708" cy="1.89585" r="1.52329" fill="black" />
                          <circle cx="13.7508" cy="1.89585" r="1.52329" fill="black" />
                        </svg>
                    </button>
                </td>
              </tr>
              <tr>
                <td class="px-6 py-4 font-medium text-center text-md">
                  <svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L6 6L1 11" stroke="#646464" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round" />
                  </svg>
                </td>
                <td class="px-6 py-4 font-medium text-center text-md">
                  <div class="flex items-center gap-5">
                    <img src={{ url("assets/images/products/Ikan-arwana-1.jpg") }} class="rounded-lg w-14 h-14" alt="">
                    <p>Ikan Arwana</p>
                  </div>
                </td>
                <td class="px-6 py-4 text-center text-md">10</td>
                <td class="px-6 py-4 text-center text-md">Rp.23.000.00</td>
                <td class="px-6 py-4 text-center text-md">IWN01</td>
                <td class="px-6 py-4 font-bold text-center text-[#FF0000] text-md">Tidak Aktif</td>
                <td class="px-6 py-4 font-medium text-center text-md">
                  <button type="button">
                    <svg class="w-5" viewBox="0 0 16 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <circle cx="1.5643" cy="1.89585" r="1.52329" fill="black" />
                      <circle cx="7.65708" cy="1.89585" r="1.52329" fill="black" />
                      <circle cx="13.7508" cy="1.89585" r="1.52329" fill="black" />
                    </svg>
                  </button>
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
