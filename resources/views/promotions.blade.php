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
            <span>Акции</span>
            <div class="title">АКЦИИ</div>
        </div>
    </section>

    <section class="promotions">
        <div class="container">
            <div class="promotions__items">
                @foreach ($data as $key => $item)
                    <div class="item"><a href="{{ route('promotions.details', $item->slug) }}">
                            <div class="head">
                                <div class="data">
                                    <span>{{ date('d', strtotime($item->created_at)) }}</span>
                                    <div class="data-info">
                                        <p>{{ date('m', strtotime($item->created_at)) }}</p>
                                        <p>{{ date('Y', strtotime($item->created_at)) }}</p>
                                    </div>
                                </div>
                                <div class="title">{{ $item->name }}</div>
                            </div>
                            <img src="{{ $item->imagePath->relativeUrl }}" alt="{{$item->imagePath->alt}}">
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
