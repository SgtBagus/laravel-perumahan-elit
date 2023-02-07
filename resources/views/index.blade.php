@extends('layouts.layouts')

@push('css')
    <style>
        .content-wrapper {
            background: url("{{ asset('/background-img.jpg') }}") no-repeat center center fixed; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .card {
            border-radius: 24px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translateX(-50%) translateY(-50%);
        }
    </style>
@endpush

@section('content')
    <div class="card">
        <div class="card-body text-center">
            <h1>
                Selamat Datang di <br/>
                <small>
                    <b> Sistem Pencatatan dan Pembayaran Air </b>
                </small>
            </h1>
            
            @guest
                <div class="row mt-3">
                    <div class="col-6 text-right">
                        <a class="btn btn-primary" href="{{ route('login') }}">
                        Login
                        <i class="fas fa-sign-in-alt mx-2"></i>
                        </a>
        
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                        </form>
                    </div>
                    <div class="col-6 text-left">
                        <a class="btn btn-primary" href="{{ route('register') }}">
                            Register
                            <i class="fas fa-users mx-2"></i>
                        </a>
                    </div>
                </div>
            @else
            @endguest
        </div>
    </div>
@endsection