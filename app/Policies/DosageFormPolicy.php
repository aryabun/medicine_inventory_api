<?php

namespace App\Policies;

use App\Models\DosageForm;
use App\Models\User;

class DosageFormPolicy
{
    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return mixed
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('dosage_form.view');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param DosageForm $dosage_form
     * @return mixed
     */
    public function view(User $user, DosageForm $dosage_form): bool
    {
        return $user->hasPermission('dosage_form.view');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user): bool
    {
        return $user->hasPermission('dosage_form.create');
    }
     /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param DosageForm $dosage_form
     * @return mixed
     */
    public function update(User $user, DosageForm $dosage_form): bool
    {
        return $user->hasPermission('dosage_form.update');
    }
     /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param DosageForm $dosage_form
     * @return mixed
     */
    public function delete(User $user, DosageForm $dosage_form): bool
    {
        return $user->hasPermission('dosage_form.delete');
    }
}
