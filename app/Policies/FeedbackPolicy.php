<?php

namespace App\Policies;

use App\Models\Feedback;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FeedbackPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return false;
    }

    public function view(User $user, Feedback $feedback): bool
    {
        return false;
    }


    public function create(User $user): bool
    {
        return true;
    }


    public function update(User $user, Feedback $feedback): bool
    {
        return false;
    }


    public function delete(User $user, Feedback $feedback): bool
    {
        return false;
    }

    public function restore(User $user, Feedback $feedback): bool
    {
        return false;
    }

    public function forceDelete(User $user, Feedback $feedback): bool
    {
        return false;
    }
}
