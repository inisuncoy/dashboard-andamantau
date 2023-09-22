@extends('layout.main.index')

@section('pages')
<div class="flex flex-col gap-y-10">
  <div class="flex justify-between">
    <h1 class="text-white text-[30px] font-semibold">Edit Produk</h1>
  </div>

  <form action="">
    <div class="bg-white rounded-xl p-5 font-inter">
      <h1 class="text-[24px] font-bold">Informasi Produk</h1>
      <table class="table-fixed w-full my-5">
        <tbody class="text-[18px]">
          <tr>
            <td class="w-2/5">Nama Produk</td>
            <td class="py-2">
              <input type="text" name="nama_lokasi"
                class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]"
                placeholder="Ketik Nama Lokasi">
            </td>
          </tr>
          <tr>
            <td class="w-2/5">Kategori</td>
            <td class="py-2">
              <input type="text" name="alamat"
                class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]"
                placeholder="Ketik Alamat">
            </td>
          </tr>
          <tr>
            <td class="w-2/5">SKU</td>
            <td class="py-2">
              <input type="text" name="kota_kecamatan"
                class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]"
                placeholder="Ketik Nama Kota/Kecamatan">
            </td>
          </tr>
          <tr>
            <td class="w-2/5">Stock</td>
            <td class="py-2">
              <input type="text" name="kode_pos"
                class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]"
                placeholder="Ketik Kode Pos">
            </td>
          </tr>
          <!-- <tr>
            <td></td>
            <td class="pt-7">
              <button type="submit"
                class="bg-[#2D76E5] text-white py-2 px-8 rounded-lg font-bold float-right">Simpan</button>
            </td>
          </tr> -->
        </tbody>
      </table>
    </div>
    <div class="bg-white rounded-xl p-5 font-inter mt-5">
      <h1 class="text-[24px] font-bold">Harga Produk</h1>
      <table class="table-fixed w-full my-5">
        <tbody class="text-[18px]">
          <tr>
            <td class="w-2/5">Harga Lama</td>
            <td class="py-2">
              <div class="flex border-2 border-[#9CD3FF] rounded-md">
                <span class="py-2 px-2 bg-[#E4F3FF] rounded-l-md">Rp</span>
                <input type="text" name="alamat" class="w-full px-5 placeholder:text-[15px]" placeholder="masukan harga"
                  value="20.000.000" disabled>
              </div>
            </td>
          </tr>
          <tr>
            <td class="w-2/5">Harga Baru</td>
            <td class="py-2">
              <div class="flex border-2 border-[#9CD3FF] rounded-md">
                <span class="py-2 px-2 bg-[#E4F3FF] rounded-l-md">Rp</span>
                <input type="text" name="alamat" class="w-full px-5 placeholder:text-[15px]"
                  placeholder="Masukan harga">
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="bg-white rounded-xl p-5 font-inter mt-5">
      <h1 class="text-[24px] font-bold">Detail Produk</h1>
      <table class="table-fixed w-full my-5">
        <tbody class="text-[18px]">
          <tr class="">
            <td class="w-2/5 relative">
              <h1 class="absolute top-0 ">Foto Produk</h1>
            </td>
            <td class="py-2">
              <div class="flex gap-5">
                <div>
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
                </div>
                <div>
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
                </div>
                <div>
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
                </div>
                <div>
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
                </div>
                <div>
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
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td class="w-2/5 relative">
              <h1 class="absolute top-0 ">Deskripsi Produk</h1>
            </td>
            <td class="py-2">
              <textarea type="text" name="deskripsi_produk"
                class="w-full h-[200px] border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]"
                placeholder="Ketik Alamat"></textarea>
            </td>
          </tr>
          <tr>
            <td class="w-2/5">Jumlah Stok</td>
            <td class="py-2">
              <input type="number" name="kota_kecamatan"
                class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]"
                placeholder="Masukan jumlah stok  ">
            </td>
          </tr>
          <tr>
            <td class="w-2/5">Varian Produk</td>
            <td class="py-2">
              <div class="flex border-2 border-[#9CD3FF] rounded-md">
                <input type="text" name="alamat" class="w-full px-5 placeholder:text-[15px] rounded-md"
                  placeholder="Masukan Varian Produk">
                <div class="py-2 px-2 ">
                  <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="1.5" y="1.5" width="22" height="22" rx="11" fill="white" stroke="#9CD3FF"
                      stroke-width="3" />
                    <path d="M13 17L13 8M8 12.5H18" stroke="#9CD3FF" stroke-width="3" stroke-linecap="round"
                      stroke-linejoin="round" />
                  </svg>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td class=" w-2/5">Ukuran Paket
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
              <p class="text-sm mt-2">Ukuran paket yang akan dipakai dan dihitung oleh pihak pengiriman</p>
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