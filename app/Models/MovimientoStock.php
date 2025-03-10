<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimientoStock extends Model
{
    use HasFactory;

    protected $table = 'movimientos_stock';

    protected $fillable = ['stock_id', 'tipo', 'cantidad', 'fecha'];

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($movimiento) {
            $movimiento->actualizarStock($movimiento->tipo, $movimiento->cantidad);
        });

        static::deleted(function ($movimiento) {
            $tipoOpuesto = $movimiento->tipo === 'entrada' ? 'salida' : 'entrada';
            $movimiento->actualizarStock($tipoOpuesto, $movimiento->cantidad);
        });
    }

    private function actualizarStock($tipo, $cantidad)
    {
        $stock = $this->stock;
        if ($tipo === 'entrada') {
            $stock->cantidad += $cantidad;
        } else {
            $stock->cantidad -= $cantidad;
        }
        $stock->save();
    }
}
