<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::with('movimientos')->get();

        // Agregar cálculos de entradas y salidas
        $stocks = $stocks->map(function ($stock) {
            $stock->total_entradas = $stock->movimientos->where('tipo', 'entrada')->sum('cantidad');
            $stock->total_salidas = $stock->movimientos->where('tipo', 'salida')->sum('cantidad');
            return $stock;
        });

        return view('stocks.index', compact('stocks'));
    }

    public function create()
    {
        return view('stocks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|unique:stocks,codigo',
            'articulo' => 'required|string|max:255',
            'unidades_de_medidas' => 'nullable|in:ml,kg,g,l,unidad', // Validamos que la unidad esté dentro de los valores permitidos
            'cantidad_de_unidad' => 'required|integer|min:0', // Aseguramos que sea un número entero positivo
            'cantidad' => 'required|integer|min:0',
        ]);
    
        Stock::create([
            'codigo' => $request->codigo,
            'articulo' => $request->articulo,
            'unidades_de_medidas' => $request->unidades_de_medidas,
            'cantidad_de_unidad' => $request->cantidad_de_unidad,
            'cantidad' => $request->cantidad,
        ]);

        return redirect()->route('stocks.index')->with('success', 'Stock creado correctamente.');
    }
}
