@extends('layouts.app')

@section('header')
    <title>{{ $seo->title }}</title>
    <meta name="keywords" content="{{ $seo->seo_keywords }}">
    <meta name="description" content="{{ $seo->seo_description }}">
@endsection

@section('content')
    <section class="nav-menu">
        <div class="container">
            <a href="index.html">Главная</a>
            <i class="bi bi-chevron-right"></i>
            <span>Поиск</span>
            <div class="title">ПОИСК</div>
        </div>
    </section>

    <section class="search">
        <div class="container">
            <form action="{{ route('search') }}" method="GET">
                <div class="form">
                    <input type="text" name="search" placeholder="Введите текст" value="{{ $search }}" id="" required>
                    <button type="submit" class="btn-dark-blue" style="border:none; cursor:pointer; outline:inherit;">Поиск</button>
                </div>
            </form>
            <div class="text">Результаты поиска по запросу “{{ $search }}”</div>
            <div class="products">
                @forelse ($data as $key => $item)
                    <div class="product">
                        <div class="product__image">
                            <img src="{{ $item->imagePath->relativeUrl }}" alt="{{$item->imagePath->alt}}">
                        </div>
                        <div class="product__title">{{ $item->name }}</div>
                        <div class="product__buttons">
                            <a href="{{ route('product.details', $item->slug) }}" class="btn-light-blue">Подробнее</a>
                            <a class="btn-dark-blue modal_window">Узнать цену</a>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </section>
@endsection
