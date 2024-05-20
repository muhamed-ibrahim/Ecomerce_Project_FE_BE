<div class="min-h-screen flex flex-col sm:justify-start items-center pt-6 sm:pt-0 bg-transparent"
    style=" background-size: cover; background-image: url('{{ asset('images/arrival-bg.png') }}');">
    {{-- <div>
        {{ $logo }}
    </div> --}}
    <div class="mt-10">
        <img width="250" src="images/logo.png" alt="#" />
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
