<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('productos.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Campos del formulario -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-800 dark:text-gray-200">{{ __('Nombre') }}</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md text-gray-800" required>
                                @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-800 dark:text-gray-200">{{ __('Descripción') }}</label>
                                <textarea name="description" id="description" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md text-gray-800">{{ old('description') }}</textarea>
                                @error('description')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label for="price" class="block text-sm font-medium text-gray-800 dark:text-gray-200">{{ __('Precio') }}</label>
                                <input type="number" name="price" id="price" value="{{ old('price') }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md text-gray-800" required>
                                @error('price')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">

                            <div>
                                <label for="quantity" class="block text-sm font-medium text-gray-800 dark:text-gray-200">{{ __('Cantidad') }}</label>
                                <input type="number" name="quantity" id="quantity" value="{{ old('quantity') }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md text-gray-800" required>
                                @error('quantity')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <div class="mt-6">
                            <label for="sku" class="block text-sm font-medium text-gray-800 dark:text-gray-200">{{ __('SKU') }}</label>
                            <input type="text" name="sku" id="sku" value="{{ old('sku') }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md text-gray-800" required>
                            @error('sku')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div class="mt-6">
                            <label for="image" class="block text-sm font-medium text-gray-800 dark:text-gray-200">{{ __('Imagen') }}</label>
                            <input type="file" name="image" id="image" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <p class="text-sm text-gray-500 mt-1">{{ __('Dejar en blanco para no cambiar la imagen actual.') }}</p>
                            @error('image')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                {{ __('Crear Producto') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
