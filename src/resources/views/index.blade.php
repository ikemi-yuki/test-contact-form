@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
    <div class="contact-form__content">
        <div class="contact-form__header">
            <h2 class="contact-form__header-title">Contact</h2>
        </div>
        <form class="form" action="{{ route('contact.confirm') }}" method="post" novalidate>
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
                        <div class="form__input-group">
                            <input class="form__input-name" type="text" name="last_name" placeholder="例:山田" value="{{ old('last_name') }}">
                            <div class="form__error">
                                @error('last_name')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form__input-group">
                            <input class="form__input-name" type="text" name="first_name" placeholder="例:太郎" value="{{ old('first_name') }}">
                            <div class="form__error">
                                @error('first_name')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
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
                        <label class="form__input-item">
                            <input class="form__input-gender" type="radio" name="gender" value="1" {{ old('gender') == 1 ? 'checked' : '' }}>
                            <span class="form__input-text">男性</span>
                        </label>
                        <label class="form__input-item">
                            <input class="form__input-gender" type="radio" name="gender" value="2" {{ old('gender') == 2 ? 'checked' : '' }}>
                            <span class="form__input-text">女性</span>
                        </label>
                        <label class="form__input-item">
                            <input class="form__input-gender" type="radio" name="gender" value="3" {{ old('gender') == 3 ? 'checked' : '' }}>
                            <span class="form__input-text">その他</span>
                        </label>
                    </div>
                    <div class="form__error">
                        @error('gender')
                            {{ $message }}
                        @enderror
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
                        @error('email')
                            {{ $message }}
                        @enderror
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
                        @if ($errors->has('tel1') || $errors->has('tel2') || $errors->has('tel3'))
                            {{ $errors->first('tel1')?: $errors->first('tel2')?: $errors->first('tel3') }}
                        @endif
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
                        @error('address')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group--not-required">
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
                <div class="form__select">
                    <div class="form__select-wrapper">
                        <select class="form__select-content" name="category_id">
                            <option class="option-list" value="">選択してください</option>
                            @foreach($categories as $category)
                                <option class="option-list" value="{{ $category['id'] }}" {{ old('category_id') == $category['id'] ? 'selected' : '' }}>{{ $category['content'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form__error">
                        @error('category_id')
                            {{ $message }}
                        @enderror
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
                    <textarea class="form__text-detail" name="detail" placeholder="お問い合わせ内容をご記載ください" >{{ old('detail') }}</textarea>
                    <div class="form__error">
                        @error('detail')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__button">
                <button class="form__button-submit" type="submit">確認画面</button>
            </div>
        </form>
    </div>
@endsection