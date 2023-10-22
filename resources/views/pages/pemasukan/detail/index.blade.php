@extends('layout.main.index')

@section('pages')
<div class="flex flex-col gap-y-10">
    <div>
        <h1 class="text-white text-[30px] font-semibold">Faktur</h1>
        <div class="text-white text-[18px] flex gap-x-2 font-semibold">
            <a href="/pemasukan">Pemasukan</a>
            >
            <a href="/pemasukan/selengkapnya">Lihat Selengkapnya</a>
            >
            <p>Detail</p>
        </div>
    </div>
    <div class="relative flex flex-col justify-between w-full px-5 py-8 bg-white rounded-xl gap-y-5">
      <div class="flex justify-between">
        <h1 class="text-3xl font-bold">Faktur</h1>
        <div class="flex items-center gap-x-10">
          <svg width="23" height="28" viewBox="0 0 23 28" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="19" cy="4" r="3" fill="white" stroke="black" stroke-width="2"/>
            <circle cx="4" cy="14" r="3" fill="white" stroke="black" stroke-width="2"/>
            <circle cx="19" cy="24" r="3" fill="white" stroke="black" stroke-width="2"/>
            <path d="M16 6L7 12" stroke="black" stroke-width="2"/>
            <path d="M16.0598 22.2719L6.99905 16.3641" stroke="black" stroke-width="2"/>
          </svg>
          <svg width="27" height="32" viewBox="0 0 27 32" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13.4992 20L12.3953 20.9068L13.4992 22.2507L14.6031 20.9068L13.4992 20ZM14.9278 1.99978C14.9278 1.2108 14.2882 0.571211 13.4992 0.571211C12.7102 0.571211 12.0706 1.2108 12.0706 1.99978L14.9278 1.99978ZM4.18101 10.9066L12.3953 20.9068L14.6031 19.0932L6.38881 9.09312L4.18101 10.9066ZM14.6031 20.9068L22.8174 10.9066L20.6096 9.09312L12.3953 19.0932L14.6031 20.9068ZM14.9278 20L14.9278 1.99978L12.0706 1.99978L12.0706 20L14.9278 20Z" fill="black"/>
            <path d="M2 24L2 26C2 28.2092 3.47106 30.0001 5.28571 30.0001L21.7143 30.0001C23.5289 30.0001 25 28.2092 25 26V24" stroke="black" stroke-width="2.85714"/>
          </svg>

        </div>

      </div>
      <div class="flex flex-col gap-y-3">
        <div class="flex">
          <div class="w-[200px]">
            <h1 class="text-2xl">No. Faktur</h1>
          </div>
          <div class="mr-10">
            <h1 class="text-2xl ">:</h1>
          </div>
          <div class="">
            <h1 class="text-2xl font-semibold">{{ $transactionData['order_code'] }}</h1>
          </div>
        </div>
        <div class="flex">
          <div class="w-[200px]">
            <h1 class="text-2xl">Tanggal & Waktu</h1>
          </div>
          <div class="mr-10">
            <h1 class="text-2xl ">:</h1>
          </div>
          <div class="">
            <h1 class="text-2xl ">{{ \Carbon\Carbon::parse($transactionData['transaction_date'] . ' ' . $transactionData['timestamp'])->format('d F Y, H:i') }}</h1>
          </div>
        </div>
      </div>

      <div class="border-t-2 border-gray-200"></div>

      <div class="grid grid-cols-2 gap-x-10">
        <div class="flex flex-col gap-y-5">
          <h1 class="text-2xl font-bold">Tagihan Kepada</h1>
          <div class="flex flex-col gap-y-3">
            <div class="grid grid-cols-9">
              <div class="col-span-3">
                <h1 class="text-2xl">Nama</h1>
              </div>
              <div class="col-span-2">
                <h1 class="text-2xl ">:</h1>
              </div>
              <div class="col-span-4">
                <h1 class="text-2xl ">{{ $transactionData['name_costumer'] }}</h1>
              </div>
            </div>
            <div class="grid grid-cols-9">
              <div class="col-span-3">
                <h1 class="text-2xl">Alamat</h1>
              </div>
              <div class="col-span-2">
                <h1 class="text-2xl ">:</h1>
              </div>
              <div class="col-span-4">
                <h1 class="text-2xl ">{{ $transactionData['address'] }}</h1>
              </div>
            </div>
            <div class="grid grid-cols-9">
              <div class="col-span-3">
                <h1 class="text-2xl">Nomor Telepon</h1>
              </div>
              <div class="col-span-2">
                <h1 class="text-2xl ">:</h1>
              </div>
              <div class="col-span-4">
                <h1 class="text-2xl ">{{ $transactionData['phone_number'] }}</h1>
              </div>
            </div>
            <div class="grid grid-cols-9">
              <div class="col-span-3">
                <h1 class="text-2xl">Email</h1>
              </div>
              <div class="col-span-2">
                <h1 class="text-2xl ">:</h1>
              </div>
              <div class="col-span-4">
                <h1 class="text-2xl ">{{ $transactionData['email_costumer'] }}</h1>
              </div>
            </div>
          </div>
        </div>
        <div class="flex flex-col gap-y-5">
          <h1 class="text-2xl font-bold">Tagihan Kepada</h1>
          <div class="flex flex-col gap-y-3">
            <div class="grid grid-cols-9">
              <div class="col-span-3">
                <h1 class="text-2xl">Metode Pembayaran</h1>
              </div>
              <div class="col-span-2">
                <h1 class="text-2xl text-center">:</h1>
              </div>
              <div class="col-span-4">
                <h1 class="text-2xl uppercase">
                    @foreach ($paymentList as $payment)
                    @if ($payment['id'] == $transactionData['id_payment_type'])
                        {{ $payment['name'] }}
                    @endif
                    @endforeach
                </h1>
              </div>
            </div>
            <div class="grid grid-cols-9">
              <div class="col-span-3">
                <h1 class="text-2xl">Status</h1>
              </div>
              <div class="col-span-2">
                <h1 class="text-2xl text-center">:</h1>
              </div>
              <div class="col-span-4">
                <h1 class="text-2xl ">
                    @if ($transactionData['status'] == 1)
                        Lunas
                    @else
                        Error
                    @endif
                </h1>
              </div>
            </div>
            <div class="grid grid-cols-9">
              <div class="col-span-3">
                <h1 class="text-2xl">Jumlah yang harus dibayar (Rp)</h1>
              </div>
              <div class="col-span-2">
                <h1 class="text-2xl text-center">:</h1>
              </div>
              <div class="col-span-4">
                <h1 class="text-2xl ">@currencyNonRp($transactionData['total'])</h1>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="border-t-2 border-gray-200"></div>

        <div class="flex flex-col gap-y-5">
          <h1 class="text-2xl font-bold">Produk yang dibeli</h1>
          <div >
          <div class="overflow-hidden border-2 border-[#D2E4FF] rounded-t-xl">
            <table class="min-w-full divide-y divide-[#D2E4FF]">
            <thead class="bg-[#D2E4FF] rounded-lg font-inter">
                <tr>
                <th scope="col" class="px-6 py-4 font-semibold text-center rounded-tl-lg text-md">No</th>
                <th scope="col" class="px-6 py-4 font-semibold text-center text-md">Nama Produk</th>
                <th scope="col" class="px-6 py-4 font-semibold text-center text-md">Jumlah</th>
                <th scope="col" class="px-6 py-4 font-semibold text-center text-md ">Harga Satuan (Rp)</th>
                <th scope="col" class="px-6 py-4 font-semibold text-center text-md">Total (Rp)</th>
                <th class="py-4 rounded-tr-lg"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($productList as $index => $product)
                <tr>
                    <td class="px-6 py-5 font-medium text-center text-md">{{ $index + 1 }}</td>
                    <td class="px-6 py-5 text-center text-md">{{ $product['detail_product']['name'] }}</td>
                    <td class="px-6 py-5 text-center text-md">{{ $product['quantity'] }}</td>
                    <td class="px-6 py-5 text-center text-md">@currencyNonRp($product['current_price'])</td>
                    <td class="px-6 py-5 text-center text-md ">@currencyNonRp($product['current_price'] * $product['quantity'])</td>
                </tr>
                @endforeach

                <tr>
                    <td class="px-6 py-5 font-medium text-center text-md"></td>
                    <td class="px-6 py-5 text-center text-md"></td>
                    <td class="px-6 py-5 text-center text-md"></td>
                    <td class="px-6 py-5 text-left text-md">Subtotal (Rp)</td>
                    <td class="px-6 py-5 text-center text-md font-semibold text-[#16E043]">@currencyNonRp($transactionData['total'])</td>
                </tr>
                <tr>
                    <td class="px-6 py-5 font-medium text-center text-md"></td>
                    <td class="px-6 py-5 text-center text-md"></td>
                    <td class="px-6 py-5 text-center text-md"></td>
                    <td class="px-6 py-5 text-left text-md">Biaya Pengiriman (Rp)</td>
                    <td class="px-6 py-5 text-center text-md font-semibold text-[#16E043]">23.000</td>
                </tr>
                <tr>
                    <td class="px-6 py-5 font-medium text-center text-md"></td>
                    <td class="px-6 py-5 text-center text-md"></td>
                    <td class="px-6 py-5 text-center text-md"></td>
                    <td class="px-6 py-5 text-2xl text-left text-md">Biaya Pengiriman (Rp)</td>
                    <td class="px-6 py-5 text-center text-md font-semibold text-[#16E043]">@currencyNonRp($transactionData['total'] + 23000)</td>
                </tr>
            </tbody>
            </table>
        </div>
        <div class="flex justify-end w-full">
          <div class="w-[520px] border-x-2 border-b-2 border-[#D2E4FF] px-10 py-5 flex flex-col gap-y-5">
            <div class="grid grid-cols-4">
              <h1 class="col-span-3">Subtotal (Rp)</h1>
              <h1 class="text-right">@currencyNonRp($transactionData['total'])</h1>
            </div>
            <div class="grid grid-cols-4">
              <h1 class="col-span-3">Biaya Pengiriman (Rp)</h1>
              <h1 class="text-right">23.000</h1>
            </div>
            <div class="grid grid-cols-4 font-bold">
              <h1 class="col-span-3">Total(Rp)</h1>
              <h1 class="text-right">@currencyNonRp($transactionData['total'] + 23000)</h1>
            </div>
          </div>
        </div>
        </div>


        <div class="absolute top-0 flex items-center justify-center w-full h-full">
          <h1 class="text-[200px] opacity-25 text-[#2DCE94] -rotate-45 top-0 select-none">LUNAS</h1>
        </div>
</div>
@endsection
