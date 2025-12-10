<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            "Technology",
            "Environment",
            "Business",
            "Science",
            "Health",
            "Art",
            "Education",
        ];

        foreach ($categories as $name) {
            Category::create([
                'name' => $name,
                'slug' => Str::slug($name), // generate slug automatically


            ]);
        }
    }
}
