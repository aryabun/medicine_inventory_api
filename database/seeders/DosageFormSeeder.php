<?php

namespace Database\Seeders;

use App\Models\DosageForm;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DosageFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $dosage_form = [
            [
                'name'           => 'Tablets'
            ],
            [
                'name'           => 'Capsules'
            ],
            [
                'name'           => 'Gels'
            ],
        ];
        foreach ($dosage_form as $dosage_forms) {
            DosageForm::create($dosage_forms);
        }
    }
}
