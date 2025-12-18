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
            <div class="search-form__item">
                <input class="search-form__item-keyword" type="text" name="keyword" value="" placeholder="名前やメールアドレスを入力してください">
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
                        <option value=""></option>
                    </select>
                </div>
                <input class="search-form__item-date" type="date" name="date" value="">
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
                <tr class="contact-table__row">
                    <td class="contact-table__item-name">
                        山田　太郎
                    </td>
                    <td class="contact-table__item-gender">
                        男性
                    </td>
                    <td class="contact-table__item-email">
                        test@example.com
                    </td>
                    <td class="contact-table__item-category">
                        商品の交換について
                    </td>
                    <td class="contact-table__item-detail">
                        <a class="detail__button" href="#modal-1">
                            詳細
                        </a>
                    </td>
                </tr>
            </table>
            <div id="modal-1" class="modal">
                <div class="modal__inner">
                    <div class="modal__content">
                        <a href="#" class="modal__close">×</a>
                        <div class="modal-table">
                            <table class="modal-table__inner">
                                <tr class="modal-table__row">
                                    <th class="modal-table__header">お名前</th>
                                    <td class="modal-table__item">山田　太郎</td>
                                </tr>
                                <tr class="modal-table__row">
                                    <th class="modal-table__header">性別</th>
                                    <td class="modal-table__item">男性</td>
                                </tr>
                                <tr class="modal-table__row">
                                    <th class="modal-table__header">メールアドレス</th>
                                    <td class="modal-table__item">test@example.com</td>
                                </tr>
                                <tr class="modal-table__row">
                                    <th class="modal-table__header">電話番号</th>
                                    <td class="modal-table__item">08012345678</td>
                                </tr>
                                <tr class="modal-table__row">
                                    <th class="modal-table__header">住所</th>
                                    <td class="modal-table__item">東京都渋谷区千駄ヶ谷1-2-3</td>
                                </tr>
                                <tr class="modal-table__row">
                                    <th class="modal-table__header">建物名</th>
                                    <td class="modal-table__item">千駄ヶ谷マンション101</td>
                                </tr>
                                <tr class="modal-table__row">
                                    <th class="modal-table__header">お問い合わせの種類</th>
                                    <td class="modal-table__item">商品の交換について</td>
                                </tr>
                                <tr class="modal-table__row">
                                    <th class="modal-table__header-text">お問い合わせ内容</th>
                                    <td class="modal-table__item-text">届いた商品が注文した商品ではありませんでした。商品の取り替えをお願いします。</td>
                                </tr>
                            </table>
                        </div>
                        <form class="delete-form">
                            <div class="delete-form__button">
                                <input type="hidden" name="id" value="">
                                <button class="delete-form__button-submit">削除</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection