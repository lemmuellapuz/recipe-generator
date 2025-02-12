<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class RecipeControllerTest extends TestCase
{

    private $url = '/api/generate-recipe';

    public function test_it_returns_422_status_code_when_ingredients_is_not_an_array(): void
    {
        
        $response = $this->postJson($this->url, [
            'ingredients' => 'tomato, cheese'
        ]);
    
        $response->assertStatus(422);
    }

    
    public function test_it_returns_422_status_code_when_ingredients_is_empty(): void
    {
        
        $response = $this->postJson($this->url, [
            'ingredients' => []
        ]);
    
        $response->assertStatus(422);
    }

    public function test_it_returns_error_message_when_ingredients_is_not_an_array(): void
    {

        $response = $this->postJson($this->url, [
            'ingredients' => 'tomato, cheese'
        ]);
    
        $response->assertSeeText('The ingredients field must be an array.');
    }

    
    public function test_it_returns_error_message_when_ingredients_is_empty(): void
    {

        $response = $this->postJson($this->url, [
            'ingredients' => []
        ]);
    
        $response->assertSeeText('The ingredients field is required.');
    }

    public function test_it_returns_200_status_code_when_ingredients_are_array(): void
    {

        Http::fake([
            'https://api.spoonacular.com/*' => Http::response($this->getMockedRecipeResponse(), 200)
        ]);

        $response = $this->postJson($this->url, [
            'ingredients' => ['tomato']
        ]);
    
        $response->assertStatus(200);
    }

    public function test_it_returns_recipe_with_matched_ingredients(): void
    {
        Http::fake([
            'https://api.spoonacular.com/*' => Http::response($this->getMockedRecipeResponse(), 200)
        ]);

        $response = $this->postJson($this->url, [
            'ingredients' => ['tomato']
        ]);

        $response->assertStatus(200)
            ->assertJsonFragment(['name' => 'Tomato']);
    }

    private function getMockedRecipeResponse(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Tomato Recipe',
                'image' => 'https://tomatosalad.com/tomatosalad.jpg',
                'imageType' => 'jpg',
                'usedIngredientCount' => 1,
                'missedIngredientCount' => 0,
                'missedIngredients' => [],
                'usedIngredients' => [
                    [
                        'id' => 1,
                        'amount' => '5',
                        'unit' => 'kg',
                        'unitLong' => 'kilogram',
                        'unitShort' => 'kg',
                        'aisle' => '',
                        'name' => 'Tomato',
                        'original' => 'Tomato',
                        'originalName' => 'Tomato',
                        'meta' => '',
                        'image' => 'https://tomato.com/tomato.jpg'
                    ],
                ],
                'unusedIngredients' => [],
                'likes' => 15
            ]
        ];
    }

}
