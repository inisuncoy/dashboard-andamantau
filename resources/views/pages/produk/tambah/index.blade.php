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

    .select2-selection--single{
        height: 45px!important;
        padding-top: 8px!important;
    }

    .select2-search__field{
        padding-top: 10px!important;
        padding-left: 10px!important;
    }
</style>
<form method="POST" enctype="multipart/form-data" action="/produk/tambah" class="flex flex-col gap-y-10">
    @csrf
    <div>
        <h1 class="text-white text-[30px] font-semibold">Produk</h1>
        <div class="text-white text-[18px] flex gap-x-2 font-semibold">
            <a href="/produk">Produk</a>
            >
            <p>Tambah Produk</p>
        </div>
    </div>

    <div class="p-5 bg-white rounded-xl font-inter">
        <h1 class="text-[24px] font-bold">Informasi Produk</h1>
        <table class="w-full my-5 table-fixed">
            <tbody class="text-[18px]">
                <tr>
                    <td class="w-2/6">Nama Produk</td>
                    <td class="py-2">
                        <input type="text" name="name" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2" placeholder="Contoh: Beras Maknyuss Premium 5kg">
                        <p class="text-[12px] pt-1">Tips: Nama produknya saja</p>
                    </td>
                </tr>
                <tr>
                    <td class="w-2/6">Kategori</td>
                    <td class="py-2">
                        <select class="js-example-basic-single" style="width: 100%;" name="id_category_product">
                            <option value="" selected disabled hidden></option>
                            {{-- @foreach ($categories as $category)
                            <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                            @endforeach --}}
                          </select>
                        <p class="text-[12px] pt-1">Tips: Pilih kategori sesuai UMKM mu</p>
                    </td>
                </tr>
                <tr>
                    <td class="w-2/6">Status</td>
                    <td class="py-2">
                        <select type="text" name="status" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2">
                            <option value="0" selected>Tidak Aktif</option>
                            <option value="1">Aktif</option>
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="p-5 bg-white rounded-xl font-inter">
        <h1 class="text-[24px] font-bold">Harga Produk</h1>
        <table class="w-full my-5 table-fixed">
            <tbody class="text-[18px]">
                <tr>
                    <td class="w-2/6 pb-5">Harga Satuan</td>
                    <td class="py-2">
                        <div class="flex items-center" dir="ltr">
                            <div class="bg-[#E4F3FF] py-2 px-3 rounded-l-md border-2 border-r-0 border-[#9CD3FF]">Rp.</div>
                            <input type="number" name="price" min="1000" placeholder="0" class="w-full border-2 border-l-0 border-[#9CD3FF] rounded-r-md py-2 px-2">
                        </div>
                        <p class="text-[12px] pt-1">Tips: Tuliskan harga jual per produk</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="p-5 bg-white rounded-xl font-inter">
        <h1 class="text-[24px] font-bold">Informasi Produk</h1>
        <table class="w-full my-5 table-fixed">
            <tbody class="text-[18px]">
                <tr>
                    <td class="w-2/6">Foto Produk</td>
                    <td class="py-2">
                        <div class="flex gap-x-4">
                            <label for="file_input" class="cursor-pointer">
                                <img src="" alt="" id="file_image" class="w-[97px] h-[97px] object-cover hidden">
                                <svg width="97" height="97" viewBox="0 0 97 97" id="svg_image" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.8" x="1.5" y="1.5" width="94" height="94" rx="3.5" fill="white" stroke="#9CD3FF" stroke-width="3" stroke-dasharray="10 10"/>
                                    <path d="M21.125 29.125C21.125 25.3538 21.125 23.4681 22.2966 22.2966C23.4681 21.125 25.3538 21.125 29.125 21.125H67.875C71.6462 21.125 73.5319 21.125 74.7034 22.2966C75.875 23.4681 75.875 25.3538 75.875 29.125V67.875C75.875 71.6462 75.875 73.5319 74.7034 74.7034C73.5319 75.875 71.6462 75.875 67.875 75.875H29.125C25.3538 75.875 23.4681 75.875 22.2966 74.7034C21.125 73.5319 21.125 71.6462 21.125 67.875V29.125Z" stroke="#B3DDFF" stroke-width="3"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M74.678 60.2862C74.6558 60.2608 74.6326 60.2361 74.6085 60.2119L64.9155 50.5189L64.8522 50.4557C64.2402 49.8435 63.679 49.2822 63.1611 48.887C62.5908 48.4519 61.9004 48.0795 61.0264 48.0795C60.1523 48.0795 59.4619 48.4519 58.8916 48.887C58.3737 49.2821 57.8126 49.8434 57.2006 50.4556L57.2006 50.4556L57.1373 50.5189L49.5331 58.123C49.3294 58.3268 49.1609 58.4951 49.0122 58.6385C48.9274 58.4501 48.8335 58.2313 48.72 57.9664L42.8199 44.1996L42.7765 44.0982C42.2866 42.955 41.8546 41.9467 41.4022 41.2114C40.9204 40.4282 40.2308 39.6438 39.1011 39.4262C37.9714 39.2087 37.0398 39.6809 36.3016 40.2291C35.6085 40.7438 34.8328 41.5196 33.9535 42.3991L33.9534 42.3991L33.8755 42.4771L22.3315 54.021V57.0117L22.9575 57.6377L35.9968 44.5984C36.9781 43.6171 37.5967 43.0041 38.0901 42.6377C38.3227 42.465 38.4571 42.4023 38.5206 42.3807L38.5329 42.3768L38.5428 42.385C38.5938 42.4286 38.6953 42.5367 38.8471 42.7834C39.1691 43.3069 39.5158 44.1058 40.0625 45.3813L45.9626 59.1482L45.9973 59.2293C46.2301 59.7731 46.4659 60.3237 46.722 60.7399C47.0069 61.203 47.5003 61.8085 48.3695 61.9759C49.2387 62.1433 49.9217 61.7643 50.3582 61.4401C50.7505 61.1489 51.1739 60.7252 51.592 60.3068L51.6544 60.2444L59.2586 52.6402C59.9552 51.9435 60.3733 51.53 60.7114 51.2721C60.8663 51.1539 60.9563 51.1071 60.9998 51.089C61.0098 51.0848 61.0168 51.0824 61.021 51.0811L61.0264 51.0795L61.0318 51.0811C61.0359 51.0824 61.0429 51.0848 61.053 51.089C61.0964 51.1071 61.1865 51.1539 61.3414 51.2721C61.6794 51.53 62.0975 51.9435 62.7941 52.6402L72.4871 62.3332C73.0729 62.919 74.0227 62.919 74.6085 62.3332C74.6326 62.309 74.6558 62.2842 74.678 62.2589V60.2862Z" fill="#B3DDFF"/>
                                    <circle cx="62.1875" cy="34.8125" r="4.5625" fill="#B3DDFF"/>
                                    <rect x="64.5" y="61.5" width="22" height="22" rx="11" fill="white" stroke="#B3DDFF" stroke-width="3"/>
                                    <path d="M76 77V72.5L76 68M71 72.5H81" stroke="#B3DDFF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <input required type="file" name="file" id="file_input" class="hidden" accept="image/png, image/jpeg, image/jpg">
                            </label>
                            <label for="file_input2" class="cursor-pointer">
                                <img src="" alt="" id="file_image2" class="w-[97px] h-[97px] object-cover hidden">
                                <svg width="97" height="97" viewBox="0 0 97 97" id="svg_image2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.8" x="1.5" y="1.5" width="94" height="94" rx="3.5" fill="white" stroke="#9CD3FF" stroke-width="3" stroke-dasharray="10 10"/>
                                    <path d="M21.125 29.125C21.125 25.3538 21.125 23.4681 22.2966 22.2966C23.4681 21.125 25.3538 21.125 29.125 21.125H67.875C71.6462 21.125 73.5319 21.125 74.7034 22.2966C75.875 23.4681 75.875 25.3538 75.875 29.125V67.875C75.875 71.6462 75.875 73.5319 74.7034 74.7034C73.5319 75.875 71.6462 75.875 67.875 75.875H29.125C25.3538 75.875 23.4681 75.875 22.2966 74.7034C21.125 73.5319 21.125 71.6462 21.125 67.875V29.125Z" stroke="#B3DDFF" stroke-width="3"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M74.678 60.2862C74.6558 60.2608 74.6326 60.2361 74.6085 60.2119L64.9155 50.5189L64.8522 50.4557C64.2402 49.8435 63.679 49.2822 63.1611 48.887C62.5908 48.4519 61.9004 48.0795 61.0264 48.0795C60.1523 48.0795 59.4619 48.4519 58.8916 48.887C58.3737 49.2821 57.8126 49.8434 57.2006 50.4556L57.2006 50.4556L57.1373 50.5189L49.5331 58.123C49.3294 58.3268 49.1609 58.4951 49.0122 58.6385C48.9274 58.4501 48.8335 58.2313 48.72 57.9664L42.8199 44.1996L42.7765 44.0982C42.2866 42.955 41.8546 41.9467 41.4022 41.2114C40.9204 40.4282 40.2308 39.6438 39.1011 39.4262C37.9714 39.2087 37.0398 39.6809 36.3016 40.2291C35.6085 40.7438 34.8328 41.5196 33.9535 42.3991L33.9534 42.3991L33.8755 42.4771L22.3315 54.021V57.0117L22.9575 57.6377L35.9968 44.5984C36.9781 43.6171 37.5967 43.0041 38.0901 42.6377C38.3227 42.465 38.4571 42.4023 38.5206 42.3807L38.5329 42.3768L38.5428 42.385C38.5938 42.4286 38.6953 42.5367 38.8471 42.7834C39.1691 43.3069 39.5158 44.1058 40.0625 45.3813L45.9626 59.1482L45.9973 59.2293C46.2301 59.7731 46.4659 60.3237 46.722 60.7399C47.0069 61.203 47.5003 61.8085 48.3695 61.9759C49.2387 62.1433 49.9217 61.7643 50.3582 61.4401C50.7505 61.1489 51.1739 60.7252 51.592 60.3068L51.6544 60.2444L59.2586 52.6402C59.9552 51.9435 60.3733 51.53 60.7114 51.2721C60.8663 51.1539 60.9563 51.1071 60.9998 51.089C61.0098 51.0848 61.0168 51.0824 61.021 51.0811L61.0264 51.0795L61.0318 51.0811C61.0359 51.0824 61.0429 51.0848 61.053 51.089C61.0964 51.1071 61.1865 51.1539 61.3414 51.2721C61.6794 51.53 62.0975 51.9435 62.7941 52.6402L72.4871 62.3332C73.0729 62.919 74.0227 62.919 74.6085 62.3332C74.6326 62.309 74.6558 62.2842 74.678 62.2589V60.2862Z" fill="#B3DDFF"/>
                                    <circle cx="62.1875" cy="34.8125" r="4.5625" fill="#B3DDFF"/>
                                    <rect x="64.5" y="61.5" width="22" height="22" rx="11" fill="white" stroke="#B3DDFF" stroke-width="3"/>
                                    <path d="M76 77V72.5L76 68M71 72.5H81" stroke="#B3DDFF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <input type="file" name="file2" id="file_input2" class="hidden" class="hidden" accept="image/png, image/jpeg, image/jpg">
                            </label>
                            <label for="file_input3" class="cursor-pointer">
                                <img src="" alt="" id="file_image3" class="w-[97px] h-[97px] object-cover hidden">
                                <svg width="97" height="97" viewBox="0 0 97 97" id="svg_image3" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.8" x="1.5" y="1.5" width="94" height="94" rx="3.5" fill="white" stroke="#9CD3FF" stroke-width="3" stroke-dasharray="10 10"/>
                                    <path d="M21.125 29.125C21.125 25.3538 21.125 23.4681 22.2966 22.2966C23.4681 21.125 25.3538 21.125 29.125 21.125H67.875C71.6462 21.125 73.5319 21.125 74.7034 22.2966C75.875 23.4681 75.875 25.3538 75.875 29.125V67.875C75.875 71.6462 75.875 73.5319 74.7034 74.7034C73.5319 75.875 71.6462 75.875 67.875 75.875H29.125C25.3538 75.875 23.4681 75.875 22.2966 74.7034C21.125 73.5319 21.125 71.6462 21.125 67.875V29.125Z" stroke="#B3DDFF" stroke-width="3"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M74.678 60.2862C74.6558 60.2608 74.6326 60.2361 74.6085 60.2119L64.9155 50.5189L64.8522 50.4557C64.2402 49.8435 63.679 49.2822 63.1611 48.887C62.5908 48.4519 61.9004 48.0795 61.0264 48.0795C60.1523 48.0795 59.4619 48.4519 58.8916 48.887C58.3737 49.2821 57.8126 49.8434 57.2006 50.4556L57.2006 50.4556L57.1373 50.5189L49.5331 58.123C49.3294 58.3268 49.1609 58.4951 49.0122 58.6385C48.9274 58.4501 48.8335 58.2313 48.72 57.9664L42.8199 44.1996L42.7765 44.0982C42.2866 42.955 41.8546 41.9467 41.4022 41.2114C40.9204 40.4282 40.2308 39.6438 39.1011 39.4262C37.9714 39.2087 37.0398 39.6809 36.3016 40.2291C35.6085 40.7438 34.8328 41.5196 33.9535 42.3991L33.9534 42.3991L33.8755 42.4771L22.3315 54.021V57.0117L22.9575 57.6377L35.9968 44.5984C36.9781 43.6171 37.5967 43.0041 38.0901 42.6377C38.3227 42.465 38.4571 42.4023 38.5206 42.3807L38.5329 42.3768L38.5428 42.385C38.5938 42.4286 38.6953 42.5367 38.8471 42.7834C39.1691 43.3069 39.5158 44.1058 40.0625 45.3813L45.9626 59.1482L45.9973 59.2293C46.2301 59.7731 46.4659 60.3237 46.722 60.7399C47.0069 61.203 47.5003 61.8085 48.3695 61.9759C49.2387 62.1433 49.9217 61.7643 50.3582 61.4401C50.7505 61.1489 51.1739 60.7252 51.592 60.3068L51.6544 60.2444L59.2586 52.6402C59.9552 51.9435 60.3733 51.53 60.7114 51.2721C60.8663 51.1539 60.9563 51.1071 60.9998 51.089C61.0098 51.0848 61.0168 51.0824 61.021 51.0811L61.0264 51.0795L61.0318 51.0811C61.0359 51.0824 61.0429 51.0848 61.053 51.089C61.0964 51.1071 61.1865 51.1539 61.3414 51.2721C61.6794 51.53 62.0975 51.9435 62.7941 52.6402L72.4871 62.3332C73.0729 62.919 74.0227 62.919 74.6085 62.3332C74.6326 62.309 74.6558 62.2842 74.678 62.2589V60.2862Z" fill="#B3DDFF"/>
                                    <circle cx="62.1875" cy="34.8125" r="4.5625" fill="#B3DDFF"/>
                                    <rect x="64.5" y="61.5" width="22" height="22" rx="11" fill="white" stroke="#B3DDFF" stroke-width="3"/>
                                    <path d="M76 77V72.5L76 68M71 72.5H81" stroke="#B3DDFF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <input type="file" name="file3" id="file_input3" class="hidden" class="hidden" accept="image/png, image/jpeg, image/jpg">
                            </label>
                            <label for="file_input4" class="cursor-pointer">
                                <img src="" alt="" id="file_image4" class="w-[97px] h-[97px] object-cover hidden">
                                <svg width="97" height="97" viewBox="0 0 97 97" id="svg_image4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.8" x="1.5" y="1.5" width="94" height="94" rx="3.5" fill="white" stroke="#9CD3FF" stroke-width="3" stroke-dasharray="10 10"/>
                                    <path d="M21.125 29.125C21.125 25.3538 21.125 23.4681 22.2966 22.2966C23.4681 21.125 25.3538 21.125 29.125 21.125H67.875C71.6462 21.125 73.5319 21.125 74.7034 22.2966C75.875 23.4681 75.875 25.3538 75.875 29.125V67.875C75.875 71.6462 75.875 73.5319 74.7034 74.7034C73.5319 75.875 71.6462 75.875 67.875 75.875H29.125C25.3538 75.875 23.4681 75.875 22.2966 74.7034C21.125 73.5319 21.125 71.6462 21.125 67.875V29.125Z" stroke="#B3DDFF" stroke-width="3"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M74.678 60.2862C74.6558 60.2608 74.6326 60.2361 74.6085 60.2119L64.9155 50.5189L64.8522 50.4557C64.2402 49.8435 63.679 49.2822 63.1611 48.887C62.5908 48.4519 61.9004 48.0795 61.0264 48.0795C60.1523 48.0795 59.4619 48.4519 58.8916 48.887C58.3737 49.2821 57.8126 49.8434 57.2006 50.4556L57.2006 50.4556L57.1373 50.5189L49.5331 58.123C49.3294 58.3268 49.1609 58.4951 49.0122 58.6385C48.9274 58.4501 48.8335 58.2313 48.72 57.9664L42.8199 44.1996L42.7765 44.0982C42.2866 42.955 41.8546 41.9467 41.4022 41.2114C40.9204 40.4282 40.2308 39.6438 39.1011 39.4262C37.9714 39.2087 37.0398 39.6809 36.3016 40.2291C35.6085 40.7438 34.8328 41.5196 33.9535 42.3991L33.9534 42.3991L33.8755 42.4771L22.3315 54.021V57.0117L22.9575 57.6377L35.9968 44.5984C36.9781 43.6171 37.5967 43.0041 38.0901 42.6377C38.3227 42.465 38.4571 42.4023 38.5206 42.3807L38.5329 42.3768L38.5428 42.385C38.5938 42.4286 38.6953 42.5367 38.8471 42.7834C39.1691 43.3069 39.5158 44.1058 40.0625 45.3813L45.9626 59.1482L45.9973 59.2293C46.2301 59.7731 46.4659 60.3237 46.722 60.7399C47.0069 61.203 47.5003 61.8085 48.3695 61.9759C49.2387 62.1433 49.9217 61.7643 50.3582 61.4401C50.7505 61.1489 51.1739 60.7252 51.592 60.3068L51.6544 60.2444L59.2586 52.6402C59.9552 51.9435 60.3733 51.53 60.7114 51.2721C60.8663 51.1539 60.9563 51.1071 60.9998 51.089C61.0098 51.0848 61.0168 51.0824 61.021 51.0811L61.0264 51.0795L61.0318 51.0811C61.0359 51.0824 61.0429 51.0848 61.053 51.089C61.0964 51.1071 61.1865 51.1539 61.3414 51.2721C61.6794 51.53 62.0975 51.9435 62.7941 52.6402L72.4871 62.3332C73.0729 62.919 74.0227 62.919 74.6085 62.3332C74.6326 62.309 74.6558 62.2842 74.678 62.2589V60.2862Z" fill="#B3DDFF"/>
                                    <circle cx="62.1875" cy="34.8125" r="4.5625" fill="#B3DDFF"/>
                                    <rect x="64.5" y="61.5" width="22" height="22" rx="11" fill="white" stroke="#B3DDFF" stroke-width="3"/>
                                    <path d="M76 77V72.5L76 68M71 72.5H81" stroke="#B3DDFF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <input type="file" name="file4" id="file_input4" class="hidden" class="hidden" accept="image/png, image/jpeg, image/jpg">
                            </label>
                            <label for="file_input5" class="cursor-pointer">
                                <img src="" alt="" id="file_image5" class="w-[97px] h-[97px] object-cover hidden">
                                <svg width="97" height="97" viewBox="0 0 97 97" id="svg_image5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.8" x="1.5" y="1.5" width="94" height="94" rx="3.5" fill="white" stroke="#9CD3FF" stroke-width="3" stroke-dasharray="10 10"/>
                                    <path d="M21.125 29.125C21.125 25.3538 21.125 23.4681 22.2966 22.2966C23.4681 21.125 25.3538 21.125 29.125 21.125H67.875C71.6462 21.125 73.5319 21.125 74.7034 22.2966C75.875 23.4681 75.875 25.3538 75.875 29.125V67.875C75.875 71.6462 75.875 73.5319 74.7034 74.7034C73.5319 75.875 71.6462 75.875 67.875 75.875H29.125C25.3538 75.875 23.4681 75.875 22.2966 74.7034C21.125 73.5319 21.125 71.6462 21.125 67.875V29.125Z" stroke="#B3DDFF" stroke-width="3"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M74.678 60.2862C74.6558 60.2608 74.6326 60.2361 74.6085 60.2119L64.9155 50.5189L64.8522 50.4557C64.2402 49.8435 63.679 49.2822 63.1611 48.887C62.5908 48.4519 61.9004 48.0795 61.0264 48.0795C60.1523 48.0795 59.4619 48.4519 58.8916 48.887C58.3737 49.2821 57.8126 49.8434 57.2006 50.4556L57.2006 50.4556L57.1373 50.5189L49.5331 58.123C49.3294 58.3268 49.1609 58.4951 49.0122 58.6385C48.9274 58.4501 48.8335 58.2313 48.72 57.9664L42.8199 44.1996L42.7765 44.0982C42.2866 42.955 41.8546 41.9467 41.4022 41.2114C40.9204 40.4282 40.2308 39.6438 39.1011 39.4262C37.9714 39.2087 37.0398 39.6809 36.3016 40.2291C35.6085 40.7438 34.8328 41.5196 33.9535 42.3991L33.9534 42.3991L33.8755 42.4771L22.3315 54.021V57.0117L22.9575 57.6377L35.9968 44.5984C36.9781 43.6171 37.5967 43.0041 38.0901 42.6377C38.3227 42.465 38.4571 42.4023 38.5206 42.3807L38.5329 42.3768L38.5428 42.385C38.5938 42.4286 38.6953 42.5367 38.8471 42.7834C39.1691 43.3069 39.5158 44.1058 40.0625 45.3813L45.9626 59.1482L45.9973 59.2293C46.2301 59.7731 46.4659 60.3237 46.722 60.7399C47.0069 61.203 47.5003 61.8085 48.3695 61.9759C49.2387 62.1433 49.9217 61.7643 50.3582 61.4401C50.7505 61.1489 51.1739 60.7252 51.592 60.3068L51.6544 60.2444L59.2586 52.6402C59.9552 51.9435 60.3733 51.53 60.7114 51.2721C60.8663 51.1539 60.9563 51.1071 60.9998 51.089C61.0098 51.0848 61.0168 51.0824 61.021 51.0811L61.0264 51.0795L61.0318 51.0811C61.0359 51.0824 61.0429 51.0848 61.053 51.089C61.0964 51.1071 61.1865 51.1539 61.3414 51.2721C61.6794 51.53 62.0975 51.9435 62.7941 52.6402L72.4871 62.3332C73.0729 62.919 74.0227 62.919 74.6085 62.3332C74.6326 62.309 74.6558 62.2842 74.678 62.2589V60.2862Z" fill="#B3DDFF"/>
                                    <circle cx="62.1875" cy="34.8125" r="4.5625" fill="#B3DDFF"/>
                                    <rect x="64.5" y="61.5" width="22" height="22" rx="11" fill="white" stroke="#B3DDFF" stroke-width="3"/>
                                    <path d="M76 77V72.5L76 68M71 72.5H81" stroke="#B3DDFF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <input type="file" name="file5" id="file_input5" class="hidden" class="hidden" accept="image/png, image/jpeg, image/jpg">
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="flex">Deskripsi Produk</td>
                    <td class="py-2">
                        <textarea name="description" id="descriptionInput" placeholder="Deskripsi Produk" maxlength="2000" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 h-[150px]"></textarea>
                        <div class="flex justify-between">
                            <p class="text-[12px] -mt-1">Tulis deskripsi produkmu min. 250 karakter agar pembeli semakin mudah mengerti.</p>
                            <div id="charCount" class="text-[14px] -mt-1">0/2000 kata</div>
                        </div>

                    </td>
                </tr>
                <tr>
                    <td class="w-2/6">Jumlah Stok</td>
                    <td class="py-2">
                        <input type="number" name="stock" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2" placeholder="Jumlah Produk yang tersedia">
                        <p class="text-[12px] mt-1">Contoh : 20</p>
                    </td>
                </tr>
                <tr>
                    <td class="w-2/6">Varian Produk</td>
                    <td class="py-2">
                        {{-- <input type="text" name="variant" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2" placeholder="Tambah Varian"> --}}
                        <select class="js-example-basic-multiple" style="width: 100%;" name="variants[]" multiple="multiple">
                            <option value="AL">Alabama</option>
                            <option value="WY">Wyoming</option>
                          </select>
                        <p class="text-[12px] mt-1">Contoh : Ukuran XL, Hijau</p>
                    </td>
                </tr>
                <tr>
                    <td class="w-2/6">Ukuran Paket</td>
                    <td class="py-2">
                        <div class="flex gap-x-5">
                            <div class="flex items-center gap-x-2">
                                <input type="number" name="length" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2" placeholder="Panjang">
                                <p class="font-[500] text-[20px]">
                                    cm
                                </p>
                            </div>
                            <div class="flex items-center gap-x-2">
                                <input type="number" name="width" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2" placeholder="Lebar">
                                <p class="font-[500] text-[20px]">
                                    cm
                                </p>
                            </div>
                            <div class="flex items-center gap-x-2">
                                <input type="number" name="height" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2" placeholder="Tinggi">
                                <p class="font-[500] text-[20px]">
                                    cm
                                </p>
                            </div>
                        </div>
                        <p class="text-[12px] mt-1">Ukuran produk yang akan dipakai dan dihitung oleh pihak pengiriman</p>
                    </td>
                </tr>
                <tr>
                    <td class="w-2/6">Berat Produk</td>
                    <td class="py-2">
                        <div class="flex gap-x-5">
                            <div class="flex items-center gap-x-2">
                                <input type="number" name="weight" class="w-[205px] border-2 border-[#9CD3FF] rounded-md py-2 px-2" placeholder="Berat">
                                <p class="font-[500] text-[20px]">
                                    Gram
                                </p>
                            </div>
                        </div>
                        <p class="text-[12px] mt-1">Berat produk dalam gram</p>
                    </td>
                </tr>
                <tr>
                    <td class="flex w-2/5"></td>
                    <td class="py-2">
                        <div class="flex float-right gap-x-5">
                            <a href="/produk" class="bg-[#FF0000] py-3 w-[160px] text-center text-white rounded-lg font-bold">Batal</a>
                            <button type="submit" class="bg-[#2D76E5] py-3 w-[160px] text-white rounded-lg font-bold">Simpan</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</form>
@endsection


@push('js')
    <script>
        const descriptionInput = document.getElementById('descriptionInput');
        const charCount = document.getElementById('charCount');

        descriptionInput.addEventListener('input', () => {
            const currentText = descriptionInput.value;
            const charCountValue = currentText.length;

            // Update the character count
            charCount.textContent = `${charCountValue}/2000 kata`;
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
            $('.js-example-basic-single').select2({
                placeholder: 'Pilih Kategori',
                tags: true,
            });
        });
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                placeholder: 'Pilih Variants',
                tags: true,
            });
        });
    </script>
@endpush
