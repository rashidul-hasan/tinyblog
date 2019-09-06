<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(\Faker\Generator $faker)
    {
        \App\Models\User::create([
            'email' => 'admin@tinycms.com',
            'password' => bcrypt('123456'),
            'name' => 'Super Admin',
            'role' => 1,
            'verified' => true
        ]);

        // categories
        \App\Models\Category::create([
            'name' => 'Technology',
            'slug' => 'technology',
        ]);
        \App\Models\Category::create([
            'name' => 'Finance',
            'slug' => 'finance',
        ]);
        \App\Models\Category::create([
            'name' => 'Others',
            'slug' => 'others',
        ]);

        // tags
        \App\Models\Tag::create([
            'name' => 'Technology',
            'slug' => 'technology',
        ]);
        \App\Models\Tag::create([
            'name' => 'Finance',
            'slug' => 'finance',
        ]);
        \App\Models\Tag::create([
            'name' => 'Others',
            'slug' => 'others',
        ]);

        // artciles
        for ($i =0; $i < 30; $i++){

            $title = $faker->sentence($nbWords = 6, $variableNbWords = true);
            $slug = str_slug($title);

            \App\Models\Article::create([
                'title' => $title,
                'slug' => $slug,
                'feature_image' => 'https://placeimg.com/640/480/any',
                'visibility' => \App\Models\Article::VISIBILITY_SUBSCRIBER,
                'status' => 'published',
                'content' => $faker->text($maxNbChars = 400)
            ]);
        }
    }
}
