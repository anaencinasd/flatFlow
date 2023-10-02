<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'type'=>'limpieza'
        ]);
        Category::create([
            'type'=>'orden'
        ]);
        Category::create([
            'type'=>'pagos'
        ]);
        Category::create([
            'type'=>'compras'
        ]);
        Category::create([
            'type'=>'cocina'
        ]);
        Category::create([
            'type'=>'baño'
        ]);
        Category::create([
            'type'=>'salón'
        ]);
        Category::create([
            'type'=>'comedor'
        ]);
        Category::create([
            'type'=>'zonas comunes'
        ]);
    }
}
