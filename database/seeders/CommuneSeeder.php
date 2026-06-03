<?php

namespace Database\Seeders;

use App\Models\Commune;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CommuneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = database_path('data/CambodiaCommuneList2025.json');

        // Read file
        $json = File::get($path);
        // Decode File
        $commune = json_decode($json, true);

        // Loop and insert into database
        foreach ($commune as $communes) {
            Commune::create($communes);
        }
    }
}
