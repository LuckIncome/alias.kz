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
            <span>Контакты</span>
            <div class="title">КОНТАКТЫ</div>
        </div>
    </section>

    <section class="contacts">
        <div class="container">
            <div class="contacts__info">
                <div class="cities">
                    @foreach ($data as $key => $item)
                        <div class="city">
                            <div class="name">{{ $item->city }}</div>
                            <div class="address">
                                @if (empty($item->contactEmail) == false)
                                <i class="bi bi-geo-alt-fill"></i>
                                @endif
                                {{-- <p>пр. Райымбека, 312 (уг. ул. Брусиловского)</p> --}}
                                @foreach ($item->contactAddress as $address)
                                <p>{{ $address->value }}</p>
                                @endforeach
                            </div>
                            <div class="phone">
                                @if (empty($item->contactPhone) == false)
                                    <i class="bi bi-telephone-fill"></i>
                                @endif
                                <div>
                                    @foreach ($item->contactPhone as $phone)
                                        <a href="tel:{{ $phone->value }}">{{ $phone->value }}</a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="mess">
                                @if (empty($item->contactEmail) == false)
                                    <i class="bi bi-envelope-fill"></i>
                                @endif
                                <div>
                                    @foreach ($item->contactEmail as $email)
                                        <a href="mailto:{{ $email->value }}">{{ $email->value }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="maps">
                    <div class="info-chat info-chat__1">Нур-Султан <i class="bi bi-caret-down-fill"></i></div>
                    <div class="info-chat info-chat__2">Алматы <i class="bi bi-caret-down-fill"></i></div>
                    <div class="info-chat info-chat__3">Шымкент <i class="bi bi-caret-down-fill"></i></div>
                    <div class="info-chat info-chat__4">Актобе <i class="bi bi-caret-down-fill"></i></div>
                    <div class="info-chat info-chat__5">Караганда <i class="bi bi-caret-down-fill"></i></div>
                    <div class="info-chat info-chat__6">Кызылорда <i class="bi bi-caret-down-fill"></i></div>
                    <img src="img/maps.png" class="bg" alt="">
                </div>
            </div>
        </div>
    </section>
@endsection
