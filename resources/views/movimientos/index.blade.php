<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Movimientos de Stock') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto bg-white p-6 mt-6 shadow-md rounded-lg">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold text-gray-800">Movimientos de Stock</h2>
            <a href="{{ route('movimientos.create') }}" 
               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                Registrar Movimiento
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 px-4 py-2">Artículo</th>
                        <th class="border border-gray-300 px-4 py-2">Tipo</th>
                        <th class="border border-gray-300 px-4 py-2">Cantidad</th>
                        <th class="border border-gray-300 px-4 py-2">Fecha</th>
                        <th class="border border-gray-300 px-4 py-2">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($movimientos as $movimiento)
                        <tr class="text-center {{ $movimiento->tipo == 'entrada' ? 'bg-green-100' : 'bg-red-100' }}">
                            <td class="border border-gray-300 px-4 py-2">{{ $movimiento->stock->articulo }}</td>
                            <td class="border border-gray-300 px-4 py-2 font-bold">
                                <span class="{{ $movimiento->tipo == 'entrada' ? 'text-green-600' : 'text-red-600' }}">
                                    {{ ucfirst($movimiento->tipo) }}
                                </span>
                            </td>
                            <td class="border border-gray-300 px-4 py-2">{{ $movimiento->cantidad }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $movimiento->fecha }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <form action="{{ route('movimientos.destroy', $movimiento->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded-lg">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            <a href="{{ route('stocks.index') }}" 
               class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg">
                Regresar
            </a>
        </div>
    </div>
</x-app-layout>
