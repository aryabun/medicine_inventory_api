<?php
namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $path = database_path('data/CambodiaProvinceList2025.json');

        // Read file
        $json = File::get($path);
        // Decode File
        $province = json_decode($json, true);

        // Loop and insert into database
        foreach ($province as $provinces) {
            City::create($provinces);
        }

    }
}
