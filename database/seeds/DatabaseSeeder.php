<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Article::class, 40)->create();
        factory(App\Category::class, 5)->create();
        factory(App\Comment::class, 150)->create();

        factory(App\User::class)->create([
            "name" => "La Minn",
            "email" => "laminn@gmail.com",
        ]);
        factory(App\User::class)->create([
            "name" => "Poe",
            "email" => "poe@gmail.com",
        ]);
        factory(App\User::class)->create([
            "name" => "Zaw Myo",
            "email" => "zaw@gmail.com",
        ]);
    }
}
