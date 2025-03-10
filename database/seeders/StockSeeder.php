<?php

namespace Database\Seeders;

use App\Models\Stock;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockSeeder extends Seeder {
    public function run() {
        $stocks = [
            [
                'codigo' => '100001',
                'articulo' => 'Aceite girasol',
                'unidades_de_medidas' => 'ml',
                'cantidad_de_unidad' => 1000,
                'cantidad' => 17
            ],
            [
                'codigo' => '100002',
                'articulo' => 'Ácido ascórbico',
                'unidades_de_medidas' => 'g',
                'cantidad_de_unidad' => 107,
                'cantidad' => 29
            ],
            [
                'codigo' => '100003',
                'articulo' => 'Ácido acético',
                'unidades_de_medidas' => 'kg',
                'cantidad_de_unidad' => 1,
                'cantidad' => 0
            ],
            [
                'codigo' => '100131',
                'articulo' => 'Miga blanca para hamburguesa',
                'unidades_de_medidas' => 'g',
                'cantidad_de_unidad' => 3300,
                'cantidad' => 40
            ],
        ];

        foreach ($stocks as $stock) {
            Stock::create($stock);
        }
    }
}
