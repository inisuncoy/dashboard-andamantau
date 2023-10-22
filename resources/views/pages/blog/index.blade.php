@extends('layout.main.index')

@section('pages')
<div class="flex flex-col gap-y-10">
    <div class="flex justify-between">
        <h1 class="text-white text-[30px] font-semibold">Berita</h1>
    </div>
    <div>
        <a href="/blog/tambah" class="w-full h-[80px] rounded-2xl bg-white flex items-center justify-between px-6">
            <label for="" class="text-2xl font-bold">Tulis Berita</label>
            <div>
                <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M16.0569 7.17754L16.7613 6.46335C17.3845 5.83141 16.9368 4.76117 16.0493 4.76117H1C0.447715 4.76117 0 5.20888 0 5.76117V31C0 31.5523 0.447715 32 0.999999 32H26.7591C27.3114 32 27.7591 31.5523 27.7591 31V16.5721C27.7591 15.6687 26.6561 15.2284 26.034 15.8835L25.4563 16.4917C25.2799 16.6775 25.1815 16.924 25.1815 17.1803V28.1889C25.1815 28.7411 24.7337 29.1889 24.1815 29.1889H3.87505C3.32276 29.1889 2.87505 28.7411 2.87505 28.1889V8.47536C2.87505 7.92307 3.32276 7.47536 3.87505 7.47536H15.3449C15.6125 7.47536 15.869 7.36809 16.0569 7.17754Z"
                    fill="black" />
                <path
                    d="M31.0494 4.00828C30.6955 1.81091 29.7935 1.15518 27.5972 1.00905C27.2962 0.98903 27.0052 1.11417 26.805 1.33601L13.6139 15.9526C13.5307 16.0448 13.4657 16.1513 13.4223 16.2667L11.7412 20.7283C11.4153 21.5933 12.3636 22.3853 13.1825 21.9321L17.3295 19.6369C17.4275 19.5827 17.5156 19.5128 17.5902 19.4302L30.8105 4.78124C31.0015 4.56963 31.0943 4.28702 31.0494 4.00828Z"
                    stroke="black" stroke-width="2" />
                </svg>
            </div>
        </a>
    </div>
    <div class="p-5 bg-white rounded-xl font-inter">
        <h1 class="text-[24px] font-bold">Berita yang kamu terbitkan</h1>
        <div class="grid w-full grid-cols-3 gap-3 mt-10">
            @foreach ($newsDatas as $news)
            <a href="/blog/{{ $news['id'] }}/edit">
                <div class="flex flex-col justify-between w-full h-full p-6 bg-white shadow-lg">
                    <div>
                        @if ($news['image'])
                        <img src={{ url(config('backend.backend_url') . "/" . $news['image'])  }} onerror="this.onerror=null;this.src='assets/images/default-placeholder.png';" class="object-cover w-full h-60" alt="">
                        @else
                        <img src={{ url('assets/images/default-placeholder.ong') }} alt="">
                        @endif
                        <h1 class="mt-5 text-xl font-bold line-clamp-1">{{ $news['title'] }}</h1>
                        <p class="mt-3 line-clamp-3">
                            {{ $news['content'] }}
                        </p>
                    </div>
                    <div class="flex items-center justify-between mt-5">
                        <p class="text-lg font-medium ">{{ ($news['created_at']) ? \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $news['created_at'])->translatedFormat('d F Y') : 'undefined'  }}</p>
                        <div class="flex items-center">
                            <h1 class="text-xl text-[#0645AD]">Ubah</h1>
                            <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.4624 18L18.3853 12L12.4624 6" stroke="#0645AD" stroke-width="2" />
                                <path d="M6.53952 18L12.4624 12L6.53952 6" stroke="#0645AD" stroke-width="2" />
                            </svg>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        <div class="mt-16 pagination">
            {{ $newsDatas->onEachSide(1)->links('pagination::tailwind') }}
        </div>
    </div>
</div>
@endsection
