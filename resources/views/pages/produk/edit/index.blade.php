@extends('layout.main.index')

@push('scripts')
{{-- Jquery --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

{{-- Select2 --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush

@section('pages')
<style>
    .select2-search__field {
        height: 35px!important;
        padding-top: 6px!important;
        padding-bottom: 10px!important;
        padding-left: 2px!important;
    }

    .select2-selection{
        border: 2px solid #9CD3FF!important;
        border-radius: 6px!important;
    }
</style>

<div class="flex flex-col gap-y-10">
    <div class="flex justify-between">
        <div class="flex flex-col justify-between">
            <h1 class="text-white text-[30px] font-semibold">Ubah Produk</h1>
            <div class="text-white text-[15px] flex gap-x-2 font-semibold">
                <a href="/produk">Produk</a>
                >
                <p>Ubah Produk</p>
            </div>
        </div>
        <div class="flex items-center">
            <a href="/produk/{{ $productData['id'] }}/delete" class="px-8 py-2 bg-[#FF0000] text-[20px] flex items-center justify-center rounded-lg text-white font-bold" data-confirm-delete="true">Hapus Produk</a>
        </div>

    </div>


  <form action="">
    <div class="p-5 bg-white rounded-xl font-inter">
      <h1 class="text-[24px] font-bold">Informasi Produk</h1>
      <table class="w-full my-5 table-fixed">
        <tbody class="text-[18px]">
          <tr>
            <td class="w-2/5">Nama Produk</td>
            <td class="py-2">
              <input type="text" name="name" value="{{ $productData['name'] }}"
                class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]"
                placeholder="Contoh: Beras Maknyuss Premium 5kg">
                <p class="mt-1 ml-3 text-sm text-[#00000080]">Tips: Nama produknya saja</p>
            </td>
          </tr>
          <tr>
            <td class="w-2/5">Kategori</td>
            <td class="py-2">
              <input type="text" name="id_category_product" value="{{ $productData['id_category_product'] }}"
                class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]"
                placeholder="Pilih Kategori">
                <p class="mt-1 ml-3 text-sm text-[#00000080]">Tips: Pilih kategori sesuai UMKM mu</p>
            </td>
          </tr>
          <tr>
            <td class="w-2/5">Status</td>
            <td class="py-2">
              <select required name="status" class="w-full rounded-md py-3 px-2 border-2 border-[#9CD3FF] invalid:text-[#00000080]" id="">
                <option value="aktif" class="text-black" {{ ($productData['status'] == 1) ? 'selected' : '' }} >Aktif</option>
                <option value="tidak_aktif" class="text-black" {{ ($productData['status'] == 0) ? 'selected' : '' }}>Tidak Aktif</option>
              </select>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="p-5 mt-5 bg-white rounded-xl font-inter">
      <h1 class="text-[24px] font-bold">Harga Produk</h1>
      <table class="w-full my-5 table-fixed">
        <tbody class="text-[18px]">
            <td class="w-2/5">Harga Satuan</td>
            <td class="py-2">
              <div class="flex border-2 border-[#9CD3FF] rounded-md">
                <span class="py-2 px-2 bg-[#E4F3FF] rounded-l-md">Rp</span>
                <input type="number" name="price" value="{{ $productData['price'] }}" class="w-full px-2 placeholder:text-[15px]"
                  placeholder="Masukan harga">
              </div>
              <p class="mt-1 ml-3 text-sm text-[#00000080]">Tips: Tuliskan harga jual per produk</p>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="p-5 mt-5 bg-white rounded-xl font-inter">
      <h1 class="text-[24px] font-bold">Detail Produk</h1>
      <table class="w-full my-5 table-fixed">
        <tbody class="text-[18px]">
          <tr class="">
            <td class="relative w-2/5">
              <h1 class="absolute top-0 ">Foto Produk</h1>
            </td>
            <td class="py-2">
                <div class="flex gap-5">
                    {{-- Image 1 --}}
                    <div>
                        @if ($productData['image'])
                        <label for="image" class="relative">
                            <div class="peer/image">
                                <img src={{ url(env('BACKEND_URL')) . "/" . $productData['image'] }} class="w-[94px] h-[94px] object-cover rounded-md border border-[#9CD3FF] hover:blur-sm cursor-pointer" alt="">
                            </div>
                            <button class="absolute -right-2 -top-2" type="button">
                                <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="9.5" cy="9" r="8.4" stroke="#FF0000" stroke-width="1.2"/>
                                    <path d="M13.5 5L5.5 13" stroke="#FF0000" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M5.5 5L13.5 13" stroke="#FF0000" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                            <div class="absolute top-0 left-0 items-center justify-center hidden w-full h-full peer-hover/image:flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-[#9CD3FF]" height="60" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg>
                            </div>
                        </label>
                        @else
                        <label for="image" class="cursor-pointer">
                            <svg width="97" height="97" viewBox="0 0 97 97" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.8" x="1.5" y="1.5" width="94" height="94" rx="3.5" fill="white" stroke="#9CD3FF"
                                stroke-width="3" stroke-dasharray="10 10" />
                                <path
                                d="M21.125 29.125C21.125 25.3538 21.125 23.4681 22.2966 22.2966C23.4681 21.125 25.3538 21.125 29.125 21.125H67.875C71.6462 21.125 73.5319 21.125 74.7034 22.2966C75.875 23.4681 75.875 25.3538 75.875 29.125V67.875C75.875 71.6462 75.875 73.5319 74.7034 74.7034C73.5319 75.875 71.6462 75.875 67.875 75.875H29.125C25.3538 75.875 23.4681 75.875 22.2966 74.7034C21.125 73.5319 21.125 71.6462 21.125 67.875V29.125Z"
                                stroke="#B3DDFF" stroke-width="3" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M74.678 60.286C74.6558 60.2606 74.6326 60.2358 74.6085 60.2116L64.9155 50.5186L64.8522 50.4554C64.2402 49.8432 63.679 49.2819 63.1611 48.8868C62.5908 48.4516 61.9004 48.0793 61.0264 48.0793C60.1523 48.0793 59.4619 48.4516 58.8916 48.8868C58.3737 49.2819 57.8126 49.8432 57.2006 50.4553L57.2006 50.4553L57.1373 50.5186L49.5331 58.1228C49.3294 58.3265 49.1609 58.4949 49.0122 58.6382C48.9274 58.4499 48.8335 58.231 48.72 57.9662L42.8199 44.1993L42.7765 44.098C42.2866 42.9548 41.8546 41.9464 41.4022 41.2112C40.9204 40.428 40.2308 39.6436 39.1011 39.426C37.9714 39.2084 37.0398 39.6806 36.3016 40.2289C35.6085 40.7435 34.8328 41.5193 33.9535 42.3989L33.9534 42.3989L33.8755 42.4768L22.3315 54.0208V57.0114L22.9575 57.6374L35.9968 44.5981C36.9781 43.6169 37.5967 43.0038 38.0901 42.6374C38.3227 42.4647 38.4571 42.4021 38.5206 42.3805L38.5329 42.3765L38.5428 42.3848C38.5938 42.4284 38.6953 42.5365 38.8471 42.7832C39.1691 43.3066 39.5158 44.1056 40.0625 45.3811L45.9626 59.148L45.9973 59.229C46.2301 59.7728 46.4659 60.3235 46.722 60.7396C47.0069 61.2027 47.5003 61.8083 48.3695 61.9757C49.2387 62.1431 49.9217 61.7641 50.3582 61.4399C50.7505 61.1486 51.1739 60.725 51.592 60.3065L51.6544 60.2441L59.2586 52.6399C59.9552 51.9433 60.3733 51.5298 60.7114 51.2718C60.8663 51.1536 60.9563 51.1069 60.9998 51.0887C61.0098 51.0845 61.0168 51.0821 61.021 51.0808L61.0264 51.0793L61.0318 51.0808C61.0359 51.0821 61.0429 51.0845 61.053 51.0887C61.0964 51.1069 61.1865 51.1536 61.3414 51.2718C61.6794 51.5298 62.0975 51.9433 62.7941 52.64L72.4871 62.333C73.0729 62.9187 74.0227 62.9187 74.6085 62.333C74.6326 62.3088 74.6558 62.284 74.678 62.2586V60.286Z"
                                fill="#B3DDFF" />
                                <circle cx="62.1875" cy="34.8125" r="4.5625" fill="#B3DDFF" />
                                <rect x="64.5" y="61.5" width="22" height="22" rx="11" fill="white" stroke="#B3DDFF"
                                stroke-width="3" />
                                <path d="M76 77V72.5L76 68M71 72.5H81" stroke="#B3DDFF" stroke-width="3" stroke-linecap="round"
                                stroke-linejoin="round" />
                            </svg>
                        </label>

                        @endif
                        <input type="file" class="hidden" name="image" id="image" accept="image/png, image/jpeg, image/jpg">
                    </div>
                    {{-- Image 2 --}}
                    <div>
                        @if ($productData['image_2'])
                            <label for="image_2" class="relative">
                                <div class="peer/image">
                                    <img src={{ url(env('BACKEND_URL')) . "/" . $productData['image_2'] }} class="w-[94px] h-[94px] object-cover rounded-md border border-[#9CD3FF] hover:blur-sm cursor-pointer" alt="">
                                </div>
                                <button class="absolute -right-2 -top-2" type="button">
                                    <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="9.5" cy="9" r="8.4" stroke="#FF0000" stroke-width="1.2"/>
                                        <path d="M13.5 5L5.5 13" stroke="#FF0000" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M5.5 5L13.5 13" stroke="#FF0000" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                                <div class="absolute top-0 left-0 items-center justify-center hidden w-full h-full peer-hover/image:flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-[#9CD3FF]" height="60" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg>
                                </div>
                            </label>
                        @else
                            <label for="image_2" class="cursor-pointer">
                                <svg width="97" height="97" viewBox="0 0 97 97" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.8" x="1.5" y="1.5" width="94" height="94" rx="3.5" fill="white" stroke="#9CD3FF"
                                    stroke-width="3" stroke-dasharray="10 10" />
                                    <path
                                    d="M21.125 29.125C21.125 25.3538 21.125 23.4681 22.2966 22.2966C23.4681 21.125 25.3538 21.125 29.125 21.125H67.875C71.6462 21.125 73.5319 21.125 74.7034 22.2966C75.875 23.4681 75.875 25.3538 75.875 29.125V67.875C75.875 71.6462 75.875 73.5319 74.7034 74.7034C73.5319 75.875 71.6462 75.875 67.875 75.875H29.125C25.3538 75.875 23.4681 75.875 22.2966 74.7034C21.125 73.5319 21.125 71.6462 21.125 67.875V29.125Z"
                                    stroke="#B3DDFF" stroke-width="3" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M74.678 60.286C74.6558 60.2606 74.6326 60.2358 74.6085 60.2116L64.9155 50.5186L64.8522 50.4554C64.2402 49.8432 63.679 49.2819 63.1611 48.8868C62.5908 48.4516 61.9004 48.0793 61.0264 48.0793C60.1523 48.0793 59.4619 48.4516 58.8916 48.8868C58.3737 49.2819 57.8126 49.8432 57.2006 50.4553L57.2006 50.4553L57.1373 50.5186L49.5331 58.1228C49.3294 58.3265 49.1609 58.4949 49.0122 58.6382C48.9274 58.4499 48.8335 58.231 48.72 57.9662L42.8199 44.1993L42.7765 44.098C42.2866 42.9548 41.8546 41.9464 41.4022 41.2112C40.9204 40.428 40.2308 39.6436 39.1011 39.426C37.9714 39.2084 37.0398 39.6806 36.3016 40.2289C35.6085 40.7435 34.8328 41.5193 33.9535 42.3989L33.9534 42.3989L33.8755 42.4768L22.3315 54.0208V57.0114L22.9575 57.6374L35.9968 44.5981C36.9781 43.6169 37.5967 43.0038 38.0901 42.6374C38.3227 42.4647 38.4571 42.4021 38.5206 42.3805L38.5329 42.3765L38.5428 42.3848C38.5938 42.4284 38.6953 42.5365 38.8471 42.7832C39.1691 43.3066 39.5158 44.1056 40.0625 45.3811L45.9626 59.148L45.9973 59.229C46.2301 59.7728 46.4659 60.3235 46.722 60.7396C47.0069 61.2027 47.5003 61.8083 48.3695 61.9757C49.2387 62.1431 49.9217 61.7641 50.3582 61.4399C50.7505 61.1486 51.1739 60.725 51.592 60.3065L51.6544 60.2441L59.2586 52.6399C59.9552 51.9433 60.3733 51.5298 60.7114 51.2718C60.8663 51.1536 60.9563 51.1069 60.9998 51.0887C61.0098 51.0845 61.0168 51.0821 61.021 51.0808L61.0264 51.0793L61.0318 51.0808C61.0359 51.0821 61.0429 51.0845 61.053 51.0887C61.0964 51.1069 61.1865 51.1536 61.3414 51.2718C61.6794 51.5298 62.0975 51.9433 62.7941 52.64L72.4871 62.333C73.0729 62.9187 74.0227 62.9187 74.6085 62.333C74.6326 62.3088 74.6558 62.284 74.678 62.2586V60.286Z"
                                    fill="#B3DDFF" />
                                    <circle cx="62.1875" cy="34.8125" r="4.5625" fill="#B3DDFF" />
                                    <rect x="64.5" y="61.5" width="22" height="22" rx="11" fill="white" stroke="#B3DDFF"
                                    stroke-width="3" />
                                    <path d="M76 77V72.5L76 68M71 72.5H81" stroke="#B3DDFF" stroke-width="3" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                </svg>
                            </label>
                        @endif
                        <input type="file" class="hidden" name="image_2" id="image_2" accept="image/png, image/jpeg, image/jpg">
                    </div>
                    {{-- Image 3 --}}
                    <div>
                        @if ($productData['image_3'])
                            <label for="image_3" class="relative">
                                <div class="peer/image">
                                    <img src={{ url(env('BACKEND_URL')) . "/" . $productData['image_3'] }} class="w-[94px] h-[94px] object-cover rounded-md border border-[#9CD3FF] hover:blur-sm cursor-pointer" alt="">
                                </div>
                                <button class="absolute -right-2 -top-2" type="button">
                                    <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="9.5" cy="9" r="8.4" stroke="#FF0000" stroke-width="1.2"/>
                                        <path d="M13.5 5L5.5 13" stroke="#FF0000" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M5.5 5L13.5 13" stroke="#FF0000" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                                <div class="absolute top-0 left-0 items-center justify-center hidden w-full h-full peer-hover/image:flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-[#9CD3FF]" height="60" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg>
                                </div>
                            </label>
                        @else
                            <label for="image_3" class="cursor-pointer">
                                <svg width="97" height="97" viewBox="0 0 97 97" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.8" x="1.5" y="1.5" width="94" height="94" rx="3.5" fill="white" stroke="#9CD3FF"
                                    stroke-width="3" stroke-dasharray="10 10" />
                                    <path
                                    d="M21.125 29.125C21.125 25.3538 21.125 23.4681 22.2966 22.2966C23.4681 21.125 25.3538 21.125 29.125 21.125H67.875C71.6462 21.125 73.5319 21.125 74.7034 22.2966C75.875 23.4681 75.875 25.3538 75.875 29.125V67.875C75.875 71.6462 75.875 73.5319 74.7034 74.7034C73.5319 75.875 71.6462 75.875 67.875 75.875H29.125C25.3538 75.875 23.4681 75.875 22.2966 74.7034C21.125 73.5319 21.125 71.6462 21.125 67.875V29.125Z"
                                    stroke="#B3DDFF" stroke-width="3" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M74.678 60.286C74.6558 60.2606 74.6326 60.2358 74.6085 60.2116L64.9155 50.5186L64.8522 50.4554C64.2402 49.8432 63.679 49.2819 63.1611 48.8868C62.5908 48.4516 61.9004 48.0793 61.0264 48.0793C60.1523 48.0793 59.4619 48.4516 58.8916 48.8868C58.3737 49.2819 57.8126 49.8432 57.2006 50.4553L57.2006 50.4553L57.1373 50.5186L49.5331 58.1228C49.3294 58.3265 49.1609 58.4949 49.0122 58.6382C48.9274 58.4499 48.8335 58.231 48.72 57.9662L42.8199 44.1993L42.7765 44.098C42.2866 42.9548 41.8546 41.9464 41.4022 41.2112C40.9204 40.428 40.2308 39.6436 39.1011 39.426C37.9714 39.2084 37.0398 39.6806 36.3016 40.2289C35.6085 40.7435 34.8328 41.5193 33.9535 42.3989L33.9534 42.3989L33.8755 42.4768L22.3315 54.0208V57.0114L22.9575 57.6374L35.9968 44.5981C36.9781 43.6169 37.5967 43.0038 38.0901 42.6374C38.3227 42.4647 38.4571 42.4021 38.5206 42.3805L38.5329 42.3765L38.5428 42.3848C38.5938 42.4284 38.6953 42.5365 38.8471 42.7832C39.1691 43.3066 39.5158 44.1056 40.0625 45.3811L45.9626 59.148L45.9973 59.229C46.2301 59.7728 46.4659 60.3235 46.722 60.7396C47.0069 61.2027 47.5003 61.8083 48.3695 61.9757C49.2387 62.1431 49.9217 61.7641 50.3582 61.4399C50.7505 61.1486 51.1739 60.725 51.592 60.3065L51.6544 60.2441L59.2586 52.6399C59.9552 51.9433 60.3733 51.5298 60.7114 51.2718C60.8663 51.1536 60.9563 51.1069 60.9998 51.0887C61.0098 51.0845 61.0168 51.0821 61.021 51.0808L61.0264 51.0793L61.0318 51.0808C61.0359 51.0821 61.0429 51.0845 61.053 51.0887C61.0964 51.1069 61.1865 51.1536 61.3414 51.2718C61.6794 51.5298 62.0975 51.9433 62.7941 52.64L72.4871 62.333C73.0729 62.9187 74.0227 62.9187 74.6085 62.333C74.6326 62.3088 74.6558 62.284 74.678 62.2586V60.286Z"
                                    fill="#B3DDFF" />
                                    <circle cx="62.1875" cy="34.8125" r="4.5625" fill="#B3DDFF" />
                                    <rect x="64.5" y="61.5" width="22" height="22" rx="11" fill="white" stroke="#B3DDFF"
                                    stroke-width="3" />
                                    <path d="M76 77V72.5L76 68M71 72.5H81" stroke="#B3DDFF" stroke-width="3" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                </svg>
                            </label>
                        @endif
                        <input type="file" class="hidden" name="image_3" id="image_3" accept="image/png, image/jpeg, image/jpg">
                    </div>
                    {{-- Image 4 --}}
                    <div>
                        @if ($productData['image_4'])
                            <label for="image_4" class="relative">
                                <div class="peer/image">
                                    <img src={{ url(env('BACKEND_URL')) . "/" . $productData['image_4'] }} class="w-[94px] h-[94px] object-cover rounded-md border border-[#9CD3FF] hover:blur-sm cursor-pointer" alt="">
                                </div>
                                <button class="absolute -right-2 -top-2" type="button">
                                    <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="9.5" cy="9" r="8.4" stroke="#FF0000" stroke-width="1.2"/>
                                        <path d="M13.5 5L5.5 13" stroke="#FF0000" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M5.5 5L13.5 13" stroke="#FF0000" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                                <div class="absolute top-0 left-0 items-center justify-center hidden w-full h-full peer-hover/image:flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-[#9CD3FF]" height="60" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg>
                                </div>
                            </label>
                        @else
                            <label for="image_4" class="cursor-pointer">
                                <svg width="97" height="97" viewBox="0 0 97 97" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.8" x="1.5" y="1.5" width="94" height="94" rx="3.5" fill="white" stroke="#9CD3FF"
                                    stroke-width="3" stroke-dasharray="10 10" />
                                    <path
                                    d="M21.125 29.125C21.125 25.3538 21.125 23.4681 22.2966 22.2966C23.4681 21.125 25.3538 21.125 29.125 21.125H67.875C71.6462 21.125 73.5319 21.125 74.7034 22.2966C75.875 23.4681 75.875 25.3538 75.875 29.125V67.875C75.875 71.6462 75.875 73.5319 74.7034 74.7034C73.5319 75.875 71.6462 75.875 67.875 75.875H29.125C25.3538 75.875 23.4681 75.875 22.2966 74.7034C21.125 73.5319 21.125 71.6462 21.125 67.875V29.125Z"
                                    stroke="#B3DDFF" stroke-width="3" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M74.678 60.286C74.6558 60.2606 74.6326 60.2358 74.6085 60.2116L64.9155 50.5186L64.8522 50.4554C64.2402 49.8432 63.679 49.2819 63.1611 48.8868C62.5908 48.4516 61.9004 48.0793 61.0264 48.0793C60.1523 48.0793 59.4619 48.4516 58.8916 48.8868C58.3737 49.2819 57.8126 49.8432 57.2006 50.4553L57.2006 50.4553L57.1373 50.5186L49.5331 58.1228C49.3294 58.3265 49.1609 58.4949 49.0122 58.6382C48.9274 58.4499 48.8335 58.231 48.72 57.9662L42.8199 44.1993L42.7765 44.098C42.2866 42.9548 41.8546 41.9464 41.4022 41.2112C40.9204 40.428 40.2308 39.6436 39.1011 39.426C37.9714 39.2084 37.0398 39.6806 36.3016 40.2289C35.6085 40.7435 34.8328 41.5193 33.9535 42.3989L33.9534 42.3989L33.8755 42.4768L22.3315 54.0208V57.0114L22.9575 57.6374L35.9968 44.5981C36.9781 43.6169 37.5967 43.0038 38.0901 42.6374C38.3227 42.4647 38.4571 42.4021 38.5206 42.3805L38.5329 42.3765L38.5428 42.3848C38.5938 42.4284 38.6953 42.5365 38.8471 42.7832C39.1691 43.3066 39.5158 44.1056 40.0625 45.3811L45.9626 59.148L45.9973 59.229C46.2301 59.7728 46.4659 60.3235 46.722 60.7396C47.0069 61.2027 47.5003 61.8083 48.3695 61.9757C49.2387 62.1431 49.9217 61.7641 50.3582 61.4399C50.7505 61.1486 51.1739 60.725 51.592 60.3065L51.6544 60.2441L59.2586 52.6399C59.9552 51.9433 60.3733 51.5298 60.7114 51.2718C60.8663 51.1536 60.9563 51.1069 60.9998 51.0887C61.0098 51.0845 61.0168 51.0821 61.021 51.0808L61.0264 51.0793L61.0318 51.0808C61.0359 51.0821 61.0429 51.0845 61.053 51.0887C61.0964 51.1069 61.1865 51.1536 61.3414 51.2718C61.6794 51.5298 62.0975 51.9433 62.7941 52.64L72.4871 62.333C73.0729 62.9187 74.0227 62.9187 74.6085 62.333C74.6326 62.3088 74.6558 62.284 74.678 62.2586V60.286Z"
                                    fill="#B3DDFF" />
                                    <circle cx="62.1875" cy="34.8125" r="4.5625" fill="#B3DDFF" />
                                    <rect x="64.5" y="61.5" width="22" height="22" rx="11" fill="white" stroke="#B3DDFF"
                                    stroke-width="3" />
                                    <path d="M76 77V72.5L76 68M71 72.5H81" stroke="#B3DDFF" stroke-width="3" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                </svg>
                            </label>
                        @endif
                        <input type="file" class="hidden" name="image_4" id="image_4" accept="image/png, image/jpeg, image/jpg">
                    </div>
                    {{-- Image 5 --}}
                    <div>
                        @if ($productData['image_5'])
                            <label for="image_5" class="relative">
                                <div class="peer/image">
                                    <img src={{ url(env('BACKEND_URL')) . "/" . $productData['image_5'] }} class="w-[94px] h-[94px] object-cover rounded-md border border-[#9CD3FF] hover:blur-sm cursor-pointer" alt="">
                                </div>
                                <button class="absolute -right-2 -top-2" type="button">
                                    <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="9.5" cy="9" r="8.4" stroke="#FF0000" stroke-width="1.2"/>
                                        <path d="M13.5 5L5.5 13" stroke="#FF0000" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M5.5 5L13.5 13" stroke="#FF0000" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                                <div class="absolute top-0 left-0 items-center justify-center hidden w-full h-full peer-hover/image:flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-[#9CD3FF]" height="60" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg>
                                </div>
                            </label>
                        @else
                            <label for="image_5" class="cursor-pointer">
                                <svg width="97" height="97" viewBox="0 0 97 97" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.8" x="1.5" y="1.5" width="94" height="94" rx="3.5" fill="white" stroke="#9CD3FF"
                                    stroke-width="3" stroke-dasharray="10 10" />
                                    <path
                                    d="M21.125 29.125C21.125 25.3538 21.125 23.4681 22.2966 22.2966C23.4681 21.125 25.3538 21.125 29.125 21.125H67.875C71.6462 21.125 73.5319 21.125 74.7034 22.2966C75.875 23.4681 75.875 25.3538 75.875 29.125V67.875C75.875 71.6462 75.875 73.5319 74.7034 74.7034C73.5319 75.875 71.6462 75.875 67.875 75.875H29.125C25.3538 75.875 23.4681 75.875 22.2966 74.7034C21.125 73.5319 21.125 71.6462 21.125 67.875V29.125Z"
                                    stroke="#B3DDFF" stroke-width="3" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M74.678 60.286C74.6558 60.2606 74.6326 60.2358 74.6085 60.2116L64.9155 50.5186L64.8522 50.4554C64.2402 49.8432 63.679 49.2819 63.1611 48.8868C62.5908 48.4516 61.9004 48.0793 61.0264 48.0793C60.1523 48.0793 59.4619 48.4516 58.8916 48.8868C58.3737 49.2819 57.8126 49.8432 57.2006 50.4553L57.2006 50.4553L57.1373 50.5186L49.5331 58.1228C49.3294 58.3265 49.1609 58.4949 49.0122 58.6382C48.9274 58.4499 48.8335 58.231 48.72 57.9662L42.8199 44.1993L42.7765 44.098C42.2866 42.9548 41.8546 41.9464 41.4022 41.2112C40.9204 40.428 40.2308 39.6436 39.1011 39.426C37.9714 39.2084 37.0398 39.6806 36.3016 40.2289C35.6085 40.7435 34.8328 41.5193 33.9535 42.3989L33.9534 42.3989L33.8755 42.4768L22.3315 54.0208V57.0114L22.9575 57.6374L35.9968 44.5981C36.9781 43.6169 37.5967 43.0038 38.0901 42.6374C38.3227 42.4647 38.4571 42.4021 38.5206 42.3805L38.5329 42.3765L38.5428 42.3848C38.5938 42.4284 38.6953 42.5365 38.8471 42.7832C39.1691 43.3066 39.5158 44.1056 40.0625 45.3811L45.9626 59.148L45.9973 59.229C46.2301 59.7728 46.4659 60.3235 46.722 60.7396C47.0069 61.2027 47.5003 61.8083 48.3695 61.9757C49.2387 62.1431 49.9217 61.7641 50.3582 61.4399C50.7505 61.1486 51.1739 60.725 51.592 60.3065L51.6544 60.2441L59.2586 52.6399C59.9552 51.9433 60.3733 51.5298 60.7114 51.2718C60.8663 51.1536 60.9563 51.1069 60.9998 51.0887C61.0098 51.0845 61.0168 51.0821 61.021 51.0808L61.0264 51.0793L61.0318 51.0808C61.0359 51.0821 61.0429 51.0845 61.053 51.0887C61.0964 51.1069 61.1865 51.1536 61.3414 51.2718C61.6794 51.5298 62.0975 51.9433 62.7941 52.64L72.4871 62.333C73.0729 62.9187 74.0227 62.9187 74.6085 62.333C74.6326 62.3088 74.6558 62.284 74.678 62.2586V60.286Z"
                                    fill="#B3DDFF" />
                                    <circle cx="62.1875" cy="34.8125" r="4.5625" fill="#B3DDFF" />
                                    <rect x="64.5" y="61.5" width="22" height="22" rx="11" fill="white" stroke="#B3DDFF"
                                    stroke-width="3" />
                                    <path d="M76 77V72.5L76 68M71 72.5H81" stroke="#B3DDFF" stroke-width="3" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                </svg>
                            </label>
                        @endif
                        <input type="file" class="hidden" name="image_5" id="image_5" accept="image/png, image/jpeg, image/jpg">
                    </div>

                </div>
            </td>
          </tr>
          <tr>
            <td class="relative w-2/5">
              <h1 class="absolute top-0 ">Deskripsi Produk</h1>
            </td>
            <td class="py-2">
              <textarea type="text" name="description"
                class="w-full h-[200px] border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]"
                placeholder="Deskripsi Produk">{{ $productData['description'] }}</textarea>
                <p class="-mt-1 ml-3 text-sm text-[#00000080]">Tulis deskripsi produkmu min. 250 karakter agar pembeli semakin mudah mengerti.</p>
            </td>
          </tr>
          <tr>
            <td class="w-2/5">Jumlah Stok</td>
            <td class="py-2">
              <input type="number" name="stock"
                class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]"
                placeholder="Jumlah Produk yang tersedia" value="{{ $productData['stock'] }}">
                <p class="mt-1 ml-3 text-sm text-[#00000080]">Contoh : 20</p>
            </td>
          </tr>
          <tr>
            <td class="w-2/5">Varian Produk</td>
            <td class="py-2">
                <div class="relative w-full">
                    <select class="border js-example-basic-multiple" style="width: 100%;" name="varians[]" multiple="multiple">
                        <option value="AL">Alabama</option>
                            ...
                        <option value="WY">Wyoming</option>
                    </select>
                    <div class="absolute right-3 top-3">
                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="1.5" y="1.5" width="22" height="22" rx="11" fill="white" stroke="#9CD3FF" stroke-width="3"/>
                            <path d="M13 17L13 8M8 12.5H18" stroke="#9CD3FF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <p class="text-[12px] mt-1">Contoh : Ukuran XL, warna hijau</p>
                </div>
            </td>
          </tr>
          <tr>
            <td class="w-2/5 ">Ukuran Paket
            </td>
            <td class="py-2">
              <div class="flex justify-between gap-5">
                <div class="flex items-end gap-5">
                  <input type="text" name="kode_pos"
                    class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]"
                    placeholder="Panjang">
                  <h1 class="text-xl">cm</h1>
                </div>
                <div class="flex items-end gap-5">
                  <input type="text" name="kode_pos"
                    class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]"
                    placeholder="Lebar">
                  <h1 class="text-xl">cm</h1>
                </div>
                <div class="flex items-end gap-5">
                  <input type="text" name="kode_pos"
                    class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]"
                    placeholder="Tinggi">
                  <h1 class="text-xl">cm</h1>
                </div>
              </div>
              <p class="mt-2 text-sm">Ukuran paket yang akan dipakai dan dihitung oleh pihak pengiriman</p>
            </td>
          </tr>
          <tr>
            <td class="w-2/5">Berat Produk</td>
            <td class="py-2">
              <div class="flex items-center gap-5 w-[300px]">
                <input type="text" name="kode_pos"
                  class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]"
                  placeholder="Masukan berat produk">
                <h1 class="text-xl">Gram</h1>
              </div>
          </tr>
          <tr>
            <td></td>
            <td class="pt-7">
              <div class="flex justify-end gap-5 ">
                <a href="/produk" class="bg-[#FF0000] text-white py-2 px-8 rounded-lg font-bold float-right">Batal</a>
                <button type="submit"
                  class="bg-[#2D76E5] text-white py-2 px-8 rounded-lg font-bold float-right ">Simpan</button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </form>
</div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                placeholder: 'Tambah Varian',
                tags: true,
                tokenSeparators: [',', ' ']
            });
        });
    </script>
@endpush
