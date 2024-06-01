@extends('layouts.master')
@section('title', 'Searching')

@section('content')
@include('sidebar.index')
<div class="content flex-grow-1" style="margin-left: 250px;">
    <div style="background-color: black; min-height: 100vh;" class="border-start border-secondary">
        <div class="sticky-top w-100 pb-2" style="background-color: black;">
            <div class="d-flex justify-content-center p-2 mb-1">
                <img src="{{ asset('images/logo-medsos.png') }}" alt="logo-medsos" width="50px">
            </div>
            <div class="d-flex justify-content-center gap-4 text-white">
                <form class="form-inline d-flex" method="GET" action="{{ route('search') }}">
                    <input class="form-control mr-sm-2 text-white" style="background-color: black; border-radius:10px; width: 20rem;" type="search" placeholder="Search" aria-label="Search" name="query" value="{{ request('query') }}">
                    <button class="btn my-2 my-sm-0 mx-2" type="submit">
                        <i class="bi bi-search text-white"></i>
                    </button>
                </form>
            </div>
        </div>
        <div class="d-flex justify-content-around mt-5 text-white">
            <div class="col-md-4">
                <div style="background-color: black;">
                    <div>
                        <h6>Hasil Pencarianmu</h6>
                    </div>
                    <div style="width: 350px;">
                    @if(request()->has('query') && !$users->isEmpty())
                    @foreach($users as $user)
                    <div class="d-flex mt-3">
                        <div class="d-flex align-items-center">
                            <img src="{{ $user->image ? Storage::url($user->image) : asset('images/default_profile.png') }}" alt="user" class="rounded-circle" width="40px">
                        </div>
                        <div class="d-flex justify-content-between align-items-center mx-3 flex-grow-1">
                            <div class="user-info">
                                <p class="mb-0 fw-bold">{{ $user->username }}</p>
                                <p class="mb-0" style="font-size: 10px;">{{ $user->name }}</p>
                            </div>
                            <div class="follow-btn">
                                @if(auth()->check() && auth()->user()->isFollowing($user))
                                <form action="{{ route('unfollow', $user) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                    <button type="submit" class="btn fw-bold" style="color: #40E0D0; text-decoration: none; font-size: 13px;">Unfollow</button>
                                </form>
                                @else
                                <form action="{{ route('follow', $user) }}" method="POST">
                                @csrf
                                    <button type="submit" class="btn fw-bold" style="color: #40E0D0; text-decoration: none; font-size: 13px;">Follow</button>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                        <p class="text-secondary" style="font-size: 14px;">Tidak ada pencarian.</p>
                    @endif
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="sticky-top col-md-8" style="top: 20%;">
                    <div>
                        <h6>Siapa yang harus diikuti</h6>
                        <p class="text-secondary fw-bold" style="font-size: 10px;">Orang yang mungkin anda kenal</p>
                    </div>
                    <div>
                        @foreach($users as $user)
                        <div class="d-flex mb-3 align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="{{ $user->image ? Storage::url($user->image) : asset('images/default_profile.png') }}" alt="user" class="rounded-circle" width="40px">
                            </div>
                            <div class="d-flex justify-content-between align-items-center mx-3 flex-grow-1">
                                <div class="user-info">
                                    <p class="mb-0 fw-bold">{{ $user->username }}</p>
                                    <p class="mb-0" style="font-size: 10px;">{{ $user->name }}</p>
                                </div>
                                <div class="follow-btn">
                                    @if(auth()->check() && auth()->user()->isFollowing($user))
                                    <form action="{{ route('unfollow', $user) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="btn fw-bold" style="color: #40E0D0; text-decoration: none; font-size: 13px;">Unfollow</button>
                                    </form>
                                    @else
                                    <form action="{{ route('follow', $user) }}" method="POST">
                                    @csrf
                                        <button type="submit" class="btn fw-bold" style="color: #40E0D0; text-decoration: none; font-size: 13px;">Follow</button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="border-bottom border-secondary"></div>
                    <p class="text-secondary mb-3 mt-2 mx-2" style="font-size: 10px;">Term Of Service Privacy Policy Cookie Policy Accessibility Ads Info More &#169; 2024 Sosmed</p>
                </div>
            </div>
            @if (!Auth::check())
            <div class="text-white" style="background-color: #3F9AA8; position: fixed; bottom: 0; left: 0; width: 100%;">
                <div class="container mt-4 mb-4 d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-2">Jangan ketinggalan berita terbaru</h5>
                        <p style="font-size: 14px;">login untuk pengalaman yang baru</p>
                    </div>
                    <div>
                        <a href="{{ route('login') }}" class="btn text-white fw-bold border border-light" style="border-radius: 15px;">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-light text-dark fw-bold" style="border-radius: 15px;">Register</a>
                    </div>
                </div>
            </div>
            @endif
    </div>
</div>
@endsection