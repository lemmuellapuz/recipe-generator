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

        $response = $this->postJson($this->url, [
            'ingredients' => ['tomato', 'cheese']
        ]);
    
        $response->assertStatus(200);
    }

}
