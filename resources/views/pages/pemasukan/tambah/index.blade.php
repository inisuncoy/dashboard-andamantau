@extends('layout.main.index')

@section('pages')
<div class="flex flex-col gap-y-10">
  <div>
    <h1 class="text-white text-[30px] font-semibold">Pemasukan</h1>
    <div class="text-white text-[18px] flex gap-x-2 font-semibold">
      <a href="/pemasukan/selengkapnya" class="loadButton">Pemasukan</a>
      >
      <p>Tambah Pemasukan</p>
    </div>
  </div>
  <form method="POST" action="/pemasukan/tambah" class="p-5 bg-white rounded-xl font-inter">
    @csrf
    <h1 class="text-[24px] font-bold">List Pemasukan</h1>
    <table class="w-full my-5 table-fixed">
      <tbody class="text-[18px]">
        <tr>
            <td class="w-2/6">
                Tipe Pemasukan
                <span data-tooltip-target="tipe-tooltip" data-tooltip-style="light" data-tooltip-placement="right" class="after:content-['*'] after:ml-2 after:text-red-500"></span>
                <div id="tipe-tooltip" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
                    Wajib memilih salah satu
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </td>
            <td class="py-2">
                <select type="text" name="id_income_type" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2 @error('id_income_type') border-red-500 @enderror">
                    @foreach ($paymentTypes as $paymentType)

                        <option value={{$paymentType['id']}} {{ (old('status') == $paymentType['id'] ? "selected" : "" ) }}>{{ $paymentType['name'] }}</option>
                    @endforeach
                </select>
                @error('id_income_type')
                <p class="mt-2 font-bold text-red-500">{{ $message }}</p>
                @enderror
            </td>
        </tr>

        <tr>
          <td class="w-2/6 text-[20px]">
            Pilih Tanggal
            <span data-tooltip-target="tanggal-tooltip" data-tooltip-style="light" data-tooltip-placement="right" class="after:content-['*'] after:ml-2 after:text-red-500"></span>
                <div id="tanggal-tooltip" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
                    Wajib diisi
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </td>
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
          <td class="w-2/6 text-[20px] flex whitespace-nowrap">
            Deskripsi Pemasukan
            <span data-tooltip-target="deskripsi-tooltip" data-tooltip-style="light" data-tooltip-placement="right" class="after:content-['*'] after:ml-2 after:text-red-500"></span>
                <div id="deskripsi-tooltip" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
                    Wajib diisi
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </td>
          <td class="py-2">
            <textarea name="notes" id="descriptionInput" maxlength="2000" class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2" cols="30" rows="10" placeholder="Deskripsi pemasukan">{{ old('notes') }}</textarea>
            <div class="">
                <p id="charCount" class="text-[14px] -mt-1 text-right">0/2000 huruf</p>
                @error('notes')
                <p class="-mt-4 font-bold text-red-500">{{ $message }}</p>
                @enderror
            </div>

          </td>
        </tr>
        <tr>
          <td class="w-2/6 text-[20px]">
            Total Pemasukan
            <span data-tooltip-target="total-tooltip" data-tooltip-style="light" data-tooltip-placement="right" class="after:content-['*'] after:ml-2 after:text-red-500"></span>
                <div id="total-tooltip" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
                    Wajib diisi
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
        </td>
          <td class="py-2">
            <input type="text" name="hidden_nominal" id="nominal" placeholder="Masukan total pemasukan"
              class="w-full border-2 border-[#9CD3FF] rounded-md py-2 px-2"
              value="{{ old('nominal') }}"
              >
              <input type="hidden" id="hidden_nominal" name="nominal">
              @error('nominal')
              <p class="mt-2 font-bold text-red-500">{{ $message }}</p>
              @enderror
          </td>
        </tr>
      </tbody>
    </table>
    <div class="flex justify-end gap-5">
      <a href="/pemasukan/selengkapnya" class="py-3 font-bold text-white loadButton bg-[#FF0000] rounded-lg px-10">Batal</a>
      <button type="submit" class="py-3 font-bold text-white rounded-lg px-10 bg-[#2D76E5] loadButton">Simpan</button>
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
        charCount.textContent = `${charCountValue}/2000 huruf`;
    });
</script>
<script>
    function formatRupiah(angka, prefix) {
      var number_string = angka.replace(/[^,\d]/g, '').toString(),
          split = number_string.split(','),
          sisa = split[0].length % 3,
          rupiah = split[0].substr(0, sisa),
          ribuan = split[0].substr(sisa).match(/\d{3}/gi);

      if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }
      return rupiah ? "Rp. " + rupiah : '';
    }

    function setupRupiahFormatting(inputId, hiddenInputId) {
        var input = document.getElementById(inputId);
        var hiddenInput = document.getElementById(hiddenInputId);

        function updateValue() {
            var formattedValue = formatRupiah(input.value);
            input.value = formattedValue;
            hiddenInput.value = input.value.replace(/[^\d]/g, '');
        }

        // Panggil fungsi updateValue saat halaman dimuat
        updateValue();

        input.addEventListener('input', updateValue);
    }


    setupRupiahFormatting('nominal', 'hidden_nominal');
</script>
@endpush
