@extends('layout.main.index')

@section('pages')
<div class="flex flex-col gap-y-10">
  <div class="flex justify-between">
    <h1 class="text-white text-[30px] font-semibold">Blog</h1>
  </div>

  <div>

    <div class="w-full h-[80px] rounded-2xl bg-white flex items-center justify-between px-6">
      <label for="" class="text-2xl"> Tulis Blog</label>
      <a href="/tambah-blog">
        <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M16.0569 7.17754L16.7613 6.46335C17.3845 5.83141 16.9368 4.76117 16.0493 4.76117H1C0.447715 4.76117 0 5.20888 0 5.76117V31C0 31.5523 0.447715 32 0.999999 32H26.7591C27.3114 32 27.7591 31.5523 27.7591 31V16.5721C27.7591 15.6687 26.6561 15.2284 26.034 15.8835L25.4563 16.4917C25.2799 16.6775 25.1815 16.924 25.1815 17.1803V28.1889C25.1815 28.7411 24.7337 29.1889 24.1815 29.1889H3.87505C3.32276 29.1889 2.87505 28.7411 2.87505 28.1889V8.47536C2.87505 7.92307 3.32276 7.47536 3.87505 7.47536H15.3449C15.6125 7.47536 15.869 7.36809 16.0569 7.17754Z"
            fill="black" />
          <path
            d="M31.0494 4.00828C30.6955 1.81091 29.7935 1.15518 27.5972 1.00905C27.2962 0.98903 27.0052 1.11417 26.805 1.33601L13.6139 15.9526C13.5307 16.0448 13.4657 16.1513 13.4223 16.2667L11.7412 20.7283C11.4153 21.5933 12.3636 22.3853 13.1825 21.9321L17.3295 19.6369C17.4275 19.5827 17.5156 19.5128 17.5902 19.4302L30.8105 4.78124C31.0015 4.56963 31.0943 4.28702 31.0494 4.00828Z"
            stroke="black" stroke-width="2" />
        </svg>
      </a>
    </div>

  </div>
  <div class="bg-white rounded-xl p-5 font-inter">
    <h1 class="text-[24px] font-bold">Blog yang kamu terbitkan</h1>

    <div class="mt-10 grid grid-cols-3 w-full gap-3">
      <div class="w-full bg-white shadow-lg p-6">
        <img src={{ url("assets/images/products/Ikan-arwana-1.jpg") }} alt="">
        <h1 class="text-xl font-bold mt-5">Cara Merawat Ikan Mujair</h1>
        <p class="mt-3">Burung nuri, dengan kecantikan warna bulu dan kecerdasan mereka, adalah salah satu jenis burung
          hias yang...
        </p>
        <p class=" text-lg mt-5 font-medium">04 Agustus 2023</p>
        <a href="/edit-blog" class="flex justify-end items-center">
          <h1 class="text-xl text-[#0645AD]">Edit </h1>
          <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12.4624 18L18.3853 12L12.4624 6" stroke="#0645AD" stroke-width="2" />
            <path d="M6.53952 18L12.4624 12L6.53952 6" stroke="#0645AD" stroke-width="2" />
          </svg>
        </a>
      </div>
      <div class="w-full bg-white shadow-lg p-6">
        <img src={{ url("assets/images/products/Ikan-arwana-1.jpg") }} alt="">
        <h1 class="text-xl font-bold mt-5">Cara Merawat Ikan Mujair</h1>
        <p class="mt-3">Burung nuri, dengan kecantikan warna bulu dan kecerdasan mereka, adalah salah satu jenis burung
          hias yang...
        </p>
        <p class=" text-lg mt-5 font-medium">04 Agustus 2023</p>
        <a href="/edit-blog" class="flex justify-end items-center">
          <h1 class="text-xl text-[#0645AD]">Edit </h1>
          <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12.4624 18L18.3853 12L12.4624 6" stroke="#0645AD" stroke-width="2" />
            <path d="M6.53952 18L12.4624 12L6.53952 6" stroke="#0645AD" stroke-width="2" />
          </svg>
        </a>
      </div>
      <div class="w-full bg-white shadow-lg p-6">
        <img src={{ url("assets/images/products/Ikan-arwana-1.jpg") }} alt="">
        <h1 class="text-xl font-bold mt-5">Cara Merawat Ikan Mujair</h1>
        <p class="mt-3">Burung nuri, dengan kecantikan warna bulu dan kecerdasan mereka, adalah salah satu jenis burung
          hias yang...
        </p>
        <p class=" text-lg mt-5 font-medium">04 Agustus 2023</p>
        <a href="/edit-blog" class="flex justify-end items-center">
          <h1 class="text-xl text-[#0645AD]">Edit </h1>
          <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12.4624 18L18.3853 12L12.4624 6" stroke="#0645AD" stroke-width="2" />
            <path d="M6.53952 18L12.4624 12L6.53952 6" stroke="#0645AD" stroke-width="2" />
          </svg>
        </a>
      </div>
      <div class="w-full bg-white shadow-lg p-6">
        <img src={{ url("assets/images/products/Ikan-arwana-1.jpg") }} alt="">
        <h1 class="text-xl font-bold mt-5">Cara Merawat Ikan Mujair</h1>
        <p class="mt-3">Burung nuri, dengan kecantikan warna bulu dan kecerdasan mereka, adalah salah satu jenis burung
          hias yang...
        </p>
        <p class=" text-lg mt-5 font-medium">04 Agustus 2023</p>
        <a href="/edit-blog" class="flex justify-end items-center">
          <h1 class="text-xl text-[#0645AD]">Edit </h1>
          <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12.4624 18L18.3853 12L12.4624 6" stroke="#0645AD" stroke-width="2" />
            <path d="M6.53952 18L12.4624 12L6.53952 6" stroke="#0645AD" stroke-width="2" />
          </svg>
        </a>
      </div>
      <div class="w-full bg-white shadow-lg p-6">
        <img src={{ url("assets/images/products/Ikan-arwana-1.jpg") }} alt="">
        <h1 class="text-xl font-bold mt-5">Cara Merawat Ikan Mujair</h1>
        <p class="mt-3">Burung nuri, dengan kecantikan warna bulu dan kecerdasan mereka, adalah salah satu jenis burung
          hias yang...
        </p>
        <p class=" text-lg mt-5 font-medium">04 Agustus 2023</p>
        <a href="/edit-blog" class="flex justify-end items-center">
          <h1 class="text-xl text-[#0645AD]">Edit </h1>
          <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12.4624 18L18.3853 12L12.4624 6" stroke="#0645AD" stroke-width="2" />
            <path d="M6.53952 18L12.4624 12L6.53952 6" stroke="#0645AD" stroke-width="2" />
          </svg>
        </a>
      </div>
      <div class="w-full bg-white shadow-lg p-6">
        <img src={{ url("assets/images/products/Ikan-arwana-1.jpg") }} alt="">
        <h1 class="text-xl font-bold mt-5">Cara Merawat Ikan Mujair</h1>
        <p class="mt-3">Burung nuri, dengan kecantikan warna bulu dan kecerdasan mereka, adalah salah satu jenis burung
          hias yang...
        </p>
        <p class=" text-lg mt-5 font-medium">04 Agustus 2023</p>
        <a href="/edit-blog" class="flex justify-end items-center">
          <h1 class="text-xl text-[#0645AD]">Edit </h1>
          <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12.4624 18L18.3853 12L12.4624 6" stroke="#0645AD" stroke-width="2" />
            <path d="M6.53952 18L12.4624 12L6.53952 6" stroke="#0645AD" stroke-width="2" />
          </svg>
        </a>
      </div>
    </div>
  </div>
</div>
@endsection