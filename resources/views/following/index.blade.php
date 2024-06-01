@extends('layouts.master')
@section('title', 'Following')

@section('content')
@include('sidebar.index')
<div class="content" style="margin-left: 250px;">
    <div style="background-color: black; min-height: 100vh;" class="border-start border-secondary">
        <div class="sticky-top w-100 pb-2" style="background-color: black;">
            <div class="d-flex justify-content-center p-2 mb-1">
                <p class="fw-bold text-white mt-2" style="font-size: 20px;">{{ $user->username }}</p>
            </div>
            <div class="d-flex justify-content-center gap-5 text-white">
                <a href="{{ route('follower') }}" class="text-white text-decoration-none" id="semua">Followers</a>
                <a href="{{ route('following') }}" class="text-white text-decoration-none active" id="komentar">Following</a>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-5 text-white ps-5 pe-5">
            <div class="col-md-12 text-white d-flex justify-content-between">
                <div class="col-md-6 ps-3">
                    <p class="fw-bold">Cari Followings</p>
                    <div class="gap-4 text-white">
                        <form class="form-inline d-flex">
                            <input class="form-control mr-sm-2 text-white" style="background-color: black; border-radius:10px; width: 100%;" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn my-2 my-sm-0 mx-2" type="submit">
                                <i class="bi bi-search text-white"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 ps-3">
                    <p class="fw-bold">List All Followings</p>
                    <div>
                        @foreach ($followings as $following)
                        <div class="d-flex mb-3 align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="{{ $following->image ? Storage::url($following->image) : asset('images/default_profile.png') }}" alt="user" class="rounded-circle" width="40px">
                            </div>
                            <div class="d-flex justify-content-between align-items-center mx-3 flex-grow-1">
                                <div class="user-info">
                                    <p class="mb-0 fw-bold">{{ $following->username }}</p>
                                    <p class="mb-0" style="font-size: 10px;">{{ $following->name }}</p>
                                </div>
                                <div class="follow-btn">
                                    <form action="{{ route('following.unfollow', $following) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="btn fw-bold" style="color: #40E0D0; text-decoration: none; font-size: 13px;">Unfollow</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection