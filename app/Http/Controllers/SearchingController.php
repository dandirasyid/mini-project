<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchingController extends Controller {
    public function search(Request $request) {
        $query = $request->input('query');
        $users = [];
        if ($query) {
            $users = User::where('username', 'LIKE', "%{$query}%")
                         ->orWhere('name', 'LIKE', "%{$query}%")
                         ->get();
        } else {
            if (Auth::check()) {
                $followings = Auth::user()->followings()->pluck('id')->toArray();
                $users = User::whereNotIn('id', $followings)
                             ->where('id', '!=', Auth::id())
                             ->get();
            } else {
                $users = User::all();
            }
        }
        return view('explore.index', compact('users', 'query'));
    }
}
