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
            <span>Филиалы</span>
            <div class="title">ФИЛИАЛЫ</div>
        </div>
    </section>



    <section class="branches" id="closkse">
        <div class="container">
            <div class="branches__maps">
                <div class="maps-bg">
                    <div class="city city-1 dropdown">
                        <img src="img/btn.png" class="btn-pipes" data-toggle="dropdown" alt="">
                        <div class="name">Уральск</div>
                        <div class="dropdown-menu">
                            <div class="address">
                                <i class="bi bi-geo-alt-fill"></i>
                                <p>пр. Райымбека, 312 <br> (уг. ул. Брусиловского)</p>
                            </div>
                            <div class="phone">
                                <i class="bi bi-telephone-fill"></i>
                                <div class="link">
                                    <a href="tel:87752216325">+7 (775) 221 63 25</a> <br>
                                    <a href="tel:87717808737">+7 (771) 780 87 37</a>
                                </div>
                            </div>
                            <div class="email">
                                <i class="bi bi-envelope-fill"></i>
                                <a href="#">aliasvalve@gmail.com</a>
                            </div>
                        </div>
                    </div>
                    <div class="city city-2 dropdown">
                        <img src="img/btn.png" class="btn-pipes" data-toggle="dropdown" alt="">
                        <div class="name">Атырау</div>
                        <div class="dropdown-menu">
                            <div class="address">
                                <i class="bi bi-geo-alt-fill"></i>
                                <p>пр. Райымбека, 312 <br> (уг. ул. Брусиловского)</p>
                            </div>
                            <div class="phone">
                                <i class="bi bi-telephone-fill"></i>
                                <div class="link">
                                    <a href="tel:87752216325">+7 (775) 221 63 25</a> <br>
                                    <a href="tel:87717808737">+7 (771) 780 87 37</a>
                                </div>
                            </div>
                            <div class="email">
                                <i class="bi bi-envelope-fill"></i>
                                <a href="#">aliasvalve@gmail.com</a>
                            </div>
                        </div>
                    </div>
                    <div class="city city-3 dropdown">
                        <img src="img/btn.png" class="btn-pipes" data-toggle="dropdown" alt="">
                        <div class="name">Актау</div>
                        <div class="dropdown-menu">
                            <div class="address">
                                <i class="bi bi-geo-alt-fill"></i>
                                <p>пр. Райымбека, 312 <br> (уг. ул. Брусиловского)</p>
                            </div>
                            <div class="phone">
                                <i class="bi bi-telephone-fill"></i>
                                <div class="link">
                                    <a href="tel:87752216325">+7 (775) 221 63 25</a> <br>
                                    <a href="tel:87717808737">+7 (771) 780 87 37</a>
                                </div>
                            </div>
                            <div class="email">
                                <i class="bi bi-envelope-fill"></i>
                                <a href="#">aliasvalve@gmail.com</a>
                            </div>
                        </div>
                    </div>
                    <div class="city city-4 dropdown">
                        <img src="img/btn.png" class="btn-pipes" data-toggle="dropdown" alt="">
                        <div class="name">Актобе</div>
                        <div class="dropdown-menu">
                            <div class="address">
                                <i class="bi bi-geo-alt-fill"></i>
                                <p>пр. Райымбека, 312 <br> (уг. ул. Брусиловского)</p>
                            </div>
                            <div class="phone">
                                <i class="bi bi-telephone-fill"></i>
                                <div class="link">
                                    <a href="tel:87752216325">+7 (775) 221 63 25</a> <br>
                                    <a href="tel:87717808737">+7 (771) 780 87 37</a>
                                </div>
                            </div>
                            <div class="email">
                                <i class="bi bi-envelope-fill"></i>
                                <a href="#">aliasvalve@gmail.com</a>
                            </div>
                        </div>
                    </div>
                    <div class="city city-5 dropdown">
                        <img src="img/btn.png" class="btn-pipes" data-toggle="dropdown" alt="">
                        <div class="name">Кызылорда</div>
                        <div class="dropdown-menu">
                            <div class="address">
                                <i class="bi bi-geo-alt-fill"></i>
                                <p>пр. Райымбека, 312 <br> (уг. ул. Брусиловского)</p>
                            </div>
                            <div class="phone">
                                <i class="bi bi-telephone-fill"></i>
                                <div class="link">
                                    <a href="tel:87752216325">+7 (775) 221 63 25</a> <br>
                                    <a href="tel:87717808737">+7 (771) 780 87 37</a>
                                </div>
                            </div>
                            <div class="email">
                                <i class="bi bi-envelope-fill"></i>
                                <a href="#">aliasvalve@gmail.com</a>
                            </div>
                        </div>
                    </div>
                    <div class="city city-6 dropdown">
                        <img src="img/btn.png" class="btn-pipes" data-toggle="dropdown" alt="">
                        <div class="name">Туркестан</div>
                        <div class="dropdown-menu">
                            <div class="address">
                                <i class="bi bi-geo-alt-fill"></i>
                                <p>пр. Райымбека, 312 <br> (уг. ул. Брусиловского)</p>
                            </div>
                            <div class="phone">
                                <i class="bi bi-telephone-fill"></i>
                                <div class="link">
                                    <a href="tel:87752216325">+7 (775) 221 63 25</a> <br>
                                    <a href="tel:87717808737">+7 (771) 780 87 37</a>
                                </div>
                            </div>
                            <div class="email">
                                <i class="bi bi-envelope-fill"></i>
                                <a href="#">aliasvalve@gmail.com</a>
                            </div>
                        </div>
                    </div>
                    <div class="city city-7 dropdown">
                        <img src="img/btn.png" class="btn-pipes" data-toggle="dropdown" alt="">
                        <div class="name">Шымкент</div>
                        <div class="dropdown-menu">
                            <div class="address">
                                <i class="bi bi-geo-alt-fill"></i>
                                <p>пр. Райымбека, 312 <br> (уг. ул. Брусиловского)</p>
                            </div>
                            <div class="phone">
                                <i class="bi bi-telephone-fill"></i>
                                <div class="link">
                                    <a href="tel:87752216325">+7 (775) 221 63 25</a> <br>
                                    <a href="tel:87717808737">+7 (771) 780 87 37</a>
                                </div>
                            </div>
                            <div class="email">
                                <i class="bi bi-envelope-fill"></i>
                                <a href="#">aliasvalve@gmail.com</a>
                            </div>
                        </div>
                    </div>
                    <div class="city city-8 dropdown">
                        <img src="img/btn.png" class="btn-pipes" data-toggle="dropdown" alt="">
                        <div class="name">Нур-Султан</div>
                        <div class="dropdown-menu">
                            <div class="address">
                                <i class="bi bi-geo-alt-fill"></i>
                                <p>пр. Райымбека, 312 <br> (уг. ул. Брусиловского)</p>
                            </div>
                            <div class="phone">
                                <i class="bi bi-telephone-fill"></i>
                                <div class="link">
                                    <a href="tel:87752216325">+7 (775) 221 63 25</a> <br>
                                    <a href="tel:87717808737">+7 (771) 780 87 37</a>
                                </div>
                            </div>
                            <div class="email">
                                <i class="bi bi-envelope-fill"></i>
                                <a href="#">aliasvalve@gmail.com</a>
                            </div>
                        </div>
                    </div>
                    <div class="city city-9 dropdown">
                        <img src="img/btn.png" class="btn-pipes" data-toggle="dropdown" alt="">
                        <div class="name">Караганда</div>
                        <div class="dropdown-menu">
                            <div class="address">
                                <i class="bi bi-geo-alt-fill"></i>
                                <p>пр. Райымбека, 312 <br> (уг. ул. Брусиловского)</p>
                            </div>
                            <div class="phone">
                                <i class="bi bi-telephone-fill"></i>
                                <div class="link">
                                    <a href="tel:87752216325">+7 (775) 221 63 25</a> <br>
                                    <a href="tel:87717808737">+7 (771) 780 87 37</a>
                                </div>
                            </div>
                            <div class="email">
                                <i class="bi bi-envelope-fill"></i>
                                <a href="#">aliasvalve@gmail.com</a>
                            </div>
                        </div>
                    </div>
                    <div class="city city-10 dropdown">
                        <img src="img/btn.png" class="btn-pipes" data-toggle="dropdown" alt="">
                        <div class="name">Павлодар</div>
                        <div class="dropdown-menu">
                            <div class="address">
                                <i class="bi bi-geo-alt-fill"></i>
                                <p>пр. Райымбека, 312 <br> (уг. ул. Брусиловского)</p>
                            </div>
                            <div class="phone">
                                <i class="bi bi-telephone-fill"></i>
                                <div class="link">
                                    <a href="tel:87752216325">+7 (775) 221 63 25</a> <br>
                                    <a href="tel:87717808737">+7 (771) 780 87 37</a>
                                </div>
                            </div>
                            <div class="email">
                                <i class="bi bi-envelope-fill"></i>
                                <a href="#">aliasvalve@gmail.com</a>
                            </div>
                        </div>
                    </div>
                    <div class="city city-11 dropdown">
                        <img src="img/btn.png" class="btn-pipes" data-toggle="dropdown" alt="">
                        <div class="name">Алматы</div>
                        <div class="dropdown-menu">
                            <div class="address">
                                <i class="bi bi-geo-alt-fill"></i>
                                <p>пр. Райымбека, 312 <br> (уг. ул. Брусиловского)</p>
                            </div>
                            <div class="phone">
                                <i class="bi bi-telephone-fill"></i>
                                <div class="link">
                                    <a href="tel:87752216325">+7 (775) 221 63 25</a> <br>
                                    <a href="tel:87717808737">+7 (771) 780 87 37</a>
                                </div>
                            </div>
                            <div class="email">
                                <i class="bi bi-envelope-fill"></i>
                                <a href="#">aliasvalve@gmail.com</a>
                            </div>
                        </div>
                    </div>
                    <div class="city city-12 dropdown">
                        <img src="img/btn.png" class="btn-pipes" data-toggle="dropdown" alt="">
                        <div class="name">Усть-Каменогорск</div>
                        <div class="dropdown-menu">
                            <div class="address">
                                <i class="bi bi-geo-alt-fill"></i>
                                <p>пр. Райымбека, 312 <br> (уг. ул. Брусиловского)</p>
                            </div>
                            <div class="phone">
                                <i class="bi bi-telephone-fill"></i>
                                <div class="link">
                                    <a href="tel:87752216325">+7 (775) 221 63 25</a> <br>
                                    <a href="tel:87717808737">+7 (771) 780 87 37</a>
                                </div>
                            </div>
                            <div class="email">
                                <i class="bi bi-envelope-fill"></i>
                                <a href="#">aliasvalve@gmail.com</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
