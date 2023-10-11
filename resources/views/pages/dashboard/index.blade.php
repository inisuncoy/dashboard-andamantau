@extends('layout.main.index')

@push('scripts')
@vite(['resources/js/dashboardLineChartMonth.js', 'resources/js/dashboardLineChartWeek.js' ,'resources/js/dashboardBarChart.js'])
@endpush

@section('pages')
<div class="flex flex-col gap-y-10">
  <h1 class="text-white text-[30px] font-semibold">Dashboard</h1>
  <div class="grid grid-cols-4 gap-x-10">
    <div class="flex flex-col p-5 bg-white rounded-xl gap-y-3">
      <div class="flex justify-between">
        <div class="">
          <h4 class="text-[20px] font-bold font-inter">Pengeluaran</h4>
          <h1 class="text-[30px] font-[500]">Rp @currencyNonRp($pengeluaran['current_month_expenses'])</h1>
        </div>
        <div class="">
          <div class="bg-[#E1455D] rounded-full p-2">
            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M10 12.5L10 20" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M15 15V20" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M20 10V20" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              <rect x="3.75" y="5" width="22.5" height="20" rx="2" stroke="white" stroke-width="2" />
            </svg>
          </div>
        </div>
      </div>
      <div class="flex items-center gap-x-2">
        <div class="flex items-end">
          @if ($pengeluaran['percentage_change'] > 0)
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M12 6L12.7071 5.29289L12 4.58579L11.2929 5.29289L12 6ZM11 18C11 18.5523 11.4477 19 12 19C12.5523 19 13 18.5523 13 18L11 18ZM16.7071 9.29289L12.7071 5.29289L11.2929 6.70711L15.2929 10.7071L16.7071 9.29289ZM11.2929 5.29289L7.29289 9.29289L8.70711 10.7071L12.7071 6.70711L11.2929 5.29289ZM11 6L11 18L13 18L13 6L11 6Z"
              fill="#16E043" />
          </svg>
          <span class="font-inter text-[#16E043] text-[14px] font-bold">{{ number_format($pengeluaran['percentage_change'], 2) }}%</span>
          @elseif ($pengeluaran['percentage_change'] < 0)
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M12 18L12.7071 18.7071L12 19.4142L11.2929 18.7071L12 18ZM11 6C11 5.44772 11.4477 5 12 5C12.5523 5 13 5.44771 13 6L11 6ZM16.7071 14.7071L12.7071 18.7071L11.2929 17.2929L15.2929 13.2929L16.7071 14.7071ZM11.2929 18.7071L7.29289 14.7071L8.70711 13.2929L12.7071 17.2929L11.2929 18.7071ZM11 18L11 6L13 6L13 18L11 18Z"
              fill="#FF0000" />
          </svg>
          <span class="font-inter text-[#FF0000] text-[14px] font-bold">{{ number_format(abs($pengeluaran['percentage_change']), 2) }}%</span>
          @else
          <span class="font-inter text-[#00000080] text-[14px] font-bold">Tidak ada perubahan</span>
          @endif

        </div>
        <p class="font-inter text-[14px] mt-0.5">Sejak bulan lalu</p>
      </div>
    </div>
    <div class="flex flex-col p-5 bg-white rounded-xl gap-y-3">
      <div class="flex justify-between">
        <div class="">
          <h4 class="text-[20px] font-bold font-inter">Laba Bersih</h4>
          <h1 class="text-[30px] font-[500]">Rp @currencyNonRp($labaBersih['laba_bersih_bulan_ini'])</h1>
        </div>
        <div class="">
          <div class="bg-[#E76D48] rounded-full p-2">
            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
              <circle cx="10" cy="10" r="3" stroke="white" stroke-width="1.5" stroke-linecap="round" />
              <path
                d="M14.8182 10.6875C15.1331 10.142 15.6519 9.74395 16.2603 9.58093C16.8687 9.4179 17.517 9.50325 18.0625 9.81819C18.608 10.1331 19.006 10.6519 19.1691 11.2603C19.3321 11.8687 19.2468 12.517 18.9318 13.0625C18.6169 13.608 18.0981 14.006 17.4897 14.1691C16.8813 14.3321 16.233 14.2468 15.6875 13.9318C15.142 13.6169 14.744 13.0981 14.5809 12.4897C14.4179 11.8813 14.5032 11.233 14.8182 10.6875L14.8182 10.6875Z"
                stroke="white" stroke-width="1.5" />
              <path
                d="M16.7933 22.1315L17.5365 22.0308L16.7933 22.1315ZM15.875 22.375H4.12502V23.875H15.875V22.375ZM3.94993 22.2322C4.08077 21.2668 4.4284 19.7823 5.32317 18.5556C6.18951 17.3678 7.59821 16.375 10 16.375V14.875C7.09575 14.875 5.24598 16.1159 4.11128 17.6716C3.005 19.1884 2.60902 20.9572 2.46352 22.0308L3.94993 22.2322ZM10 16.375C12.4018 16.375 13.8105 17.3678 14.6769 18.5556C15.5716 19.7823 15.9193 21.2668 16.0501 22.2322L17.5365 22.0308C17.391 20.9572 16.995 19.1884 15.8888 17.6716C14.7541 16.1159 12.9043 14.875 10 14.875V16.375ZM4.12502 22.375C4.0521 22.375 4.00236 22.3462 3.97645 22.3188C3.96372 22.3053 3.95671 22.2923 3.953 22.2812C3.94963 22.271 3.94673 22.2558 3.94993 22.2322L2.46352 22.0308C2.32066 23.0849 3.1777 23.875 4.12502 23.875V22.375ZM15.875 23.875C16.8223 23.875 17.6794 23.0849 17.5365 22.0308L16.0501 22.2322C16.0533 22.2558 16.0504 22.271 16.047 22.2812C16.0433 22.2923 16.0363 22.3053 16.0236 22.3188C15.9977 22.3462 15.9479 22.375 15.875 22.375V23.875Z"
                fill="white" />
              <path
                d="M21.6849 22.0394L22.4164 21.8738L21.6849 22.0394ZM14.7504 17.476L14.3486 16.8427L13.5758 17.3331L14.2085 17.9944L14.7504 17.476ZM16.7933 22.1315L16.0501 22.2322V22.2322L16.7933 22.1315ZM20.77 22.375H15.875V23.875H20.77V22.375ZM20.9534 22.2049C20.9596 22.2327 20.9576 22.2513 20.9542 22.2641C20.9506 22.2781 20.9431 22.2939 20.9292 22.31C20.9013 22.3426 20.8481 22.375 20.77 22.375V23.875C21.7854 23.875 22.6654 22.9744 22.4164 21.8738L20.9534 22.2049ZM16.8751 17.625C18.1702 17.625 19.0662 18.2868 19.7199 19.2172C20.3881 20.1681 20.7598 21.3495 20.9534 22.2049L22.4164 21.8738C22.2049 20.9394 21.779 19.5385 20.9472 18.3548C20.101 17.1505 18.7946 16.125 16.8751 16.125V17.625ZM15.1523 18.1092C15.62 17.8124 16.182 17.625 16.8751 17.625V16.125C15.8908 16.125 15.051 16.397 14.3486 16.8427L15.1523 18.1092ZM14.2085 17.9944C15.4515 19.2938 15.897 21.1029 16.0501 22.2322L17.5365 22.0308C17.3688 20.7936 16.8642 18.6006 15.2924 16.9575L14.2085 17.9944ZM16.0501 22.2322C16.0533 22.2558 16.0504 22.271 16.047 22.2812C16.0433 22.2923 16.0363 22.3053 16.0236 22.3188C15.9977 22.3462 15.9479 22.375 15.875 22.375V23.875C16.8223 23.875 17.6794 23.0849 17.5365 22.0308L16.0501 22.2322Z"
                fill="white" />
              <rect x="19.25" y="5.25" width="4.5" height="0.5" rx="0.25" stroke="white" stroke-width="0.5"
                stroke-linecap="round" />
              <rect x="21.75" y="3.25" width="4.5" height="0.5" rx="0.25" transform="rotate(90 21.75 3.25)"
                stroke="white" stroke-width="0.5" stroke-linecap="round" />
            </svg>
          </div>
        </div>
      </div>
      <div class="flex items-center gap-x-2">
        <div class="flex items-end">
            @if ($labaBersih['percentage_change'] > 0)
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M12 6L12.7071 5.29289L12 4.58579L11.2929 5.29289L12 6ZM11 18C11 18.5523 11.4477 19 12 19C12.5523 19 13 18.5523 13 18L11 18ZM16.7071 9.29289L12.7071 5.29289L11.2929 6.70711L15.2929 10.7071L16.7071 9.29289ZM11.2929 5.29289L7.29289 9.29289L8.70711 10.7071L12.7071 6.70711L11.2929 5.29289ZM11 6L11 18L13 18L13 6L11 6Z"
                fill="#16E043" />
            </svg>
            <span class="font-inter text-[#16E043] text-[14px] font-bold">{{ number_format($labaBersih['percentage_change'], 2) }}%</span>
            @elseif ($labaBersih['percentage_change'] < 0)
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M12 18L12.7071 18.7071L12 19.4142L11.2929 18.7071L12 18ZM11 6C11 5.44772 11.4477 5 12 5C12.5523 5 13 5.44771 13 6L11 6ZM16.7071 14.7071L12.7071 18.7071L11.2929 17.2929L15.2929 13.2929L16.7071 14.7071ZM11.2929 18.7071L7.29289 14.7071L8.70711 13.2929L12.7071 17.2929L11.2929 18.7071ZM11 18L11 6L13 6L13 18L11 18Z"
                fill="#FF0000" />
            </svg>
            <span class="font-inter text-[#FF0000] text-[14px] font-bold">{{ number_format(abs($labaBersih['percentage_change']), 2) }}%</span>
            @else
            <span class="font-inter text-[#00000080] text-[14px] font-bold">Tidak ada perubahan</span>
            @endif
        </div>
        <p class="font-inter text-[14px] mt-0.5">Sejak bulan lalu</p>
      </div>
    </div>
    <div class="flex flex-col p-5 bg-white rounded-xl gap-y-3">
      <div class="flex justify-between">
        <div class="">
          <h4 class="text-[20px] font-bold font-inter">Pesanan Baru</h4>
          <h1 class="text-[30px] font-[500]">{{ $pesananBaru['total_pesanan_baru_bulan_ini'] }} Barang</h1>
        </div>
        <div class="">
          <div class="bg-[#F5AE49] rounded-full p-2">
            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M5 5H7.03204C7.30428 5 7.4404 5 7.56114 5.01612C8.21896 5.10393 8.77797 5.54039 9.0227 6.15727C9.06763 6.2705 9.10064 6.40256 9.16667 6.66667L9.39366 7.57464C9.75001 9.00004 11.0307 10 12.5 10V10"
                stroke="white" stroke-width="2" stroke-linecap="round" />
              <path
                d="M22.5 21.25H9.43863C8.4849 21.25 7.81145 20.3156 8.11305 19.4109V19.4109C8.49343 18.2697 9.56135 17.5 10.7642 17.5H17.5"
                stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              <path
                d="M17.6185 17.5H13.7179C13.1406 17.5 12.852 17.5 12.6002 17.4649C11.1963 17.2694 10.0308 16.2821 9.60712 14.9294C9.53114 14.6868 9.48369 14.4021 9.38879 13.8327C9.29289 13.2574 9.24495 12.9697 9.24631 12.7341C9.25403 11.4018 10.2156 10.2667 11.5285 10.0401C11.7606 10 12.0523 10 12.6356 10H20.2463C21.8246 10 22.6137 10 23.0882 10.3337C23.498 10.6219 23.7721 11.0653 23.8466 11.5607C23.9328 12.1344 23.5799 12.8402 22.8741 14.2519C22.283 15.4341 21.9874 16.0252 21.5458 16.4565C21.1595 16.8338 20.6946 17.1211 20.1843 17.2979C19.6011 17.5 18.9402 17.5 17.6185 17.5Z"
                stroke="white" stroke-width="2" stroke-linecap="round" />
              <ellipse cx="21.25" cy="25" rx="1.25" ry="1.25" fill="white" />
              <ellipse cx="11.25" cy="25" rx="1.25" ry="1.25" fill="white" />
            </svg>
          </div>
        </div>
      </div>
      <div class="flex items-center gap-x-2">
        <div class="flex items-end">
            @if ($pesananBaru['persentage_change'] > 0)
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M12 6L12.7071 5.29289L12 4.58579L11.2929 5.29289L12 6ZM11 18C11 18.5523 11.4477 19 12 19C12.5523 19 13 18.5523 13 18L11 18ZM16.7071 9.29289L12.7071 5.29289L11.2929 6.70711L15.2929 10.7071L16.7071 9.29289ZM11.2929 5.29289L7.29289 9.29289L8.70711 10.7071L12.7071 6.70711L11.2929 5.29289ZM11 6L11 18L13 18L13 6L11 6Z"
                fill="#16E043" />
            </svg>
            <span class="font-inter text-[#16E043] text-[14px] font-bold">{{ number_format($pesananBaru['persentage_change'], 2) }}%</span>
            @elseif ($pesananBaru['persentage_change'] < 0)
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M12 18L12.7071 18.7071L12 19.4142L11.2929 18.7071L12 18ZM11 6C11 5.44772 11.4477 5 12 5C12.5523 5 13 5.44771 13 6L11 6ZM16.7071 14.7071L12.7071 18.7071L11.2929 17.2929L15.2929 13.2929L16.7071 14.7071ZM11.2929 18.7071L7.29289 14.7071L8.70711 13.2929L12.7071 17.2929L11.2929 18.7071ZM11 18L11 6L13 6L13 18L11 18Z"
                fill="#FF0000" />
            </svg>
            <span class="font-inter text-[#FF0000] text-[14px] font-bold">{{ number_format(abs($pesananBaru['persentage_change']), 2) }}%</span>
            @else
            <span class="font-inter text-[#00000080] text-[14px] font-bold">Tidak ada perubahan</span>
            @endif
        </div>
        <p class="font-inter text-[14px] mt-0.5">Sejak bulan lalu</p>
      </div>
    </div>
    <div class="flex flex-col p-5 bg-white rounded-xl gap-y-3">
      <div class="flex justify-between">
        <div class="">
          <h4 class="text-[20px] font-bold font-inter">Terjual</h4>
          <h1 class="text-[30px] font-[500]">{{ $barangTerjual['total_terjual_barang_bulan_ini'] }} Barang</h1>
        </div>
        <div class="">
          <div class="bg-[#56CAF3] rounded-full p-2">
            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M15.773 4.58113L23.6327 6.67704C24.0704 6.79378 24.375 7.19023 24.375 7.64328V16.1639C24.375 18.17 23.3724 20.0434 21.7032 21.1562L15.5547 25.2552C15.2188 25.4791 14.7812 25.4791 14.4453 25.2552L8.2968 21.1562C6.62761 20.0434 5.625 18.17 5.625 16.1639V7.64328C5.625 7.19023 5.92958 6.79378 6.36734 6.67704L14.227 4.58113C14.7335 4.44607 15.2665 4.44607 15.773 4.58113Z"
                stroke="white" stroke-width="2" stroke-linecap="round" />
              <path d="M11.875 14.375L14.1982 16.6982C14.2959 16.7959 14.4541 16.7959 14.5518 16.6982L18.75 12.5"
                stroke="white" stroke-width="2" stroke-linecap="round" />
            </svg>
          </div>
        </div>
      </div>
      <div class="flex items-center gap-x-2">
        <div class="flex items-end">
            @if ($barangTerjual['percentage_change'] > 0)
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M12 6L12.7071 5.29289L12 4.58579L11.2929 5.29289L12 6ZM11 18C11 18.5523 11.4477 19 12 19C12.5523 19 13 18.5523 13 18L11 18ZM16.7071 9.29289L12.7071 5.29289L11.2929 6.70711L15.2929 10.7071L16.7071 9.29289ZM11.2929 5.29289L7.29289 9.29289L8.70711 10.7071L12.7071 6.70711L11.2929 5.29289ZM11 6L11 18L13 18L13 6L11 6Z"
                fill="#16E043" />
            </svg>
            <span class="font-inter text-[#16E043] text-[14px] font-bold">{{ number_format($barangTerjual['percentage_change'], 2) }}%</span>
            @elseif ($barangTerjual['percentage_change'] < 0)
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M12 18L12.7071 18.7071L12 19.4142L11.2929 18.7071L12 18ZM11 6C11 5.44772 11.4477 5 12 5C12.5523 5 13 5.44771 13 6L11 6ZM16.7071 14.7071L12.7071 18.7071L11.2929 17.2929L15.2929 13.2929L16.7071 14.7071ZM11.2929 18.7071L7.29289 14.7071L8.70711 13.2929L12.7071 17.2929L11.2929 18.7071ZM11 18L11 6L13 6L13 18L11 18Z"
                fill="#FF0000" />
            </svg>
            <span class="font-inter text-[#FF0000] text-[14px] font-bold">{{ number_format(abs($barangTerjual['percentage_change']), 2) }}%</span>
            @else
            <span class="font-inter text-[#00000080] text-[14px] font-bold">Tidak ada perubahan</span>
            @endif
        </div>
        <p class="font-inter text-[14px] mt-0.5">Sejak bulan lalu</p>
      </div>
    </div>
  </div>
  <div class="bg-[#F7F8FD] rounded-xl grid grid-cols-5 gap-5 p-5">
    <div class="col-span-3 border-2 border-blue-500 px-[10px] py-[20px] h-[600px] rounded-2xl text-center relative flex flex-col justify-between" id="monthContainer">
        <div class="absolute right-3">
            <button class="px-5 py-2 font-medium text-blue-500 border-2 border-blue-500 rounded-full" onclick="showWeek()">Minggu</button>
            <button class="px-5 py-2 font-medium text-white bg-blue-500 rounded-full" onclick="showMonth()">Bulan</button>
        </div>
        <canvas id="dashboardLineChartMonth"></canvas>
    </div>

    <div class="col-span-3 hidden border-2 border-blue-500 px-[10px] py-[20px] h-[600px] rounded-2xl text-center relative flex-col justify-between" id="weekContainer">
        <div class="absolute right-3">
            <button class="px-5 py-2 font-medium text-white bg-blue-500 rounded-full" onclick="showWeek()">Minggu</button>
            <button class="px-5 py-2 font-medium text-blue-500 border-2 border-blue-500 rounded-full" onclick="showMonth()">Bulan</button>
        </div>
        <canvas id="dashboardLineChartWeek"></canvas>
    </div>
    <div class="col-span-2 border-2 border-blue-500 px-[10px] pb-[10px] h-[600px] rounded-2xl text-center flex flex-col justify-between relative">
        <canvas id="dashboardBarChart" class="w-full mt-5"></canvas>
    </div>
    <div class="col-span-3">
      <table class="w-full bg-white table-auto font-inter rounded-xl">
        <thead>
          <tr class="text-[15px]">
            <th class="pt-5 pb-2 font-bold text-left pl-7">Nama Produk</th>
            <th class="px-5 pt-5 pb-2 pl-5 font-bold">Stok</th>
            <th class="pt-5 pb-2 font-bold">Harga</th>
            <th class="pt-5 pb-2 font-bold">SKU</th>
            <th class="pt-5 pb-2 font-bold">Status</th>
            <th class="pt-5 pb-2 font-bold">Opsi Lain</th>
          </tr>
        </thead>
        <tbody class="text-[14px]">
          <tr class="text-center">
            <td class="flex items-center py-2 pl-5 gap-x-5">
              <img src={{ url("assets/images/products/Ikan-arwana-1.jpg") }} class="object-cover w-10 h-10 rounded-full"
                alt="">
              <p class="font-bold">Ayam Cemani</p>
            </td>
            <td class="text-[#6366F1]">10</td>
            <td>1.000.000</td>
            <td>TWG01</td>
            <td class="text-[#16E043]">Aktif</td>
            <td>...</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col-span-2 bg-white rounded-xl">
      <table class="w-full table-fixed font-inter">
        <thead>
          <tr class="text-[15px]">
            <th class="pt-5 pb-5 pl-5 text-left">Item Terpopuler</th>
            <th>Total Penjualan(per unit)</th>
          </tr>
        </thead>
        <tbody class="text-[14px]">
          <tr>
            <td class="py-2 pl-5">1. Burung Jalak Bali</td>
            <td class="text-center">30</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

@push('js')
<script>
    const chartDataPendapatanPerBulanSatuTahun = @json($pendapatanPerBulanSatuTahun);
    const chartDataPendapatanPerHariSatuMinggu = @json($pendapatanPerHariSatuMinggu);
    const chartDataPeningkatanPesananPerBulanSatuTahun = @json($peningkatanPesananPerBulanSatuTahun);

    function showMonth() {
        document.getElementById('monthContainer').style.display = 'block';
        document.getElementById('weekContainer').style.display = 'none';
    }

    function showWeek() {
        document.getElementById('monthContainer').style.display = 'none';
        document.getElementById('weekContainer').style.display = 'block';
    }

</script>
@endpush
