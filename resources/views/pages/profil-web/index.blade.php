@extends('layout.main.index')

@section('pages')
<form action="#" method="POST" class="flex flex-col gap-y-10">
    <h1 class="text-white text-[30px] font-semibold">Profil Toko</h1>
    <div class="px-5 pt-10 pb-5 bg-white rounded-xl font-inter">
        <div class="flex justify-center pb-5 mx-auto">
            <img src={{ url(config('backend.backend_url') . "/" . $umkmData['umkm_image'])  }} onerror="this.onerror=null;this.src='assets/images/default-placeholder.png';" class="object-cover rounded-lg w-[284px] h-[284px]" alt="">
        </div>
        <div class="w-full p-5 border-[#9CD3FF] border-[2px] rounded-[5px] flex flex-col gap-y-5">
            <div class="">
                <h1 class="text-[22px] pb-1 font-bold">{{ $umkmData['umkm_name'] }}</h1>
                <div class="flex gap-x-6">
                    <p class="mr-5">Alamat</p>
                    <p @if (empty($umkmData['address'])) class="italic" @endif>: {{ (!$umkmData['address']) ? ' Not yet set' : $umkmData['address'] }}</p>
                </div>
                <div class="flex gap-x-6">
                    <p>Kode Pos</p>
                    <p @if (empty($umkmData['kode_pos'])) class="italic" @endif>: {{ (!$umkmData['kode_pos']) ? ' Not yet set' : $umkmData['kode_pos'] }}</p>
                </div>
                <div class="flex gap-x-6">
                    <p class="mr-[11px]">No. Telp</p>
                    <p @if (empty($umkmData['whatsapp'])) class="italic" @endif>: {{ (!$umkmData['whatsapp']) ? ' Not yet set' : $umkmData['whatsapp'] }}</p>
                </div>
                <div class="flex gap-x-6">
                    <p class="mr-[30px]">Email</p>
                    <p @if (empty($umkmData['umkm_email'])) class="italic" @endif>: {{ (!$umkmData['umkm_email']) ? ' Not yet set' : $umkmData['umkm_email'] }}</p>
                </div>
            </div>
            <div>
                <h1 class="text-[22px] pb-1 font-bold">Media Sosial</h1>
                <div class="flex gap-x-6">
                    <p class="mr-[3px]">Instagram</p>
                    <p>:  {{ $umkmData['instagram'] }}</p>
                </div>
                <div class="flex gap-x-6">
                    <p>WhatsApp</p>
                    <p>: {{ $umkmData['whatsapp'] }}</p>
                </div>
                <div class="flex gap-x-6">
                    <p class="mr-[4px]">Facebook</p>
                    <p>: {{ $umkmData['facebook'] }}</p>
                </div>
            </div>
            <div>
                <h1 class="text-[22px] pb-1 font-bold">Deskripsi</h1>
                <p>{{ $umkmData['umkm_description'] }}</p>
            </div>
            <div class="mt-10 ml-auto">
                <a href="/profil-toko/edit" class="bg-[#2D76E5] border-[#9CD3FF] border text-white text-lg py-3 px-8 rounded-[10px] font-bold">Ubah Profil</a>
            </div>
        </div>
    </div>
</form>
@endsection
