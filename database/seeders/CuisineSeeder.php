<?php

namespace Database\Seeders;

use App\Models\Cuisine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CuisineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $cuisines = [
            [ 'name' => 'African'],
            [ 'name' => 'Asian'],
            [ 'name' => 'American'],
            [ 'name' => 'British'],
            [ 'name' => 'Cajun'],
            [ 'name' => 'Caribbean'],
            [ 'name' => 'Chinese'],
            [ 'name' => 'Eastern European'],
            [ 'name' => 'European'],
            [ 'name' => 'French'],
            [ 'name' => 'German'],
            [ 'name' => 'Greek'],
            [ 'name' => 'Indian'],
            [ 'name' => 'Irish'],
            [ 'name' => 'Italian'],
            [ 'name' => 'Japanese'],
            [ 'name' => 'Jewish'],
            [ 'name' => 'Korean'],
            [ 'name' => 'Latin American'],
            [ 'name' => 'Mediterranean'],
            [ 'name' => 'Mexican'],
            [ 'name' => 'Middle Eastern'],
            [ 'name' => 'Nordic'],
            [ 'name' => 'Southern'],
            [ 'name' => 'Spanish'],
            [ 'name' => 'Thai'],
            [ 'name' => 'Vietnamese'],
        ];

        Cuisine::insert($cuisines);
    }
}
