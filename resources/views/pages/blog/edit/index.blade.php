@extends('layout.main.index')

@section('pages')
<div class="flex flex-col gap-y-10">
  <div>
    <h1 class="text-white text-[30px] font-semibold">Blog</h1>
    <div class="text-white text-[18px] flex gap-x-2 font-semibold">
      <a href="/blog">Blog</a>
      >
      <p>Ubah</p>
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
              <option value="" selected>Burung Hias</option>
            </select>
          </td>
        </tr>
        <tr>
          <td class="w-2/5 font-bold text-[20px]">Label</td>
          <td class="py-2">
            <div class="flex flex-wrap gap-3">
              <div
                class=" border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px] flex items-center gap-3">
                <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="4" cy="4" r="4" fill="#9CD3FF" />
                </svg>
                <h1>Burung Hias</h1>
              </div>
              <div
                class=" border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px] flex items-center gap-3">
                <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="4" cy="4" r="4" fill="#9CD3FF" />
                </svg>
                <h1>Burung Hias</h1>
              </div>
            </div>
            <div class="flex mt-3 ">
              <div
                class=" border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px] flex items-center gap-3">
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
            <input type="text" name="kota_kecamatan"
              class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]"
              placeholder="Ketik Nama Kota/Kecamatan" value="Ikan Nirwana">
          </td>
        </tr>
        <tr>
          <td class="w-2/5 font-bold text-[20px]">Gambar</td>
          <td class="flex flex-col gap-3 py-2">
            <img src={{ url("assets/images/products/Ikan-arwana-1.jpg") }} class="w-[551px] h-[303px] object-cover rounded-md" alt="">
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
