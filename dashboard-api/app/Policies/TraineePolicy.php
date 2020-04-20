<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class TraineePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function get(User $user, User $trainee)
    {
        return $trainee->traineeHasCoach->coach_id === $user->id
            ? Response::allow()
            : Response::deny('You do not train this person.');
    }
}
