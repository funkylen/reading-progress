<?php

namespace App\Policies;

use App\Models\ReadLog;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReadLogPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return false;
    }

    public function view(User $user, ReadLog $readLog): bool
    {
        return $user->id === $readLog->book->user_id;
    }

    public function create(User $user): bool
    {
        return true;
    }


    public function update(User $user, ReadLog $readLog): bool
    {
        return $user->id === $readLog->book->user_id;
    }

    public function delete(User $user, ReadLog $readLog): bool
    {
        return $user->id === $readLog->book->user_id;
    }

    public function restore(User $user, ReadLog $readLog): bool
    {
        return false;
    }

    public function forceDelete(User $user, ReadLog $readLog): bool
    {
        return false;
    }
}
