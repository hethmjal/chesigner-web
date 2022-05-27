<?php

namespace App\Policies;

use App\Models\User;
use App\Models\WorkingHours;
use Illuminate\Auth\Access\HandlesAuthorization;

class WorkingHoursPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        if($user->type == 'designer'){
            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\WorkingHours  $workingHours
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, WorkingHours $workingHours)
    {
        if($user->type == 'designer'){
            return true;
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        if($user->type == 'designer'){
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\WorkingHours  $workingHours
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, WorkingHours $workingHours)
    {
        if($user->type == 'designer' && $workingHours->user_id == $user->id){
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\WorkingHours  $workingHours
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, WorkingHours $workingHours)
    {
        if($user->type == 'designer' && $workingHours->user_id == $user->id){
            return true;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\WorkingHours  $workingHours
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, WorkingHours $workingHours)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\WorkingHours  $workingHours
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, WorkingHours $workingHours)
    {
        //
    }
}