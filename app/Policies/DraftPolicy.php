<?php

namespace App\Policies;

use App\Models\Draft;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;


    class DraftPolicy
    {
        use HandlesAuthorization;
    
        public function show(User $user, Draft $draft)
        {
            return $user->id === $draft->user_id;
        }
    }

