@extends('theme.auth',["title" => "Authentication"])
@section('content')
<div class="container">
    <div class="forms-container">
        <div class="signin-signup">
            <form id="form_login" class="sign-in-form">
                <h2 class="title">Log in</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Username" name="username" id="username_login" data-login="1" maxlength="20"/>
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" name="password" id="password_login" data-login="2"/>
                </div>
                <button id="tombol_login" onclick="auth('#tombol_login','#form_login','login','Login');" type="button" class="btn solid" data-login="3">Login</button>

                <br><br><p>Belum memliki akun ?</p>
                <button class="btn btn-secondary"><a href="javascript:void(0);" id="sign-up-btn" style="color:white;text-decoration: none;"> Daftar sekarang </a> </button>
            </form>
            
            
            <form id="form_register" class="sign-up-form">
                <h2 class="title">Register</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Username" name="username" id="username_register" data-register="1" maxlength="20" />
                </div>
                <div class="input-field">
                    <i class="fas fa-phone"></i>
                    <input type="tel" placeholder="Nomor telepon (diawali angka 62)" name="phone" id="phone_register" data-register="2" maxlength="14"/>
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="email" placeholder="Email" name="email" id="email_register" data-register="3" />
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password (minimal 8 karakter)" name="password" id="password_register" data-register="4" />
                </div>
                <button id="tombol_register" onclick="auth('#tombol_register','#form_register','register','Sign Up');" type="button" class="btn" data-register="5">Daftar</button>

                <br><br><p>Sudah memiliki akun ?</p>
                <button class="btn btn-secondary"> <a href="javascript:void(0);" id="sign-in-btn" style="color:white;text-decoration: none;"> Login</a> </button>
            </form>
        </div>
    </div>
    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <h3 style="margin-top:30px;">
                    Sistem Informasi UMKM Laguboti
                    <!-- <a href="javascript:void(0);" id="sign-up-btn" style="color:white;text-decoration: none;"> Daftar sekarang </a> -->
                </h3>
                <p>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </p>
            </div>
            <img src="{{asset('images/orange.png')}}" class="image" alt="" />
        </div>
        <div class="panel right-panel">
            <div class="content">
                <h3 style="margin-top:30px;">
                    Sistem Informasi UMKM Laguboti
                    <!-- <a href="javascript:void(0);" id="sign-in-btn" style="color:white;text-decoration: none;"> Login</a> -->
                </h3>
                <p>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </p>
            </div>
            <img src="{{asset('images/black.png')}}" class="image" alt="" />
        </div>
    </div>
</div>
@endsection