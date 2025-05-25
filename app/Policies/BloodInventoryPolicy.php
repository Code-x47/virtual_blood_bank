<?php

namespace App\Policies;

use App\Models\BloodInventory;
use App\Models\Blood_Bank;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BloodInventoryPolicy
{
    
    public function before(User $user, string $ability):bool|null {
      if($user->designation === 'admin') {
         return true;
       }
       return false;

    }
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, BloodInventory $bloodinventory): bool
    {
        return $user->designation == "agent"  && $bloodinventory->blood_bank_id == $user->blood_bank->id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->designation === 'agent';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, BloodInventory $bloodInventory): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, BloodInventory $bloodInventory): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, BloodInventory $bloodInventory): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, BloodInventory $bloodInventory): bool
    {
        return false;
    }
}
