@extends('layouts.master')
@section('title', 'Following')

@section('content')
@include('sidebar.index')
<div class="content" style="margin-left: 250px;">
    <div style="background-color: black; min-height: 100vh;" class="border-start border-secondary">
        <div class="sticky-top w-100 pb-2" style="background-color: black;">
            <div class="d-flex justify-content-center p-2 mb-1">
                <img src="{{ asset('images/logo-medsos.png') }}" alt="logo-medsos" width="50px">
            </div>
            <div class="d-flex justify-content-center gap-4 text-white">
                <a href="{{ route('home') }}" class="text-white text-decoration-none active" id="foryou" onclick="setActive('foryou')">For You</a>
                <a href="{{ route('home.following') }}" class="text-white text-decoration-none" id="following" onclick="setActive('following')">Following</a>
            </div>
        </div>
        <div class="d-flex justify-content-around mt-5 text-white">
            <div class="column">
                @foreach ($posts as $post)
                <div class="card border border-secondary mb-3" style="width: 450px; background-color: black;">
                    <div class="d-flex justify-content-between mt-3 px-4">
                        <div class="d-flex">
                            <div>
                                <img src="{{ $post->user->image ? Storage::url($post->user->image) : asset('images/default_profile.png') }}" class="rounded-circle" alt="user" width="40px">
                            </div>
                            <div class="mx-2">
                                <p class="mb-0 fw-bold" style="font-size: 14px;">{{ $post->user->username }}</p>
                                <p class="mb-0" style="font-size: 12px;">{{ $post->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        <div>
                            @if(auth()->check() && auth()->user())
                            <form action="{{ route('bookmark.store', $post) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn text-white px-2 d-flex" style="text-decoration: none;">
                                    <i class="bi bi-bookmark{{ $post->bookmarkedBy(auth()->user()) ? '-fill' : '' }}" style="color: {{ $post->bookmarkedBy(auth()->user()) ? 'white' : 'white' }}"></i>
                                </button>
                            </form>
                            @endif
                        </div>
                    </div>
                    <p class="card-text mt-3 px-4">{{ $post->deskripsi }}</p>
                    <a href="{{ route('seePost', ['post_id' => $post->id]) }}" class="text-white" style="text-decoration: none;">
                        <div class="d-flex align-items-center justify-content-center mt-2 mb-4">
                            <img src="{{ Storage::url($post['image']) }}" class="card-img-top rounded-3" alt="posting" style="width: 400px;">
                        </div>
                        <div class="border-bottom border-secondary mx-auto" style="width: 400px;"></div>
                        <div class="card-body">
                            <div class="d-flex">
                                @if(!$post->likeBy(auth()->user()))
                                <form action="{{ route('posting.like', $post) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn text-white px-2 d-flex" style="text-decoration: none;">
                                        <i class="bi bi-heart" style="color: #3F9AA8"></i>
                                        <p class="card-text mx-2 text-white">{{ $post->likes->count() }} Likes</p>
                                    </button>
                                </form>
                                @else
                                <form action="{{ route('posting.like', $post) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn text-white px-2 d-flex" style="text-decoration: none;">
                                        <i class="bi bi-heart-fill" style="color: red"></i>
                                        <p class="card-text mx-2">{{ $post->likes->count() }} Likes</p>
                                    </button>
                                </form>
                                @endif
                                <form action="{{ route('seePost', ['post_id' => $post->id]) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn text-white px-2 d-flex" style="text-decoration: none;">
                                        <i class="bi bi-chat"></i>
                                        <p class="card-text mx-2">0 Comments</p>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
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
                                @if(auth()->check())
                                    @if(auth()->user()->isFollowing($user))
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
                                    @else
                                        <form action="{{ route('login') }}" method="GET">
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