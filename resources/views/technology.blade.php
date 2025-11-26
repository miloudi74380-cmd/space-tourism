@extends('layouts.app')

@section('title', __('technology.title'))

@section('background')
    <!-- Background responsive -->
    <div class="fixed inset-0 -z-10 bg-cover bg-center bg-no-repeat"
         style="background-image: url('{{ asset('assets/technology/background-technology-mobile.jpg') }}');">
    </div>
@endsection

@section('styles')
    <style>
        @media (min-width: 768px) {
            body > div:first-of-type {
                background-image: url('{{ asset('assets/technology/background-technology-tablet.jpg') }}') !important;
            }
        }
        @media (min-width: 1024px) {
            body > div:first-of-type {
                background-image: url('{{ asset('assets/technology/background-technology-desktop.jpg') }}') !important;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container mx-auto px-6 py-6 md:py-10 lg:py-16">

        <!-- Page Title -->
        <h2 class="text-white text-base md:text-xl lg:text-2xl tracking-widest uppercase font-barlow text-center md:text-left">
            <span class="text-white/25 font-bold mr-4">{{ __('technology.page_number') }}</span>{{ __('technology.page_title') }}
        </h2>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-20 mt-8 md:mt-16 lg:mt-20 items-center">

            <!-- Left Section - Navigation + Info (on desktop) -->
            <div class="lg:col-span-7 flex flex-col lg:flex-row gap-8 lg:gap-16 order-2 lg:order-1">

                <!-- Number Navigation (horizontal on mobile, vertical on desktop) -->
                <nav class="flex lg:flex-col gap-4 justify-center lg:justify-start">
                    @foreach($technologies as $index => $tech)
                        <button data-tech="{{ $tech->id }}" class="w-12 h-12 md:w-16 md:h-16 lg:w-20 lg:h-20 rounded-full border-2 {{ $index === 0 ? 'border-white bg-white text-[#0B0D17]' : 'border-white/25 bg-transparent text-white' }} text-base md:text-xl lg:text-2xl font-bellefair transition hover:border-white hover:bg-white">
                            {{ $index + 1 }}
                        </button>
                    @endforeach
                </nav>

                <!-- Technology Info -->
                <div class="space-y-4 md:space-y-6 text-center lg:text-left">
                    <!-- Label -->
                    <h3 class="text-[#D0D6F9] text-sm md:text-base tracking-widest uppercase font-barlow">
                        {{ __('technology.terminology') }}
                    </h3>

                    <!-- Name -->
                    <h1 id="tech-name" class="text-white text-2xl md:text-4xl lg:text-5xl uppercase font-bellefair">
                        {{ $technologies->first()?->getName() }}
                    </h1>

                    <!-- Description -->
                    <p id="tech-description" class="text-[#D0D6F9] text-base md:text-lg leading-relaxed font-barlow">
                        {{ $technologies->first()?->getDescription() }}
                    </p>
                </div>

            </div>

            <!-- Right Section - Technology Image -->
            <div class="lg:col-span-5 flex justify-center items-center order-1 lg:order-2">
                <!-- Mobile/Tablet: Landscape image -->
                <img id="tech-image-landscape"
                     src="{{ asset($technologies->first()?->image_landscape) }}"
                     alt="{{ $technologies->first()?->getName() }}"
                     class="w-full h-auto lg:hidden">

                <!-- Desktop: Portrait image -->
                <img id="tech-image-portrait"
                     src="{{ asset($technologies->first()?->image_portrait) }}"
                     alt="{{ $technologies->first()?->getName() }}"
                     class="hidden lg:block w-full h-auto">
            </div>

        </div>

    </div>
@endsection

@section('scripts')
    <script>
        // Injecter les données de technologies depuis la BDD
        window.technologiesData = @json($technologies->keyBy('id'));
    </script>
    @vite(['resources/js/technology.js'])
@endsection
