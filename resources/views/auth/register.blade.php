@extends('layouts.master')
@section('title', 'Register Page')

@section('content')
<div style="background-color: black;" class="min-vh-100">
    <div class="container rounded-3">
        <div class="row justify-content-center">
            <div class="col-md-8 p-4 rounded mb-5 mt-5">
                @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="d-flex justify-content-between align-items-center mt-5">
                    <div class="w-25 mb-5">
                        <img src="{{ asset('images/logo-medsos.png') }}" alt="logo-medsos">
                    </div>
                    <div class="w-75">
                        @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <form action="{{ route('register.user') }}" method="POST">
                            <h3 class="fw-bold mb-3 text-center text-white mb-4">Register</h3>
                            @csrf
                            <div class="d-flex gap-2">
                                <div class="form-group mb-3 w-50">
                                    <label for="username" class="text-white fw-bold mb-1">Username</label>
                                    <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" style="border-radius: 15px;" placeholder="Masukan username" required>
                                </div>
                                @error('username')
                                <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror

                                <div class="form-group mb-3 w-50">
                                    <label for="name" class="text-white fw-bold mb-1">Nama</label>
                                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" style="border-radius: 15px;" placeholder="Masukan nama lengkap" required>
                                </div>
                                @error('name')
                                <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="email" class="text-white fw-bold mb-1">E - Mail</label>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" style="border-radius: 15px;" placeholder="Masukan akun e-mail" required>
                            </div>
                            @error('email')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror

                            <div class="form-group mb-3">
                                <div class="input-group">
                                    <label for="password" class="text-white fw-bold mb-1">Password</label>
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-transparent border-0">
                                            <i class="bi bi-eye-slash toggle-password text-white" id="toggleRegisterPassword" style="cursor: pointer; position: absolute; top: 0px;"></i>
                                        </span>
                                    </div>
                                </div>
                                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror registerPassword" style="border-radius: 15px;" placeholder="Masukan password" required>
                            </div>
                            @error('password')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror

                            <div class="form-group mb-3">
                                <div class="input-group">
                                    <label for="password_confirmation" class="text-white fw-bold mb-1">Konfirmasi Password</label>
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-transparent border-0">
                                            <i class="bi bi-eye-slash toggle-password text-white" id="toggleConfirmPassword" style="cursor: pointer; position: absolute; top: 0px;"></i>
                                        </span>
                                    </div>
                                </div>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" style="border-radius: 15px;" placeholder="Masukan confirm password" required>
                            </div>
                            @error('password_confirmation')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror

                            <div class="d-flex justify-content-end my-4">
                                <button type="submit" class="w-25 btn btn-md btn-light text-dark fw-bold">Register</button>
                            </div>

                            <div class="form-group mt-4 mb-4 d-flex text-white justify-content-center">
                                <p>Sudah punya akun?</p>
                                <a href="{{ route('login') }}" class="ms-1 text-white fw-bold">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection