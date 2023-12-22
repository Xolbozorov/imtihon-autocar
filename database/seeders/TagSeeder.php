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
            ['name' => 'National'],
            ['name' => 'International'],
            ['name' => 'Economics'],
            ['name' => 'Politics'],
            ['name' => 'Lifestyle'],
            ['name' => 'Technology'],
            ['name' => 'Trades'],
        ];
        
        Tag::insert($tags);
    }
}
