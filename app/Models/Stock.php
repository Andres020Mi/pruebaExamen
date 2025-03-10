<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $fillable = ['codigo', 'articulo', 'cantidad'];

    public function movimientos()
    {
        return $this->hasMany(MovimientoStock::class);
    }

}
