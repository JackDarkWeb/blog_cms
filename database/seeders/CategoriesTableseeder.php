<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("categories")->insert([
            [
                "user_id" => 1,
                "name" => "Laravel",
                "slug" => "laravel",
                "is_published" => 1,
            ],

            [
                "user_id" => 1,
                "name" => "Python",
                "slug" => "python",
                "is_published" => 1,
            ],
            [
                "user_id" => 1,
                "name" => "Wordpress",
                "slug" => "wordpress",
                "is_published" => 1,
            ],

            [
                "user_id" => 1,
                "name" => "Vue.js",
                "slug" => "vue-js",
                "is_published" => 1,
            ],

            [
                "user_id" => 1,
                "name" => "Javascript",
                "slug" => "javascript",
                "is_published" => 1,
            ],

            [
                "user_id" => 1,
                "name" => "Django",
                "slug" => "django",
                "is_published" => 1,
            ],



        ]);
    }
}
