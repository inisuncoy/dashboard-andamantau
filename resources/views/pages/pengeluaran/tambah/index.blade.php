@extends('layout.main.index')

@section('pages')
<div class="flex flex-col gap-y-10">
  <div>
    <h1 class="text-white text-[30px] font-semibold">Pengeluaran</h1>
    <div class="text-white text-[18px] flex gap-x-2 font-semibold">
      <a href="/penegeluaran">Pengeluaran</a>
      >
      <p>Tambah Pengeluaran</p>
    </div>
  </div>
  <form class="bg-white rounded-xl p-5 font-inter">
    <h1 class="text-[24px] font-bold">List Pengeluaran</h1>
    <table class="table-fixed w-full my-5">
      <tbody class="text-[18px]">
        <tr>
          <td class="w-2/6">Pilih Tanggal</td>
          <td class="py-2">
            <input type="date" name="tanggal"
              class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]"
              placeholder="Contoh: Beras Maknyuss Premium 5kg">
          </td>
        </tr>
        <tr>
          <td class="w-2/6">Jenis Pengeluaran</td>
          <td class="py-2">
            <input type="text" name="jenis_penegeluaran" placeholder="Masukan jenis penegeluaran"
              class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]">
          </td>
        </tr>
        <tr>
          <td class="w-2/6">Total Pengeluaran</td>
          <td class="py-2">
            <input type="number" name="total" placeholder="Masukan total penegeluaran"
              class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 placeholder:text-[15px]">
          </td>
        </tr>
      </tbody>
    </table>
    <div class="flex justify-end gap-5">
      <a href="/pengeluaran" class="px-7 py-3 bg-red-500 rounded-lg text-white">Cancel</a>
      <button class="px-7 py-3 bg-blue-500 rounded-lg text-white">Submit</button>
    </div>
  </form>
</div>
@endsection