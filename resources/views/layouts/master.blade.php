<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="{{ asset('/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/styles.css ') }}">
    <link rel="icon" type="image/x-icon" href="/public/favicon.ico">

    <title>NovaBuys</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
</head>
<body>
{{--Хидер, верхняя часть сайта--}}
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container_header">
        {{--Название сайта--}}
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('index') }}">NovaBuys</a>
        </div>
        {{--Навигация--}}
        <div class="navbar-collapse">
            <div class="navbar-container-collapse">
                <a href="{{ route('index') }}">@lang('main.all_products')</a>
                <a href="{{ route('categories') }}">@lang('main.categories')</a>
                <a href="{{ route('basket') }}">@lang('main.cart')</a>

{{--                <li class="dropdown">--}}
{{--                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $currencySymbol }}<span class="caret"></span></a>--}}
{{--                    <ul class="dropdown-menu">--}}
{{--                        @foreach ($currencies as $currency)--}}
{{--                            <li><a href="{{ route('currency', $currency->code) }}">{{ $currency->symbol }}</a></li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </li>--}}
            </div>
            {{--Вход/Регистрация--}}
        </div>
        <div class="navbar-right">
            <div class="navbar-container-right">
                {{--Для гостей--}}
                @guest
                    <a href="{{ route('login') }}">@lang('main.login')</a>
                    <a href="{{ route('register') }}">@lang('main.register')</a>
                @endguest
                {{--Для Админа--}}
                @auth
                    @admin
                    <a href="{{ route('home') }}">@lang('main.admin_panel')</a>
                @else
                    <a href="{{ route('person.orders.index') }}">@lang('main.my_orders')</a>
                    @endadmin
                    <a href="{{ route('get-logout') }}">@lang('main.logout')</a>
                @endauth
                <a href="{{ route('locale', __('main.set_lang')) }}">@lang('main.set_lang')</a>
            </div>
        </div>
    </div>
</nav>


{{--Продукты на сайте--}}
<div class="container">
    <div class="starter-template">
        @yield('content')
    </div>
</div>

{{--Нижняя часть сайта--}}
<footer>
    <div class="container">
        <div class="footer_brand">
            <a>NovaBuys</a>
        </div>
        <div class="row foo-row">
            <div class="col-lg-6 first-foo-row"><p>Категории товаров</p>
                @foreach($categories as $category)
                    <a href="{{ route('category', $category->code) }}">{{ $category->__('name') }}</a>
                @endforeach
            </div>
            <div class="col-lg-6 second-foo-row"><p>Самые популярные товары</p>
                @foreach ($bestSkus as $bestSku)
                    <a href="{{ route('sku',
            [$bestSku->product->category->code, $bestSku->product->code, $bestSku]) }}">
                            {{ $bestSku->product->__('name') }}</a>
                @endforeach
            </div>
        </div>
    </div>
</footer>

</body>
</html>
