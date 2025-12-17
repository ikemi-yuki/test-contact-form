@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
@endsection

@section('content')
    <div class="confirm__content">
        <div class="confirm__header">
            <h2 class="confirm__header-title">Confirm</h2>
        </div>
        <div class="confirm-table">
            <table class="confirm-table__inner">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お名前</th>
                    <td class="confirm-table__item">
                        <p class="confirm-table__item-name">山田　太郎</p>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">性別</th>
                    <td class="confirm-table__item">
                        <p class="confirm-table__item-gender">男性</p>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">メールアドレス</th>
                    <td class="confirm-table__item">
                        <p class="confirm-table__item-email">test@example.com</p>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">電話番号</th>
                    <td class="confirm-table__item">
                        <p class="confirm-table__item-tel">08012345678</p>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">住所</th>
                    <td class="confirm-table__item">
                        <p class="confirm-table__item-address">東京都渋谷区千駄ヶ谷1-2-3</p>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">建物名</th>
                    <td class="confirm-table__item">
                        <p class="confirm-table__item-building">千駄ヶ谷マンション101</p>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせの種類</th>
                    <td class="confirm-table__item">
                        <p class="confirm-table__item-category">商品の交換について</p>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせ内容</th>
                    <td class="confirm-table__item">
                        <p class="confirm-table__item-detail">届いた商品が注文した商品ではありませんでした。商品の取り替えをお願いします。</p>
                    </td>
                </tr>
            </table>
        </div>
        <div class="confirm__buttons">
            <form class="confirm__form" action="/thanks" method="post">
                @csrf
                <input type="hidden" name="last_name" value="">
                <input type="hidden" name="first_name" value="">
                <input type="hidden" name="gender" value="">
                <input type="hidden" name="email" value="">
                <input type="hidden" name="tel" value="">
                <input type="hidden" name="address" value="">
                <input type="hidden" name="building" value="">
                <input type="hidden" name="category_id" value="">
                <input type="hidden" name="detail" value="">
                <button class="confirm__button-send" type="submit">送信</button>
            </form>
            <form class="confirm__form" action="/" method="post">
                @csrf
                <input type="hidden" name="last_name" value="">
                <input type="hidden" name="first_name" value="">
                <input type="hidden" name="gender" value="">
                <input type="hidden" name="email" value="">
                <input type="hidden" name="tel" value="">
                <input type="hidden" name="address" value="">
                <input type="hidden" name="building" value="">
                <input type="hidden" name="category_id" value="">
                <input type="hidden" name="detail" value="">
                <button class="confirm__button-edit" type="submit" name="action" value="edit">修正</button>
            </form>
        </div>
    </div>
@endsection