<?php

namespace Database\Seeders;

use App\Models\Intolerance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IntoleranceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $intolerances = [
            [ 'name' => 'Dairy' ],
            [ 'name' => 'Egg' ],
            [ 'name' => 'Gluten' ],
            [ 'name' => 'Grain' ],
            [ 'name' => 'Peanut' ],
            [ 'name' => 'Seafood' ],
            [ 'name' => 'Sesame' ],
            [ 'name' => 'Shellfish' ],
            [ 'name' => 'Soy' ],
            [ 'name' => 'Sulfite' ],
            [ 'name' => 'Tree Nut' ],
            [ 'name' => 'Wheat' ],
        ];

        Intolerance::insert($intolerances);
    }
}
