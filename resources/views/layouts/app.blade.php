<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Space Tourism')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@400;700&family=Bellefair&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @yield('styles')
</head>
<body class="min-h-screen bg-[#0B0D17] text-white font-barlow">

    <!-- Background responsive (spécifique à chaque page) -->
    @yield('background')

    <!-- Header -->
    <header class="flex items-center justify-between p-6 md:p-10 lg:pt-10 lg:pl-14">
        <!-- Logo -->
        <div class="w-10 h-10 md:w-12 md:h-12">
            <a href="/">
                <img src="{{ asset('assets/shared/logo.svg') }}" alt="Space Tourism Logo" class="w-full h-full">
            </a>
        </div>

        <!-- Navigation Desktop/Tablet -->
        <nav class="hidden md:flex bg-white/10 backdrop-blur-2xl px-12 lg:px-32">
            <ul class="flex gap-8 lg:gap-12 text-sm tracking-widest">
                <li>
                    <a href="/" class="block py-8 border-b-2 {{ request()->is('/') ? 'border-white font-bold' : 'border-transparent hover:border-white/50' }} transition">
                        <span class="font-bold mr-2">00</span>HOME
                    </a>
                </li>
                <li>
                    <a href="/destination" class="block py-8 border-b-2 {{ request()->is('destination') ? 'border-white font-bold' : 'border-transparent hover:border-white/50' }} transition">
                        <span class="font-bold mr-2">01</span>DESTINATION
                    </a>
                </li>
                <li>
                    <a href="/crew" class="block py-8 border-b-2 {{ request()->is('crew') ? 'border-white font-bold' : 'border-transparent hover:border-white/50' }} transition">
                        <span class="font-bold mr-2">02</span>CREW
                    </a>
                </li>
                <li>
                    <a href="/technology" class="block py-8 border-b-2 {{ request()->is('technology') ? 'border-white font-bold' : 'border-transparent hover:border-white/50' }} transition">
                        <span class="font-bold mr-2">03</span>TECHNOLOGY
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Hamburger Menu Mobile -->
        <button class="md:hidden w-6 h-6">
            <img src="{{ asset('assets/shared/icon-hamburger.svg') }}" alt="Menu" class="w-full h-full">
        </button>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    @yield('scripts')
</body>
</html>
