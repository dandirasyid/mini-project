@extends('layouts.master')
@section('title', 'Bookmarks')

@section('content')
@include('sidebar.index')
<div class="content" style="margin-left: 250px;">
    <div style="background-color: black; min-height: 100vh;" class="container-fluid px-4 border-start border-secondary">
        <div class="sticky-top w-100 pb-2" style="background-color: black;">
            <div class="d-flex justify-content-center p-2 mb-1">
                <img src="{{ asset('images/logo-medsos.png') }}" alt="logo-medsos" width="50px">
            </div>
        </div>
        <div class="mt-2 ms-5 text-white">
            <div>
                <p>All Bookmarks</p>
            </div>
            <div class="row mt-4 d-flex flex-wrap">
                @foreach ($bookmarks as $bookmark)
                <div class="col-sm-6 col-md-3 col-lg-3 mb-3">
                    <div class="border border-secondary p-3 rounded" style="background-color: black;">
                        <div class="d-flex align-items-center">
                            <div>
                                <img src="{{ $bookmark->post->user->image ? Storage::url($bookmark->post->user->image) : asset('images/default_profile.png') }}" class="rounded-circle" alt="user" width="30px">
                            </div>
                            <div class="mx-2">
                                <p class="mb-0 fw-bold" style="font-size: 12px;">{{  $bookmark->post->user->username }}</p>
                                <p class="mb-0" style="font-size: 12px;">{{ $bookmark->post->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        <div class="p-3">
                            <img src="{{ Storage::url($bookmark->post['image']) }}" alt="bookmarks" class="img-fluid">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
@endsection