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
            <span>О нас</span>
            <div class="title">О КОМПАНИИ</div>
        </div>
    </section>

    <section class="company">
        <div class="container">
            <p class="text">Компания ТОО «Alias Valve Group» с 2002 г. осуществляет поставки трубопроводной запорной
                арматуры с ведущих заводов Китая, а также начало поставки с нескольких крупных заводов РФ. Поставляемая
                нашей компанией продукция широко применяется в нефтегазовой и химической промышленности, в энергетике, в
                строительстве, в системах водоснабжения и отопления и прочих отраслях промышленности.</p>
            <p class="text">Поставки осуществляются во все регионы Республики Казахстан железнодорожным и автотранспортом.
                Высокопрофессиональные специалисты нашей компании проконсультируют каждого клиента, помогут в выборе и
                отправке нужной продукции до потребителя.</p>
            <div class="info-ellipse">
                <div class="item">
                    <div class="ellipse">19</div>
                    <div class="text">лет опыта
                        на рынке страны</div>
                </div>
                <div class="hr"></div>
                <div class="item">
                    <div class="ellipse">1000</div>
                    <div class="text">товаров
                        продано</div>
                </div>
                <div class="hr"></div>
                <div class="item">
                    <div class="ellipse">10</div>
                    <div class="text">филиалов</div>
                </div>
                <div class="hr"></div>
                <div class="item">
                    <div class="ellipse">15</div>
                    <div class="text">заводов
                        представлено</div>
                </div>
                <div class="hr"></div>
                <div class="item">
                    <div class="ellipse">2</div>
                    <div class="text">зсклада</div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-info">
        <img src="img/bg.png" alt="image">
        <div class="box"></div>
        <div class="container">
            <div class="about-info__content">
                <p>ТОО «Alias Valve Group» является официальным дистрибьютором в РК ведущего завода КНР «Yuanda Valve Group
                    Co., LTD», который производит запорную арматуру по GB (Китай), API, ANSI (США), BS (Великобритания), DIN
                    (Германия), JIS (Япония), ГОСТ (Россия), NF (Франция) и др.</p>
                <p>Отличительной особенностью «Yuanda Valve Group Co., LTD» является её высококачественное исполнение,
                    подтверждаемое европейским уровнем производства и соответствие Казахстанским, Российским и Западным
                    стандартам качества. </p>
                <p>Также мы являемся официальными дистрибьюторами таких крупных Российских заводов таких как: "Муромский
                    завод трубопроводной арматуры", "Семеновский завод трубопроводной арматуры", "Бологовский арматурный
                    завод", Барнаульский завод асбестовых технических изделий" и "Коркинский механический завод".</p>
            </div>
        </div>
    </section>

    <section class="certificates certificates__dealer">
        <div class="container">
            <div class="title">Сертификаты дилеров</div>
            <div class="certificates__items">
                @foreach ($data as $key=>$item)
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
        </div>
    </section>
@endsection
