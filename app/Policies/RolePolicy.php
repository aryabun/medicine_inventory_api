<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;

class RolePolicy
{
    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return mixed
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('role.view');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Role $role
     * @return mixed
     */
    public function view(User $user, Role $role): bool
    {
        return $user->hasPermission('role.view');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user): bool
    {
        return $user->hasPermission('role.create');
    }
     /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Role $role
     * @return mixed
     */
    public function update(User $user, Role $role): bool
    {
        return $user->hasPermission('role.update');
    }
     /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Role $role
     * @return mixed
     */
    public function delete(User $user, Role $role): bool
    {
        return $user->hasPermission('role.delete');
    }
}
