@extends('layouts.app')

@section('header')
    <title>{{ $data->title }}</title>
    <meta name="keywords" content="{{ $data->seo_keywords }}">
    <meta name="description" content="{{ $data->seo_description }}">
@endsection

@section('content')
    <section class="nav-menu">
        <div class="container">
            <a href="{{ route('main') }}">Главная</a>
            <i class="bi bi-chevron-right"></i>
            <a href="{{ route('products') }}">Каталог</a>
            <i class="bi bi-chevron-right"></i>
            <span>{{ $data->name }}</span>
        </div>
    </section>

    <section class="product-item">
        <div class="container dflex">
            <div class="product-item__img">
                <img src="{{ $data->imagePath->relativeUrl }}" alt="{{$data->imagePath->alt}}">
            </div>
            <div class="product-item__info">
                <div class="title">{{ $data->name }}</div>
                <div class="text">
                    {!! html_entity_decode($data->description) !!}
                </div>
                <div class="btn-dark-blue modal_window">Узнать цену</div>
            </div>
        </div>
    </section>
@endsection
