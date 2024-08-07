<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('View Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <!-- Product Details -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Nombre del Producto -->
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2">{{ __('Name') }}</label>
                        <p class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                            {{ $producto->name }}
                        </p>
                    </div>

                    <!-- Precio del Producto -->
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2">{{ __('Price') }}</label>
                        <p class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                            ${{ number_format($producto->price, 2) }}
                        </p>
                    </div>

                    <!-- Descripción del Producto -->
                    <div class="mb-4 col-span-1 md:col-span-2">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2">{{ __('Description') }}</label>
                        <p class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                            {{ $producto->description ?: __('No description available') }}
                        </p>
                    </div>

                    <!-- Cantidad del Producto -->
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2">{{ __('Quantity') }}</label>
                        <p class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                            {{ $producto->quantity }}
                        </p>
                    </div>

                    <!-- SKU del Producto -->
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2">{{ __('SKU') }}</label>
                        <p class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                            {{ $producto->sku }}
                        </p>
                    </div>

                    <!-- Imagen del Producto -->
                    <div class="mb-4 col-span-1 md:col-span-2">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2">{{ __('Image') }}</label>
                        @if($producto->image)
                            <img src="{{ asset('storage/images/' . $producto->image) }}" alt="{{ $producto->name }}" class="w-full h-auto rounded-md border border-gray-300 dark:border-gray-600">
                        @else
                            <p class="text-gray-500 dark:text-gray-400">{{ __('No image available') }}</p>
                        @endif
                    </div>
                </div>

                <!-- Botón de Regreso -->
                <div class="flex justify-end mt-4">
                    <a href="{{ route('productos.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 focus:outline-none focus:ring focus:ring-gray-200">
                        {{ __('Back to List') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
