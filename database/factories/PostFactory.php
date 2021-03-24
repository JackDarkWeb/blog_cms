<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $isPublished = [1, 0];
        return [
            "user_id" => rand(1, 5),
            'type'    => "post",
            'is_published' => $isPublished[rand(0,1)],
        ];
    }


}
