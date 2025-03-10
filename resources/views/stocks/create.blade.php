<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Stock') }}
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto bg-white p-6 mt-6 shadow-md rounded-lg">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Agregar Nuevo Stock</h2>

        <form action="{{ route('stocks.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="codigo" class="block text-gray-700 font-medium">Código</label>
                <input type="text" id="codigo" name="codigo" required
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
            </div>

            <div class="mb-4">
                <label for="articulo" class="block text-gray-700 font-medium">Artículo</label>
                <input type="text" id="articulo" name="articulo" required
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
            </div>

            <div class="mb-4">
                <label for="cantidad" class="block text-gray-700 font-medium">Cantidad</label>
                <input type="number" id="cantidad" name="cantidad" required
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
            </div>

            <div class="mb-4">
                <label for="unidades_de_medidas" class="block text-gray-700 font-medium">Unidad de Medida</label>
                <select id="unidades_de_medidas" name="unidades_de_medidas" required
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
                    <option value="" disabled selected>Seleccione una unidad</option>
                    <option value="ml">Mililitros (ml)</option>
                    <option value="kg">Kilogramos (kg)</option>
                    <option value="g">Gramos (g)</option>
                    <option value="l">Litros (l)</option>
                    <option value="unidad">Unidad</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="cantidad_de_unidad" class="block text-gray-700 font-medium">Cantidad por Unidad</label>
                <input type="number" id="cantidad_de_unidad" name="cantidad_de_unidad" required min="1"
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
            </div>

            <div class="flex justify-between">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                    Guardar
                </button>

                <a href="{{ route('stocks.index') }}"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg">
                    Regresar
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
