@extends('layouts.app')

@section('title', __('destination.title'))

@section('background')
    <!-- Background responsive -->
    <div class="fixed inset-0 -z-10 bg-cover bg-center bg-no-repeat"
         style="background-image: url('{{ asset('assets/destination/background-destination-mobile.jpg') }}');">
    </div>
@endsection

@section('styles')
    <style>
        @media (min-width: 768px) {
            body > div:first-of-type {
                background-image: url('{{ asset('assets/destination/background-destination-tablet.jpg') }}') !important;
            }
        }
        @media (min-width: 1024px) {
            body > div:first-of-type {
                background-image: url('{{ asset('assets/destination/background-destination-desktop.jpg') }}') !important;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container mx-auto px-6 py-6 md:py-10 lg:py-16">

        <!-- Page Title -->
        <h2 class="text-white text-base md:text-xl lg:text-2xl tracking-widest uppercase font-barlow text-center md:text-left">
            <span class="text-white/25 font-bold mr-4">{{ __('destination.page_number') }}</span>{{ __('destination.page_title') }}
        </h2>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 mt-8 md:mt-16 lg:mt-20 items-center">

            <!-- Left Section - Planet Image -->
            <div class="flex justify-center items-center">
                <img id="planet-image"
                     src="{{ asset($planets->first()->image) }}"
                     alt="{{ $planets->first()->getName() }}"
                     class="w-44 h-44 md:w-72 md:h-72 lg:w-96 lg:h-96 animate-spin-slow">
            </div>

            <!-- Right Section - Destination Info -->
            <div class="space-y-6 md:space-y-8">

                <!-- Tabs Navigation -->
                <nav class="flex gap-6 md:gap-8 justify-center lg:justify-start">
                    @foreach($planets as $index => $planet)
                        <button data-destination="{{ $planet->id }}" class="{{ $index === 0 ? 'text-white border-white' : 'text-[#D0D6F9] border-transparent hover:border-white/50' }} text-sm md:text-base tracking-widest uppercase font-barlow pb-2 border-b-2 transition">
                            {{ $planet->getName() }}
                        </button>
                    @endforeach
                </nav>

                <!-- Destination Name -->
                <h1 id="planet-name" class="text-white text-5xl md:text-7xl lg:text-8xl uppercase font-bellefair text-center lg:text-left">
                    {{ $planets->first()->getName() }}
                </h1>

                <!-- Destination Description -->
                <p id="planet-description" class="text-[#D0D6F9] text-base md:text-lg leading-relaxed font-barlow text-center lg:text-left">
                    {{ $planets->first()->getDescription() }}
                </p>

                <!-- Separator Line -->
                <div class="border-t border-white/25 pt-6"></div>

                <!-- Stats Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-center lg:text-left">
                    <!-- Average Distance -->
                    <div>
                        <h3 class="text-[#D0D6F9] text-xs md:text-sm tracking-widest uppercase font-barlow mb-2">
                            {{ __('destination.avg_distance') }}
                        </h3>
                        <p id="planet-distance" class="text-white text-2xl md:text-3xl uppercase font-bellefair">
                            {{ $planets->first()->getDistance() }}
                        </p>
                    </div>

                    <!-- Travel Time -->
                    <div>
                        <h3 class="text-[#D0D6F9] text-xs md:text-sm tracking-widest uppercase font-barlow mb-2">
                            {{ __('destination.travel_time') }}
                        </h3>
                        <p id="planet-travel" class="text-white text-2xl md:text-3xl uppercase font-bellefair">
                            {{ $planets->first()->getTravel() }}
                        </p>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection

@section('styles')
    @parent
    <style>
        @keyframes spin-slow {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }
        .animate-spin-slow {
            animation: spin-slow 60s linear infinite;
        }
    </style>
@endsection

@section('scripts')
    <script>
        // Injecter les données des planètes dans JavaScript
        window.planetsData = @json($planets->keyBy('id'));

        // Injecter les traductions dans JavaScript
        window.translations = {
            destinations: @json(__('destination.destinations')),
            avgDistance: @json(__('destination.avg_distance')),
            travelTime: @json(__('destination.travel_time'))
        };
    </script>
    @vite(['resources/js/destination.js'])
@endsection
