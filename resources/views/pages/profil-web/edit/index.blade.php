@extends('layout.main.index')

@section('pages')
<form action="#" method="POST" class="flex flex-col gap-y-10">
    <h1 class="text-white text-[30px] font-semibold">Profil Web</h1>
    <div class="p-5 bg-white rounded-xl font-inter">
        <h1 class="text-[24px] font-bold">Profil Toko</h1>
        <table class="w-full my-5 table-fixed">
            <tbody class="text-[18px]">
                <tr>
                    <td class="w-2/5">
                        Logo
                    </td>
                    <td class="py-2">
                        <div class="flex items-end gap-x-5">
                            <img src={{ url(env('BACKEND_URL')) . "/" . $umkmData['umkm_image'] }} class="object-cover w-32 h-32 rounded-md" alt="">
                            <label for="logo" class="bg-[#2D76E5] border border-[#9CD3FF] text-sm font-bold text-white flex items-center py-2 px-4 gap-x-2 rounded-lg">
                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.99955 2L9.54671 1.48705L8.99955 0.903404L8.4524 1.48705L8.99955 2ZM8.24955 12.9717C8.24955 13.3859 8.58534 13.7217 8.99955 13.7217C9.41377 13.7217 9.74955 13.3859 9.74955 12.9717L8.24955 12.9717ZM15.261 7.58242L9.54671 1.48705L8.4524 2.51295L14.1667 8.60832L15.261 7.58242ZM8.4524 1.48705L2.73808 7.58242L3.8324 8.60832L9.54671 2.51295L8.4524 1.48705ZM8.24955 2L8.24955 12.9717L9.74955 12.9717L9.74955 2L8.24955 2Z" fill="white"/>
                                    <path d="M1 14.3428L1 15.5618C1 16.9084 2.02335 18 3.28573 18L14.7144 18C15.9767 18 17.0001 16.9084 17.0001 15.5618V14.3428" stroke="white" stroke-width="1.5"/>
                                </svg>
                                Ganti Logo
                            </label>
                            <input type="file" class="hidden" name="logo" id="logo">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="w-2/5">Nama Toko</td>
                    <td class="py-2">
                        <input type="text" name="nama" value="{{ $umkmData['umkm_name'] }}" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]" placeholder="Ketik Nama Toko">
                    </td>
                </tr>
                <tr>
                    <td class="w-2/5">Alamat Toko</td>
                    <td class="py-2">
                        <input type="text" name="address" value="{{ $umkmData['address'] }}" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]" placeholder="Ketik Nama Toko">
                    </td>
                </tr>
                <tr>
                    <td class="w-2/5">Nomor Telepon</td>
                    <td class="py-2">
                        <input type="text" name="phone_number" value="{{ $umkmData['phone_number'] }}"  class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]" placeholder="Ketik No. Whatsapp">
                    </td>
                </tr>

                <tr>
                    <td class="w-2/5">Email</td>
                    <td class="py-2">
                        <input type="email" name="email" value="{{ $umkmData['umkm_email'] }}" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]" placeholder="Ketik Email">
                    </td>
                </tr>
                <tr>
                    <td class="w-2/5">Instagram</td>
                    <td class="py-2">
                        <input type="text" name="instagram" value="{{ $umkmData['instagram'] }}" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]" placeholder="Ketik Instagram">
                    </td>
                </tr>
                <tr>
                    <td class="w-2/5">WhatsApp</td>
                    <td class="py-2">
                        <input type="text" name="whatsapp" value="{{ $umkmData['whatsapp'] }}"  class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]" placeholder="Ketik No. Whatsapp">
                    </td>
                </tr>
                <tr>
                    <td class="w-2/5">Facebook</td>
                    <td class="py-2">
                        <input type="text" name="facebook" value="{{ $umkmData['facebook'] }}" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]" placeholder="Ketik Facebook">
                    </td>
                </tr>
                <tr>
                    <td class="flex w-2/5">Deskripsi Toko</td>
                    <td class="py-2">
                        <textarea type="text" name="deskripsi_toko" rows="6" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]" placeholder="Ketik deskripsi toko">{{ $umkmData['umkm_description'] }}</textarea>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</form>
@endsection
