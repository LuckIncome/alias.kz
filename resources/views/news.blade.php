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
            <span>Новости</span>
            <div class="title">НОВОСТИ</div>
        </div>
    </section>

    <section class="news news-page">
        <div class="container">
            <div class="news__content">
                @foreach ($data as $key => $item)
                <div class="new"><a href="{{ route('news.details', $item->slug) }}">
                        <img src="{{ $item->imagePath->relativeUrl }}" alt="{{$item->imagePath->alt}}">
                        <div class="data">{{ date('d.m.Y', strtotime($item->created_at)); }}</div>
                        <p class="name">{{ $item->name }}</p>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="pagination pagination-page">
                {{ $data->links('vendor.pagination.custom') }}
            </div>
        </div>
    </section>
@endsection
