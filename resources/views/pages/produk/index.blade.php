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
              <tr data-id="1">
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
                  <button class="">
                    <svg class="w-5" viewBox="0 0 16 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <circle cx="1.5643" cy="1.89585" r="1.52329" fill="black" />
                      <circle cx="7.65708" cy="1.89585" r="1.52329" fill="black" />
                      <circle cx="13.7508" cy="1.89585" r="1.52329" fill="black" />
                    </svg>
                  </button>
                </td>
              </tr>
              <tr data-id="2">
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
                  <button class="">
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
          <!-- <div id="inputForm" style="display: none;">
            <h1>hello world</h1>
          </div> -->

        </div>
      </div>
    </div>
  </div>
</div>
<div class="absolute w-full  h-screen top-0 left-0 hidden" id="inputForm">
  <div class=" w-full  h-screen bg-black opacity-50"></div>
  <div class="absolute w-full  h-screen top-0 left-0 flex justify-center items-center">
    <div class="bg-white px-10 py-5 rounded-xl w-[1000px] ">
      <h1 class="text-xl font-medium" id="close">Edit Product</h1>
      <div class="w-full max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold mb-6">Upload Multiple Gambar</h2>
        <div class="mb-4">
          <p class="text-red-500 text-sm mt-1">Drag & Drop File</p>
        </div>
        <div class="mt-6">
        </div>
      </div>
    </div>
    <div>
      <div>
        <label for="namaProduct"> Nama Product</label>
        <input type="text" id="namaProduct" name="namaProduct">
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  $('tbody tr').on('click', function() {
    const id = $(this).data('id');
    $('#inputForm')
      .show()
  });
  $('#close').on('click', function() {
    $('#inputForm')
      .hide()
  });
});
</script>

@endsection