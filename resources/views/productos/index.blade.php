<!-- resources/views/productos/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">

                <!-- Search and Price Filter Form -->
                <div class="mb-4">
                    <form method="GET" action="{{ route('productos.index') }}">
                        <div class="flex items-center space-x-4">
                            <!-- Search Input -->
                            <input type="text" name="search" placeholder="{{ __('Buscar...') }}"
                                   class="form-input w-full dark:bg-gray-700 dark:text-gray-300 rounded-md"
                                   value="{{ request('search') }}">

                            <!-- Price Range Filter -->
                            <input type="number" name="min_price" placeholder="{{ __('Min precio') }}"
                                   class="form-input w-full dark:bg-gray-700 dark:text-gray-300 rounded-md"
                                   value="{{ request('min_price') }}" min="0">
                            <input type="number" name="max_price" placeholder="{{ __('Max precio') }}"
                                   class="form-input w-full dark:bg-gray-700 dark:text-gray-300 rounded-md"
                                   value="{{ request('max_price') }}" min="0">

                            <!-- Submit Button -->
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">
                                {{ __('Aplicar Filtros') }}
                            </button>

                            <!-- Clear Filters Button -->
                            <a href="{{ route('productos.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md">
                                {{ __('Borrar Filtros') }}
                            </a>
                        </div>
                    </form>
                </div>

                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                {{ __('Nombre') }}
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                {{ __('Descripción') }}
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                {{ __('Precio') }}
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                {{ __('SKU') }}
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                {{ __('Acciones') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody id="product-list" class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                        @foreach($productos as $producto)
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                    {{ $producto->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    {{ $producto->description }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    {{ $producto->price }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    {{ $producto->sku }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('productos.show', $producto->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">
                                        {{ __('Ver') }}
                                    </a>
                                    <a href="{{ route('productos.edit', $producto->id) }}" class="bg-green-500 text-white px-4 py-2 rounded-md ml-4">
                                        {{ __('Editar') }}
                                    </a>
                                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="inline ml-4">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md">{{ __('Borrar') }}</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $productos->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
