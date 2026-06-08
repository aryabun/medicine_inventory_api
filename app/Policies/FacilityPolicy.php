<?php

namespace App\Policies;

use App\Models\Facility;
use App\Models\User;

class FacilityPolicy
{
    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return mixed
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('facility.view');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Facility $facility
     * @return mixed
     */
    public function view(User $user, Facility $facility): bool
    {
        return $user->hasPermission('facility.view');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user): bool
    {
        return $user->hasPermission('facility.create');
    }
     /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Facility $facility
     * @return mixed
     */
    public function update(User $user, Facility $facility): bool
    {
        return $user->hasPermission('facility.update');
    }
     /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Facility $facility
     * @return mixed
     */
    public function delete(User $user, Facility $facility): bool
    {
        return $user->hasPermission('facility.delete');
    }
}
