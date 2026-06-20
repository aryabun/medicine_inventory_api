<?php

namespace App\Policies;

use App\Models\Inventory;
use App\Models\User;

class InventoryPolicy
{
    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return mixed
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('inventory.view');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Inventory $inventory
     * @return mixed
     */
    public function view(User $user, Inventory $inventory): bool
    {
        return $user->hasPermission('inventory.view');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user): bool
    {
        return $user->hasPermission('inventory.create');
    }
     /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Inventory $inventory
     * @return mixed
     */
    public function update(User $user, Inventory $inventory): bool
    {
        return $user->hasPermission('inventory.update');
    }
     /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Inventory $inventory
     * @return mixed
     */
    public function delete(User $user, Inventory $inventory): bool
    {
        return $user->hasPermission('inventory.delete');
    }
}
