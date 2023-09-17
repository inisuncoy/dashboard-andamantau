@extends('layout.main.index')

@section('pages')
<div class="flex flex-col gap-y-10">
    <div>
        <h1 class="text-white text-[30px] font-semibold">Produk</h1>
        <div class="text-white text-[18px] flex gap-x-2 font-semibold">
            <a href="/transaksi">Produk</a>
            >
            <p>Tambah Produk</p>
        </div>
    </div>

    <div class="bg-white rounded-xl p-5 font-inter">
        <h1 class="text-[24px] font-bold">Informasi Produk</h1>
        <table class="table-fixed w-full my-5">
            <tbody class="text-[18px]">
                <tr>
                    <td class="w-2/6">Nama Produk</td>
                    <td class="py-2">
                        <input type="text" name="nama_produk" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]" placeholder="Contoh: Beras Maknyuss Premium 5kg">
                        <p class="text-[12px] pt-1">Tips: Nama produknya saja</p>
                    </td>
                </tr>
                <tr>
                    <td class="w-2/6">Kategori</td>
                    <td class="py-2">
                        <select type="text" name="kategori" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]">
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
                        <select type="text" name="kategori" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]">
                            <option value="aktif">Aktif</option>
                            <option value="tidak_aktif">Tidak Aktif</option>
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="bg-white rounded-xl p-5 font-inter">
        <h1 class="text-[24px] font-bold">Harga Produk</h1>
        <table class="table-fixed w-full my-5">
            <tbody class="text-[18px]">
                <tr>
                    <td class="w-2/6 pb-5">Harga Satuan</td>
                    <td class="py-2">
                        <div class="flex items-center" dir="rtl">
                            <input type="text" name="nama_produk" class="w-full border-2 border-l-0 border-[#9CD3FF] rounded-s-md py-2 px-2 placeholder:text-[15px]">
                            <div class="bg-[#E4F3FF] py-2 px-3 rounded-l-md border-2 border-r-0 border-[#9CD3FF]">.Rp</div>
                        </div>
                        <p class="text-[12px] pt-1">Tips: Tuliskan harga jual per produk</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
