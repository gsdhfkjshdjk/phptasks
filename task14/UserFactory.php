<?php

//создадим фабрики для моделей User и Post
//php artisan make:factory UserFactory --model=User
//php artisan make:factory PostFactory --model=Post



//UserFactory.php
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class UserFactory extends Factory
{
    protected $model = \App\Models\User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // или $this->faker->password()
            'remember_token' => Str::random(10),
        ];
    }
}

//PostFactory.php
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = \App\Models\Post::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'body' => $this->faker->paragraph(),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}

//php artisan make:seeder UsersAndPostsSeeder
//UsersAndPostsSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;

class UsersAndPostsSeeder extends Seeder
{
    public function run()
    {
        User::factory()->count(50)->create();

        Post::factory()->count(200)->create();
    }
}

//php artisan db:seed --class=Database\\Seeders\\UsersAndPostsSeeder
//php artisan db:seed