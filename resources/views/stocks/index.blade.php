<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Stock') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-6">
        <h2 class="text-2xl font-semibold mb-4">Lista de Stock</h2>

        <div class="overflow-x-auto">
            <!-- Agregar DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<table id="tablaStock" class="min-w-full bg-white border border-gray-300 shadow-md rounded-lg overflow-hidden">
    <thead class="bg-gray-200 text-gray-700 uppercase text-sm">
        <tr>
            <th class="px-4 py-2 border">Código</th>
            <th class="px-4 py-2 border">Artículo</th>
            <th class="px-4 py-2 border">Unidad de Medida</th>
            <th class="px-4 py-2 border">Cantidad por Unidad</th>
            <th class="px-4 py-2 border">Cantidad Total</th>
            <th class="px-4 py-2 border">Total Entradas</th>
            <th class="px-4 py-2 border">Total Salidas</th>
        </tr>
    </thead>
    <tbody class="text-gray-700">
        @foreach ($stocks as $stock)
            <tr class="hover:bg-gray-100">
                <td class="px-4 py-2 border text-center">{{ $stock->codigo }}</td>
                <td class="px-4 py-2 border">{{ $stock->articulo }}</td>
                <td class="px-4 py-2 border text-center">{{ $stock->unidades_de_medidas ?? 'N/A' }}</td>
                <td class="px-4 py-2 border text-center">{{ $stock->cantidad_de_unidad }}</td>
                <td class="px-4 py-2 border text-center">{{ $stock->cantidad }}</td>
                <td class="px-4 py-2 border text-center">{{ $stock->total_entradas }}</td>
                <td class="px-4 py-2 border text-center">{{ $stock->total_salidas }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

            <!-- Agregar jQuery y DataTables JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        </div>

        <div class="mt-6 flex space-x-4">
            <a href="{{ route('stocks.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Crear Stock
            </a>
            <a href="{{ route('movimientos.index') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                Registrar Movimiento
            </a>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#tablaStock').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/Spanish.json"
                },
                "paging": true,        // Habilita paginación
                "searching": true,     // Habilita búsqueda
                "ordering": true,      // Habilita ordenamiento
                "info": true           // Muestra información de la tabla
            });
        });
    </script>
    
</x-app-layout>
