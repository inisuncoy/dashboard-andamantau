@extends('layout.main.index')

@section('pages')
<div class="flex flex-col gap-y-10">
  <div>
    <h1 class="text-white text-[30px] font-semibold">Pengeluaran</h1>
    <div class="text-white text-[18px] flex gap-x-2 font-semibold">
      <a href="/pengeluaran">Pengeluaran</a>
      >
      <p>Tambah Pengeluaran</p>
    </div>
  </div>
  <form method="POST" action="/pengeluaran/tambah" class="p-5 bg-white rounded-xl font-inter">
    @csrf
    <h1 class="text-[24px] font-bold">List Pengeluaran</h1>
    <table class="w-full my-5 table-fixed">
      <tbody class="text-[18px]">
        <tr>
          <td class="w-2/6 text-[20px]">Pilih Tanggal</td>
          <td class="py-2">
            <input
                type="date"
                name="date"
                class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2"
                placeholder="YYYY-MM-DD"
                value="{{ old('date') }}"
                >
            @error('date')
            <p class="mt-2 font-bold text-red-500">{{ $message }}</p>
            @enderror
          </td>
        </tr>
        <tr>
          <td class="w-2/6 text-[20px] flex whitespace-nowrap">Deskripsi Pengeluaran</td>
          <td class="py-2">
            <textarea name="notes" id="descriptionInput" maxlength="2000" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2" cols="30" rows="10" placeholder="Deskripsi pengeluaran">{{ old('notes') }}</textarea>
            <p id="charCount" class="text-[14px] -mt-1 text-right">0/2000 kata</p>
            @error('notes')
            <p class="mt-2 font-bold text-red-500">{{ $message }}</p>
            @enderror
          </td>
        </tr>
        <tr>
          <td class="w-2/6 text-[20px]">Total Pengeluaran</td>
          <td class="py-2">
            <input type="number" name="nominal" placeholder="Masukan total penegeluaran"
              class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2"
              value="{{ old('nominal') }}"
              >
              @error('nominal')
              <p class="mt-2 font-bold text-red-500">{{ $message }}</p>
              @enderror
          </td>
        </tr>
      </tbody>
    </table>
    <div class="flex justify-end gap-5">
      <a href="/pengeluaran/selengkapnya" class="py-3 font-bold text-white bg-[#FF0000] rounded-lg px-10">Batal</a>
      <button type="submit" class="py-3 font-bold text-white rounded-lg px-10 bg-[#2D76E5]">Simpan</button>
    </div>
  </form>
</div>
@endsection

@push('js')
<script>
    const descriptionInput = document.getElementById('descriptionInput');
    const charCount = document.getElementById('charCount');

    descriptionInput.addEventListener('input', () => {
        const currentText = descriptionInput.value;
        const charCountValue = currentText.length;

        // Update the character count
        charCount.textContent = `${charCountValue}/2000 kata`;
    });
</script>
@endpush
