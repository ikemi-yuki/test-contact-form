@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
@endsection

@section('content')
    <div class="admin__content">
        <div class="admin__header">
            <h2 class="admin__header-title">
                Admin
            </h2>
        </div>
        <form class="search-form" action="/search" method="get">
            @csrf
            <div class="search-form__item">
                <input class="search-form__item-keyword" type="text" name="keyword" value="{{ old('keyword') }}" placeholder="名前やメールアドレスを入力してください">
                <div class="search-form__select--gender">
                    <select class="search-form__item-gender" name="gender">
                        <option value="">性別</option>
                        <option value="1">男性</option>
                        <option value="2">女性</option>
                        <option value="3">その他</option>
                    </select>
                </div>
                <div class="search-form__select--category">
                    <select class="search-form__item-category" name="category_id">
                        <option value="">お問い合わせの種類</option>
                        @foreach($categories as $category)
                            <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
                        @endforeach
                    </select>
                </div>
                <input class="search-form__item-date" type="date" name="date" value="{{ old('date') }}">
            </div>
            <div class="search-form__button">
                <button class="search-form__button-submit" type="submit">検索</button>
            </div>
            <div class="search-form__button">
                <a class="search-form__button-reset" href="/reset">リセット</a>
            </div>
        </form>

        <div class="contact-table">
            <table class="contact-table__inner">
                <tr class="contact-table__row">
                    <th class="contact-table__header-name">
                        お名前
                    </th>
                    <th class="contact-table__header-gender">
                        性別
                    </th>
                    <th class="contact-table__header-email">
                        メールアドレス
                    </th>
                    <th class="contact-table__header-category">
                        お問い合わせの種類
                    </th>
                    <th class="contact-table__header-detail">
                    </th>
                </tr>
                @foreach($contacts as $contact)
                    <tr class="contact-table__row">
                        <td class="contact-table__item-name">
                            {{ $contact['last_name'] }}　{{ $contact['first_name'] }}
                        </td>
                        <td class="contact-table__item-gender">
                            @if($contact['gender'] === 1)
                            男性
                            @elseif($contact['gender'] === 2)
                            女性
                            @elseif($contact['gender'] === 3)
                            その他
                            @endif
                        </td>
                        <td class="contact-table__item-email">
                            {{ $contact['email'] }}
                        </td>
                        <td class="contact-table__item-category">
                            {{ $contact['category']['content'] }}
                        </td>
                        <td class="contact-table__item-detail">
                            <a class="detail__button" href="#modal-{{ $contact['id'] }}">
                            詳細
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
            @foreach($contacts as $contact)
                <div id="modal-{{ $contact['id'] }}" class="modal">
                    <div class="modal__inner">
                        <div class="modal__content">
                            <a href="#" class="modal__close">×</a>
                            <div class="modal-table">
                                <table class="modal-table__inner">
                                    <tr class="modal-table__row">
                                        <th class="modal-table__header">
                                            お名前
                                        </th>
                                        <td class="modal-table__item">
                                            {{ $contact['last_name'] }} {{ $contact['first_name'] }}
                                        </td>
                                    </tr>
                                    <tr class="modal-table__row">
                                        <th class="modal-table__header">
                                            性別
                                        </th>
                                        <td class="modal-table__item">
                                            @if($contact['gender'] === 1)
                                            男性
                                            @elseif($contact['gender'] === 2)
                                            女性
                                            @elseif($contact['gender'] === 3)
                                            その他
                                            @endif
                                        </td>
                                    </tr>
                                    <tr class="modal-table__row">
                                        <th class="modal-table__header">
                                            メールアドレス
                                        </th>
                                        <td class="modal-table__item">
                                            {{ $contact['email'] }}
                                        </td>
                                    </tr>
                                    <tr class="modal-table__row">
                                        <th class="modal-table__header">
                                            電話番号
                                        </th>
                                        <td class="modal-table__item">
                                            {{ $contact['tel'] }}
                                        </td>
                                    </tr>
                                    <tr class="modal-table__row">
                                        <th class="modal-table__header">
                                            住所
                                        </th>
                                        <td class="modal-table__item">
                                            {{ $contact['address'] }}
                                        </td>
                                    </tr>
                                    <tr class="modal-table__row">
                                        <th class="modal-table__header">
                                            建物名
                                        </th>
                                        <td class="modal-table__item">
                                            {{ $contact['building'] }}
                                        </td>
                                    </tr>
                                    <tr class="modal-table__row">
                                        <th class="modal-table__header">
                                            お問い合わせの種類
                                        </th>
                                        <td class="modal-table__item">
                                            {{ $contact['category']['content'] }}
                                        </td>
                                    </tr>
                                    <tr class="modal-table__row">
                                        <th class="modal-table__header-text">
                                            お問い合わせ内容
                                        </th>
                                        <td class="modal-table__item-text">
                                            {{ $contact['detail'] }}
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <form class="delete-form" action="/delete" method="post">
                                @method('DELETE')
                                @csrf
                                <div class="delete-form__button">
                                    <input type="hidden" name="id" value="{{ $contact['id'] }}">
                                    <button class="delete-form__button-submit" type="submit">削除</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection