<?php

namespace Database\Seeders;

use App\Models\Village;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class VillageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $path = database_path('data/CambodiaVillageList2025.json');

        // Read file
        $json = File::get($path);
        // Decode File
        $village = json_decode($json, true);

        // Loop and insert into database
        foreach ($village as $villages) {
            Village::create($villages);
        }
    }
}
