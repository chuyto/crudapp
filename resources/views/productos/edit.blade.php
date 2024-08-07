<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Grid Container -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Nombre del Producto -->
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2">{{ __('Name') }}</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $producto->name) }}" required
                                   class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-500 sm:text-sm @error('name') border-red-500 @enderror">
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Precio del Producto -->
                        <div class="mb-4">
                            <label for="price" class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2">{{ __('Price') }}</label>
                            <input type="number" id="price" name="price" step="0.01" value="{{ old('price', $producto->price) }}" required
                                   class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-500 sm:text-sm @error('price') border-red-500 @enderror">
                            @error('price')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Descripción del Producto -->
                        <div class="mb-4 col-span-1 md:col-span-2">
                            <label for="description" class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2">{{ __('Description') }}</label>
                            <textarea id="description" name="description" rows="4"
                                      class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-500 sm:text-sm @error('description') border-red-500 @enderror">{{ old('description', $producto->description) }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>


                        <!-- Cantidad del Producto -->
                        <div class="mb-4">
                            <label for="quantity" class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2">{{ __('Quantity') }}</label>
                            <input type="number" id="quantity" name="quantity" value="{{ old('quantity', $producto->quantity) }}" required
                                   class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-500 sm:text-sm @error('quantity') border-red-500 @enderror">
                            @error('quantity')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- SKU del Producto -->
                        <div class="mb-4">
                            <label for="sku" class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2">{{ __('SKU') }}</label>
                            <input type="text" id="sku" name="sku" value="{{ old('sku', $producto->sku) }}" required
                                   class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-500 sm:text-sm @error('sku') border-red-500 @enderror">
                            @error('sku')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Imagen del Producto -->
                        <div class="mb-4 col-span-1 md:col-span-2">
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2">{{ __('Image') }}</label>
                            @if($producto->image)
                                <img src="{{ asset('storage/images/' . $producto->image) }}" alt="{{ $producto->name }}" class=" object-fill h-48 w-96 rounded-md border border-gray-300 dark:border-gray-600">
                            @else
                                <p class="text-gray-500 dark:text-gray-400">{{ __('No image available') }}</p>
                            @endif
                        </div>
                    </div>

                    <!-- Botón de Actualizar -->
                    <div class="flex justify-end mt-4">
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200">
                            {{ __('Update') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
