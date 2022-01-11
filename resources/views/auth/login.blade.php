@extends('layouts.app')

@section('content')

    <body id="bg1">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center" style="margin-top: -12rem;">
                    {{-- Tulosan jalan --}}
                    <p style="color: white; font-size: 40px"><i>SELAMAT DATANG DI SMK MATHLA'UL ANWAR <br/> BUARAN JATI KAB. TANGERANG

                    {{-- <marquee behavior="" direction="">
                        <p style="color: white; font-size: 40px"><i>SELAMAT DATANG DI SMK MATHLA'UL ANWAR - BUARAN JATI KAB. TANGERANG
                        </i></p>
                    </marquee> --}}
                    {{-- tutup tulisan --}}
                </div>
                <div class="col-md-8 mt-4">
                    <div class="card" id="card">
                        <br>
                        <span id="card-title">
                            <h4 style="text-align: center">FORM LOGIN</h4>
                            <p class="underline-title"></p>
                        </span>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Email ') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-content @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <p class="form-border"></p>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-content @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <p class="form-border"></p>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <input style="color: rgb(255, 255, 255)" id="submit-btn" type="submit" name="submit"
                                            value="LOGIN" /><a href="#" id="signup"></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
