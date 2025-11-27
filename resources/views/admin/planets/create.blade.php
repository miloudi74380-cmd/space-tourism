<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ajouter une planète
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('admin.planets.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name_fr" class="block text-sm font-medium text-gray-700">Nom (Français)</label>
                                <input type="text" name="name_fr" id="name_fr" value="{{ old('name_fr') }}" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('name_fr') border-red-500 @enderror">
                                @error('name_fr')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="name_en" class="block text-sm font-medium text-gray-700">Nom (Anglais)</label>
                                <input type="text" name="name_en" id="name_en" value="{{ old('name_en') }}" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('name_en') border-red-500 @enderror">
                                @error('name_en')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="image" class="block text-sm font-medium text-gray-700">Image de la planète</label>
                            <input type="file" name="image" id="image" accept="image/jpeg,image/png,image/jpg" required
                                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 @error('image') border-red-500 @enderror">
                            <p class="mt-1 text-xs text-gray-500">Formats acceptés: JPEG, PNG, JPG. Taille max: 2 MB</p>
                            @error('image')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="description_fr" class="block text-sm font-medium text-gray-700">Description (Français)</label>
                                <textarea name="description_fr" id="description_fr" rows="4" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('description_fr') border-red-500 @enderror">{{ old('description_fr') }}</textarea>
                                @error('description_fr')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="description_en" class="block text-sm font-medium text-gray-700">Description (Anglais)</label>
                                <textarea name="description_en" id="description_en" rows="4" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('description_en') border-red-500 @enderror">{{ old('description_en') }}</textarea>
                                @error('description_en')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="distance_fr" class="block text-sm font-medium text-gray-700">Distance (Français)</label>
                                <input type="text" name="distance_fr" id="distance_fr" value="{{ old('distance_fr') }}" required
                                    placeholder="384 400 km"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('distance_fr') border-red-500 @enderror">
                                @error('distance_fr')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="distance_en" class="block text-sm font-medium text-gray-700">Distance (Anglais)</label>
                                <input type="text" name="distance_en" id="distance_en" value="{{ old('distance_en') }}" required
                                    placeholder="384,400 km"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('distance_en') border-red-500 @enderror">
                                @error('distance_en')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="travel_fr" class="block text-sm font-medium text-gray-700">Temps de voyage (Français)</label>
                                <input type="text" name="travel_fr" id="travel_fr" value="{{ old('travel_fr') }}" required
                                    placeholder="3 jours"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('travel_fr') border-red-500 @enderror">
                                @error('travel_fr')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="travel_en" class="block text-sm font-medium text-gray-700">Temps de voyage (Anglais)</label>
                                <input type="text" name="travel_en" id="travel_en" value="{{ old('travel_en') }}" required
                                    placeholder="3 days"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('travel_en') border-red-500 @enderror">
                                @error('travel_en')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex items-center justify-end space-x-4">
                            <a href="{{ route('admin.planets.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Annuler
                            </a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Créer la planète
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
