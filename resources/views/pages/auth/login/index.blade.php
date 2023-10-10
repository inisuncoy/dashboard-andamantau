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
                <h1 class="text-[45px] font-bold">Selamat Datang!</h1>
                <form method="POST" action="/login" class="flex flex-col gap-y-5 w-[458px]">
                    @error('message')
                    <div class="px-5 py-3 text-[17px] bg-red-200 border-2 border-red-400 rounded-lg">
                        Email / Password anda Salah! Silahkan coba lagi
                    </div>
                    @enderror
                    @csrf
                    <div class="flex flex-col gap-y-1">
                        <label for="email" class="text-[22px] ml-5">Email</label>
                        <input type="email" placeholder="Masukkan Email" value="{{ old('email') }}" name="email" class="w-[458px] h-[54px] border-[#000000] border rounded-xl text-[20px] py-2 px-3">
                    </div>
                    <div class="flex flex-col gap-y-1">
                        <label for="password" class="text-[22px] ml-5">Kata Sandi</label>
                        <div class="relative">
                            <input type="password" id="passwordInput" placeholder="Masukkan Kata Sandi" name="password" class="w-[458px] h-[54px] border-[#000000] border rounded-xl text-[20px] py-2 px-3">
                            {{-- Button Show --}}
                            <button type="button" class="absolute right-5 top-[17px]" id="showPasswordButton1" onclick="togglePasswordVisibility('passwordInput', 'showPasswordButton1', 'hidePasswordButton1')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-[#BAB9B9] hover:fill-black" height="24" viewBox="0 -960 960 960" width="24"><path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z"/></svg>
                            </button>
                            {{-- Button Hide --}}
                            <button type="button" class="absolute right-5 top-[17px] hidden" id="hidePasswordButton1" onclick="togglePasswordVisibility('passwordInput', 'showPasswordButton1', 'hidePasswordButton1')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-[#BAB9B9] hover:fill-black" height="24" viewBox="0 -960 960 960" width="24"><path d="m644-428-58-58q9-47-27-88t-93-32l-58-58q17-8 34.5-12t37.5-4q75 0 127.5 52.5T660-500q0 20-4 37.5T644-428Zm128 126-58-56q38-29 67.5-63.5T832-500q-50-101-143.5-160.5T480-720q-29 0-57 4t-55 12l-62-62q41-17 84-25.5t90-8.5q151 0 269 83.5T920-500q-23 59-60.5 109.5T772-302Zm20 246L624-222q-35 11-70.5 16.5T480-200q-151 0-269-83.5T40-500q21-53 53-98.5t73-81.5L56-792l56-56 736 736-56 56ZM222-624q-29 26-53 57t-41 67q50 101 143.5 160.5T480-280q20 0 39-2.5t39-5.5l-36-38q-11 3-21 4.5t-21 1.5q-75 0-127.5-52.5T300-500q0-11 1.5-21t4.5-21l-84-82Zm319 93Zm-151 75Z"/></svg>
                            </button>
                        </div>
                        <div class="text-[20px] flex gap-x-2 mt-1 mx-5">
                            <p>Lupa Kata Sandi?</p>
                            <a href="/lupa-sandi" class="text-[#6366F1] underline">Lupa Sandi</a>
                        </div>
                    </div>
                    <div class="flex justify-center mt-10">
                        <button type="submit" class="bg-[#2D76E5] py-3 px-24 rounded-lg text-white text-[18px] font-bold">Masuk</button>
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
    <script>
        function togglePasswordVisibility(inputId, showButtonId, hideButtonId) {
        const inputElement = document.getElementById(inputId);
        const showButton = document.getElementById(showButtonId);
        const hideButton = document.getElementById(hideButtonId);

        // Toggle the input type between "password" and "text"
        if (inputElement.type === 'password') {
            inputElement.type = 'text';
        } else {
            inputElement.type = 'password';
        }

        // Toggle the button visibility
        showButton.style.display = inputElement.type === 'password' ? 'block' : 'none';
        hideButton.style.display = inputElement.type === 'password' ? 'none' : 'block';
    }
    </script>
</body>
</html>
