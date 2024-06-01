<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function follow(User $user)
    {
        if ($user->id === Auth::id()) {
            return redirect()->back()->with('error', 'Anda tidak dapat melakukan follow terhadap diri sendiri.');
        }

        if (Auth::user()->isFollowing($user)) {
            return redirect()->back()->with('error', 'Anda sudah melakukan follow terhadap pengguna ini.');
        }

        Auth::user()->follow($user);

        return redirect()->back();
    }

    public function unfollow(User $user)
    {
        $user = auth()->user();

        if ($user->isFollowing($user)) {
            $user->unfollow($user);
        }

        return redirect()->back();
    }
}
