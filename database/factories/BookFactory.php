<?php

namespace Database\Factories;

use App\Models\Rate;
use App\Models\Author;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        $images_arr= array(
            'assets/img/book1.jpg',
            'assets/img/book3.jpg',
            'assets/img/book2.jpg',
            'assets/img/book4.jpg',
            'assets/img/book5.jpg',
            'assets/img/book6.jpg',
            'assets/img/book7.jpg',
            'assets/img/book8.jpg',
            'assets/img/book9.jpg',
            'assets/img/book10.jpg',
            'assets/img/book11.jpg',
        
        );
        $bookTitles = [
            "Wuthering Heights",
            "Don Quixote",
            "Crime and Punishment",
            "ليلى والذئب",
            "Pride and Prejudice",
            "To Kill a Mockingbird",
            "The Great Gatsby",
            "Ulysses",
            "A Scanner Darkly",
            "The Fault in Our Stars",
            "A Confederacy of Dunces",
            "The Grapes of Wrath",
            "Band of Brothers"
        ];

        return [
            'category_id'=> Category::factory(),
            'subcategory_id'=> SubCategory::factory(),
            'author_id' =>Author::factory(),
            'rate_id' => Rate::factory(),
            'title'=> $this->faker->randomElement($bookTitles),
            'favorite'=>$this->faker->boolean(False),
            'publicationDate'=>$this->faker->dateTimeThisDecade(),
            'briefDescription' => $this->faker->realText(60),
            'src'=>$this->faker->randomElement($images_arr),

        ];
    }
}
