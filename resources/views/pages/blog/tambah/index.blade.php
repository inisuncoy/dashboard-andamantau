@extends('layout.main.index')

@section('pages')
<div class="flex flex-col gap-y-10">
  <div>
    <h1 class="text-white text-[30px] font-semibold">Blog</h1>
    <div class="text-white text-[18px] flex gap-x-2 font-semibold">
      <a href="/blog">Blog</a>
      >
      <p>Tambah Blog</p>
    </div>
  </div>
  <div class="p-5 bg-white rounded-xl font-inter">
    <table class="w-full table-fixed">
      <tbody class="text-[18px]">
        <tr>
          <td class="w-2/5 font-bold text-[20px]">Kategori</td>
          <td class="py-2">
            <select name="nama_lokasi"
              class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px] appearance-none">
              <option value="" selected>Silahkan pilih...</option>
            </select>
          </td>
        </tr>
        <tr>
          <td class="w-2/5 font-bold text-[20px]">Label</td>
          <td class="py-2">
            <div class="flex">
              <div class="border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px] flex items-center gap-3">
                <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M7.5 12V7L7.5 2M2 7H13" stroke="#9CD3FF" stroke-width="3" stroke-linecap="round"
                    stroke-linejoin="round" />
                </svg>
                <h1>Tambah Label</h1>
              </div>
            </div>

          </td>
        </tr>
        <tr>
          <td class="w-2/5 font-bold text-[20px]">Judul</td>
          <td class="py-2">
            <input type="text" name="judul"
              class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]"
              placeholder="Cara Merawat Burung Nuri">
          </td>
        </tr>
        <tr>
          <td class="w-2/5 font-bold text-[20px]">Gambar</td>
          <td class="flex flex-col gap-3 py-2">
            <div
              class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px] flex items-center justify-center">
              <svg width="285" height="285" viewBox="0 0 285 285" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M37.6623 37.6622C23.7498 51.5747 23.7498 73.9664 23.7498 118.75V166.25C23.7498 211.033 23.7498 233.425 37.6623 247.337C51.5747 261.25 73.9664 261.25 118.75 261.25H166.25C211.033 261.25 233.425 261.25 247.337 247.337C261.25 233.425 261.25 211.033 261.25 166.25V118.75C261.25 85.0327 261.25 64.0082 255.312 49.739V201.875C243.907 201.875 232.969 197.344 224.904 189.279L215.978 180.353C207.413 171.788 203.13 167.505 198.274 165.7C192.936 163.716 187.063 163.716 181.726 165.7C176.869 167.505 172.587 171.788 164.021 180.353L162.678 181.697C155.727 188.648 152.251 192.124 148.558 192.772C145.688 193.275 142.733 192.706 140.256 191.173C137.068 189.199 135.131 184.682 131.259 175.646L130.625 174.166C121.723 153.395 117.272 143.01 109.507 139.117C105.598 137.157 101.224 136.315 96.8665 136.683C88.2116 137.413 80.2218 145.403 64.2423 161.382L64.2423 161.382L41.5623 184.062V34.2877C40.1896 35.3101 38.8927 36.4318 37.6623 37.6622Z"
                  fill="#939393" />
                <path
                  d="M35.625 118.75C35.625 96.0226 35.6502 80.1716 37.2582 68.2119C38.8202 56.5938 41.6772 50.4414 46.0593 46.0593C50.4414 41.6772 56.5938 38.8202 68.2119 37.2582C80.1716 35.6502 96.0226 35.625 118.75 35.625H166.25C188.977 35.625 204.828 35.6502 216.788 37.2582C228.406 38.8202 234.559 41.6772 238.941 46.0593C243.323 50.4414 246.18 56.5938 247.742 68.2119C249.35 80.1716 249.375 96.0226 249.375 118.75V166.25C249.375 188.977 249.35 204.828 247.742 216.788C246.18 228.406 243.323 234.559 238.941 238.941C234.559 243.323 228.406 246.18 216.788 247.742C204.828 249.35 188.977 249.375 166.25 249.375H118.75C96.0226 249.375 80.1716 249.35 68.2119 247.742C56.5938 246.18 50.4414 243.323 46.0593 238.941C41.6772 234.559 38.8202 228.406 37.2582 216.788C35.6502 204.828 35.625 188.977 35.625 166.25V118.75Z"
                  stroke="#939393" stroke-width="23.75" />
                <circle cx="178.125" cy="106.875" r="23.75" fill="#939393" />
              </svg>

            </div>
            <input type="file" name="gambar" id="gambar" class="hidden ">
            <div class="flex">
                <label for='gambar' class="bg-[#2D76E5] text-white py-2 px-4 rounded-lg font-bold cursor-pointer flex items-center gap-x-3">
                    <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.99955 2L9.54671 1.48705L8.99955 0.903404L8.4524 1.48705L8.99955 2ZM8.24955 12.9717C8.24955 13.3859 8.58534 13.7217 8.99955 13.7217C9.41377 13.7217 9.74955 13.3859 9.74955 12.9717L8.24955 12.9717ZM15.261 7.58242L9.54671 1.48705L8.4524 2.51295L14.1667 8.60832L15.261 7.58242ZM8.4524 1.48705L2.73808 7.58242L3.8324 8.60832L9.54671 2.51295L8.4524 1.48705ZM8.24955 2L8.24955 12.9717L9.74955 12.9717L9.74955 2L8.24955 2Z" fill="white"/>
                        <path d="M1 14.3428L1 15.5618C1 16.9084 2.02335 18 3.28573 18L14.7144 18C15.9767 18 17.0001 16.9084 17.0001 15.5618V14.3428" stroke="white" stroke-width="1.5"/>
                    </svg>
                    <p>Unggah Foto</p>
                </label>
            </div>
          </td>
        </tr>
        <tr>
          <td class="flex w-2/5 font-bold text-[20px]">Konten</td>
          <td class="py-2">
            <textarea name="content" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]" id="" cols="100" rows="10" placeholder="Tulis minimal 100 kata"></textarea>
          </td>
        </tr>
        <tr>
          <td></td>
          <td class="pt-7">
            <div class="flex justify-end gap-x-5">
                <a href="/blog" class="bg-[#FF0000] text-white py-3 px-10 rounded-lg font-bold float-right">Batal</a>
                <button type="submit" class="bg-[#2D76E5] text-white py-3 px-10 rounded-lg font-bold float-right">Simpan</button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection
