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
                <h1 class="text-[45px] font-bold">Verifikasi OTP</h1>
                <p class="text-[20px]">Masukkan OTP yang dikirim melalui email {{ session('obfuscated_email') }}</p>
                @error('message')
                <p class="text-lg font-bold text-center text-red-500">{{ $message }}</p>
                @enderror
                <div class="flex flex-col gap-y-5">
                    <form method="POST" action="/lupa-sandi/verifikasi-otp"  class="flex flex-col items-center gap-y-1">
                        @csrf
                        <div id="inputs" class="flex gap-x-5">
                            <input class="text-[30px] text-center w-16 py-5 border border-black rounded-lg" type="text" name="tokenOTP1"
                                inputmode="numeric" maxlength="1" />
                            <input class="text-[30px] text-center w-16 py-5 border border-black rounded-lg" type="text" name="tokenOTP2"
                                inputmode="numeric" maxlength="1" />
                            <input class="text-[30px] text-center w-16 py-5 border border-black rounded-lg" type="text" name="tokenOTP3"
                                inputmode="numeric" maxlength="1" />
                            <input class="text-[30px] text-center w-16 py-5 border border-black rounded-lg" type="text" name="tokenOTP4"
                                inputmode="numeric" maxlength="1" />
                            <input class="text-[30px] text-center w-16 py-5 border border-black rounded-lg" type="text" name="tokenOTP5"
                                inputmode="numeric" maxlength="1" />
                            <input class="text-[30px] text-center w-16 py-5 border border-black rounded-lg" type="text" name="tokenOTP6"
                                inputmode="numeric" maxlength="1" />
                        </div>
                        <div class="flex justify-center mt-10">
                            <button type="submit" class="bg-[#2D76E5] py-3 px-24 rounded-lg text-white text-[18px] font-bold">Verifikasi</button>
                        </div>
                    </form>

                    <div class="text-[20px] flex gap-x-2 mt-1 mx-5">
                        <p>Tidak mendapatkan OTP?</p>
                        <form action="/lupa-sandi" method="POST" style="display: inline;">
                            @csrf
                            <input type="hidden" name="email" value="{{ session('email') }}">
                            <button type="submit" class="text-[#6366F1] underline" style="border: none; background: none;">Kirim Ulang OTP</button>
                        </form>
                    </div>
                    <a href="/login" class="text-[#6366F1] underline text-[20px] text-center">Kembali ke Login</a>
                </div>
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

    <script>
        const inputs = document.getElementById("inputs");

        inputs.addEventListener("input", function (e) {
            const target = e.target;
            const val = target.value;

            if (isNaN(val)) {
                target.value = "";
                return;
            }

            if (val != "") {
                const next = target.nextElementSibling;
                if (next) {
                    next.focus();
                }
            }
        });

        inputs.addEventListener("keyup", function (e) {
            const target = e.target;
            const key = e.key.toLowerCase();

            if (key == "backspace" || key == "delete") {
                target.value = "";
                const prev = target.previousElementSibling;
                if (prev) {
                    prev.focus();
                }
                return;
            }
        });
    </script>
</body>
</html>