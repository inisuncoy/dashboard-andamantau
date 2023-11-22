@extends('layout.main.index')

@push('scripts')
{{-- Jquery --}}
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

{{-- Select2 --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush

@section('pages')
<style>
    .select2-search__field {
        height: 35px!important;
        padding-top: 10px!important;
        padding-bottom: 30px!important;
        padding-left: 2px!important;
        margin-top: 0px!important;
        margin-bottom: 0px!important;
    }

    .select2-selection{
        border: 2px solid #9CD3FF!important;
        border-radius: 6px!important;
        @error('variants') border-color: #EF4444!important ; @enderror
    }
    .select2-selection--single{
        height: 45px!important;
        padding-top: 8px!important;
        @error('id_category_product') border-color: #EF4444!important ; @enderror
    }

    .select2-search__field{
        padding-top: 10px!important;
        padding-left: 5px!important;
    }
</style>

<div class="flex flex-col gap-y-10">
    <div class="flex justify-between">
        <div class="flex flex-col justify-between">
            <h1 class="text-white text-[30px] font-semibold">Ubah Produk</h1>
            <div class="text-white text-[15px] flex gap-x-2 font-semibold">
                <a href="/produk" class="text-[18px] loadButton">Produk</a>
                >
                <p class="text-[18px]">Ubah Produk</p>
            </div>
        </div>
        <div class="flex items-center">
            <a href="/produk/{{ $productData['id'] }}/delete" class="px-8 py-2 bg-[#FF0000] text-[20px] flex items-center justify-center rounded-lg text-white font-bold" data-confirm-delete="true">Hapus Produk</a>
        </div>
    </div>
    <form method="POST" enctype="multipart/form-data" action="/produk/{{ $productData['id'] }}/edit">
        @csrf
        <div class="p-5 bg-white rounded-xl font-inter">
            <h1 class="text-[24px] font-bold">Informasi Produk</h1>
            <table class="w-full my-5 table-fixed">
                <tbody class="text-[18px]">
                    <tr>
                        <td class="w-2/6">
                            Nama Produk
                            <span data-tooltip-target="nama_produk-tooltip" data-tooltip-style="light" data-tooltip-placement="right" class="after:content-['*'] after:ml-2 after:text-red-500"></span>
                            <div id="nama_produk-tooltip" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
                                Wajib terisi
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </td>
                        <td class="py-2">
                            <input
                                type="text" name="name" value="{{ old('name', $productData['name'])}}"
                                class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px] @error('name') border-red-500 @enderror"
                                placeholder="Contoh: Beras Maknyuss Premium 5kg">
                            <p class="text-[12px] pt-1">Tips: Nama produknya saja</p>
                            @error('name')
                            <p class="mt-2 font-bold text-red-500">{{ $message }}</p>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td class="w-2/6">
                            Kategori
                            <span data-tooltip-target="kategori-tooltip" data-tooltip-style="light" data-tooltip-placement="right" class="after:content-['*'] after:ml-2 after:text-red-500"></span>
                            <div id="kategori-tooltip" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
                                Wajib memilih salah satu
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </td>
                        <td class="py-2">
                            <select class="js-example-basic-single" style="width: 100%;" name="id_category_product">
                                <option value="" selected disabled hidden></option>
                                @foreach ($categories as $category)
                                <option {{ ($category['id'] == old('id_category_product', $productData['id_category_product']) ) ? 'selected' : '' }} value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                @endforeach
                            </select>
                            <p class="text-[12px] pt-1">Tips: Pilih kategori sesuai UMKM mu</p>
                            @error('id_category_product')
                            <p class="mt-2 font-bold text-red-500">{{ $message }}</p>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td class="w-2/6">
                            Status
                            <span data-tooltip-target="status-tooltip" data-tooltip-style="light" data-tooltip-placement="right" class="after:content-['*'] after:ml-2 after:text-red-500"></span>
                            <div id="status-tooltip" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
                                Wajib memilih salah satu
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </td>
                        <td class="py-2">
                            <select name="status" class="w-full rounded-md py-2 px-2 border-2 border-[#9CD3FF] invalid:text-[#00000080]" id="">
                                <option value="1" class="text-black" {{ (old('status', $productData['status']) == "1") ? 'selected' : '' }}>Aktif</option>
                                <option value="0" class="text-black" {{ (old('status', $productData['status']) == "0") ? 'selected' : '' }}>Tidak Aktif</option>
                            </select>
                            @error('status')
                            <p class="mt-2 font-bold text-red-500">{{ $message }}</p>
                            @enderror
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="p-5 mt-5 bg-white rounded-xl font-inter">
            <h1 class="text-[24px] font-bold">Harga Produk</h1>
            <table class="w-full my-5 table-fixed">
                <tbody class="text-[18px]">
                    <td class="w-2/6">
                        Harga Satuan
                        <span data-tooltip-target="harga-tooltip" data-tooltip-style="light" data-tooltip-placement="right" class="after:content-['*'] after:ml-2 after:text-red-500"></span>
                        <div id="harga-tooltip" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
                            Wajib terisi
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </td>
                    <td class="py-2">
                        <div class="flex rounded-md">
                            <div class="bg-[#E4F3FF] py-2 px-3 rounded-l-md border-2 border-r-0 border-[#9CD3FF] @error('price') border-red-500 @enderror">Rp.</div>
                            <input type="text" name="hidden_price" id="price" oninput="validateInput(this)" placeholder="123.456.789" class="w-full border-2 border-l-0 border-[#9CD3FF] rounded-r-md py-2.5 px-2 @error('price') border-red-500 @enderror" value="{{ old('price', $productData['price'])}}">
                            <input type="hidden" id="hidden_price" name="price">
                        </div>
                        <p class="text-[12px] pt-1">Tips: Tuliskan harga jual per produk</p>
                        @error('price')
                        <p class="mt-2 font-bold text-red-500">{{ $message }}</p>
                        @enderror
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
                    <td class="relative w-2/6">
                        <h1 class="absolute w-full top-3">
                            Foto Produk
                            <span data-tooltip-target="foto_produk-tooltip" data-tooltip-style="light" data-tooltip-placement="right" class="after:content-['*'] after:ml-2 after:text-red-500"></span>
                            <div id="foto_produk-tooltip" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
                                Foto Utama Wajib Terisi
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </h1>
                    </td>
                    <td class="py-2">
                        <div class="flex items-end gap-x-4">
                            {{-- Image 1 --}}
                            <div>
                                @if ($productData['image'])
                                <label for="file_input" class="relative">
                                    <div class="peer/image">
                                        <img id="file_image" src={{ url(config('backend.backend_url') . "/" . $productData['image']) }} onerror="this.onerror=null;this.src='/assets/images/default-placeholder.png';" class="w-[94px] h-[94px] object-cover rounded-md border border-[#9CD3FF] @error('file') border-red-500 @enderror hover:blur-[2px] cursor-pointer" alt="">
                                    </div>
                                    <button class="absolute -right-2 -top-2" type="button">
                                        <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="9.5" cy="9" r="8.4" stroke="#FF0000" stroke-width="1.2"/>
                                            <path d="M13.5 5L5.5 13" stroke="#FF0000" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M5.5 5L13.5 13" stroke="#FF0000" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                </label>
                                @else
                                <label for="file_input" class="cursor-pointer">
                                    <img src="" alt="" id="file_image" class="w-[97px] h-[97px] object-cover hidden">
                                    <svg width="97" height="97" id="svg_image" viewBox="0 0 97 97" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.8" x="1.5" y="1.5" width="94" height="94" rx="3.5" fill="white" @error('file') stroke="#EF4444" @enderror stroke="#9CD3FF"
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
                                <input type="file" class="hidden" name="file" id="file_input" accept="image/png, image/jpeg, image/jpg">
                            </div>
                            {{-- Image 2 --}}
                            <div>
                                @if ($productData['image_2'])
                                <label for="file_input2" class="relative">
                                    <div class="peer/image">
                                        <img id="file_image2" src={{ url(config('backend.backend_url') . "/" . $productData['image_2']) }} onerror="this.onerror=null;this.src='/assets/images/default-placeholder.png';" class="w-[94px] h-[94px] object-cover rounded-md border border-[#9CD3FF] @error('file2') border-red-500 @enderror hover:blur-[2px] cursor-pointer" alt="">
                                    </div>
                                    <button class="absolute -right-2 -top-2" type="button">
                                        <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="9.5" cy="9" r="8.4" stroke="#FF0000" stroke-width="1.2"/>
                                            <path d="M13.5 5L5.5 13" stroke="#FF0000" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M5.5 5L13.5 13" stroke="#FF0000" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                </label>
                                @else
                                <label for="file_input2" class="cursor-pointer">
                                    <img src="" alt="" id="file_image2" class="w-[97px] h-[97px] object-cover hidden">
                                    <svg width="97" height="97" id="svg_image2" viewBox="0 0 97 97" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.8" x="1.5" y="1.5" width="94" height="94" rx="3.5" fill="white" @error('file2') stroke="#EF4444" @enderror stroke="#9CD3FF"
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
                                <input type="file" class="hidden" name="file2" id="file_input2" accept="image/png, image/jpeg, image/jpg">
                            </div>
                            {{-- Image 3 --}}
                            <div>
                                @if ($productData['image_3'])
                                <label for="file_input3" class="relative">
                                    <div class="peer/image">
                                        <img id="file_image3" src={{ url(config('backend.backend_url') . "/" . $productData['image_3']) }} onerror="this.onerror=null;this.src='/assets/images/default-placeholder.png';" class="w-[94px] h-[94px] object-cover rounded-md border border-[#9CD3FF] @error('file3') border-red-500 @enderror hover:blur-[2px] cursor-pointer" alt="">
                                    </div>
                                    <button class="absolute -right-2 -top-2" type="button">
                                        <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="9.5" cy="9" r="8.4" stroke="#FF0000" stroke-width="1.2"/>
                                            <path d="M13.5 5L5.5 13" stroke="#FF0000" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M5.5 5L13.5 13" stroke="#FF0000" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                </label>
                                @else
                                <label for="file_input3" class="cursor-pointer">
                                    <img src="" alt="" id="file_image3" class="w-[97px] h-[97px] object-cover hidden">
                                    <svg width="97" height="97" id="svg_image3" viewBox="0 0 97 97" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.8" x="1.5" y="1.5" width="94" height="94" rx="3.5" fill="white" @error('file3') stroke="#EF4444" @enderror stroke="#9CD3FF"
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
                                <input type="file" class="hidden" name="file3" id="file_input3" accept="image/png, image/jpeg, image/jpg">
                            </div>
                            {{-- Image 4 --}}
                            <div>
                                @if ($productData['image_4'])
                                <label for="file_input4" class="relative">
                                    <div class="peer/image">
                                        <img id="file_image4" src={{ url(config('backend.backend_url') . "/" . $productData['image_4']) }} onerror="this.onerror=null;this.src='/assets/images/default-placeholder.png';" class="w-[94px] h-[94px] object-cover rounded-md border border-[#9CD3FF] @error('file4') border-red-500 @enderror hover:blur-[2px] cursor-pointer" alt="">
                                    </div>
                                    <button class="absolute -right-2 -top-2" type="button">
                                        <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="9.5" cy="9" r="8.4" stroke="#FF0000" stroke-width="1.2"/>
                                            <path d="M13.5 5L5.5 13" stroke="#FF0000" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M5.5 5L13.5 13" stroke="#FF0000" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                </label>
                                @else
                                <label for="file_input4" class="cursor-pointer">
                                    <img src="" alt="" id="file_image4" class="w-[97px] h-[97px] object-cover hidden">
                                    <svg width="97" height="97" id="svg_image4" viewBox="0 0 97 97" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.8" x="1.5" y="1.5" width="94" height="94" rx="3.5" fill="white" @error('file4') stroke="#EF4444" @enderror stroke="#9CD3FF"
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
                                <input type="file" class="hidden" name="file4" id="file_input4" accept="image/png, image/jpeg, image/jpg">
                            </div>
                            {{-- Image 5 --}}
                            <div>
                                @if ($productData['image_5'])
                                <label for="file_input5" class="relative">
                                    <div class="peer/image">
                                        <img id="file_image5" src={{ url(config('backend.backend_url') . "/" . $productData['image_5']) }} onerror="this.onerror=null;this.src='/assets/images/default-placeholder.png';" class="w-[94px] h-[94px] object-cover rounded-md border border-[#9CD3FF] @error('file5') border-red-500 @enderror hover:blur-[2px] cursor-pointer" alt="">
                                    </div>
                                    <button class="absolute -right-2 -top-2" type="button">
                                        <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="9.5" cy="9" r="8.4" stroke="#FF0000" stroke-width="1.2"/>
                                            <path d="M13.5 5L5.5 13" stroke="#FF0000" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M5.5 5L13.5 13" stroke="#FF0000" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                </label>
                                @else
                                <label for="file_input5" class="cursor-pointer">
                                    <img src="" alt="" id="file_image5" class="w-[97px] h-[97px] object-cover hidden">
                                    <svg width="97" height="97" id="svg_image5" viewBox="0 0 97 97" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.8" x="1.5" y="1.5" width="94" height="94" rx="3.5" fill="white" @error('file5') stroke="#EF4444" @enderror stroke="#9CD3FF"
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
                                <input type="file" class="hidden" name="file5" id="file_input5" accept="image/png, image/jpeg, image/jpg">
                            </div>
                        </div>
                        <p class="text-[12px] pt-1">Tips: Max ukuran file adalah 10 Mb</p>
                        <div class="mt-2">
                            @error('file')
                            <p class="mt-2 font-bold text-red-500">{{ $message }}</p>
                            @enderror
                            @error('file2')
                            <p class="mt-2 font-bold text-red-500">{{ $message }}</p>
                            @enderror
                            @error('file3')
                            <p class="mt-2 font-bold text-red-500">{{ $message }}</p>
                            @enderror
                            @error('file4')
                            <p class="mt-2 font-bold text-red-500">{{ $message }}</p>
                            @enderror
                            @error('file5')
                            <p class="mt-2 font-bold text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="relative w-2/6">
                        <h1 class="absolute top-3">
                            Deskripsi Produk
                            <span data-tooltip-target="deskripsi-tooltip" data-tooltip-style="light" data-tooltip-placement="right" class="after:content-['*'] after:ml-2 after:text-red-500"></span>
                            <div id="deskripsi-tooltip" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
                                Wajib Terisi
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </h1>
                    </td>
                    <td class="py-2">
                        <textarea name="description" id="descriptionInput" placeholder="Deskripsi Produk" maxlength="2000" class="w-full border-2 border-[#9CD3FF] @error('description') border-red-500 @enderror rounded-md py-2 px-2 h-[150px]">{{ old('description', $productData['description']) }}</textarea>
                        <div class="flex justify-between">
                            <p class="text-[12px] -mt-1">Tulis deskripsi produkmu min. 100 karakter agar pembeli semakin mudah mengerti.</p>
                            <div id="charCount" class="text-[14px] -mt-1">0/2000 huruf</div>
                        </div>
                        @error('description')
                            <p class="mt-2 font-bold text-red-500">{{ $message }}</p>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td class="w-2/6">
                        Jumlah Stok
                        <span data-tooltip-target="stok-tooltip" data-tooltip-style="light" data-tooltip-placement="right" class="after:content-['*'] after:ml-2 after:text-red-500"></span>
                        <div id="stok-tooltip" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
                            Wajib Terisi
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </td>
                    <td class="py-2">
                        <input type="text" name="stock"
                        oninput="validateInput(this)"
                        class="w-full border-2 border-[#9CD3FF] @error('stock') border-red-500 @enderror rounded-md py-2 px-2 placeholder:text-[15px]"
                        placeholder="Jumlah Produk yang tersedia" value="{{ old('stock', $productData['stock'])  }}">
                        <p class="text-[12px] pt-1">Contoh : 20</p>
                        @error('stock')
                        <p class="mt-2 font-bold text-red-500">{{ $message }}</p>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td class="w-2/6">Varian Produk</td>
                    <td class="py-2">
                        <div class="w-full">
                            <select class="js-example-basic-multiple" style="width: 100%;" name="variants[]" multiple="multiple">
                                @foreach ($variants as $variant)
                                    @php
                                        $isSelected = false;
                                    @endphp
                                    @if (old('variants'))
                                    @foreach (old('variants') as $variantProduct)
                                        @if ($variant['name'] == $variantProduct)
                                            @php
                                                $isSelected = true;
                                            @endphp
                                            @break
                                        @endif
                                    @endforeach
                                    @else
                                    @foreach ($productData['variants'] as $variantProduct)
                                        @if ($variant['name'] == $variantProduct['name'])
                                            @php
                                                $isSelected = true;
                                            @endphp
                                            @break
                                        @endif
                                    @endforeach
                                    @endif
                                <option {{ $isSelected ? 'selected' : '' }} value="{{ $variant['name'] }}">{{ $variant['name'] }}</option>
                                @endforeach
                            </select>
                            <p class="text-[12px] mt-1">Contoh : Ukuran XL, warna hijau</p>
                            @error('variants')
                            <p class="mt-2 font-bold text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="w-2/6">Ukuran Paket</td>
                    <td class="py-2">
                        <div class="flex gap-x-5">
                            <div class="flex items-center">
                                <input type="text" name="length" oninput="validateInput(this)" value="{{ old('length', $productData['length']) }}" class="w-full border-2 border-r-0  border-[#9CD3FF] rounded-l-md py-2.5 px-2" placeholder="Panjang">
                                <div class="bg-[#E4F3FF] py-2 px-3 rounded-r-md border-2 border-l-0 border-[#9CD3FF]">cm</div>
                            </div>
                            <div class="flex items-center">
                                <input type="text" name="width" oninput="validateInput(this)" value="{{ old('width',$productData['width']) }}" class="w-full border-2 border-r-0 border-[#9CD3FF] rounded-l-md py-2.5 px-2" placeholder="Lebar">
                                <div class="bg-[#E4F3FF] py-2 px-3 rounded-r-md border-2 border-l-0 border-[#9CD3FF]">cm</div>
                            </div>
                            <div class="flex items-center">
                                <input type="text" name="height" oninput="validateInput(this)" value="{{ old('height', $productData['height']) }}" class="w-full border-2 border-r-0 border-[#9CD3FF] rounded-l-md py-2.5 px-2" placeholder="Tinggi">
                                <div class="bg-[#E4F3FF] py-2 px-3 rounded-r-md border-2 border-l-0 border-[#9CD3FF]">cm</div>
                            </div>
                        </div>
                        <p class="text-[12px] mt-1">Ukuran produk yang akan dipakai dan dihitung oleh pihak pengiriman</p>
                    </td>
                </tr>
                <tr>
                    <td class="w-2/6">Berat Produk</td>
                    <td class="py-2">
                        <div class="flex gap-x-5">
                            <div class="flex items-center">
                                <input type="text" name="weight" oninput="validateInput(this)" value="{{ old('weight', $productData['weight']) }}" class="w-[205px] border-2 border-r-0 border-[#9CD3FF] rounded-l-md py-2.5 px-2" placeholder="Berat">
                                <div class="bg-[#E4F3FF] py-[8.5px] px-3 rounded-r-md border-2 border-l-0 border-[#9CD3FF]">gram</div>
                            </div>
                        </div>
                        <p class="text-[12px] mt-1">Berat produk dalam gram</p>
                    </td>
                </tr>
                <tr>
                    <td class="flex w-2/6"></td>
                    <td class="py-2">
                        <div class="flex float-right gap-x-5">
                            <a href="/produk" class="bg-[#FF0000] loadButton py-3 w-[160px] text-center text-white rounded-lg font-bold">Batal</a>
                            <button type="submit" class="bg-[#2D76E5] loadButton py-3 w-[160px] text-white rounded-lg font-bold">Simpan</button>
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
    const descriptionInput = document.getElementById('descriptionInput');
    const charCount = document.getElementById('charCount');

    const currentText = descriptionInput.value;
    const charCountValue = currentText.length;
    charCount.textContent = `${charCountValue}/2000 huruf`;

    descriptionInput.addEventListener('input', () => {
        const currentText = descriptionInput.value;
        const charCountValue = currentText.length;
        // Update the character count
        charCount.textContent = `${charCountValue}/2000 huruf`;
    });
</script>
<script>

    const fileInput = document.getElementById("file_input");
    const fileInput2 = document.getElementById("file_input2");
    const fileInput3 = document.getElementById("file_input3");
    const fileInput4 = document.getElementById("file_input4");
    const fileInput5 = document.getElementById("file_input5");

    const fileImage = document.getElementById('file_image');
    const fileImage2 = document.getElementById('file_image2');
    const fileImage3 = document.getElementById('file_image3');
    const fileImage4 = document.getElementById('file_image4');
    const fileImage5 = document.getElementById('file_image5');

    const svgImage = document.getElementById('svg_image');
    const svgImage2 = document.getElementById('svg_image2');
    const svgImage3 = document.getElementById('svg_image3');
    const svgImage4 = document.getElementById('svg_image4');
    const svgImage5 = document.getElementById('svg_image5');

    fileInput.addEventListener("change", function () {
        const selectedFile = fileInput.files[0];

        if (selectedFile) {
            const imageURL = URL.createObjectURL(selectedFile);

            fileImage.src = imageURL;
            svgImage.classList.add('hidden');
            fileImage.classList.remove('hidden');
        } else {
            svgImage.classList.remove('hidden');
            fileImage.value = "";
            fileImage.classList.add('hidden');
        }
    });

    fileInput2.addEventListener("change", function () {
        const selectedFile2 = fileInput2.files[0];

        if (selectedFile2) {
            const imageURL2 = URL.createObjectURL(selectedFile2);

            fileImage2.src = imageURL2;
            svgImage2.classList.add('hidden');
            fileImage2.classList.remove('hidden');
        } else {
            svgImage2.classList.remove('hidden');
            fileImage2.value = "";
            fileImage2.classList.add('hidden');
        }
    });

    fileInput3.addEventListener("change", function () {
        const selectedFile3 = fileInput3.files[0];

        if (selectedFile3) {
            const imageURL3 = URL.createObjectURL(selectedFile3);

            fileImage3.src = imageURL3;
            svgImage3.classList.add('hidden');
            fileImage3.classList.remove('hidden');
        } else {
            svgImage3.classList.remove('hidden');
            fileImage3.value = "";
            fileImage3.classList.add('hidden');
        }
    });

    fileInput4.addEventListener("change", function () {
        const selectedFile4 = fileInput4.files[0];

        if (selectedFile4) {
            const imageURL4 = URL.createObjectURL(selectedFile4);

            fileImage4.src = imageURL4;
            svgImage4.classList.add('hidden');
            fileImage4.classList.remove('hidden');
        } else {
            svgImage4.classList.remove('hidden');
            fileImage4.value = "";
            fileImage4.classList.add('hidden');
        }
    });

    fileInput5.addEventListener("change", function () {
        const selectedFile5 = fileInput5.files[0];

        if (selectedFile5) {
            const imageURL5 = URL.createObjectURL(selectedFile5);

            fileImage5.src = imageURL5;
            svgImage5.classList.add('hidden');
            fileImage5.classList.remove('hidden');
        } else {
            svgImage5.classList.remove('hidden');
            fileImage5.value = "";
            fileImage5.classList.add('hidden');
        }
    });
</script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2({
            placeholder: 'Pilih Variants',
            tags: true,
        });
    });
    $(document).ready(function() {
        $('.js-example-basic-single').select2({
            placeholder: 'Pilih Kategori',
        });
    });
</script>
<script>
    function formatRupiah(angka, prefix) {
      var number_string = angka.replace(/[^,\d]/g, '').toString(),
          split = number_string.split(','),
          sisa = split[0].length % 3,
          rupiah = split[0].substr(0, sisa),
          ribuan = split[0].substr(sisa).match(/\d{3}/gi);

      if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }
      return rupiah ? rupiah : '';
    }

    function setupRupiahFormatting(inputId, hiddenInputId) {
        var input = document.getElementById(inputId);
        var hiddenInput = document.getElementById(hiddenInputId);

        function updateValue() {
            var formattedValue = formatRupiah(input.value);
            input.value = formattedValue;
            hiddenInput.value = input.value.replace(/[^\d]/g, '');
        }

        // Panggil fungsi updateValue saat halaman dimuat
        updateValue();

        input.addEventListener('input', updateValue);
    }


    setupRupiahFormatting('price', 'hidden_price');
</script>

<script>
    function validateInput(input) {
        input.value = input.value.replace(/[^0-9]/g, '');
        if(input.value <= 0){
            input.value = "";
        }else if(input.value > 999999999){
            input.value = 999999999;
        }
    }
</script>
@endpush
