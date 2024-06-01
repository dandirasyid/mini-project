@extends('layouts.master')
@section('title', 'Home')

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
        <div class="container-fluid d-flex justify-content-center mt-4 text-white">
            <div class="col-md-4 border border-secondary p-3 mb-3">
                <div class="d-flex align-items-center justify-content-between ">
                    <div>
                        <img src="{{ $user->image ? Storage::url($user->image) : asset('images/default_profile.png') }}" class="rounded-circle" alt="user" width="30px">
                    </div>
                    <div class="mx-2">
                        <p class="mb-0 fw-bold" style="font-size: 14px;">{{ $user->username }}</p>
                    </div>
                    <div>
                        <i class="bi bi-three-dots"></i>
                    </div>
                </div>
                <div class="mt-3 mb-1">
                    <form action="{{ route('posting.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-2">
                            <input type="text" name="deskripsi" id="deskripsi" class="@error('deskripsi') is-invalid @enderror komentar text-white" style="background-color: black; border:none; font-size: 14px; width: 100%; box-shadow: none;" placeholder="Deskripsi postingan">
                        </div>
                        @error('deskripsi')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <input type="file" class="form-control-file text-white @error('image') is-invalid @enderror " id="image" name="image" accept="image/*" style="background-color: black;">
                        </div>
                        @error('image')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                        <div class="form-group mb-3">
                            <img id="imagePreview" class="img-fluid" alt="Image Preview" style="display: none;">
                        </div>
                        <div class="border-bottom border-secondary mb-3"></div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn text-dark fw-bold" style="background-color: #3F9AA8;">Posting</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('image').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const imagePreview = document.getElementById('imagePreview');
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection