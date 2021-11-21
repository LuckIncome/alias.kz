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
            <span>Сертификаты</span>
            <div class="title">СЕРТИФИКАТЫ</div>
        </div>
    </section>

    <section class="certificates">
        <div class="container">
            <div class="certificates__items">
                @foreach ($data as $key => $item)
                    <div class="item" data-toggle="modal" data-target="#exampleModal-{{ $key }}">
                        <img src="{{ $item->imagePath->relativeUrl }}" alt="{{$item->imagePath->alt}}">
                        <i class="bi bi-search"></i>
                    </div>
                    <div class="modal fade" id="exampleModal-{{ $key }}">
                        <div class="modal-dialog" data-dismiss="modal">
                            <div class="modal-content">
                                <img src="{{ $item->imagePath->relativeUrl }}" alt="{{$item->imagePath->alt}}">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="pagination pagination-page">
                {{ $data->links('vendor.pagination.custom') }}
            </div>
        </div>
    </section>
@endsection
