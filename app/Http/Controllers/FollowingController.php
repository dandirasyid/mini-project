<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowingController extends Controller
{
    public function index(){
        $user = Auth::user();
        $followings = $user->followings()->get();
        return view('following.index', compact('followings', 'user'));
    }

    public function unfollow(User $user)
    {
        Auth::user()->unfollow($user);
        return redirect()->back();
    }
}
