<?php

namespace Database\Factories;

use App\Models\PostTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostTranslationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PostTranslation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->unique()->sentence;
        return [
            "locale" => "en",
            "post_id" => rand(1, 50),
            'title' => $title,
            'slug' => Str::slug($title),
            'sub_title' => $this->faker->sentence,
            'details' => $this->faker->paragraph,

        ];
    }
}
