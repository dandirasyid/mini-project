@extends('layouts.master')
@section('title', 'Edit Profile')

@section('content')
@include('sidebar.index')
<div class="content" style="margin-left: 250px;">
    <div style="background-color: black; min-height: 100vh;" class="border-start border-secondary">
        <div class="sticky-top w-100 pb-2" style="background-color: black;">
            <div class="d-flex justify-content-center" style="padding: 50px 100px 10px;">
                <div class="d-flex justify-content-center align-items-center mb-1 col-md-12">
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="col-md-8">
                        @csrf
                        <div class="form-group upload">
                            <img src="{{ $user->image ? Storage::url($user->image) : asset('images/default_profile.png') }}" id="profileImage" class="rounded-circle mb-2" alt="logo-medsos" width="100px" height="85px">
                            <div class="round rounded-circle bg-light border" style="width: 32px; height: 32px; line-height: 33px; text-align: center; overflow: hidden; position: absolute; bottom: 40px; right: 0;">
                                <input type="file" id="image" name="image" style="position: absolute; transform: scale(2); opacity: 0;" onchange="previewImage(event)">
                                <i class="bi bi-camera-fill" style="color: #3F9AA8;"></i>
                            </div>
                            <p class="text-white text-center fw-bold mt-2">Edit Profile</p>
                        </div>

                        <div class="form-group mb-3 d-flex justify-content-between">
                            <label for="username" class="text-white fw-bold mb-1">Username</label>
                            <div style="width: 70%;">
                                <input type="text" name="username" id="username" class="form-control text-white rounded-3 @error('username') is-invalid @enderror" placeholder="Masukan username" style="background-color: black;" value="{{ old('username') ? old('username') : $user->username }}" required>
                            </div>
                        </div>
                        @error('username')
                        <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror

                        <div class="form-group d-flex mb-3 justify-content-between">
                            <label for="name" class="text-white fw-bold mb-1">Nama</label>
                            <div style="width: 70%;">
                                <input type="text" name="name" id="name" class="form-control text-white rounded-3 @error('name') is-invalid @enderror" placeholder="Masukan nama lengkap" style="background-color: black;"  value="{{ old('name') ? old('name') : $user->name }}" required>
                            </div>
                        </div>
                        @error('name')
                        <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror

                        <div class="form-group d-flex justify-content-between">
                            <label for="deskripsi" class="fw-bold mt-2 mb-2 text-white">Bio</label>
                            <div style="width: 70%;">
                                <textarea class="form-control text-white rounded-3 @error('bio') is-invalid @enderror" name="bio" id="bio" rows="3" placeholder="Tuliskan bio anda" value="{{ old('deskripsi') }}" style="background-color: black;">{{ old('bio') ? old('bio') : $user->bio }}</textarea>
                            </div>
                            @error('bio')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end mt-3">
                            <button type="submit" class="btn" style="background-color: #3F9AA8; color: white; width: 100px;">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('profileImage');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection