@extends('layouts.master')
@section('title', 'Detail Posting')

@section('content')
@include('sidebar.index')
<div class="content" style="margin-left: 250px;">
    <div style="background-color: black; min-height: 100vh;" class="px-5 border-start border-secondary">
        <div class="sticky-top w-100 pb-2" style="background-color: black;">
            <div class="d-flex justify-content-center p-2 mb-1">
                <img src="{{ asset('images/logo-medsos.png') }}" alt="logo-medsos" width="50px">
            </div>
        </div>
        <div class="ms-4">
            <a href="{{ route('home') }}" class="text-white fw-bold" style="text-decoration: none;">
                <i class="bi bi-chevron-left"></i>
                Back
            </a>
        </div>
        <div class="mt-3 text-white pb-3">
            <div class="border border-secondary d-flex" style="background-color: black;">
                <div class="d-flex flex-column col-md-6">
                    <div class="d-flex mt-3 px-4">
                        <div class="d-flex align-items-center">
                            <div>
                                <img src="{{ $post->user->image ? Storage::url($post->user->image) : asset('images/default_profile.png') }}" class="rounded-circle" alt="user" width="40px">
                            </div>
                            <div class="mx-2">
                                <p class="mb-0 fw-bold" style="font-size: 14px;">{{ $post->user->username }}</p>
                            </div>
                        </div>
                    </div>
                    <p class="card-text mt-3 px-4">{{ $post->title }}</p>
                    <p class="mb-0 px-4 text-white" style="font-size: 16px;">{{ $post->deskripsi }}</p>
                    <div class="d-flex align-items-center justify-content-start mt-2 mb-4 px-4">
                        <img src="{{ Storage::url($post->image) }}" class="card-img-top rounded-3" alt="posting" style="width: 500px;">
                    </div>
                </div>
                <div class="col-md-6 d-flex flex-column mt-4 px-4">
                    <p class="mb-0 fw-bold" style="font-size: 14px;">Komentar</p>
                    <div class="d-flex justify-content-center">
                        <p class="mt-5 text-center text-secondary" style="font-size: 14px;">Belum ada komentar</p>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex align-items-center">
                            <div>
                                <img src="{{ asset('images/default_profile.png') }}" class="rounded-circle" alt="user" width="30px">
                            </div>
                            <div class="mx-2">
                                <p class="mb-0 fw-bold" style="font-size: 14px;">dandirasyid</p>
                            </div>
                        </div>
                        <div>
                            <p class="mt-2" style="font-size: 12px;">Senang banget deh</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="" class="d-flex align-items-center text-white" style="text-decoration: none; font-size: 12px;">
                                <i class="bi bi-heart mx-2" style="font-size: 1rem; color: #3F9AA8;"></i>
                                0 Likes
                            </a>
                            <a href="" class="text-danger" style="text-decoration: none; font-size: 12px; margin-left: 10rem;">Hapus</a>
                            <a href="" style="text-decoration: none; font-size: 12px; color: #3F9AA8;">Reply</a>
                        </div>
                    </div>

                    <div class="ms-4 mb-3">
                        <div class="d-flex align-items-center">
                            <div>
                                <img src="{{ asset('images/default_profile.png') }}" class="rounded-circle" alt="user" width="30px">
                            </div>
                            <div class="mx-2">
                                <p class="mb-0 fw-bold" style="font-size: 14px;">dandirasyid</p>
                            </div>
                        </div>
                        <div>
                            <p class="mt-2" style="font-size: 12px;">Senang banget deh</p>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="" class="text-danger" style="text-decoration: none; font-size: 12px; margin-left: 10rem;">Hapus</a>
                        </div>
                    </div>
                    <div class="border-bottom border-secondary"></div>
                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center mt-2">
                            @if(!$post->likeBy(auth()->user()))
                            <form action="{{ route('posting.like', $post) }}" method="POST">
                            @csrf
                                <button type="submit" class="btn text-white px-2 d-flex" style="text-decoration: none;">
                                    <i class="bi bi-heart" style="color: #3F9AA8; font-size: 24px;"></i>
                                </button>
                            </form>
                            @else
                            <form action="{{ route('posting.like', $post) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn text-white px-2 d-flex" style="text-decoration: none;">
                                    <i class="bi bi-heart-fill" style="color: red; font-size: 24px;"></i>
                                </button>
                            </form>
                            @endif
                            <a href="" class="text-white" style="text-decoration: none; margin-right: 15px;">
                                <i class="bi bi-chat" style="font-size: 1.5rem; color: #3F9AA8;"></i>
                            </a>
                            <a href="" class="text-white" style="text-decoration: none;">
                                <i class="bi bi-send" style="font-size: 1.5rem; color: #3F9AA8;"></i>
                            </a>
                        </div>
                        <div class="mt-2">
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
                    <div class="mt-2" style="font-size: 12px;">
                        <p class="mb-0 fw-bold">{{ $post->likes->count() }} Likes</p>
                        <p class="mb-0">{{ $post->created_at->diffForHumans() }}</p>
                    </div>
                    <div class="mt-2 mb-4">
                        <form action="" method="">
                            <input type="text" name="komentar" id="komentar" class="komentar border-bottom border-secondary text-white" style="background-color: black; border:none; font-size: 14px; width: 80%; box-shadow: none;" placeholder="Tambahkan komentar">
                            <button type="submit" class="text-white" style="background-color: black; border: none;">Kirim</button>
                        </form>
                    </div>
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
