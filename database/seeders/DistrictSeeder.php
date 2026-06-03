<?php
namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = database_path('data/CambodiaDistrictList2025.json');

        // Read file
        $json = File::get($path);
        // Decode File
        $district = json_decode($json, true);

        // Loop and insert into database
        foreach ($district as $districts) {
            District::create($districts);
        }
    }
}
