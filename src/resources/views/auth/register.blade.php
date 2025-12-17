@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
@endsection

@section('content')
    <div class="register-form__content">
        <div class="register-form__header">
            <h2 class="register-form__header-title">Register</h2>
        </div>
        <form class="form" action="/register" method="post">
        @csrf
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">お名前</span>
                </div>
                <div class="form__group-content">
                    <input class="form__input" type="text" name="name" value="{{ old('name') }}" />
                    <div class="form__error">

                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">メールアドレス</span>
                </div>
                <div class="form__group-content">
                    <input class="form__input" type="email" name="email" value="{{ old('email') }}" />
                    <div class="form__error">

                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">パスワード</span>
                </div>
                <div class="form__group-content">
                    <input class="form__input" type="password" name="password" />
                    <div class="form__error">
                        
                    </div>
                </div>
            </div>
            <div class="form__button">
                <button class="form__button-submit" type="submit">登録</button>
            </div>
        </form>
    </div>
@endsection