<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\User; // 新增
use App\Message; // 新增

class MessagePolicy
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

    // 新增
    public function destroy(User $user, Message $message)
    {
        return $user->id === $message->user_id;
    }

    public function update(User $user, Message $message){ 
        return $user->id === $message->user_id;
    }
}
