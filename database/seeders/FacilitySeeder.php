<?php

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $path = database_path('data/HealthFacility.json');

        // Read file
        $json = File::get($path);
        // Decode File
        $facility = json_decode($json, true);

        // Loop and insert into database
        foreach ($facility as $facilities) {
            Facility::create($facilities);
        }
    }
}
