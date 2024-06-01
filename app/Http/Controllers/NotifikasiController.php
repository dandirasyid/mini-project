<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotifikasiController extends Controller {
    public function index() {
        return view('notifikasi.index');
    }

    public function comments() {
        return view('notifikasi.komentar');
    }

    public function likes() {
        return view('notifikasi.likes');
    }
}
