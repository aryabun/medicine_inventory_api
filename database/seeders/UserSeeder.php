<?php
namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name'  => 'Admin',
            'last_name'   => 'Super',
            'username'     => 'super-admin',
            'email'       => 'admin@admin.com',
            'gender'      => 'M',
            'role_id'     => '1',
            'facility_id' => null,
            'password'    => Hash::make('admin'),
            'created_at'  => Carbon::now()->toDateTimeString(),
        ]);
    }
}
