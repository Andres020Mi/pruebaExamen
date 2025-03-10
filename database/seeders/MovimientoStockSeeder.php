<?php

namespace Database\Seeders;

use App\Models\MovimientoStock;
use Illuminate\Database\Seeder;

class MovimientoStockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movimientos = [
            ['stock_id' => 1, 'tipo' => 'entrada', 'cantidad' => 10, 'fecha' => '2024-03-18'],
            ['stock_id' => 1, 'tipo' => 'entrada', 'cantidad' => 15, 'fecha' => '2024-03-19'],
            ['stock_id' => 2, 'tipo' => 'salida', 'cantidad' => 20, 'fecha' => '2024-03-20'],
            ['stock_id' => 4, 'tipo' => 'entrada', 'cantidad' => 10, 'fecha' => '2025-03-10'],
            ['stock_id' => 4, 'tipo' => 'salida', 'cantidad' => 30, 'fecha' => '2025-03-11'],
        ];

        foreach ($movimientos as $movimiento) {
            MovimientoStock::create($movimiento);
        }
    }
}
