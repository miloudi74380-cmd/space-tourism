@extends('layouts.app')

@section('title', 'Space Tourism - Crew')

@section('background')
    <!-- Background responsive -->
    <div class="fixed inset-0 -z-10 bg-cover bg-center bg-no-repeat"
         style="background-image: url('{{ asset('assets/crew/background-crew-mobile.jpg') }}');">
    </div>
@endsection

@section('styles')
    <style>
        @media (min-width: 768px) {
            body > div:first-of-type {
                background-image: url('{{ asset('assets/crew/background-crew-tablet.jpg') }}') !important;
            }
        }
        @media (min-width: 1024px) {
            body > div:first-of-type {
                background-image: url('{{ asset('assets/crew/background-crew-desktop.jpg') }}') !important;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container mx-auto px-6 py-6 md:py-10 lg:py-16">

        <!-- Page Title -->
        <h2 class="text-white text-base md:text-xl lg:text-2xl tracking-widest uppercase font-barlow text-center md:text-left">
            <span class="text-white/25 font-bold mr-4">02</span>Meet your crew
        </h2>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 mt-8 md:mt-16 lg:mt-20 items-center">

            <!-- Left Section - Crew Info -->
            <div class="space-y-6 md:space-y-8 order-2 lg:order-1">

                <!-- Role -->
                <h3 id="crew-role" class="text-white/50 text-base md:text-2xl lg:text-3xl uppercase font-bellefair text-center lg:text-left">
                    Commander
                </h3>

                <!-- Name -->
                <h1 id="crew-name" class="text-white text-2xl md:text-4xl lg:text-5xl uppercase font-bellefair text-center lg:text-left">
                    Douglas Hurley
                </h1>

                <!-- Bio -->
                <p id="crew-bio" class="text-[#D0D6F9] text-base md:text-lg leading-relaxed font-barlow text-center lg:text-left">
                    Douglas Gerald Hurley is an American engineer, former Marine Corps pilot
                    and former NASA astronaut. He launched into space for the third time as
                    commander of Crew Dragon Demo-2.
                </p>

                <!-- Dots Navigation -->
                <nav class="flex gap-4 justify-center lg:justify-start pt-8">
                    <button data-crew="douglas" class="w-3 h-3 md:w-4 md:h-4 rounded-full bg-white transition hover:bg-white/50"></button>
                    <button data-crew="mark" class="w-3 h-3 md:w-4 md:h-4 rounded-full bg-white/20 transition hover:bg-white/50"></button>
                    <button data-crew="victor" class="w-3 h-3 md:w-4 md:h-4 rounded-full bg-white/20 transition hover:bg-white/50"></button>
                    <button data-crew="anousheh" class="w-3 h-3 md:w-4 md:h-4 rounded-full bg-white/20 transition hover:bg-white/50"></button>
                </nav>

            </div>

            <!-- Right Section - Crew Image -->
            <div class="flex justify-center items-end order-1 lg:order-2 h-64 md:h-96 lg:h-[500px]">
                <img id="crew-image"
                     src="{{ asset('assets/crew/image-douglas-hurley.png') }}"
                     alt="Douglas Hurley"
                     class="h-full w-auto object-contain">
            </div>

        </div>

    </div>
@endsection

@section('scripts')
    @vite(['resources/js/crew.js'])
@endsection
