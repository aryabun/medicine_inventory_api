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
        $category = [
            [
                'name'           => 'Antibiotic'
            ],
            [
                'name'           => 'Laxative'
            ],
            [
                'name'           => 'Vitamin'
            ],
        ];
        foreach ($category as $categories) {
            Category::create($categories);
        }
    }
}
