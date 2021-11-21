@extends('layouts.app')

@section('header')
    <title>{{ $seo->title }}</title>
    <meta name="keywords" content="{{ $seo->seo_keywords }}">
    <meta name="description" content="{{ $seo->seo_description }}">
@endsection

@section('content')
    <!-- Section top-block start -->
    <section class="top__block">
        <h1 class="top__block-text">
            AVG
        </h1>
        <div class="container">
            <div class="top__block-title">
                Поставки трубопроводной запорной арматуры с ведущих заводов <br>
                Китая и РФ
            </div>
            <div class="top__block-content">
                <div class="top__block-item">
                    <div class="item__top">
                        <div class="item__number">01</div>
                        <img src="img/top-block-icon1.svg" alt="icon">
                    </div>
                    <div class="item__bottom">Только качествення продукция при минимальных
                        ценах и сроках</div>
                </div>
                <div class="top__block-item">
                    <div class="item__top">
                        <div class="item__number">02</div>
                        <img src="img/top-block-icon2.svg" alt="icon">
                    </div>
                    <div class="item__bottom">Гибкая система скидок и индивидуальный подход к клиенту</div>
                </div>
                <div class="top__block-item">
                    <div class="item__top">
                        <div class="item__number">03</div>
                        <img src="img/top-block-icon3.svg" alt="icon">
                    </div>
                    <div class="item__bottom">Профессионализм, честность и ответственность перед нашими клиентами
                    </div>
                </div>
                <div class="top__block-item">
                    <div class="item__top">
                        <div class="item__number">04</div>
                        <img src="img/top-block-icon4.svg" alt="icon">
                    </div>
                    <div class="item__bottom">Быстрый приём заявок, а также их обработка</div>
                </div>
                <div class="top__block-item">
                    <div class="item__top">
                        <div class="item__number">05</div>
                        <img src="img/top-block-icon5.svg" alt="icon">
                    </div>
                    <div class="item__bottom">Товар всегда и при любом количестве в наличии</div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section top-block end -->
    <!-- Section popular start -->
    <section class="popular">
        <div class="container">
            <div class="popular__title">
                ПОПУЛЯРНЫЕ ТОВАРЫ
            </div>
            <div class="popular__content">
                @foreach ($categories as $categoryst)
                <div class="popular__item">
                    <div class="item__top">
                        <div class="item__number">
                            0{{$categoryst->id}}
                        </div>
                        <div class="item__name">
                            {{$categoryst->name}}
                        </div>
                        <div class="item__hr"></div>
                        <a href="{{ route('products.category', $categoryst->slug) }}" class="popular__watch-all">Смотреть все</a>
                    </div>

                    <div class="item__content">
                        @foreach ($products_categoty as $key => $item)
                            @if($categoryst->id == $item->category_id)
                            <div class="item__elem">
                                <div class="product__image">
                                    <img src="{{ $item->imagePath->relativeUrl }}" alt="elem">
                                </div>
                                <div class="item__title">
                                    {{ $item->name }}
                                </div>
                                <div class="item__buttons">
                                    <a href="{{ route('product.details', $item->slug) }}"
                                        class="btn-light-blue">Подробнее</a>
                                    <a class="btn-dark-blue modal_window">Узнать
                                        цену</a>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
    </section>
    <!-- Section popular end -->
    <!-- Section info start -->
    <section class="info">
        <img src="img/info-bg.jpg" alt="image">
        <div class="container">
            <div class="info__content">
                <form class="info__form" action="{{ route('application')}}" method="POST">
                    @csrf
                    <div class="info__title">
                        Получите бесплатный
                    </div>
                    <div class="info__subtitle">
                        КАТАЛОГ С ЦЕНАМИ И АКЦИЯМИ
                    </div>
                    <input type="text" name="company" class="inp" placeholder="Ваша компания" required>
                    <input type="tel" name="phone" class="inp" placeholder="Номер телефона" required>
                    <input type="email" name="email" class="inp" placeholder="Ваш e-mail" required>
                    <div class="form__agreement">
                        <input type="checkbox" name="check">
                        <label for="check">Согласие на обработку персональных данных</label>
                    </div>
                    <input type="submit" class="btn-catalog-dark" value="Получить каталог">
                </form>
            </div>
        </div>
    </section>
    <!-- Section info end -->

    <section class="company">
        <div class="container dfd">
            <div class="company__content">
                <img src="img/company-img.png" alt="">
            </div>
            <div class="company__content">
                <div class="title">
                    О КОМПАНИИ
                </div>
                <div class="text">
                    Компания Alias Valve Group с 2002 г. осуществляет поставки трубопроводной запорной арматуры с ведущих
                    заводов Китая, а также начало поставки с нескольких крупных заводов РФ. Поставляемая нашей компанией
                    продукция широко применяется в нефтегазовой и химической промышленности, в энергетике, в строительстве,
                    в системах водоснабжения и отопления и прочих отраслях промышленности.
                </div>
            </div>
        </div>
    </section>

    <section class="reviews">
        <div class="container">
            <div class="reviews__content">
                <div class="title">
                    ОТЗЫВЫ
                </div>
                <div class="hr"></div>
                <a href="{{ route('reviews') }}" class="link">Смотреть все</a>
            </div>
            <div class="reviews__content">
                @foreach ($review as $key => $item)
                    <div class="review">
                        <div class="text">{{ $item->quote }}</div>
                        <div class="hr"></div>
                        <div class="bottom">
                            <div class="name">{{ $item->author }}</div>
                            <div class="btn btn-light-blue" data-toggle="modal"
                                data-target="#exampleModal-{{ $key }}">Оригинал</div>
                        </div>
                        <div class="modal fade" id="exampleModal-{{ $key }}">
                            <div class="modal-dialog" data-dismiss="modal">
                                <div class="modal-content">
                                    <img src="{{ $item->imagePath->relativeUrl }}" alt="{{ $item->imagePath->alt }}">
                                </div>
                            </div>
                        </div>
                        <img src="img/quote.png" class="quote" alt="">
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="news">
        <div class="container">
            <div class="news__content">
                <div class="title">
                    НОВОСТИ
                </div>
                <div class="hr"></div>
                <a href="{{ route('news') }}" class="link">Смотреть все</a>
            </div>
            <div class="news__content">
                @foreach ($news as $key => $item)
                    <div class="new"><a href="{{ route('news.details', $item->slug) }}">
                            <img src="{{ $item->imagePath->relativeUrl }}" alt="{{ $item->imagePath->alt }}">
                            <div class="data">{{ date('d.m.Y', strtotime($item->created_at)) }}</div>
                            <p class="name">{{ $item->name }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
