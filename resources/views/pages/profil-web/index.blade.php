@extends('layout.main.index')

@section('pages')
<form action="#" method="POST" class="flex flex-col gap-y-10">
    <h1 class="text-white text-[30px] font-semibold">Profil Web</h1>
    <div class="bg-white rounded-xl p-5 font-inter">
        <h1 class="text-[24px] font-bold">Profil Toko</h1>
        <table class="table-fixed w-full my-5">
            <tbody class="text-[18px]">
                <tr>
                    <td class="w-2/5">Nama Toko</td>
                    <td class="py-2">
                        <input type="text" name="nama" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]" placeholder="Ketik Nama Toko">
                    </td>
                </tr>
                <tr>
                    <td class="w-2/5 flex">Deskripsi Toko</td>
                    <td class="py-2">
                        <textarea type="text" name="deskripsi_toko" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]" placeholder="Ketik deskripsi toko"></textarea>
                    </td>
                </tr>
                <tr>
                    <td class="w-2/5 flex">Logo</td>
                    <td class="py-2">
                        <label for="logo" class="cursor-pointer">
                            <svg width="97" height="97" viewBox="0 0 97 97" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g opacity="0.97">
                                    <rect opacity="0.8" x="1.5" y="1.5" width="94" height="94" rx="3.5" fill="white" stroke="#9CD3FF" stroke-width="3" stroke-dasharray="10 10"/>
                                    <path d="M21.1245 29.1251C21.1245 25.3539 21.1245 23.4683 22.2961 22.2967C23.4677 21.1251 25.3533 21.1251 29.1245 21.1251H67.8745C71.6457 21.1251 73.5314 21.1251 74.7029 22.2967C75.8745 23.4683 75.8745 25.3539 75.8745 29.1251V67.8751C75.8745 71.6464 75.8745 73.532 74.7029 74.7036C73.5314 75.8751 71.6457 75.8751 67.8745 75.8751H29.1245C25.3533 75.8751 23.4677 75.8751 22.2961 74.7036C21.1245 73.532 21.1245 71.6464 21.1245 67.8751V29.1251Z" stroke="#B3DDFF" stroke-width="3"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M74.6775 60.2861C74.6553 60.2607 74.6321 60.2359 74.608 60.2118L64.915 50.5188L64.8518 50.4555C64.2397 49.8433 63.6785 49.282 63.1606 48.8869C62.5903 48.4517 61.8999 48.0794 61.0259 48.0794C60.1518 48.0794 59.4614 48.4517 58.8911 48.8869C58.3732 49.282 57.8121 49.8433 57.2001 50.4554L57.2001 50.4555L57.1368 50.5188L49.5326 58.1229C49.3289 58.3267 49.1604 58.495 49.0117 58.6384C48.9269 58.45 48.833 58.2312 48.7195 57.9663L42.8194 44.1995L42.776 44.0981C42.2862 42.9549 41.8541 41.9465 41.4017 41.2113C40.9199 40.4281 40.2304 39.6437 39.1006 39.4261C37.9709 39.2086 37.0393 39.6808 36.3011 40.229C35.608 40.7437 34.8323 41.5195 33.953 42.399L33.953 42.399L33.875 42.4769L22.3311 54.0209V57.0115L22.9571 57.6375L35.9963 44.5983C36.9776 43.617 37.5962 43.0039 38.0896 42.6375C38.3222 42.4649 38.4566 42.4022 38.5201 42.3806L38.5324 42.3766L38.5424 42.3849C38.5933 42.4285 38.6948 42.5366 38.8466 42.7833C39.1687 43.3068 39.5153 44.1057 40.062 45.3812L45.9621 59.1481L45.9968 59.2291C46.2297 59.773 46.4654 60.3236 46.7215 60.7397C47.0064 61.2028 47.4998 61.8084 48.369 61.9758C49.2382 62.1432 49.9212 61.7642 50.3577 61.44C50.75 61.1487 51.1734 60.7251 51.5915 60.3067L51.6539 60.2442L59.2581 52.6401C59.9548 51.9434 60.3728 51.5299 60.7109 51.2719C60.8658 51.1538 60.9558 51.107 60.9993 51.0889C61.0093 51.0847 61.0163 51.0823 61.0205 51.0809L61.0259 51.0794L61.0313 51.0809C61.0354 51.0823 61.0424 51.0847 61.0525 51.0889C61.0959 51.107 61.186 51.1538 61.3409 51.2719C61.679 51.5299 62.097 51.9434 62.7936 52.6401L72.4866 62.3331C73.0724 62.9189 74.0222 62.9189 74.608 62.3331C74.6321 62.3089 74.6553 62.2841 74.6775 62.2587V60.2861Z" fill="#B3DDFF"/>
                                    <circle cx="62.187" cy="34.8126" r="4.5625" fill="#B3DDFF"/>
                                    <rect x="64.4995" y="61.5001" width="22" height="22" rx="11" fill="white" stroke="#B3DDFF" stroke-width="3"/>
                                    <path d="M75.9995 77.0001V72.5001L75.9995 68.0001M70.9995 72.5001H80.9995" stroke="#B3DDFF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                            </svg>
                            <input type="file" class="hidden" name="logo" id="logo">
                        </label>
                    </td>
                </tr>
                <tr>
                    <td class="w-2/5">Instagram</td>
                    <td class="py-2">
                        <input type="text" name="instagram" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]" placeholder="Ketik Instagram">
                    </td>
                </tr>
                <tr>
                    <td class="w-2/5">No. Whatsapp</td>
                    <td class="py-2">
                        <input type="text" name="no_whatsapp" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]" placeholder="Ketik No. Whatsapp">
                    </td>
                </tr>
                <tr>
                    <td class="w-2/5">Facebook</td>
                    <td class="py-2">
                        <input type="text" name="facebook" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]" placeholder="Ketik Facebook">
                    </td>
                </tr>
                <tr>
                    <td class="w-2/5">Email</td>
                    <td class="py-2">
                        <input type="email" name="email" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]" placeholder="Ketik Email">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="bg-white rounded-xl p-5 font-inter">
        <h1 class="text-[24px] font-bold">Lokasi Toko</h1>
        <table class="table-fixed w-full my-5">
            <tbody class="text-[18px]">
                <tr>
                    <td class="w-2/5">Nama Lokasi</td>
                    <td class="py-2">
                        <input type="text" name="nama_lokasi" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]" placeholder="Ketik Nama Lokasi">
                    </td>
                </tr>
                <tr>
                    <td class="w-2/5">Alamat</td>
                    <td class="py-2">
                        <input type="text" name="alamat" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]" placeholder="Ketik Alamat">
                    </td>
                </tr>
                <tr>
                    <td class="w-2/5">Kota/Kecamatan</td>
                    <td class="py-2">
                        <input type="text" name="kota_kecamatan" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]" placeholder="Ketik Nama Kota/Kecamatan">
                    </td>
                </tr>
                <tr>
                    <td class="w-2/5">Kode Pos</td>
                    <td class="py-2">
                        <input type="text" name="kode_pos" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]" placeholder="Ketik Kode Pos">
                    </td>
                </tr>
                <tr>
                    <td class="w-2/5">Pinpoint</td>
                    <td class="py-2">
                        <input type="text" name="pin_point" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]" placeholder="Ketik Pin Point">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td class="pt-7">
                        <button type="submit" class="bg-[#2D76E5] text-white py-2 px-8 rounded-lg font-bold float-right">Simpan</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</form>
@endsection
