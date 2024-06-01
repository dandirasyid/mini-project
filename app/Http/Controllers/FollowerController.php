<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowerController extends Controller
{
    public function index(){
        $user = Auth::user();
        $followers = $user->followers;
        return view('follower.index', compact('followers', 'user'));
    }

    public function unfollow(User $follower)
    {
        Auth::user()->unfollowFollower($follower);
        return redirect()->back();
    }
}
