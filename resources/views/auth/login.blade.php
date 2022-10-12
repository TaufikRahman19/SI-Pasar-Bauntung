@extends('layout.user')
@section('title', 'Login Page')

@section('content')
<!-- Container -->
{{-- <style>
    body {
     background-image: url("assets/img/Logo_B_Mini.png");
    }
  </style> --}}
<div class="content">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
        <br>
        <div class="card-pricing2 card-warning">
            <div class="pricing-header">
                <h3 class="fw-bold">LOGIN</h3>
                <span class="sub-title">Aplikasi Pembayaran Pajak dan Pengelolaan Pedagang pada</span>
                <span class="sub-title"> kantor UPT Pasar Bauntung </span>
            </div>
            <div class="price-value">
                <div class="value">
                    <span class="logo"><img src="{{asset('/assets/img/Logo_B_Mini.png')}}" alt="..." ></span>
                </div>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <br>
                    <form method="POST" action="{{route('login')}}">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control form-control" id="name" name="name" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control" id="password" name="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-warning btn-border btn-lg w-100 fw-bold mb-3"><i class="fas fa-key"> Login</i></button>
                        </div>
                    </form>
                    <label>Belum punya akun ? <a href="{{route('register')}}">Daftar disini</a></label>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Container -->
@endsection
