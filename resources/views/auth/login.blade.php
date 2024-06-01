@extends('layouts.master')
@section('title', 'Login Page')

@section('content')
<div style="background-color: black;">
    <div class="container rounded-3">
        <div class="row justify-content-center">
            <div class="col-md-8 p-4 rounded mb-5 mt-5">
                <div class="d-flex justify-content-between align-items-center mt-5">
                    <div class="w-25 mb-5">
                        <img src="{{ asset('images/logo-medsos.png') }}" alt="logo-medsos">
                    </div>
                    <div class="w-75">
                        <h3 class="fw-bold mb-3 text-center text-white mb-4">Login</h3>
                        @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <form action="" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="username" class="text-white fw-bold mb-1">Username</label>
                                <input type="text" name="username" id="username" class="form-control" style="border-radius: 15px;" placeholder="Masukan username" required>
                            </div>
                            @error('username')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror

                            <div class="form-group mb-3">
                                <div class="input-group">
                                    <label for="password" class="text-white fw-bold mb-1">Password</label>
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-transparent border-0">
                                            <i class="bi bi-eye-slash toggle-password text-white" id="toggleLoginPassword" style="cursor: pointer; position: absolute; top: 0px;"></i>
                                        </span>
                                    </div>
                                </div>
                                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror loginPassword" style="border-radius: 15px;" placeholder="Masukan password" required>
                            </div>
                            @error('password')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror

                            <div class="d-flex justify-content-end my-4">
                                <button type="submit" class="w-25 btn btn-md btn-light text-dark fw-bold">Login</button>
                            </div>

                            <div class="form-group mt-4 mb-4 d-flex text-white justify-content-center">
                                <p>Belum punya akun?</p>
                                <a href="{{ route('register') }}" class="ms-1 text-white fw-bold">Register</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="d-flex justify-content-between">
        <div class="w-25">
            <div class="d-flex justify-content-center mb-3">
                <img src="{{ asset('images/logo-medsos.png') }}" alt="logo-medsos" width="50px">
                <p class="mx-4 mt-3 fw-bold">Tentang Kami</p>
            </div>
            <div>
                <p>Mini proyek Studi Independen Bersertifikat di PT. Amanah Karya Indonesia dengan membuat sosial media</p>
            </div>
        </div>
        <div class="w-50"></div>
        <div class="w-25">
            <div class="d-flex justify-content-center mb-3">
                <p class="mx-4 mt-3 fw-bold">Kontak</p>
            </div>
            <div class="text-center">
                <div class="d-flex mb-2">
                    <img src="{{ asset('images/home.png') }}" alt="home-logo" width="20px" height="22px">
                    <p class="mx-3">JL. K. H. Ahmad Dahlan VI, Kelurahan. Kukusan, Kecamatan. Beji, Kota Depok</p>
                </div>
                <div class="d-flex mb-2">
                    <img src="{{ asset('images/phone.png') }}" alt="phone-logo" width="20px" height="22px">
                    <p class="mx-3">0895-3776-03378</p>
                </div>
                <div class="d-flex mb-2">
                    <img src="{{ asset('images/email.png') }}" alt="email-logo" width="20px" height="22px">
                    <p class="mx-3">dand21134ti@student.nurulfikri.ac.id</p>
                </div>
            </div>
        </div>
    </div>
    <div class="border-top mt-4 "></div>
    <div class="d-flex justify-content-between mt-4 mb-4 text-secondary">
        <p>Skemap</p>
        <p>Privacy Policy</p>
        <p>Term & Condition</p>
        <p>Contact Us</p>
        <p>Forums</p>
        <p>PT. Amanah Karya Indonesia</p>
    </div>
</div>
@endsection