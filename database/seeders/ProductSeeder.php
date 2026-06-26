<?php
namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product = [
            [
                'name'           => 'Metformin',
                'description'    => '',
                'category_id'    => 1,
                'dosage_form_id' => 1,
                'dosage'         => '500mg',
                'status'         => true,
            ],
            [
                'name'           => 'Paracetamol',
                'description'    => '',
                'category_id'    => 1,
                'dosage_form_id' => 1,
                'dosage'         => '500mg',
                'status'         => true,
            ],
            [
                'name'           => 'Vitamin',
                'description'    => '',
                'category_id'    => 1,
                'dosage_form_id' => 1,
                'dosage'         => '500mg',
                'status'         => true,
            ],
        ];
        foreach ($product as $products) {

            Product::create($products);
        }

    }
}
