@extends('layouts.app')

@section('content')
    <br>
    <br>
    <!--Start login register area-->
        <section class="login-register-area">
            <div class="container">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="col-xl-8 col-lg-12">
                        <div class="register-form-box">
                            <div class="shop-page-title">
                                <h2>Registrasi Akun</h2>
                            </div>
                            <div class="register-form-box_inner">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="input-field">
                                                <div class="field-label">Nama Lengkap Sesuai KTP</div>
                                                <input type="text" name="name" placeholder="Masukkan nama lengkap" required>
                                                @error('name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="input-field">
                                                <div class="field-label">NIK</div>
                                                <input type="text" name="nik" placeholder="Masukkan NIK Anda" required>
                                                @error('nik')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="input-field">
                                                <div class="field-label">Alamat Email</div>
                                                <input type="email" name="email" placeholder="Masukkan email" required>
                                                @error('email')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="input-field">
                                                <div class="field-label">No. Handphone</div>
                                                <input type="text" name="phone" placeholder="Masukkan nomor handphone">
                                                @error('phone')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="input-field">
                                                <div class="field-label">Password</div>
                                                <input type="password" name="password" placeholder="Masukkan password" required>
                                                @error('password')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="input-field">
                                                <div class="field-label">Ulangi Password</div>
                                                <input type="password" name="password_confirmation" placeholder="Ulangi password" required>
                                                @error('password_confirmation')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="button-box">
                                                <button class="btn-one" type="submit"><span class="txt">Registrasi</span></button>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="agree-message">
                                                <div class="checked-box2">
                                                    <input type="checkbox" name="agree" id="agree" checked>
                                                    <label for="agree"><span></span> Saya setuju dengan kebijakan privasi, syarat, & ketentuan.</label>
                                                </div>
                                                @error('agree')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="forgot-password p-3">
                                        <a href="{{ route('login') }}">Sudah Punya Akun? Login Disini</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!--End login register area-->
@endsection
