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
                        <input type="text" name="nama_produk" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2" placeholder="Contoh: Beras Maknyuss Premium 5kg">
                        <p class="text-[12px] pt-1">Tips: Nama produknya saja</p>
                    </td>
                </tr>
                <tr>
                    <td class="w-2/6">Kategori</td>
                    <td class="py-2">
                        <select type="text" name="kategori" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2">
                            <option value="" disabled hidden selected>Pilih Kategori</option>
                            <option value="">Hewan</option>
                            <option value="">Barang</option>
                        </select>
                        <p class="text-[12px] pt-1">Tips: Pilih kategori sesuai UMKM mu</p>
                    </td>
                </tr>
                <tr>
                    <td class="w-2/6">Status</td>
                    <td class="py-2">
                        <select type="text" name="kategori" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2">
                            <option value="aktif">Aktif</option>
                            <option value="tidak_aktif">Tidak Aktif</option>
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
                            <input type="text" name="nama_produk" class="w-full border-2 border-l-0 border-[#9CD3FF] rounded-r-md py-2 px-2">

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
                            <label for="image-1" class="cursor-pointer">
                                <svg width="97" height="97" viewBox="0 0 97 97" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.8" x="1.5" y="1.5" width="94" height="94" rx="3.5" fill="white" stroke="#9CD3FF" stroke-width="3" stroke-dasharray="10 10"/>
                                    <path d="M21.125 29.125C21.125 25.3538 21.125 23.4681 22.2966 22.2966C23.4681 21.125 25.3538 21.125 29.125 21.125H67.875C71.6462 21.125 73.5319 21.125 74.7034 22.2966C75.875 23.4681 75.875 25.3538 75.875 29.125V67.875C75.875 71.6462 75.875 73.5319 74.7034 74.7034C73.5319 75.875 71.6462 75.875 67.875 75.875H29.125C25.3538 75.875 23.4681 75.875 22.2966 74.7034C21.125 73.5319 21.125 71.6462 21.125 67.875V29.125Z" stroke="#B3DDFF" stroke-width="3"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M74.678 60.2862C74.6558 60.2608 74.6326 60.2361 74.6085 60.2119L64.9155 50.5189L64.8522 50.4557C64.2402 49.8435 63.679 49.2822 63.1611 48.887C62.5908 48.4519 61.9004 48.0795 61.0264 48.0795C60.1523 48.0795 59.4619 48.4519 58.8916 48.887C58.3737 49.2821 57.8126 49.8434 57.2006 50.4556L57.2006 50.4556L57.1373 50.5189L49.5331 58.123C49.3294 58.3268 49.1609 58.4951 49.0122 58.6385C48.9274 58.4501 48.8335 58.2313 48.72 57.9664L42.8199 44.1996L42.7765 44.0982C42.2866 42.955 41.8546 41.9467 41.4022 41.2114C40.9204 40.4282 40.2308 39.6438 39.1011 39.4262C37.9714 39.2087 37.0398 39.6809 36.3016 40.2291C35.6085 40.7438 34.8328 41.5196 33.9535 42.3991L33.9534 42.3991L33.8755 42.4771L22.3315 54.021V57.0117L22.9575 57.6377L35.9968 44.5984C36.9781 43.6171 37.5967 43.0041 38.0901 42.6377C38.3227 42.465 38.4571 42.4023 38.5206 42.3807L38.5329 42.3768L38.5428 42.385C38.5938 42.4286 38.6953 42.5367 38.8471 42.7834C39.1691 43.3069 39.5158 44.1058 40.0625 45.3813L45.9626 59.1482L45.9973 59.2293C46.2301 59.7731 46.4659 60.3237 46.722 60.7399C47.0069 61.203 47.5003 61.8085 48.3695 61.9759C49.2387 62.1433 49.9217 61.7643 50.3582 61.4401C50.7505 61.1489 51.1739 60.7252 51.592 60.3068L51.6544 60.2444L59.2586 52.6402C59.9552 51.9435 60.3733 51.53 60.7114 51.2721C60.8663 51.1539 60.9563 51.1071 60.9998 51.089C61.0098 51.0848 61.0168 51.0824 61.021 51.0811L61.0264 51.0795L61.0318 51.0811C61.0359 51.0824 61.0429 51.0848 61.053 51.089C61.0964 51.1071 61.1865 51.1539 61.3414 51.2721C61.6794 51.53 62.0975 51.9435 62.7941 52.6402L72.4871 62.3332C73.0729 62.919 74.0227 62.919 74.6085 62.3332C74.6326 62.309 74.6558 62.2842 74.678 62.2589V60.2862Z" fill="#B3DDFF"/>
                                    <circle cx="62.1875" cy="34.8125" r="4.5625" fill="#B3DDFF"/>
                                    <rect x="64.5" y="61.5" width="22" height="22" rx="11" fill="white" stroke="#B3DDFF" stroke-width="3"/>
                                    <path d="M76 77V72.5L76 68M71 72.5H81" stroke="#B3DDFF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <input type="file" name="image-1" id="image-1" class="hidden" required>
                            </label>
                            <label for="image-2" class="cursor-pointer">
                                <svg width="97" height="97" viewBox="0 0 97 97" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.8" x="1.5" y="1.5" width="94" height="94" rx="3.5" fill="white" stroke="#9CD3FF" stroke-width="3" stroke-dasharray="10 10"/>
                                    <path d="M21.125 29.125C21.125 25.3538 21.125 23.4681 22.2966 22.2966C23.4681 21.125 25.3538 21.125 29.125 21.125H67.875C71.6462 21.125 73.5319 21.125 74.7034 22.2966C75.875 23.4681 75.875 25.3538 75.875 29.125V67.875C75.875 71.6462 75.875 73.5319 74.7034 74.7034C73.5319 75.875 71.6462 75.875 67.875 75.875H29.125C25.3538 75.875 23.4681 75.875 22.2966 74.7034C21.125 73.5319 21.125 71.6462 21.125 67.875V29.125Z" stroke="#B3DDFF" stroke-width="3"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M74.678 60.2862C74.6558 60.2608 74.6326 60.2361 74.6085 60.2119L64.9155 50.5189L64.8522 50.4557C64.2402 49.8435 63.679 49.2822 63.1611 48.887C62.5908 48.4519 61.9004 48.0795 61.0264 48.0795C60.1523 48.0795 59.4619 48.4519 58.8916 48.887C58.3737 49.2821 57.8126 49.8434 57.2006 50.4556L57.2006 50.4556L57.1373 50.5189L49.5331 58.123C49.3294 58.3268 49.1609 58.4951 49.0122 58.6385C48.9274 58.4501 48.8335 58.2313 48.72 57.9664L42.8199 44.1996L42.7765 44.0982C42.2866 42.955 41.8546 41.9467 41.4022 41.2114C40.9204 40.4282 40.2308 39.6438 39.1011 39.4262C37.9714 39.2087 37.0398 39.6809 36.3016 40.2291C35.6085 40.7438 34.8328 41.5196 33.9535 42.3991L33.9534 42.3991L33.8755 42.4771L22.3315 54.021V57.0117L22.9575 57.6377L35.9968 44.5984C36.9781 43.6171 37.5967 43.0041 38.0901 42.6377C38.3227 42.465 38.4571 42.4023 38.5206 42.3807L38.5329 42.3768L38.5428 42.385C38.5938 42.4286 38.6953 42.5367 38.8471 42.7834C39.1691 43.3069 39.5158 44.1058 40.0625 45.3813L45.9626 59.1482L45.9973 59.2293C46.2301 59.7731 46.4659 60.3237 46.722 60.7399C47.0069 61.203 47.5003 61.8085 48.3695 61.9759C49.2387 62.1433 49.9217 61.7643 50.3582 61.4401C50.7505 61.1489 51.1739 60.7252 51.592 60.3068L51.6544 60.2444L59.2586 52.6402C59.9552 51.9435 60.3733 51.53 60.7114 51.2721C60.8663 51.1539 60.9563 51.1071 60.9998 51.089C61.0098 51.0848 61.0168 51.0824 61.021 51.0811L61.0264 51.0795L61.0318 51.0811C61.0359 51.0824 61.0429 51.0848 61.053 51.089C61.0964 51.1071 61.1865 51.1539 61.3414 51.2721C61.6794 51.53 62.0975 51.9435 62.7941 52.6402L72.4871 62.3332C73.0729 62.919 74.0227 62.919 74.6085 62.3332C74.6326 62.309 74.6558 62.2842 74.678 62.2589V60.2862Z" fill="#B3DDFF"/>
                                    <circle cx="62.1875" cy="34.8125" r="4.5625" fill="#B3DDFF"/>
                                    <rect x="64.5" y="61.5" width="22" height="22" rx="11" fill="white" stroke="#B3DDFF" stroke-width="3"/>
                                    <path d="M76 77V72.5L76 68M71 72.5H81" stroke="#B3DDFF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <input type="file" name="image-2" id="image-2" class="hidden" required>
                            </label>
                            <label for="image-3" class="cursor-pointer">
                                <svg width="97" height="97" viewBox="0 0 97 97" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.8" x="1.5" y="1.5" width="94" height="94" rx="3.5" fill="white" stroke="#9CD3FF" stroke-width="3" stroke-dasharray="10 10"/>
                                    <path d="M21.125 29.125C21.125 25.3538 21.125 23.4681 22.2966 22.2966C23.4681 21.125 25.3538 21.125 29.125 21.125H67.875C71.6462 21.125 73.5319 21.125 74.7034 22.2966C75.875 23.4681 75.875 25.3538 75.875 29.125V67.875C75.875 71.6462 75.875 73.5319 74.7034 74.7034C73.5319 75.875 71.6462 75.875 67.875 75.875H29.125C25.3538 75.875 23.4681 75.875 22.2966 74.7034C21.125 73.5319 21.125 71.6462 21.125 67.875V29.125Z" stroke="#B3DDFF" stroke-width="3"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M74.678 60.2862C74.6558 60.2608 74.6326 60.2361 74.6085 60.2119L64.9155 50.5189L64.8522 50.4557C64.2402 49.8435 63.679 49.2822 63.1611 48.887C62.5908 48.4519 61.9004 48.0795 61.0264 48.0795C60.1523 48.0795 59.4619 48.4519 58.8916 48.887C58.3737 49.2821 57.8126 49.8434 57.2006 50.4556L57.2006 50.4556L57.1373 50.5189L49.5331 58.123C49.3294 58.3268 49.1609 58.4951 49.0122 58.6385C48.9274 58.4501 48.8335 58.2313 48.72 57.9664L42.8199 44.1996L42.7765 44.0982C42.2866 42.955 41.8546 41.9467 41.4022 41.2114C40.9204 40.4282 40.2308 39.6438 39.1011 39.4262C37.9714 39.2087 37.0398 39.6809 36.3016 40.2291C35.6085 40.7438 34.8328 41.5196 33.9535 42.3991L33.9534 42.3991L33.8755 42.4771L22.3315 54.021V57.0117L22.9575 57.6377L35.9968 44.5984C36.9781 43.6171 37.5967 43.0041 38.0901 42.6377C38.3227 42.465 38.4571 42.4023 38.5206 42.3807L38.5329 42.3768L38.5428 42.385C38.5938 42.4286 38.6953 42.5367 38.8471 42.7834C39.1691 43.3069 39.5158 44.1058 40.0625 45.3813L45.9626 59.1482L45.9973 59.2293C46.2301 59.7731 46.4659 60.3237 46.722 60.7399C47.0069 61.203 47.5003 61.8085 48.3695 61.9759C49.2387 62.1433 49.9217 61.7643 50.3582 61.4401C50.7505 61.1489 51.1739 60.7252 51.592 60.3068L51.6544 60.2444L59.2586 52.6402C59.9552 51.9435 60.3733 51.53 60.7114 51.2721C60.8663 51.1539 60.9563 51.1071 60.9998 51.089C61.0098 51.0848 61.0168 51.0824 61.021 51.0811L61.0264 51.0795L61.0318 51.0811C61.0359 51.0824 61.0429 51.0848 61.053 51.089C61.0964 51.1071 61.1865 51.1539 61.3414 51.2721C61.6794 51.53 62.0975 51.9435 62.7941 52.6402L72.4871 62.3332C73.0729 62.919 74.0227 62.919 74.6085 62.3332C74.6326 62.309 74.6558 62.2842 74.678 62.2589V60.2862Z" fill="#B3DDFF"/>
                                    <circle cx="62.1875" cy="34.8125" r="4.5625" fill="#B3DDFF"/>
                                    <rect x="64.5" y="61.5" width="22" height="22" rx="11" fill="white" stroke="#B3DDFF" stroke-width="3"/>
                                    <path d="M76 77V72.5L76 68M71 72.5H81" stroke="#B3DDFF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <input type="file" name="image-3" id="image-3" class="hidden" required>
                            </label>
                            <label for="image-4" class="cursor-pointer">
                                <svg width="97" height="97" viewBox="0 0 97 97" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.8" x="1.5" y="1.5" width="94" height="94" rx="3.5" fill="white" stroke="#9CD3FF" stroke-width="3" stroke-dasharray="10 10"/>
                                    <path d="M21.125 29.125C21.125 25.3538 21.125 23.4681 22.2966 22.2966C23.4681 21.125 25.3538 21.125 29.125 21.125H67.875C71.6462 21.125 73.5319 21.125 74.7034 22.2966C75.875 23.4681 75.875 25.3538 75.875 29.125V67.875C75.875 71.6462 75.875 73.5319 74.7034 74.7034C73.5319 75.875 71.6462 75.875 67.875 75.875H29.125C25.3538 75.875 23.4681 75.875 22.2966 74.7034C21.125 73.5319 21.125 71.6462 21.125 67.875V29.125Z" stroke="#B3DDFF" stroke-width="3"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M74.678 60.2862C74.6558 60.2608 74.6326 60.2361 74.6085 60.2119L64.9155 50.5189L64.8522 50.4557C64.2402 49.8435 63.679 49.2822 63.1611 48.887C62.5908 48.4519 61.9004 48.0795 61.0264 48.0795C60.1523 48.0795 59.4619 48.4519 58.8916 48.887C58.3737 49.2821 57.8126 49.8434 57.2006 50.4556L57.2006 50.4556L57.1373 50.5189L49.5331 58.123C49.3294 58.3268 49.1609 58.4951 49.0122 58.6385C48.9274 58.4501 48.8335 58.2313 48.72 57.9664L42.8199 44.1996L42.7765 44.0982C42.2866 42.955 41.8546 41.9467 41.4022 41.2114C40.9204 40.4282 40.2308 39.6438 39.1011 39.4262C37.9714 39.2087 37.0398 39.6809 36.3016 40.2291C35.6085 40.7438 34.8328 41.5196 33.9535 42.3991L33.9534 42.3991L33.8755 42.4771L22.3315 54.021V57.0117L22.9575 57.6377L35.9968 44.5984C36.9781 43.6171 37.5967 43.0041 38.0901 42.6377C38.3227 42.465 38.4571 42.4023 38.5206 42.3807L38.5329 42.3768L38.5428 42.385C38.5938 42.4286 38.6953 42.5367 38.8471 42.7834C39.1691 43.3069 39.5158 44.1058 40.0625 45.3813L45.9626 59.1482L45.9973 59.2293C46.2301 59.7731 46.4659 60.3237 46.722 60.7399C47.0069 61.203 47.5003 61.8085 48.3695 61.9759C49.2387 62.1433 49.9217 61.7643 50.3582 61.4401C50.7505 61.1489 51.1739 60.7252 51.592 60.3068L51.6544 60.2444L59.2586 52.6402C59.9552 51.9435 60.3733 51.53 60.7114 51.2721C60.8663 51.1539 60.9563 51.1071 60.9998 51.089C61.0098 51.0848 61.0168 51.0824 61.021 51.0811L61.0264 51.0795L61.0318 51.0811C61.0359 51.0824 61.0429 51.0848 61.053 51.089C61.0964 51.1071 61.1865 51.1539 61.3414 51.2721C61.6794 51.53 62.0975 51.9435 62.7941 52.6402L72.4871 62.3332C73.0729 62.919 74.0227 62.919 74.6085 62.3332C74.6326 62.309 74.6558 62.2842 74.678 62.2589V60.2862Z" fill="#B3DDFF"/>
                                    <circle cx="62.1875" cy="34.8125" r="4.5625" fill="#B3DDFF"/>
                                    <rect x="64.5" y="61.5" width="22" height="22" rx="11" fill="white" stroke="#B3DDFF" stroke-width="3"/>
                                    <path d="M76 77V72.5L76 68M71 72.5H81" stroke="#B3DDFF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <input type="file" name="image-4" id="image-4" class="hidden" required>
                            </label>
                            <label for="image-5" class="cursor-pointer">
                                <svg width="97" height="97" viewBox="0 0 97 97" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.8" x="1.5" y="1.5" width="94" height="94" rx="3.5" fill="white" stroke="#9CD3FF" stroke-width="3" stroke-dasharray="10 10"/>
                                    <path d="M21.125 29.125C21.125 25.3538 21.125 23.4681 22.2966 22.2966C23.4681 21.125 25.3538 21.125 29.125 21.125H67.875C71.6462 21.125 73.5319 21.125 74.7034 22.2966C75.875 23.4681 75.875 25.3538 75.875 29.125V67.875C75.875 71.6462 75.875 73.5319 74.7034 74.7034C73.5319 75.875 71.6462 75.875 67.875 75.875H29.125C25.3538 75.875 23.4681 75.875 22.2966 74.7034C21.125 73.5319 21.125 71.6462 21.125 67.875V29.125Z" stroke="#B3DDFF" stroke-width="3"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M74.678 60.2862C74.6558 60.2608 74.6326 60.2361 74.6085 60.2119L64.9155 50.5189L64.8522 50.4557C64.2402 49.8435 63.679 49.2822 63.1611 48.887C62.5908 48.4519 61.9004 48.0795 61.0264 48.0795C60.1523 48.0795 59.4619 48.4519 58.8916 48.887C58.3737 49.2821 57.8126 49.8434 57.2006 50.4556L57.2006 50.4556L57.1373 50.5189L49.5331 58.123C49.3294 58.3268 49.1609 58.4951 49.0122 58.6385C48.9274 58.4501 48.8335 58.2313 48.72 57.9664L42.8199 44.1996L42.7765 44.0982C42.2866 42.955 41.8546 41.9467 41.4022 41.2114C40.9204 40.4282 40.2308 39.6438 39.1011 39.4262C37.9714 39.2087 37.0398 39.6809 36.3016 40.2291C35.6085 40.7438 34.8328 41.5196 33.9535 42.3991L33.9534 42.3991L33.8755 42.4771L22.3315 54.021V57.0117L22.9575 57.6377L35.9968 44.5984C36.9781 43.6171 37.5967 43.0041 38.0901 42.6377C38.3227 42.465 38.4571 42.4023 38.5206 42.3807L38.5329 42.3768L38.5428 42.385C38.5938 42.4286 38.6953 42.5367 38.8471 42.7834C39.1691 43.3069 39.5158 44.1058 40.0625 45.3813L45.9626 59.1482L45.9973 59.2293C46.2301 59.7731 46.4659 60.3237 46.722 60.7399C47.0069 61.203 47.5003 61.8085 48.3695 61.9759C49.2387 62.1433 49.9217 61.7643 50.3582 61.4401C50.7505 61.1489 51.1739 60.7252 51.592 60.3068L51.6544 60.2444L59.2586 52.6402C59.9552 51.9435 60.3733 51.53 60.7114 51.2721C60.8663 51.1539 60.9563 51.1071 60.9998 51.089C61.0098 51.0848 61.0168 51.0824 61.021 51.0811L61.0264 51.0795L61.0318 51.0811C61.0359 51.0824 61.0429 51.0848 61.053 51.089C61.0964 51.1071 61.1865 51.1539 61.3414 51.2721C61.6794 51.53 62.0975 51.9435 62.7941 52.6402L72.4871 62.3332C73.0729 62.919 74.0227 62.919 74.6085 62.3332C74.6326 62.309 74.6558 62.2842 74.678 62.2589V60.2862Z" fill="#B3DDFF"/>
                                    <circle cx="62.1875" cy="34.8125" r="4.5625" fill="#B3DDFF"/>
                                    <rect x="64.5" y="61.5" width="22" height="22" rx="11" fill="white" stroke="#B3DDFF" stroke-width="3"/>
                                    <path d="M76 77V72.5L76 68M71 72.5H81" stroke="#B3DDFF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <input type="file" name="image-5" id="image-5" class="hidden" required>
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="flex">Deskripsi Produk</td>
                    <td class="py-2">
                        <textarea name="deskripsi_produk" placeholder="Deskripsi Produk" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 h-[150px]"></textarea>
                        <p class="text-[12px] -mt-1">Tulis deskripsi produkmu min. 250 karakter agar pembeli semakin mudah mengerti.</p>
                    </td>
                </tr>
                <tr>
                    <td class="w-2/6">Jumlah Stok</td>
                    <td class="py-2">
                        <input type="text" name="jumlah_stok" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2" placeholder="Jumlah Produk yang tersedia">
                    </td>
                </tr>
                <tr>
                    <td class="w-2/6">Varian Produk</td>
                    <td class="py-2">
                        <div class="w-full">
                            <select class="border js-example-basic-multiple" style="width: 100%;" name="varians[]" multiple="multiple">
                                <option value="AL">Alabama</option>
                                  ...
                                <option value="WY">Wyoming</option>
                            </select>
                            <p class="text-[12px] mt-1">Contoh : Ukuran XL, warna hijau</p>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="w-2/6">Ukuran Paket</td>
                    <td class="py-2">
                        <div class="flex gap-x-5">
                            <div class="flex items-center gap-x-2">
                                <input type="text" name="panjang" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2" placeholder="Panjang">
                                <p class="font-[500] text-[20px]">
                                    cm
                                </p>
                            </div>
                            <div class="flex items-center gap-x-2">
                                <input type="text" name="lebar" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2" placeholder="Lebar">
                                <p class="font-[500] text-[20px]">
                                    cm
                                </p>
                            </div>
                            <div class="flex items-center gap-x-2">
                                <input type="text" name="tinggi" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2" placeholder="Tinggi">
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
                                <input type="text" name="panjang" class="w-[205px] border-2 border-[#9CD3FF] rounded-md py-2 px-2" placeholder="0.02">
                                <p class="font-[500] text-[20px]">
                                    Gram
                                </p>
                            </div>
                        </div>
                        <p class="text-[12px] mt-1">Berat produk dalam gram</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
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
