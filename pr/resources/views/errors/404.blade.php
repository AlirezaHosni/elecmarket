@extends('layouts.front.design')
@section('content')
    <section class="not-found">
        <h3>صفحه‌ای که دنبال آن بودید پیدا نشد!</h3>
        <a href="#">صفحه اصلی</a>
        <img src="{{ asset('assets/f/images/404bg.png') }}" alt="">
    </section>
@endsection
@section('links')
    <style>
        .not-found {
            /*display: flex;*/
            justify-content: center;
            flex-direction: column;
            align-items: center;
            padding: 68px 0;
            line-height: 22px;
            background: url({{ asset('assets/f/images/404bg.png') }});
            background-size: auto 100%;
        }

        .not-found h3 {
            font-size: 2.571rem;
            line-height: 1.222;
            margin: 25px auto
        }

        .not-found a {
            background-color: #6ab946;
            border-radius: 8px;
            padding: 10px 20px;
            color: #fff;
            border: none;
            min-width: 161px;
            margin: 10px 19.5px 46px;
            text-decoration: none;
            font-size: 2em
        }
        .not-found img {
            max-width: 50%;
            max-height: 200px;
        }

        .account-box .foot, .account-box button, .c-mask__handler, .c-product__guaranteed, .copyright-en, .image-row a, .jump-to-up, .not-found, .product-item, .product-item .title, .register-logo, .suggestion h3, footer .copyright p {
            text-align: center;
        }
    </style>
@endsection
