<?php

namespace App\Policies;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RestaurantPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Restaurant $restaurant): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role==='restaurateur';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Restaurant $restaurant): bool
    {
        return $user->id===$restaurant->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Restaurant $restaurant): bool
    {
        return $user->role === 'admin' || $user->id === $restaurant->user_id;
    }

    
    public function restore(User $user, Restaurant $restaurant): bool
    {
        return $user->role === 'admin' || $user->id === $restaurant->user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Restaurant $restaurant): bool
    {
        return $user->role==='admin';
    }
}
