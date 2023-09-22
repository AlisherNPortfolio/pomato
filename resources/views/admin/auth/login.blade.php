@extends('admin.layouts.auth')

@section('title', 'Login')

@section('content')
<div class="row">
    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
    <div class="col-lg-7">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Войти в аккаунт!</h1>
            </div>
            <form class="user" action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="exampleLastName"
                            placeholder="Имя пользователя" name="username" required @class([
                                'form-control p_input',
                                'is-invalid' => $errors->has('username')
                            ])>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-user" name="password"
                            id="exampleInputPassword" placeholder="Пароль" required @class([
                                'form-control p_input',
                                'is-invalid' => $errors->has('password')
                            ])>
                </div>
                <div class="form-group">
                    <label>Введите символы с изображения</label>
                    <div class="captcha-container">
                        <div class="captcha-input captcha-item">
                            <input type="text" name="captcha" required id="captcha" data-name="captcha"
                            @class([
                                'form-control p_input',
                                'is-invalid' => $errors->has('captcha')
                            ])>
                        </div>
                        <div class="captcha captcha-item" id="captcha_img">
                            {!! captcha_img() !!}
                        </div>
                        <div class="captcha-item captcha-btn">
                            <button type="button" class="captcha-item btn btn-danger" class="reload" id="reload" onclick="relaodCaptcha()">
                                &#x21bb;
                            </button>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">Войти</button>
            </form>
            <hr>
            <div class="text-center">
                <a class="small" href="{{ route('reset_password') }}">Забыли пароль?</a>
            </div>
            <div class="text-center">
                <a class="small" href="{{ route('login') }}">У вас уже есть аккаунт? Войдите!</a>
            </div>
        </div>
    </div>
</div>
@endsection
