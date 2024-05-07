<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubCategory>
 */
class SubCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        $categories = ['Fiction', 'Non-Fiction'];
        $subCategories = [
            "Fiction" => [
                "Paranormal Fiction",
                "Action & Adventure",
                "Westerns",
                "Historical Fiction",
                "Literary Fiction",
                "Christian Fiction"
            ],
            "Non-Fiction" => [
                "History",
                "Sports & Outdoors",
                "Travel",
                "Arts, Music & Photography",
                ]
        ];
        
         // Select a random category
         $categoryName = $this->faker->randomElement($categories);
            
         // Select a random subcategory based on the selected category
         $name = $this->faker->randomElement($subCategories[$categoryName]);
 
         return [
             'category_id' => Category::factory(),
             'name' => $name ,
         ];    
    }
}
