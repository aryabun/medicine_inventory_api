<?php
namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $role = [
            [
                'name'        => 'super-admin',
                'description' => 'Super Admin',
            ],
            [
                'name'        => 'manager',
                'description' => 'Manager',
            ],
            // Hospital Pharmacist (The Inventory Owner)
            [
                'name'        => 'pharmacist',
                'description' => 'Pharmacist',
            ],
            [
                'name'        => 'pht-technician',
                'description' => 'Pharmacy Technician',
            ],
            [
                'name'        => 'nurse',
                'description' => 'Nurse',
            ],
        ];
        foreach ($role as $roles) {
            Role::create($roles);
        }
    }
}
