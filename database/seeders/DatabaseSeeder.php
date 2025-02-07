<?php

namespace Database\Seeders;

use App\Models\Cuisine;
use App\Models\Intolerance;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            Cuisine::class,
            Intolerance::class,
        ]);
    }
}
