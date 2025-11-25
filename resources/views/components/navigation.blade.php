<header class="container mx-auto px-6 py-6 md:py-8 flex items-center justify-between">
    <!-- Logo -->
    <div class="flex items-center">
        <a href="{{ route('home') }}" class="text-white text-2xl font-bellefair">
            <svg class="w-10 h-10 md:w-12 md:h-12" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="24" cy="24" r="24" fill="white"/>
                <circle cx="24" cy="24" r="19" fill="#0B0D17"/>
            </svg>
        </a>
    </div>

    <!-- Desktop Navigation -->
    <nav class="hidden md:flex items-center gap-8 lg:gap-12 bg-white/5 backdrop-blur-lg px-8 lg:px-16 py-8">
        <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-white border-white' : 'text-[#D0D6F9] border-transparent hover:border-white/50' }} text-sm tracking-widest uppercase font-barlow pb-2 border-b-2 transition">
            <span class="font-bold mr-2">00</span> {{ __('nav.home') }}
        </a>
        <a href="{{ route('destination') }}" class="{{ request()->routeIs('destination') ? 'text-white border-white' : 'text-[#D0D6F9] border-transparent hover:border-white/50' }} text-sm tracking-widest uppercase font-barlow pb-2 border-b-2 transition">
            <span class="font-bold mr-2">01</span> {{ __('nav.destination') }}
        </a>
        <a href="{{ route('crew') }}" class="{{ request()->routeIs('crew') ? 'text-white border-white' : 'text-[#D0D6F9] border-transparent hover:border-white/50' }} text-sm tracking-widest uppercase font-barlow pb-2 border-b-2 transition">
            <span class="font-bold mr-2">02</span> {{ __('nav.crew') }}
        </a>
        <a href="{{ route('technology') }}" class="{{ request()->routeIs('technology') ? 'text-white border-white' : 'text-[#D0D6F9] border-transparent hover:border-white/50' }} text-sm tracking-widest uppercase font-barlow pb-2 border-b-2 transition">
            <span class="font-bold mr-2">03</span> {{ __('nav.technology') }}
        </a>

        <!-- Language Switcher -->
        <div class="flex items-center gap-2 ml-4">
            <a href="{{ route('language.switch', 'fr') }}" class="{{ app()->getLocale() == 'fr' ? 'text-white' : 'text-[#D0D6F9] hover:text-white' }} text-sm font-barlow transition">
                FR
            </a>
            <span class="text-[#D0D6F9]">|</span>
            <a href="{{ route('language.switch', 'en') }}" class="{{ app()->getLocale() == 'en' ? 'text-white' : 'text-[#D0D6F9] hover:text-white' }} text-sm font-barlow transition">
                EN
            </a>
        </div>
    </nav>

    <!-- Mobile Menu Button -->
    <button id="mobile-menu-button" class="md:hidden text-white focus:outline-none">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
    </button>
</header>

<!-- Mobile Navigation -->
<nav id="mobile-menu" class="hidden md:hidden fixed inset-y-0 right-0 w-64 bg-white/10 backdrop-blur-lg z-50 p-8">
    <button id="mobile-menu-close" class="absolute top-6 right-6 text-white">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </button>

    <div class="mt-16 flex flex-col gap-6">
        <a href="{{ route('home') }}" class="text-white text-base tracking-widest uppercase font-barlow">
            <span class="font-bold mr-3">00</span> {{ __('nav.home') }}
        </a>
        <a href="{{ route('destination') }}" class="text-white text-base tracking-widest uppercase font-barlow">
            <span class="font-bold mr-3">01</span> {{ __('nav.destination') }}
        </a>
        <a href="{{ route('crew') }}" class="text-white text-base tracking-widest uppercase font-barlow">
            <span class="font-bold mr-3">02</span> {{ __('nav.crew') }}
        </a>
        <a href="{{ route('technology') }}" class="text-white text-base tracking-widest uppercase font-barlow">
            <span class="font-bold mr-3">03</span> {{ __('nav.technology') }}
        </a>

        <!-- Language Switcher -->
        <div class="flex items-center gap-3 mt-4 pt-4 border-t border-white/20">
            <a href="{{ route('language.switch', 'fr') }}" class="{{ app()->getLocale() == 'fr' ? 'text-white' : 'text-[#D0D6F9]' }} text-sm font-barlow">
                FR
            </a>
            <span class="text-[#D0D6F9]">|</span>
            <a href="{{ route('language.switch', 'en') }}" class="{{ app()->getLocale() == 'en' ? 'text-white' : 'text-[#D0D6F9]' }} text-sm font-barlow">
                EN
            </a>
        </div>
    </div>
</nav>

<script>
    // Mobile menu toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileMenuClose = document.getElementById('mobile-menu-close');

    mobileMenuButton?.addEventListener('click', () => {
        mobileMenu?.classList.remove('hidden');
    });

    mobileMenuClose?.addEventListener('click', () => {
        mobileMenu?.classList.add('hidden');
    });
</script>
