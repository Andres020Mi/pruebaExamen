<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar Movimiento') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto bg-white p-6 mt-6 shadow-md rounded-lg">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Registrar Movimiento</h2>

        <form action="{{ route('movimientos.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="stock_id" class="block font-medium text-gray-700">Artículo</label>
                <select class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500" 
                        id="stock_id" name="stock_id" required>
                    @foreach ($stocks as $stock)
                        <option value="{{ $stock->id }}">
                            {{ $stock->articulo }} (Stock: {{ $stock->cantidad }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="tipo" class="block font-medium text-gray-700">Tipo</label>
                <select class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500" 
                        id="tipo" name="tipo" required>
                    <option value="entrada" class="text-green-600 font-bold">Entrada</option>
                    <option value="salida" class="text-red-600 font-bold">Salida</option>
                </select>
            </div>

            <div>
                <label for="cantidad" class="block font-medium text-gray-700">Cantidad</label>
                <input type="number" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500" 
                       id="cantidad" name="cantidad" min="1" required>
            </div>

            <div>
                <label for="fecha" class="block font-medium text-gray-700">Fecha</label>
                <input type="date" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500" 
                       id="fecha" name="fecha" value="{{ date('Y-m-d') }}" required>
            </div>

            <div class="flex justify-end">
                <button type="submit" 
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg">
                    Registrar
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
