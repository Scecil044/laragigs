<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' =>  fake()->sentence(),
            'tags' => 'laravel,php, javascript',
            'company'=> fake()->company(),
            'description'=>fake()->sentence(5),
            'location'=>fake()->city(),
            'email'=>fake()->companyEmail(),
            'website'=>fake()->url()
        ];
    }
}
