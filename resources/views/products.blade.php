@extends('layouts.app')

@section('header')
    <title>{{ $seo->title }}</title>
    <meta name="keywords" content="{{ $seo->seo_keywords }}">
    <meta name="description" content="{{ $seo->seo_description }}">
@endsection

@section('content')
    <section class="nav-menu">
        <div class="container">
            <a href="{{ route('main') }}">Главная</a>
            <i class="bi bi-chevron-right"></i>
            <a href="{{ route('products') }}">Каталог</a>
            <i class="bi bi-chevron-right"></i>
            <span>Каталог товаров</span>
            <div class="title">КАТАЛОГ</div>
        </div>
    </section>

    <section class="products">
        <div class="container">
            <div class="products__box">

                <div class="products__categoryes categoryes-mobile" id="categoryes-mobile-show">
                    <div class="category">Категория</div>
                    <div class="categoryes-mobile-btn" id="categoryes-mobile"><i class="bi bi-list"
                            id="categoryes-mobile-btn"></i></div>
                    <div id="accordionExample">
                        @foreach ($category as $key=>$item)
                        {{-- {{dd($item)}} --}}
                            <div class="item">
                                <a href="{{ route('products.category', $item->slug) }}"><p data-toggle="collapse" data-target="#collapse-{{ $key }}" aria-expanded="false"
                                    aria-controls="collapse-{{ $key }}">
                                    {{ $item->name }}
                                </p></a>
                                {{-- <div id="collapse-{{ $key }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample"> --}}
                                @foreach ($item->subcategory as $key=>$subcategory)
                                {{-- {{ dd(request()->segments()[2]) }} --}}
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="collapse{{ $key }}"
                                            value="option{{ $key }}"
                                            onclick="window.location.assign('{{ route('products.subcategory', [$item->slug, $subcategory->slug]) }}')"
                                            @if (!empty(request()->segments()[2]))
                                                @if (request()->segments()[2] == $subcategory->slug)
                                                    checked
                                                @endif
                                            @endif
                                            />
                                    <label class="form-check-label" for="collapse{{ $key }}">{{ $subcategory->name }}</label>
                                </div>
                                @endforeach
                                {{-- </div> --}}
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="products__items">
                    @foreach ($data as $key=>$item)
                    <div class="item">
                        <div class="product__image">
                            <img src="{{ $item->imagePath->relativeUrl }}" alt="{{$item->imagePath->alt}}">
                        </div>
                        <div class="item__title">
                            {{ $item->name }}
                        </div>
                        <div class="item__buttons">
                            <a href="{{ route('product.details', $item->slug) }}" class="btn-light-blue">Подробнее</a>
                            <a href="#" class="btn-dark-blue modal_window">Узнать цену</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="pagination pagination-page">
                {{ $data->links('vendor.pagination.custom') }}
            </div>
        </div>
    </section>
@endsection
