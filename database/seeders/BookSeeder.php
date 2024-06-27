<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 30; $i++) {
            Book::create([
                'title' => $faker->sentence(3),
                'description' => $faker->paragraph(3),
                'author' => $faker->name,
                'pages' => $faker->numberBetween(100, 500),
                'published_at' => $faker->date(),
            ]);
        }
    }
}
