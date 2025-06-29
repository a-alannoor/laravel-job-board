<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // This call seeder any
        $this->call([
            UserSeeder::class,
            PostSeeder::class,
            CommentSeeder::class,
            TagSeeder::class,
        ]); 
    }
}
