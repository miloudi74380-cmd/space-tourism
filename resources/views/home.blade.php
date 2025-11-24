@extends('layouts.app')

@section('title', 'Space Tourism - Home')

@section('background')
    <!-- Background responsive -->
    <div class="fixed inset-0 -z-10 bg-cover bg-center bg-no-repeat"
         style="background-image: url('{{ asset('assets/home/background-home-mobile.jpg') }}');">
    </div>
@endsection

@section('styles')
    <style>
        @media (min-width: 768px) {
            body > div:first-of-type {
                background-image: url('{{ asset('assets/home/background-home-tablet.jpg') }}') !important;
            }
        }
        @media (min-width: 1024px) {
            body > div:first-of-type {
                background-image: url('{{ asset('assets/home/background-home-desktop.jpg') }}') !important;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container mx-auto px-6 py-12 md:py-20 lg:py-32 flex flex-col lg:flex-row lg:items-end lg:justify-between min-h-[calc(100vh-120px)]">

        <!-- Left Section - Text Content -->
        <div class="text-center lg:text-left lg:max-w-md space-y-4 md:space-y-6">
            <h2 class="text-[#D0D6F9] text-base md:text-xl lg:text-2xl tracking-widest uppercase font-barlow">
                So, you want to travel to
            </h2>

            <h1 class="text-white text-7xl md:text-9xl lg:text-[150px] uppercase font-bellefair leading-none">
                Space
            </h1>

            <p class="text-[#D0D6F9] text-base md:text-lg leading-relaxed font-barlow">
                Let's face it; if you want to go to space, you might as well genuinely go to
                outer space and not hover kind of on the edge of it. Well sit back, and relax
                because we'll give you a truly out of this world experience!
            </p>
        </div>

        <!-- Right Section - Explore Button -->
        <div class="flex justify-center lg:justify-end mt-20 lg:mt-0">
            <a href="/destination"
               class="relative flex items-center justify-center w-36 h-36 md:w-60 md:h-60 lg:w-72 lg:h-72
                      bg-white rounded-full text-[#0B0D17] text-xl md:text-3xl uppercase font-bellefair
                      transition-all duration-500 hover:shadow-[0_0_0_4rem_rgba(255,255,255,0.15)]">
                Explore
            </a>
        </div>

    </div>
@endsection
