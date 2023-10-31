@extends('layout.main.index')

@section('pages')
    <div class="flex flex-col items-center justify-center h-[94vh] px-10 bg-white rounded-lg gap-y-6">
        <img src="{{ url('assets/images/welcome.png') }}" alt="">
        <div class="text-[32px] font-bold text-center">
            <p>Selamat Datang di Dashboard UMKM Anda Mantau</p>
            <p>Silahkan pilih tujuan anda</p>
        </div>
    </div>
@endsection
