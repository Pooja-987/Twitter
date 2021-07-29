<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->
    <title>@yield('title', 'Twitter')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" data-turbolinks-track="true" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    @livewireStyles

</head>

<body>
    <div id="app">
        <section class="px-8 py-4 mb-3">
            <header class="container mx-auto flex justify-between">
                <div class="flex"> <img src="/images/download.png" class="ml-2 mr-2" style="height:30px" alt="Twitter">
                    <h2 class="text-xl text-gray-800">Twitter</h2>
                </div>
                @if(auth()->check())
                <div>
                    <a href="{{route('profile',auth()->user())}}" class="flex items-center text-sm ">

                        <img class="rounded-full border border-pink-500 mr-2 text-sm"
                            src="{{auth()->user()->getAvatar()}}" alt="" style="height:40px; width:40px">

                        <h2 class="text-gray-700 text-xl hover:text-pink-500">{{auth()->user()->username}}</h2>
                    </a>
                </div>
                @endif

            </header>
        </section>

        <hr class="my-4 border border-pink-100">



        {{ $slot }}
    </div>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
        data-turbolinks-eval="false"></script>
</body>

</html>