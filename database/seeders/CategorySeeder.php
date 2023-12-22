<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => 'National' ]);
        Category::create(['name' => 'International' ]);
        Category::create(['name' => 'Economics' ]);
        Category::create(['name' => 'Politics' ]);
        Category::create(['name' => 'Lifestyle' ]);
        Category::create(['name' => 'Technology' ]);
        Category::create(['name' => 'Trades' ]);
    }
}
