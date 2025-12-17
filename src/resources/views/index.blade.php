@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
    <div class="contact-form__content">
        <div class="contact-form__header">
            <h2 class="contact-form__header-title">Contact</h2>
        </div>
        <form class="form" action="/confirm" method="post">
            @csrf
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">
                        お名前
                    </span>
                    <span class="form__label--required">
                        ※
                    </span>
                </div>
                <div class="form__group-content">
                    <div class="form__input">
                        <input class="form__input-name" type="text" name="last_name" placeholder="例:山田" value="{{ old('last_name') }}">
                        <input class="form__input-name" type="text" name="first_name" placeholder="例:太郎" value="{{ old('first_name') }}">
                    </div>
                    <div class="form__error">
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">
                        性別
                    </span>
                    <span class="form__label--required">
                        ※
                    </span>
                </div>
                <div class="form__group-content">
                    <div class="form__input">
                        <label class="form__radio-item">
                            <input class="form__input-gender" type="radio" name="gender" value="1" checked>
                            <span class="form__radio-text">男性</span>
                        </label>
                        <label class="form__radio-item">
                            <input class="form__input-gender" type="radio" name="gender" value="2">
                            <span class="form__radio-text">女性</span>
                        </label>
                        <label class="form__radio-item">
                            <input class="form__input-gender" type="radio" name="gender" value="3">
                            <span class="form__radio-text">その他</span>
                        </label>
                    </div>
                    <div class="form__error">
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">
                        メールアドレス
                    </span>
                    <span class="form__label--required">
                        ※
                    </span>
                </div>
                <div class="form__group-content">
                    <input class="form__input-email" type="email" name="email" placeholder="例:test@example.com" value="{{ old('email') }}">
                    <div class="form__error">
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">
                        電話番号
                    </span>
                    <span class="form__label--required">
                        ※
                    </span>
                </div>
                <div class="form__group-content">
                    <div class="form__input">
                        <input class="form__input-tel" type="tel" name="tel1" placeholder="080" value="{{ old('tel1') }}">
                        <span class="tel-separator">-</span>
                        <input class="form__input-tel" type="tel" name="tel2" placeholder="1234" value="{{ old('tel2') }}">
                        <span class="tel-separator">-</span>
                        <input class="form__input-tel" type="tel" name="tel3" placeholder="5678" value="{{ old('tel3') }}">
                    </div>
                    <div class="form__error">
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">
                        住所
                    </span>
                    <span class="form__label--required">
                        ※
                    </span>
                </div>
                <div class="form__group-content">
                    <input class="form__input-address" type="text" name="address" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
                    <div class="form__error">
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">
                        建物名
                    </span>
                </div>
                <div class="form__group-content">
                    <input class="form__input-building" type="text" name="building" placeholder="例:千駄ヶ谷マンション101" value="{{ old('building') }}">
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">
                        お問い合わせの種類
                    </span>
                    <span class="form__label--required">
                        ※
                    </span>
                </div>
                <div class="form__select-content">
                    <select class="form__select" name="category_id">
                        <option value="">選択してください</option>
                        <option value=""></option>
                    </select>
                    <div class="form__error">
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">
                        お問い合わせ内容
                    </span>
                    <span class="form__label--required">
                        ※
                    </span>
                </div>
                <div class="form__group-content">
                    <textarea class="form__text-detail" name="detail" placeholder="お問い合わせ内容をご記載ください"></textarea>
                    <div class="form__error">
                    </div>
                </div>
            </div>
            <div class="form__button">
                <button class="form__button-submit" type="submit">確認画面</button>
            </div>
        </form>
    </div>
@endsection