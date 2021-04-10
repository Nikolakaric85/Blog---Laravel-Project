<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;
use App\Policies\PostPolicy;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    use HandlesAuthorization;

    public function delete(User $user, Post $post)
    {
        return $user->id === $post->user_id || $user->role_id === 1
        ? Response::allow()
        : Response::deny('you cannot delete this post.');
    }

    
    public function update(User $user, Post $post)
    {
        return $user->id === $post->user_id
        ? Response::allow()
        : Response::deny('You do not own this post.');
    }




    
}
