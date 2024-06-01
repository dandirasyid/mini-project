@extends('layouts.master')
@section('title', 'My Profile')

@section('content')
@include('sidebar.index')
<div class="content" style="margin-left: 250px;">
    <div style="background-color: black; min-height: 100vh;" class="border-start border-secondary">
        <div class="sticky-top w-100 pb-2" style="background-color: black;">
            <div class="d-flex justify-content-between" style="padding: 50px 100px 10px;">
                <div class="d-flex justify-content-start align-items-center mb-1">
                    <div>
                        <img src="{{ $user->image ? Storage::url($user->image) : asset('images/default_profile.png') }}" class="rounded-circle" alt="logo-medsos" width="150px" height="130px">
                    </div>
                    <div class="mx-5">
                        <p class="text-white fw-bold mb-2">{{ $user->username }}</p>
                        <div class="mb-2">
                            <a href="#" class="text-white" style="text-decoration: none; font-size: 14px;">{{ $user->posts()->count() }} Posts</a>
                            <a href="{{ route('follower') }}" class="text-white mx-2" style="text-decoration: none; font-size: 14px;">{{ $user->followers()->count() }} Followers</a>
                            <a href="{{ route('following') }}" class="text-white" style="text-decoration: none; font-size: 14px;">{{ $user->followings()->count() }} Following</a>
                        </div>
                        <p class="mb-0 text-white" style="font-weight: 500; font-size: 16px;">{{ $user->name }}</p>
                        <p class=" text-white" style="font-size: 16px;">{{ $user->bio }}</p>
                    </div>
                </div>
                <div class="d-flex">
                    <a href="" class="text-white" style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="bi bi-gear-fill" style="font-size: 22px;"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('profile.pass') }}" method="POST" class="modal-content" enctype="multipart/form-data" style="background-color: black;">
                    @csrf()
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn-close p-3" data-bs-dismiss="modal" aria-label="Close" style="background-color: white; border: none; opacity: 1;"></button>
                    </div>
                    <div class="p-3">
                        <label for="password" class="modal-tittle fs-5 fw-bold text-white" id="exampleModalLabel">Konfirmasi Password</label>
                        <div class="mt-3">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Masukan password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn text-white" data-bs-toggle="modal">Konfirmasi</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="d-flex justify-content-start mt-5 text-white" style="padding: 0 100px;">
            <div class="row col-md-12">
                @if ($posts->isEmpty() || !$posts->contains('user_id', $user->id)) 
                <div class="d-flex align-items-center justify-content-center">
                    <p class="text-secondary" style="margin-top: 200px">Belum ada postingan yang dapat ditampilkan</p>
                </div>
                @else 
                    @foreach ($posts as $post)
                    @if (auth()->check() && $post->user_id == auth()->user()->id)
                        <div class="col-md-4 mb-3">
                            <a href="">
                                <img src="{{ Storage::url($post['image']) }}" alt="posting" style="width: 300px; height: 250px;">
                            </a>
                        </div>
                    @endif
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection