<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {  
  
        $randomNumber = rand(1, 100);
        return [
           
            'name' => fake()->words($nb = 3, $asText = true),
            'image' => "https://picsum.photos/id/$randomNumber/400/400" ,
            'description' => fake()->sentence($nbWords = 30, $variableNbWords = true),
            'price' =>  fake()->randomFloat(2, 50, 300),
            'type' => 'Test-Category',
            'user_id' => 1 ,
        ];

        // "https://picsum.photos/id/2$randomNumber/400/400"
    }
}
