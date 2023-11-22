@extends('layout.main.index')

@section('pages')
<form action="/profil-toko/edit/update" method="POST" class="flex flex-col gap-y-10" enctype="multipart/form-data">
    @csrf
    <div>
        <h1 class="text-white text-[30px] font-semibold">Profil Toko</h1>
        <div class="text-white text-[18px] flex gap-x-2 font-semibold">
            <a href="/profil-toko">Profil Toko</a>
            >
            <p>Ubah Profil</p>
        </div>
    </div>
    <div class="p-5 bg-white rounded-xl font-inter">
        <table class="w-full my-5 table-auto">
            <tbody class="text-[18px]">
                <tr>
                    <td class="flex w-2/5 text-[20px]" >
                        Logo
                        <span data-tooltip-target="logo-tooltip" data-tooltip-style="light" data-tooltip-placement="right" class="after:content-['*'] after:ml-2 after:text-red-500"></span>
                        <div id="logo-tooltip" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
                            Wajib terisi
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </td>
                    <td class="py-2">
                        <div class="flex items-end gap-x-7">
                            <img src={{ url(config('backend.backend_url') . "/" . $umkmData['umkm_image']) }} id="logo_image" class="object-cover w-32 h-32 rounded-md" alt="">
                            <div class="flex flex-col gap-y-2">
                                <p class="text-[#00000080]" id="show_img_src"></p>
                                <div class="flex items-end gap-x-3">
                                    <label for="umkm_image" class="bg-[#2D76E5] border cursor-pointer border-[#9CD3FF] text-sm font-bold text-white flex items-center py-2 px-4 gap-x-2 rounded-lg">
                                        <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.99955 2L9.54671 1.48705L8.99955 0.903404L8.4524 1.48705L8.99955 2ZM8.24955 12.9717C8.24955 13.3859 8.58534 13.7217 8.99955 13.7217C9.41377 13.7217 9.74955 13.3859 9.74955 12.9717L8.24955 12.9717ZM15.261 7.58242L9.54671 1.48705L8.4524 2.51295L14.1667 8.60832L15.261 7.58242ZM8.4524 1.48705L2.73808 7.58242L3.8324 8.60832L9.54671 2.51295L8.4524 1.48705ZM8.24955 2L8.24955 12.9717L9.74955 12.9717L9.74955 2L8.24955 2Z" fill="white"/>
                                            <path d="M1 14.3428L1 15.5618C1 16.9084 2.02335 18 3.28573 18L14.7144 18C15.9767 18 17.0001 16.9084 17.0001 15.5618V14.3428" stroke="white" stroke-width="1.5"/>
                                        </svg>
                                        Ganti Logo
                                    </label>
                                    <p class="font-[200]">Max ukuran file adalah 10 Mb</p>
                                    <input type="file" class="hidden" name="file" id="umkm_image" accept="image/png, image/jpeg, image/jpg">
                                </div>
                            </div>
                        </div>
                        @error('file')
                        <p class="mt-2 font-bold text-red-500">{{ $message }}</p>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td class="w-2/5 text-[20px]">
                        Nama Toko
                        <span data-tooltip-target="umkm_name-tooltip" data-tooltip-style="light" data-tooltip-placement="right" class="after:content-['*'] after:ml-2 after:text-red-500"></span>
                        <div id="umkm_name-tooltip" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
                            Wajib terisi
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </td>
                    <td class="py-2">
                        <input type="text" name="umkm_name" value="{{ old('umkm_name', $umkmData['umkm_name']) }}" class="w-full border-2 border-[#9CD3FF] @error('umkm_name') border-red-500 @enderror rounded-md py-2 px-2 placeholder:text-[15px]" placeholder="Contoh : Contoh Contoh">
                        @error('umkm_name')
                        <p class="mt-2 font-bold text-red-500">{{ $message }}</p>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td class="w-2/5 text-[20px]">
                        Alamat Toko
                        <span data-tooltip-target="alamat-tooltip" data-tooltip-style="light" data-tooltip-placement="right" class="after:content-['*'] after:ml-2 after:text-red-500"></span>
                        <div id="alamat-tooltip" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
                            Wajib terisi
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </td>
                    <td class="py-2">
                        <input type="text" name="address" value="{{ old('address', $umkmData['address']) }}" class="w-full border-2 border-[#9CD3FF] rounded-md @error('address') border-red-500 @enderror py-2 px-2 placeholder:text-[15px]" placeholder="Contoh : Jl. Contoh No. 00">
                        @error('address')
                        <p class="mt-2 font-bold text-red-500">{{ $message }}</p>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td class="w-2/5 text-[20px]">
                        Kota
                        <span data-tooltip-target="kota-tooltip" data-tooltip-style="light" data-tooltip-placement="right" class="after:content-['*'] after:ml-2 after:text-red-500"></span>
                        <div id="kota-tooltip" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
                            Wajib terisi
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </td>
                    <td class="py-2">
                        <select name="id_city" id="" class="w-full border-2 border-[#9CD3FF] @error('id_city') border-red-500 @enderror rounded-md py-2 px-2 placeholder:text-[15px]">
                            @foreach ($umkmCities as $city)
                                <option value="{{ $city['id'] }}" {{ ($city['id'] == old('id_city', $umkmData['id_city']) ) ? 'selected' : '' }}>{{ $city['name'] }}</option>
                            @endforeach
                        </select>
                        @error('id_city')
                        <p class="mt-2 font-bold text-red-500">{{ $message }}</p>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td class="w-2/5 text-[20px]">
                        Kecamatan
                        <span data-tooltip-target="kecamatan-tooltip" data-tooltip-style="light" data-tooltip-placement="right" class="after:content-['*'] after:ml-2 after:text-red-500"></span>
                        <div id="kecamatan-tooltip" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
                            Wajib terisi
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </td>
                    <td class="py-2">
                        <input type="text" name="kecamatan" value="{{ old('kecamatan', $umkmData['kecamatan']) }}" class="w-full border-2 border-[#9CD3FF] @error('kecamatan') border-red-500 @enderror rounded-md py-2 px-2 placeholder:text-[15px]" placeholder="Contoh : purwantoro">
                        @error('kecamatan')
                            <p class="mt-2 font-bold text-red-500">{{ $message }}</p>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td class="w-2/5 text-[20px]">
                        Kelurahan
                        <span data-tooltip-target="kelurahan-tooltip" data-tooltip-style="light" data-tooltip-placement="right" class="after:content-['*'] after:ml-2 after:text-red-500"></span>
                        <div id="kelurahan-tooltip" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
                            Wajib terisi
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </td>
                    <td class="py-2">
                        <input type="text" name="kelurahan" value="{{ old('kelurahan', $umkmData['kelurahan']) }}" class="w-full border-2 border-[#9CD3FF] @error('kelurahan') border-red-500 @enderror rounded-md py-2 px-2 placeholder:text-[15px]" placeholder="Contoh : blimbing">
                        @error('kelurahan')
                            <p class="mt-2 font-bold text-red-500">{{ $message }}</p>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td class="w-2/5 text-[20px]">
                        Kode Pos
                        <span data-tooltip-target="kode_pos-tooltip" data-tooltip-style="light" data-tooltip-placement="right" class="after:content-['*'] after:ml-2 after:text-red-500"></span>
                        <div id="kode_pos-tooltip" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
                            Wajib terisi
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </td>
                    <td class="py-2">
                        <input type="text" name="kode_pos" value="{{ old('kode_pos', $umkmData['kode_pos']) }}" class="w-full border-2 border-[#9CD3FF] @error('kode_pos') border-red-500 @enderror rounded-md py-2 px-2 placeholder:text-[15px]" placeholder="Contoh : 000000">
                        @error('kode_pos')
                            <p class="mt-2 font-bold text-red-500">{{ $message }}</p>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td class="w-2/5 text-[20px]">
                        Nomor Telepon
                        <span data-tooltip-target="number_phone-tooltip" data-tooltip-style="light" data-tooltip-placement="right" class="after:content-['*'] after:ml-2 after:text-red-500"></span>
                        <div id="number_phone-tooltip" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
                            Wajib terisi
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </td>
                    <td class="py-2">
                        <input type="text" name="phone_number" value="{{ old('phone_number', $umkmData['phone_number']) }}" class="w-full border-2 border-[#9CD3FF] @error('phone_number') border-red-500 @enderror rounded-md py-2 px-2 placeholder:text-[15px]" placeholder="Contoh : 0812345678921">
                        @error('phone_number')
                            <p class="mt-2 font-bold text-red-500">{{ $message }}</p>
                        @enderror
                    </td>
                </tr>

                <tr>
                    <td class="w-2/5 text-[20px]">
                        Email
                        <span data-tooltip-target="email-tooltip" data-tooltip-style="light" data-tooltip-placement="right" class="after:content-['*'] after:ml-2 after:text-red-500"></span>
                        <div id="email-tooltip" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
                            Wajib terisi
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </td>
                    <td class="py-2">
                        <input type="text" disabled name="umkm_email" value="{{ old('umkm_email', $umkmData['umkm_email']) }}" class="w-full disabled:bg-gray-100 border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]" placeholder="Contoh : contoh@gmail.com">
                    </td>
                </tr>
                <tr>
                    <td class="w-2/5 text-[20px]">Instagram</td>
                    <td class="py-2">
                        <input type="text" name="instagram" value="{{ old('instagram', $umkmData['instagram']) }}" class="w-full border-2 border-[#9CD3FF] @error('instagram') border-red-500 @enderror rounded-md py-2 px-2 placeholder:text-[15px]" placeholder="Contoh : @contoh.com">
                        @error('instagram')
                        <p class="mt-2 font-bold text-red-500">{{ $message }}</p>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td class="w-2/5 text-[20px]">WhatsApp</td>
                    <td class="py-2">
                        <input type="text" name="whatsapp" value="{{ old('whatsapp', $umkmData['whatsapp']) }}"  class="w-full border-2 border-[#9CD3FF] @error('whatsapp') border-red-500 @enderror rounded-md py-2 px-2 placeholder:text-[15px]" placeholder="Contoh : 088844445555">
                        @error('whatsapp')
                        <p class="mt-2 font-bold text-red-500">{{ $message }}</p>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td class="w-2/5 text-[20px]">Facebook</td>
                    <td class="py-2">
                        <input type="text" name="facebook" value="{{ old('facebook', $umkmData['facebook']) }}" class="w-full border-2 border-[#9CD3FF] @error('facebook') border-red-500 @enderror rounded-md py-2 px-2 placeholder:text-[15px]" placeholder="Contoh : Contoh_toko">
                        @error('facebook')
                        <p class="mt-2 font-bold text-red-500">{{ $message }}</p>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td class="flex w-2/5 text-[20px]">
                        Deskripsi Toko
                        <span data-tooltip-target="deskripsi-tooltip" data-tooltip-style="light" data-tooltip-placement="right" class="after:content-['*'] after:ml-2 after:text-red-500"></span>
                        <div id="deskripsi-tooltip" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
                            Wajib terisi
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </td>
                    <td class="py-2">
                        <textarea type="text" id="descriptionInput" name="umkm_description" rows="6" class="w-full border-2 border-[#9CD3FF] @error('umkm_description') border-red-500 @enderror rounded-md py-2 px-2 placeholder:text-[15px]" placeholder="Isi deskripsi toko mu">{{ old('umkm_description', $umkmData['umkm_description']) }}</textarea>
                        <div class="flex justify-between">
                            <p class="text-[12px] -mt-1">Tulis deskripsi tokomu min. 100 karakter agar pembeli semakin mudah mengenal toko kamu.</p>
                            <div class="text-[14px] -mt-1 flex">
                                <div id="charCount">0</div>
                                <div>/2000 huruf</div>
                            </div>

                        </div>
                        @error('umkm_description')
                        <p class="mt-2 font-bold text-red-500">{{ $message }}</p>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td class="flex w-2/5"></td>
                    <td class="py-2">
                        <div class="flex float-right gap-x-5">
                            <a href="/profil-toko" class="bg-[#FF0000] loadButton py-3 w-[160px] text-center text-white rounded-lg font-bold">Batal</a>
                            <button type="submit" class="bg-[#2D76E5] loadButton py-3 w-[160px] text-white rounded-lg font-bold">Simpan</button>
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
    // Get the input element
    const logoInput = document.getElementById("umkm_image");

    // Get the img element
    const logoImage = document.getElementById("logo_image");

    const showImageSrc = document.getElementById('show_img_src');

    const lastImage = logoImage.src;

    // Add an event listener to the input element to listen for changes
    logoInput.addEventListener("change", function () {
        // Get the selected file
        const selectedFile = logoInput.files[0];

        if (selectedFile) {
            // Create a URL for the selected file
            const imageURL = URL.createObjectURL(selectedFile);

            // Set the src attribute of the img element to the URL
            logoImage.src = imageURL;

            // Display the selected file name in the input field
            showImageSrc.innerHTML = selectedFile.name;
        } else {
            // Clear the img src and input field if no file is selected
            logoImage.src = lastImage;
            logoInput.value = "";
            showImageSrc.innerHTML = "";
        }
    });

    const descriptionInput = document.getElementById('descriptionInput');
    const charCount = document.getElementById('charCount');

    const currentText = descriptionInput.value;
    const charCountValue = currentText.length;
    charCount.textContent = `${charCountValue}`;
    if (charCountValue < 50) {
        charCount.classList.add("text-red-500");
    }

    descriptionInput.addEventListener('input', () => {
        const currentText = descriptionInput.value;
        const charCountValue = currentText.length;
        // Update the character count
        charCount.textContent = `${charCountValue}`;
        if (charCountValue < 50) {
            charCount.classList.add("text-red-500");
        } else if (charCountValue >= 50){
            charCount.classList.remove("text-red-500");
        }
    });
</script>
@endpush
