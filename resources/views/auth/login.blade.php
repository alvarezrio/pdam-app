@extends('layouts.app')

@section('content')
    <br>
    <br>
    <!--Start login register area-->
        <section class="login-register-area">
            <div class="container">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="col-6">
                        <div class="login-form-box">
                            <div class="register-form-box_inner">
                                <div class="shop-page-title">
                                    <h2>Silahkan Login</h2>
                                </div>
                                <!-- Form untuk login -->
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf <!-- Tambahkan CSRF token -->
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="input-field">
                                                <div class="field-label">Email</div>
                                                <input type="email" name="email" placeholder="Masukkan email Anda" required>
                                                @error('email')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="input-field">
                                                <div class="field-label">Password</div>
                                                <input type="password" name="password" placeholder="Masukkan password Anda" required>
                                                @error('password')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="text-center p-3">
                                                <button class="btn-one" type="submit">
                                                    <span class="txt">Login</span>
                                                </button>
                                            </div>
                                            <div class="forgot-password p-3">
                                                <a href="{{ route('password.request') }}">Lupa Password?</a>
                                            </div>
                                            <div class="forgot-password p-3">
                                                <a href="{{ route('register') }}">Belum Punya Akun? Registrasi Disini</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- Akhir form login -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!--End login register area-->
@endsection
