<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="flex h-screen">
        <div class="w-[912px] flex flex-col items-center justify-center gap-y-5">
            <h1 class="text-white font-normal text-[60px]">Dashboard Umkm</h1>
            <img src={{ url("assets/images/login-page.png") }} class="w-[380px] h-[380px] object-cover" alt="">
        </div>
        <div class="grow bg-white p-10 flex flex-col gap-y-14">
            <h1 class="text-[60px]">Selamat Datang</h1>
            <div class="flex flex-col gap-y-5">
                <div class="flex flex-col gap-y-2">
                    <label for="email" class="text-[20px] pl-2">Email</label>
                    <input type="email" name="email" class="border-2 border-black py-4 px-3 rounded-xl" placeholder="Alamat Email">
                </div>
                <div class="flex flex-col gap-y-2">
                    <label for="password" class="text-[20px] pl-2">Kata Sandi</label>
                    <input type="password" name="kata_sandi" class="border-2 border-black py-4 px-3 rounded-xl" placeholder="Kata Sandi">
                </div>
            </div>
            <div class="flex flex-col gap-y-5">
                <button class="bg-[#2D76E5] text-white text-[25px] py-3 rounded-lg font-bold">Masuk</button>
                <p class="text-right text-[18px]">Lupa Kata Sandi?</p>
            </div>
        </div>
    </div>
</body>
</html>
