<?php

namespace junecity\shop\policies;

use junecity\shop\models\User;

use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

  

    
     public function update(User $user)
    {
        return $user->id === $user->user_id;
    }



}
