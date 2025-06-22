<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            'Software Engineering',
            'Computer Science',
            'Data Analysis',
            'System Design',
            'System Archticture'
        ];

        foreach ($tags as $tag) {
            Tag::create([
                'title' => $tag
            ]);
        }
    }
}
