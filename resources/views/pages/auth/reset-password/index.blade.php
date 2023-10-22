<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="overflow-hidden">
    <div class="w-full h-screen px-20 py-10 ">
        <div class="relative flex flex-col justify-between w-full h-full bg-white rounded-lg">
            <div class="flex flex-col items-center justify-center h-full gap-y-8">
                <h1 class="text-[45px] font-bold">Atur Ulang Password</h1>
                <form method="POST" action="/reset-password" class="flex flex-col gap-y-5">
                    @csrf
                    <div class="flex flex-col gap-y-1">
                        <label for="password" class="text-[22px] ml-5">Kata Sandi Baru</label>
                        <input type="password" name="password" placeholder="Masukkan Kata Sandi Baru"  class="w-[458px] h-[54px] border-[#000000] border rounded-xl text-[20px] py-2 px-3">
                    </div><div class="flex flex-col gap-y-1">
                        <label for="password" class="text-[22px] ml-5">Konfirmasi Kata Sandi</label>
                        <input type="password" name="password_confirmation" placeholder="Masukkan Konfirmasi Kata Sandi" class="w-[458px] h-[54px] border-[#000000] border rounded-xl text-[20px] py-2 px-3">
                    </div>
                    <div class="flex justify-center mt-5">
                        <button type="submit" class="bg-[#2D76E5] py-3 px-24 rounded-lg text-white text-[18px] font-bold">Ubah</button>
                    </div>
                </form>
            </div>
            <div class="flex items-center pb-5 pl-10 gap-x-5">
                <h1 class="text-[23px]">Powered by</h1>
                <div class="flex items-center gap-x-5">
                    <img src="{{ url('assets/images/bsi.png') }}" alt="">
                    <img src="{{ url('assets/images/andamantau.png') }}" alt="">
                    <img src="{{ url('assets/images/binus.png') }}" alt="">
                </div>
            </div>
        </div>
        <div class="absolute top-[80px] left-[140px]">
            <img src="{{ url('assets/images/sun.png') }}" class="" alt="">
        </div>
        <div class="absolute -bottom-[59px] -right-[20px]">
            <img src="{{ url('assets/images/hero.png') }}" alt="">
        </div>
    </div>

    @include('sweetalert::alert')
</body>
</html>
