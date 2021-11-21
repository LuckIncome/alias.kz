@extends('layouts.app')

@section('header')
    <title>{{ $data->title }}</title>
    <meta name="keywords" content="{{ $data->seo_keywords }}">
    <meta name="description" content="{{ $data->seo_description }}">
@endsection

@section('content')
    <section class="nav-menu">
        <div class="container">
            <a href="index.html">Главная</a>
            <i class="bi bi-chevron-right"></i>
            <a href="catalog.html">Акции</a>
            <i class="bi bi-chevron-right"></i>
            <span>{{ $data->name }}</span>
            <div class="title">{{ $data->name }}</div>
        </div>
    </section>

    <section class="stock">
        <div class="container">
            <div class="stock__block">
                <div class="stock__info">
                    {!! html_entity_decode($data->text) !!}
                </div>
                <div class="stock__img">
                    <img src="{{ $data->imagePath->relativeUrl }}" alt="{{$data->imagePath->alt}}">
                </div>
            </div>
        </div>
    </section>
@endsection
