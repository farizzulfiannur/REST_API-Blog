<?php

namespace Database\Seeders;

use App\Models\post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $post = post::insert([
            'title' => 'POST 1',
            'news_content' => 'Lorem Ipsum',
            'author' => 1,
        ]);
    }
}
