<?php

namespace Database\Seeders;

use App\Models\Stock;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockSeeder extends Seeder {
    public function run() {
        $stocks = [];

        for ($i = 1; $i <= 100; $i++) { // Cambia 100 por la cantidad que necesites
            $stocks[] = [
                'codigo' => str_pad($i, 6, '100000', STR_PAD_LEFT),
                'articulo' => 'Artículo ' . $i,
                'unidades_de_medidas' => ['ml', 'kg', 'g', 'l', 'unidad'][array_rand(['ml', 'kg', 'g', 'l', 'unidad'])],
                'cantidad_de_unidad' => rand(1, 5000),
                'cantidad' => rand(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('stocks')->insert($stocks);
    }
}
