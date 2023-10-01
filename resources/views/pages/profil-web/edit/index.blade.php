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
                    <td class="flex w-2/5 text-[20px]">
                        Logo
                    </td>
                    <td class="py-2">
                        <div class="flex items-end gap-x-7">
                            <img src={{ url(env('BACKEND_URL')) . "/" . $umkmData['umkm_image'] }} id="logo_image" class="object-cover w-32 h-32 rounded-md" alt="">
                            <div class="flex flex-col gap-y-2">
                                <p class="text-[#00000080]" id="show_img_src"></p>
                                <div class="flex">
                                    <label for="umkm_image" class="bg-[#2D76E5] border cursor-pointer border-[#9CD3FF] text-sm font-bold text-white flex items-center py-2 px-4 gap-x-2 rounded-lg">
                                        <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.99955 2L9.54671 1.48705L8.99955 0.903404L8.4524 1.48705L8.99955 2ZM8.24955 12.9717C8.24955 13.3859 8.58534 13.7217 8.99955 13.7217C9.41377 13.7217 9.74955 13.3859 9.74955 12.9717L8.24955 12.9717ZM15.261 7.58242L9.54671 1.48705L8.4524 2.51295L14.1667 8.60832L15.261 7.58242ZM8.4524 1.48705L2.73808 7.58242L3.8324 8.60832L9.54671 2.51295L8.4524 1.48705ZM8.24955 2L8.24955 12.9717L9.74955 12.9717L9.74955 2L8.24955 2Z" fill="white"/>
                                            <path d="M1 14.3428L1 15.5618C1 16.9084 2.02335 18 3.28573 18L14.7144 18C15.9767 18 17.0001 16.9084 17.0001 15.5618V14.3428" stroke="white" stroke-width="1.5"/>
                                        </svg>
                                        Ganti Logo
                                    </label>
                                    <input type="file" class="hidden" name="file" id="umkm_image">
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="w-2/5 text-[20px]">Nama Toko</td>
                    <td class="py-2">
                        <input type="text" name="umkm_name" value="{{ $umkmData['umkm_name'] }}" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]" placeholder="Contoh : Contoh Contoh">
                    </td>
                </tr>
                <tr>
                    <td class="w-2/5 text-[20px]">Alamat Toko</td>
                    <td class="py-2">
                        <input type="text" name="address" value="{{ $umkmData['address'] }}" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]" placeholder="Contoh : Jl. Contoh No. 00">
                    </td>
                </tr>
                <tr>
                    <td class="w-2/5 text-[20px]">Kota</td>
                    <td class="py-2">
                        <input type="text" name="kota" value="{{ $umkmCity }}" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]" placeholder="Contoh : Jakarta Selatan">
                    </td>
                </tr>
                <tr>
                    <td class="w-2/5 text-[20px]">Kecamatan</td>
                    <td class="py-2">
                        <input type="text" name="kecamatan" value="{{ $umkmData['kecamatan'] }}" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]" placeholder="Contoh : purwantoro">
                    </td>
                </tr>
                <tr>
                    <td class="w-2/5 text-[20px]">Kelurahan</td>
                    <td class="py-2">
                        <input type="text" name="kelurahan" value="{{ $umkmData['kelurahan'] }}" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]" placeholder="Contoh : blimbing">
                    </td>
                </tr>
                <tr>
                    <td class="w-2/5 text-[20px]">Kode Pos</td>
                    <td class="py-2">
                        <input type="text" name="kode_pos" value="{{ $umkmData['kode_pos'] }}" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]" placeholder="Contoh : 000000">
                    </td>
                </tr>
                <tr>
                    <td class="w-2/5 text-[20px]">Nomor Telepon</td>
                    <td class="py-2">
                        <input type="text" name="phone_number" value="{{ $umkmData['phone_number'] }}"  class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]" placeholder="Contoh : 0812345678921">
                    </td>
                </tr>

                <tr>
                    <td class="w-2/5 text-[20px]">Email</td>
                    <td class="py-2">
                        <input type="email" name="email" value="{{ $umkmData['umkm_email'] }}" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]" placeholder="Contoh : contoh@gmail.com">
                    </td>
                </tr>
                <tr>
                    <td class="w-2/5 text-[20px]">Instagram</td>
                    <td class="py-2">
                        <input type="text" name="instagram" value="{{ $umkmData['instagram'] }}" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]" placeholder="Contoh : @contoh.com">
                    </td>
                </tr>
                <tr>
                    <td class="w-2/5 text-[20px]">WhatsApp</td>
                    <td class="py-2">
                        <input type="text" name="whatsapp" value="{{ $umkmData['whatsapp'] }}"  class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]" placeholder="Contoh : 088844445555">
                    </td>
                </tr>
                <tr>
                    <td class="w-2/5 text-[20px]">Facebook</td>
                    <td class="py-2">
                        <input type="text" name="facebook" value="{{ $umkmData['facebook'] }}" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]" placeholder="Contoh : Contoh_toko">
                    </td>
                </tr>
                <tr>
                    <td class="flex w-2/5 text-[20px]">Deskripsi Toko</td>
                    <td class="py-2">
                        <textarea type="text" name="umkm_description" rows="6" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]" placeholder="Isi deskripsi toko mu">{{ $umkmData['umkm_description'] }}</textarea>
                    </td>
                </tr>
                <tr>
                    <td class="flex w-2/5"></td>
                    <td class="py-2">
                        <div class="flex float-right gap-x-5">
                            <a href="/profil-toko" class="bg-[#FF0000] py-3 w-[160px] text-center text-white rounded-lg font-bold">Batal</a>
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
</script>
@endpush
