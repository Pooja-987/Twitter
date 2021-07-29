<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class FollowController extends Controller
{
    public function store(User $user){
        
        if(auth()->user()->following($user))
        {
            auth()->user()->unfollow($user);
        }else{
            auth()->user()->follow($user);

        }


        return back();
    }
}
