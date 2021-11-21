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
            <span href="catalog.html">Отзывы</span>
            <div class="title">ОТЗЫВЫ</div>
        </div>
    </section>

    <section class="reviews reviews-page">
        <div class="container">
            <div class="reviews__content">
                @foreach ($data as $key => $item)
                <div class="review">
                    <div class="text">{{ $item->quote }}</div>
                    <div class="hr"></div>
                    <div class="bottom">
                        <div class="name">{{ $item->author }}</div>
                        <div class="btn btn-light-blue" data-toggle="modal" data-target="#exampleModal-{{ $key }}">Оригинал</div>
                    </div>
                    <div class="modal fade" id="exampleModal-{{ $key }}">
                        <div class="modal-dialog" data-dismiss="modal">
                            <div class="modal-content">
                                <img src="{{ $item->imagePath->relativeUrl }}" alt="{{$item->imagePath->alt}}">
                            </div>
                        </div>
                    </div>
                    <img src="img/quote.png" class="quote" alt="">
                </div>
                @endforeach
            </div>
            <div class="pagination pagination-page">
                {{ $data->links('vendor.pagination.custom') }}
            </div>
        </div>
    </section>
@endsection
