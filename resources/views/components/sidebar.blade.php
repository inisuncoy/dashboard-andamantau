<div class="fixed top-0 left-0 h-screen p-5">
  <div class="bg-white w-[264px] rounded-lg h-full flex flex-col justify-between">
    <div>
      <div class="flex items-center px-5 pt-5 pb-3 gap-x-5">
        {{-- <img src={{ session('userData')['profile_photo_url'] }} class="w-[50px] h-[50px] rounded-full object-cover" alt=""> --}}
        <div class="text-[#00B9E3] text-[18px] font-bold">
          <h1>Dashboard</h1>
          <p>{{ session('userData')['owner_name'] }}</p>
        </div>
      </div>
      <div class="flex flex-col gap-y-2">
        {{-- Nav Active --}}
        <a href="/" class="flex items-center px-5 py-1 mx-2 gap-x-5 {{ Request::is('/') ? 'bg-[#E2F8FF]' : 'hover:bg-[#E2F8FF]' }}">
          <span>
            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M8.33333 21.266C8.33333 19.0031 8.33333 17.8716 8.79076 16.8771C9.2482 15.8825 10.1073 15.1462 11.8254 13.6735L13.4921 12.2449C16.5976 9.58302 18.1504 8.25208 20 8.25208C21.8496 8.25208 23.4024 9.58302 26.5079 12.2449L28.1746 13.6735C29.8927 15.1462 30.7518 15.8825 31.2092 16.8771C31.6667 17.8716 31.6667 19.0031 31.6667 21.266V28.3334C31.6667 31.476 31.6667 33.0474 30.6904 34.0237C29.714 35 28.1427 35 25 35H15C11.8573 35 10.286 35 9.30964 34.0237C8.33333 33.0474 8.33333 31.476 8.33333 28.3334V21.266Z"
                stroke="#536FDD" stroke-width="3" />
              <path
                d="M24.1667 35V26C24.1667 25.4477 23.7189 25 23.1667 25H16.8333C16.281 25 15.8333 25.4477 15.8333 26V35"
                stroke="#536FDD" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </span>
          <span class="text-[20px] mt-1">Dashboard</span>
        </a>
        <a href="/transaksi" class="flex items-center px-5 py-1 mx-2 gap-x-5 {{ (Request::is('transaksi/*') or Request::is('transaksi')) ? 'bg-[#E2F8FF]' : 'hover:bg-[#E2F8FF]' }}">
          <span>
            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M24.1667 35V26C24.1667 25.4477 23.7189 25 23.1667 25H16.8333C16.281 25 15.8333 25.4477 15.8333 26V35"
                stroke="#73C45F" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
              <path
                d="M8.33333 18.3333V31C8.33333 32.8856 8.33333 33.8284 8.91911 34.4142C9.5049 35 10.4477 35 12.3333 35H27.6667C29.5523 35 30.4951 35 31.0809 34.4142C31.6667 33.8284 31.6667 32.8856 31.6667 31V18.3333"
                stroke="#73C45F" stroke-width="3" />
              <path
                d="M7.9546 6.51493C8.13649 5.78737 8.22744 5.42359 8.4987 5.21179C8.76996 5 9.14493 5 9.89489 5H30.1051C30.8551 5 31.23 5 31.5013 5.21179C31.7726 5.42359 31.8635 5.78737 32.0454 6.51493L34.3787 15.8483C34.6647 16.9922 34.8077 17.5642 34.5074 17.9487C34.2072 18.3333 33.6176 18.3333 32.4384 18.3333H31.7218C30.1035 18.3333 29.2943 18.3333 28.7348 17.8594C28.1753 17.3854 28.0423 16.5873 27.7763 14.9909L27.6973 14.517C27.6222 14.0667 27.5847 13.8416 27.5 13.8416C27.4153 13.8416 27.3778 14.0667 27.3027 14.517L27.1462 15.4564C26.9554 16.601 26.86 17.1733 26.5373 17.5788C26.3742 17.7837 26.1726 17.9545 25.9437 18.0817C25.4907 18.3333 24.9104 18.3333 23.75 18.3333V18.3333C22.5896 18.3333 22.0093 18.3333 21.5563 18.0817C21.3274 17.9545 21.1258 17.7837 20.9627 17.5788C20.64 17.1733 20.5446 16.601 20.3538 15.4564L20.1973 14.517C20.1222 14.0667 20.0847 13.8416 20 13.8416C19.9153 13.8416 19.8778 14.0667 19.8027 14.517L19.6462 15.4564C19.4554 16.601 19.36 17.1733 19.0373 17.5788C18.8742 17.7837 18.6726 17.9545 18.4437 18.0817C17.9907 18.3333 17.4104 18.3333 16.25 18.3333V18.3333C15.0896 18.3333 14.5093 18.3333 14.0563 18.0817C13.8274 17.9545 13.6258 17.7837 13.4627 17.5788C13.14 17.1733 13.0446 16.601 12.8538 15.4564L12.6973 14.517C12.6222 14.0667 12.5847 13.8416 12.5 13.8416C12.4153 13.8416 12.3778 14.0667 12.3027 14.517L12.2237 14.9909C11.9577 16.5873 11.8247 17.3854 11.2652 17.8594C10.7057 18.3333 9.8965 18.3333 8.27816 18.3333H7.56155C6.38242 18.3333 5.79285 18.3333 5.49257 17.9487C5.19229 17.5642 5.33529 16.9922 5.62127 15.8483L7.9546 6.51493Z"
                stroke="#73C45F" stroke-width="3" />
            </svg>
          </span>
          <span class="text-[20px] mt-1">Transaksi</span>
        </a>
        <a href="/profil-toko" class="flex items-center px-5 py-1 mx-2 gap-x-5 {{ (Request::is('profil-toko/*') or Request::is('profil-toko')) ? 'bg-[#E2F8FF]' : 'hover:bg-[#E2F8FF]' }}">
          <span>
            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
              <circle cx="20" cy="20" r="13.3333" stroke="#EE6048" stroke-width="3" />
              <ellipse cx="20" cy="20" rx="5" ry="13.3333" stroke="#EE6048" stroke-width="3" />
              <path d="M6.66667 20H33.3333" stroke="#EE6048" stroke-width="3" stroke-linecap="round" />
            </svg>
          </span>
          <span class="text-[20px] mt-1">Profil Toko</span>
        </a>
        <a href="/produk" class="flex items-center px-5 py-1 mx-2 gap-x-5 {{ (Request::is('produk/*') or Request::is('produk')) ? 'bg-[#E2F8FF]' : 'hover:bg-[#E2F8FF]' }}" >
          <span>
            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M6.66667 6.66663H9.37606C10.1953 6.66663 10.6049 6.66663 10.9456 6.80985C11.246 6.9361 11.5073 7.1401 11.7026 7.40087C11.9242 7.69671 12.0235 8.09409 12.2222 8.88885L12.5249 10.0995C12.6333 10.5331 12.6875 10.7499 12.7568 10.9374C13.2385 12.2411 14.4159 13.1604 15.7975 13.3116C15.9963 13.3333 16.2197 13.3333 16.6667 13.3333V13.3333"
                stroke="#FFDA00" stroke-width="3" stroke-linecap="round" />
              <path
                d="M30 28.3334H12.5848C12.548 28.3334 12.5296 28.3334 12.5155 28.3332C11.2879 28.3143 10.4253 27.1176 10.7957 25.947C10.7999 25.9336 10.8057 25.9161 10.8174 25.8812V25.8812C10.8303 25.8423 10.8368 25.8229 10.8429 25.8054C11.3482 24.3391 12.7214 23.3493 14.2723 23.3336C14.2909 23.3334 14.3114 23.3334 14.3523 23.3334H23.3333"
                stroke="#FFDA00" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
              <path
                d="M23.8011 23.3334H18.2905C16.537 23.3334 15.6602 23.3334 14.9483 23.0164C14.3098 22.7322 13.7658 22.2714 13.3805 21.6883C12.9508 21.0382 12.8067 20.1733 12.5184 18.4437C12.2266 16.6931 12.0808 15.8179 12.3316 15.135C12.5557 14.5252 12.9884 14.0144 13.5531 13.6931C14.1854 13.3334 15.0728 13.3334 16.8475 13.3334H27.4006C30.0596 13.3334 31.3891 13.3334 31.9265 14.2029C32.4638 15.0724 31.8693 16.2615 30.6801 18.6398L30.3602 19.2796C29.374 21.252 28.881 22.2381 27.9949 22.7858C27.1088 23.3334 26.0063 23.3334 23.8011 23.3334Z"
                stroke="#FFDA00" stroke-width="3" stroke-linecap="round" />
              <circle cx="28.3333" cy="33.3333" r="1.66667" fill="#FFDA00" />
              <circle cx="15" cy="33.3333" r="1.66667" fill="#FFDA00" />
            </svg>
          </span>
          <span class="text-[20px] mt-1">Produk/Stok</span>
        </a>
        <a href="/pemasukan" class="flex items-center px-5 py-1 mx-2 gap-x-5 {{ (Request::is('pemasukan/*') or Request::is('pemasukan')) ? 'bg-[#E2F8FF]' : 'hover:bg-[#E2F8FF]' }}" >
            <span>
              <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M35 35H5" stroke="#E94059" stroke-width="3" stroke-linecap="round" />
                <path d="M6.66667 26.6667V23.3334" stroke="#E94059" stroke-width="3" stroke-linecap="round" />
                <path d="M20 20V15" stroke="#E94059" stroke-width="3" stroke-linecap="round" />
                <path d="M13.3333 26.6666V16.6666" stroke="#E94059" stroke-width="3" stroke-linecap="round" />
                <path d="M26.6667 21.6667V18.3334" stroke="#E94059" stroke-width="3" stroke-linecap="round" />
                <path d="M33.3333 25V8.33337" stroke="#E94059" stroke-width="3" stroke-linecap="round" />
              </svg>
            </span>
            <span class="text-[20px] mt-1">Pemasukan</span>
        </a>
        <a href="/pengeluaran" class="flex items-center px-5 py-1 mx-2 gap-x-5 {{ (Request::is('pengeluaran/*') or Request::is('pengeluaran')) ? 'bg-[#E2F8FF]' : 'hover:bg-[#E2F8FF]' }}">
            <span>
              <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M13 28.2572L18.4185 16.736C18.4851 16.5944 18.6898 16.6047 18.7419 16.7523L21.2581 23.8859C21.3102 24.0335 21.5149 24.0438 21.5815 23.9022L27 12.381"
                  stroke="#08A3E1" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                <rect width="30" height="30" rx="0.35" transform="matrix(-1 0 0 1 35 5)" stroke="#08A3E1"
                  stroke-width="3" />
              </svg>
            </span>
            <span class="text-[20px] mt-1">Pengeluaran</span>
        </a>
        <a href="/laporan" class="flex items-center px-5 py-1 mx-2 gap-x-5 {{ (Request::is('laporan/*') or Request::is('laporan')) ? 'bg-[#E2F8FF]' : 'hover:bg-[#E2F8FF]' }}">
            <span>
              <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="8.33301" y="6.66663" width="23.3333" height="28.3333" rx="2" stroke="#872A3F"
                  stroke-width="3" />
                <path d="M15 15H25" stroke="#872A3F" stroke-width="3" stroke-linecap="round" />
                <path d="M15 21.6666H25" stroke="#872A3F" stroke-width="3" stroke-linecap="round" />
                <path d="M15 28.3334H21.6667" stroke="#872A3F" stroke-width="3" stroke-linecap="round" />
              </svg>

            </span>
            <span class="text-[20px] mt-1">Laporan</span>
        </a>
        <a href="/blog" class="flex items-center px-5 py-1 mx-2 gap-x-5 {{ (Request::is('blog/*') or Request::is('blog')) ? 'bg-[#E2F8FF]' : 'hover:bg-[#E2F8FF]' }}">
            <span>
              <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M26.6667 13.3333V13.3333C28.2166 13.3333 28.9916 13.3333 29.6274 13.5037C31.3529 13.966 32.7006 15.3137 33.163 17.0392C33.3333 17.675 33.3333 18.45 33.3333 20V30C33.3333 31.8409 31.841 33.3333 30 33.3333V33.3333C28.1591 33.3333 26.6667 31.8409 26.6667 30V12C26.6667 10.1331 26.6667 9.1997 26.3034 8.48666C25.9838 7.85945 25.4738 7.34952 24.8466 7.02994C24.1336 6.66663 23.2002 6.66663 21.3333 6.66663H12C10.1332 6.66663 9.19974 6.66663 8.4867 7.02994C7.8595 7.34952 7.34956 7.85945 7.02998 8.48666C6.66667 9.1997 6.66667 10.1331 6.66667 12V28C6.66667 29.8668 6.66667 30.8002 7.02998 31.5133C7.34956 32.1405 7.8595 32.6504 8.4867 32.97C9.19974 33.3333 10.1332 33.3333 12 33.3333H30"
                  stroke="#C404D5" stroke-width="3" />
                <path d="M20 13.3334H13.3333V20H20V13.3334Z" stroke="#C404D5" stroke-width="3"
                  stroke-linejoin="round" />
                <path d="M13.3333 26.6666H20" stroke="#C404D5" stroke-width="3" stroke-linecap="round" />
              </svg>
            </span>
            <span class="text-[20px] mt-1">Blog</span>
        </a>
      </div>
    </div>

    <a href="/logout" class="flex items-center px-7 gap-x-5 mb-7">
      <span>
        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M3.33333 20L2.16202 19.0629L1.41239 20L2.16202 20.937L3.33333 20ZM18.3333 21.5C19.1618 21.5 19.8333 20.8284 19.8333 20C19.8333 19.1715 19.1618 18.5 18.3333 18.5V21.5ZM8.82869 10.7296L2.16202 19.0629L4.50463 20.937L11.1713 12.6037L8.82869 10.7296ZM2.16202 20.937L8.82869 29.2703L11.1713 27.3963L4.50463 19.0629L2.16202 20.937ZM3.33333 21.5H18.3333V18.5H3.33333V21.5Z"
            fill="#FF0000" />
          <path
            d="M16.6667 13.5533V10.0552C16.6667 8.43687 16.6667 7.6277 17.1406 7.06821C17.6146 6.50872 18.4128 6.37569 20.0091 6.10964L29.6803 4.49777C32.9234 3.95726 34.5449 3.687 35.6058 4.5857C36.6667 5.48439 36.6667 7.12831 36.6667 10.4161V29.5839C36.6667 32.8718 36.6667 34.5157 35.6058 35.4144C34.5449 36.3131 32.9234 36.0428 29.6803 35.5023L20.0091 33.8904C18.4128 33.6244 17.6146 33.4914 17.1406 32.9319C16.6667 32.3724 16.6667 31.5632 16.6667 29.9449V26.7767"
            stroke="#FF0000" stroke-width="3" />
        </svg>
      </span>
      <span class="text-[#FF0000] text-[20px] font-bold">Keluar</span>
    </a>
  </div>
</div>
