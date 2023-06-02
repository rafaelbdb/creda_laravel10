<?php
namespace App\Policies;

use App\Models\Movement;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class MovementPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response
    {
        // By default, deny access to viewing any movements
        return Response::deny('You are not authorized to view movements.');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Movement $movement): Response
    {
        // By default, deny access to viewing the movement
        return Response::deny('You are not authorized to view this movement.');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Only authenticated users can create movements
        return $user->getAuthIdentifier();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Movement $movement): bool
    {
        // Only the owner of the movement can update it
        return $user->id === $movement->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Movement $movement): bool
    {
        // Only the owner of the movement can delete it
        return $user->id === $movement->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Movement $movement): bool
    {
        // By default, do not allow restoring movements
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Movement $movement): bool
    {
        // By default, do not allow permanently deleting movements
        return false;
    }
}
