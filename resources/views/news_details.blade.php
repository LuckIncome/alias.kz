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
            <span href="catalog.html">{{ $data->name }}</span>
            <div class="title">{{ $data->name }}</div>
        </div>
    </section>
    <section class="news news-item">
        <div class="container">
            <div class="news__content">
                <img src="{{ $data->imagePath->relativeUrl }}" alt="{{$data->imagePath->alt}}">
                <div class="data">{{ date('d.m.Y', strtotime($data->created_at)); }}</div>
                {!! html_entity_decode($data->text) !!}
            </div>
        </div>
    </section>
@endsection
