<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MovimientoStock;
use App\Models\Stock;

class MovimientoStockController extends Controller
{
    public function index()
    {
        $movimientos = MovimientoStock::with('stock')->latest()->get();
        return view('movimientos.index', compact('movimientos'));
    }

    public function create()
    {
        $stocks = Stock::all();
        return view('movimientos.create', compact('stocks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'stock_id' => 'required|exists:stocks,id',
            'tipo' => 'required|in:entrada,salida',
            'cantidad' => 'required|integer|min:1',
            'fecha' => 'required|date',
        ]);

        MovimientoStock::create([
            'stock_id' => $request->stock_id,
            'tipo' => $request->tipo,
            'cantidad' => $request->cantidad,
            'fecha' => $request->fecha,
        ]);

        return redirect()->route('movimientos.index')->with('success', 'Movimiento registrado correctamente.');
    }

    public function destroy(MovimientoStock $movimiento)
    {
        $movimiento->delete();
        return redirect()->route('movimientos.index')->with('success', 'Movimiento eliminado y stock actualizado.');
    }
}
