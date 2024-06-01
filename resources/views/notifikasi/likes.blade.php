@extends('layouts.master')
@section('title', 'My Notifikasi')

@section('content')
@include('sidebar.index')
<div class="content" style="margin-left: 250px;">
    <div style="background-color: black; min-height: 100vh;" class="border-start border-secondary">
        <div class="sticky-top w-100 pb-2" style="background-color: black;">
            <div class="d-flex justify-content-center p-2 mb-1">
                <p class="fw-bold text-white mt-2" style="font-size: 20px;">Notifikasi</p>
            </div>
            <div class="d-flex justify-content-center gap-5 text-white">
                <a href="{{ route('notifikasi.all') }}" class="text-white text-decoration-none" id="semua">Semua</a>
                <a href="{{ route('notifikasi.comments') }}" class="text-white text-decoration-none" id="komentar">Komentar</a>
                <a href="{{ route('notifikasi.likes') }}" class="text-white text-decoration-none active" id="disukai">Disukai</a>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-5 text-white">
            <div class="col-md-6 text-white">
                <p class="fw-bold">Semua Notifikasi</p>
                <div class="col-md-12">
                    <div class="d-flex align-items-center justify-content-start mb-3">
                        <div>
                            <img src="{{ asset('images/default_profile.png') }}" class="rounded-circle" alt="user" width="30px">
                        </div>
                        <div class="mx-2">
                            <p class="mb-0 fw-bold" style="font-size: 14px;">dandirasyid</p>
                        </div>
                        <div>
                            <p class="mb-0" style="font-size: 14px;">mulai mengikuti anda</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-start mb-3">
                        <div>
                            <img src="{{ asset('images/default_profile.png') }}" class="rounded-circle" alt="user" width="30px">
                        </div>
                        <div class="mx-2">
                            <p class="mb-0 fw-bold" style="font-size: 14px;">dandirasyid</p>
                        </div>
                        <div>
                            <p class="mb-0" style="font-size: 14px;">mengomentari postingan anda</p>
                        </div>
                        <div style="margin-left: 10%;">
                            <img src="{{ asset('images/mac.jpg') }}" alt="image" style="width: 50px;">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection