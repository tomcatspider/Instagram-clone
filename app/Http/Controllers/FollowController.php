<?php

namespace App\Http\Controllers;

use app\Models\User;


class FollowController extends Controller
{
    public function __construct()
    {
        $this->middleware ('auth');
    }
    public function store( User $user){
        return auth()->user->following()->toggle($user->profile);

    }
}
