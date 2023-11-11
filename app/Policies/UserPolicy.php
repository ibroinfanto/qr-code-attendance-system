<?php

namespace App\Policies;

use App\Models\User;
use App\Utils\Utility;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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

    public function isAdmin(User $user): bool
    {
        return $user->role === Utility::USER_ROLES['lecturer'];
    }

    public function isInvigilator(User $user): bool
    {
        return $user->role === Utility::USER_ROLES['admin'];
    }
}
