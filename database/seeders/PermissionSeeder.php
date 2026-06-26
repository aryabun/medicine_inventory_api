<?php
namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $permission = [
            [
                'name'        => 'product.view',
                'module'      => 'product',
                'feature'     => 'product.view',
                'description' => 'View detail products',
            ],
            [
                'name'        => 'product.create',
                'module'      => 'product',
                'feature'     => 'product.create',
                'description' => 'Create products',
            ],
            [
                'name'        => 'product.update',
                'module'      => 'product',
                'feature'     => 'product.update',
                'description' => 'Update products',
            ],
            [
                'name'        => 'product.delete',
                'module'      => 'product',
                'feature'     => 'product.delete',
                'description' => 'Delete products',
            ],
            [
                'name'        => 'user.view',
                'module'      => 'user',
                'feature'     => 'user.view',
                'description' => 'View detail user',
            ],
            [
                'name'        => 'user.create',
                'module'      => 'user',
                'feature'     => 'user.create',
                'description' => 'Create user',
            ],
            [
                'name'        => 'user.update',
                'module'      => 'user',
                'feature'     => 'user.update',
                'description' => 'Update user',
            ],
            [
                'name'        => 'user.delete',
                'module'      => 'user',
                'feature'     => 'user.delete',
                'description' => 'Delete user',
            ],
            // Edit Profile
            [
                'name'        => 'account.edit',
                'module'      => 'account',
                'feature'     => 'account.edit',
                'description' => 'Edit account data',
            ],
            [
                'name'        => 'category.view',
                'module'      => 'category',
                'feature'     => 'category.view',
                'description' => 'View detail category',
            ],
            [
                'name'        => 'category.create',
                'module'      => 'category',
                'feature'     => 'category.create',
                'description' => 'Create category',
            ],
            [
                'name'        => 'category.update',
                'module'      => 'category',
                'feature'     => 'category.update',
                'description' => 'Update category',
            ],
            [
                'name'        => 'category.delete',
                'module'      => 'category',
                'feature'     => 'category.delete',
                'description' => 'Delete category',
            ],
            [
                'name'        => 'dosage_form.view',
                'module'      => 'dosage form',
                'feature'     => 'dosage_form.view',
                'description' => 'View detail dosage form',
            ],
            [
                'name'        => 'dosage_form.create',
                'module'      => 'dosage form',
                'feature'     => 'dosage_form.create',
                'description' => 'Create dosage form',
            ],
            [
                'name'        => 'dosage_form.update',
                'module'      => 'dosage form',
                'feature'     => 'dosage_form.update',
                'description' => 'Update dosage form',
            ],
            [
                'name'        => 'dosage_form.delete',
                'module'      => 'dosage form',
                'feature'     => 'dosage_form.delete',
                'description' => 'Delete dosage form',
            ],
            [
                'name'        => 'facility.view',
                'module'      => 'facility',
                'feature'     => 'facility.view',
                'description' => 'View detail facility',
            ],
            [
                'name'        => 'facility.create',
                'module'      => 'facility',
                'feature'     => 'facility.create',
                'description' => 'Create facility',
            ],
            [
                'name'        => 'facility.update',
                'module'      => 'facility',
                'feature'     => 'facility.update',
                'description' => 'Update facility',
            ],
            [
                'name'        => 'facility.delete',
                'module'      => 'facility',
                'feature'     => 'facility.delete',
                'description' => 'Delete facility',
            ],
            [
                'name'        => 'role.view',
                'module'      => 'role',
                'feature'     => 'role.view',
                'description' => 'View detail role',
            ],
            [
                'name'        => 'role.create',
                'module'      => 'role',
                'feature'     => 'role.create',
                'description' => 'Create role',
            ],
            [
                'name'        => 'role.update',
                'module'      => 'role',
                'feature'     => 'role.update',
                'description' => 'Update role',
            ],
            [
                'name'        => 'role.delete',
                'module'      => 'role',
                'feature'     => 'role.delete',
                'description' => 'Delete role',
            ],
            [
                'name'        => 'permission.view',
                'module'      => 'permission',
                'feature'     => 'permission.view',
                'description' => 'View detail permission',
            ],
            [
                'name'        => 'permission.create',
                'module'      => 'permission',
                'feature'     => 'permission.create',
                'description' => 'Create permission',
            ],
            [
                'name'        => 'permission.update',
                'module'      => 'permission',
                'feature'     => 'permission.update',
                'description' => 'Update permission',
            ],
            [
                'name'        => 'permission.delete',
                'module'      => 'permission',
                'feature'     => 'permission.delete',
                'description' => 'Delete permission',
            ],
        ];
        foreach ($permission as $permissions) {
            Permission::create($permissions);
        }
    }
}
