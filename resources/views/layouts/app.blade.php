<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@yield('header')
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-53818547-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-53818547-1');
</script>
	
</head>

<body>
    <!-- header start -->
    <div class="dark-block dark-block-hidden">

    </div>
    <header class="header">
        <div class="header__content-top">
            <div class="container">
                <a href="{{ route('main') }}" class="top__logo">
                    <img src="{{ asset('img/header-logo.png') }}" alt="logo">
                </a>
                <ul class="top__menu">
                    <li><a href="{{ route('about') }}">О нас</a></li>
                    <li><a href="{{ route('branches') }}">Филиалы</a></li>
                    <li><a href="{{ route('reviews') }}">Отзывы</a></li>
                    <li><a href="{{ route('news') }}">Новости</a></li>
                    <li><a href="{{ route('contacts') }}">Контакты</a></li>
                </ul>
                <a href="#" class="top__btn btn-dark-blue modal_window" id="modale">
                    Оставить заявку
                </a>
            </div>
        </div>
        <div class="header__content-bottom">
            <div class="container">
                <ul class="bottom__menu">
                    <li class="bottom__menu-item btn-cat"><a href="#">
                            <svg width="19" height="13" viewBox="0 0 19 13" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect width="19" height="1" rx="0.5" fill="#12304E" />
                                <rect y="6" width="19" height="1" rx="0.5" fill="#12304E" />
                                <rect y="12" width="19" height="1" rx="0.5" fill="#12304E" />
                            </svg>
                            Каталог</a></li>
                    <li class="bottom__menu-item"><a href="{{ route('promotions') }}">Акции</a></li>
                    <li class="bottom__menu-item"><a href="{{ route('certificates') }}">Сертификаты</a></li>
                </ul>
                <div class="bottom__search">
                    <form action="{{ route('search') }}" method="GET">
                    <input type="text" name="search" placeholder="Поиск по каталогу" required>
                    <a><button type="submit" style="background:none; color:inherit; border:none; padding:0; font:inherit; cursor:pointer; outline:inherit;"><svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0)">
                                <path
                                    d="M14.8167 13.9337L10.5511 9.66814C11.3774 8.64753 11.8749 7.35066 11.8749 5.93818C11.8749 2.66447 9.21114 0.000732422 5.93742 0.000732422C2.6637 0.000732422 0 2.66444 0 5.93816C0 9.21187 2.66373 11.8756 5.93745 11.8756C7.34993 11.8756 8.6468 11.3781 9.66741 10.5519L13.933 14.8175C14.0549 14.9393 14.2149 15.0006 14.3749 15.0006C14.5349 15.0006 14.6949 14.9393 14.8168 14.8175C15.0611 14.5731 15.0611 14.1781 14.8167 13.9337ZM5.93745 10.6256C3.35247 10.6256 1.25 8.52314 1.25 5.93816C1.25 3.35317 3.35247 1.2507 5.93745 1.2507C8.52244 1.2507 10.6249 3.35317 10.6249 5.93816C10.6249 8.52314 8.52241 10.6256 5.93745 10.6256Z"
                                    fill="#13477C" />
                            </g>
                            <defs>
                                <clipPath id="clip0">
                                    <rect width="15" height="15" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    </button></a>
                    </form>
                </div>
                <div class="bottom__shedule">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12.6 1.4H11.9V0.7C11.9 0.28 11.62 0 11.2 0C10.78 0 10.5 0.28 10.5 0.7V1.4H3.5V0.7C3.5 0.28 3.22 0 2.8 0C2.38 0 2.1 0.28 2.1 0.7V1.4H0.7C0.35 1.4 0 1.68 0 2.1V11.9C0 12.32 0.35 12.6 0.7 12.6H4.97C4.48 11.76 4.2 10.78 4.2 9.8C4.2 6.72 6.72 4.2 9.8 4.2C11.13 4.2 12.32 4.69 13.3 5.46V2.1C13.3 1.75 12.95 1.4 12.6 1.4Z"
                            fill="#13477C" />
                        <path
                            d="M9.79961 5.6001C7.48961 5.6001 5.59961 7.4901 5.59961 9.8001C5.59961 12.1101 7.48961 14.0001 9.79961 14.0001C12.1096 14.0001 13.9996 12.1101 13.9996 9.8001C13.9996 7.4901 12.1096 5.6001 9.79961 5.6001ZM11.1996 10.5001H9.79961C9.37961 10.5001 9.09961 10.2201 9.09961 9.8001V7.7001C9.09961 7.2801 9.37961 7.0001 9.79961 7.0001C10.2196 7.0001 10.4996 7.2801 10.4996 7.7001V9.1001H11.1996C11.6196 9.1001 11.8996 9.3801 11.8996 9.8001C11.8996 10.2201 11.6196 10.5001 11.1996 10.5001Z"
                            fill="#13477C" />
                    </svg>
                    <span>График работы</span>
                    <div class="shedule-text">
                        <ul>
                            <li>
                                <span class="days">Пн-Пт</span>
                                <span class="time">{{ $header[1]->value }}</span>
                            </li>
                            <li> <span class="days">Сб</span>
                                <span class="time">{{ $header[2]->value }}</span>
                            </li>
                            <li>
                                <span class="days">Вс</span>
                                <span class="days">{{ $header[3]->value }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="bottom__phone">
                    <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0)">
                            <path
                                d="M6.23823 7.99524C5.1235 7.07862 4.37919 5.94756 3.98788 5.30399L3.69599 4.7537C3.79805 4.6442 4.57634 3.81079 4.91362 3.35861C5.33747 2.7908 4.72295 2.27798 4.72295 2.27798C4.72295 2.27798 2.99382 0.548607 2.59975 0.205566C2.20567 -0.137955 1.75205 0.0528368 1.75205 0.0528368C0.923806 0.58799 0.0651837 1.05326 0.0136736 3.29089C0.0117525 5.38587 1.60208 7.54666 3.32185 9.21947C5.04437 11.1087 7.4094 13.0022 9.69589 13C11.9333 12.949 12.3984 12.0905 12.9336 11.2622C12.9336 11.2622 13.1245 10.809 12.7813 10.4145C12.4379 10.0202 10.7083 8.29073 10.7083 8.29073C10.7083 8.29073 10.1959 7.67609 9.62793 8.1003C9.20469 8.41669 8.44464 9.12042 8.26154 9.29104C8.2619 9.29164 6.99047 8.61384 6.23823 7.99524Z"
                                fill="#13477C" />
                        </g>
                        <defs>
                            <clipPath id="clip0">
                                <rect width="13" height="13" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                    <a href="tel:{{ $header[0]->value }}">{{ $header[0]->value }}</a>
                </div>
                <div class="bottom__social">
                    <a href="{{ $social_networks[0]->link }}" class="social-item"><svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.125 0H1.875C0.840937 0 0 0.840937 0 1.875V13.125C0 14.1591 0.840937 15 1.875 15H7.5V9.84375H5.625V7.5H7.5V5.625C7.5 4.07156 8.75906 2.8125 10.3125 2.8125H12.1875V5.15625H11.25C10.7325 5.15625 10.3125 5.1075 10.3125 5.625V7.5H12.6562L11.7188 9.84375H10.3125V15H13.125C14.1591 15 15 14.1591 15 13.125V1.875C15 0.840937 14.1591 0 13.125 0Z"
                                fill="#13477C" />
                        </svg>
                    </a>
                    <a href="{{ $social_networks[1]->link }}" class="social-item">
                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M11.0156 2.66602H3.98438C3.25745 2.66602 2.66602 3.25745 2.66602 3.98438V11.0156C2.66602 11.7426 3.25745 12.334 3.98438 12.334H11.0156C11.7426 12.334 12.334 11.7426 12.334 11.0156V3.98438C12.334 3.25745 11.7426 2.66602 11.0156 2.66602ZM7.5 10.5762C5.80399 10.5762 4.42383 9.19601 4.42383 7.5C4.42383 5.80399 5.80399 4.42383 7.5 4.42383C9.19601 4.42383 10.5762 5.80399 10.5762 7.5C10.5762 9.19601 9.19601 10.5762 7.5 10.5762ZM10.5762 5.30273C10.0916 5.30273 9.69727 4.90837 9.69727 4.42383C9.69727 3.93929 10.0916 3.54492 10.5762 3.54492C11.0607 3.54492 11.4551 3.93929 11.4551 4.42383C11.4551 4.90837 11.0607 5.30273 10.5762 5.30273Z"
                                fill="#13477C" />
                            <path
                                d="M7.5 5.30273C6.28853 5.30273 5.30273 6.28853 5.30273 7.5C5.30273 8.71147 6.28853 9.69727 7.5 9.69727C8.71147 9.69727 9.69727 8.71147 9.69727 7.5C9.69727 6.28853 8.71147 5.30273 7.5 5.30273Z"
                                fill="#13477C" />
                            <path
                                d="M12.7734 0H2.22656C1.01509 0 0 1.01509 0 2.22656V12.7734C0 13.9849 1.01509 15 2.22656 15H12.7734C13.9849 15 15 13.9849 15 12.7734V2.22656C15 1.01509 13.9849 0 12.7734 0ZM13.2129 11.0156C13.2129 12.2271 12.2271 13.2129 11.0156 13.2129H3.98438C2.7729 13.2129 1.78711 12.2271 1.78711 11.0156V3.98438C1.78711 2.7729 2.7729 1.78711 3.98438 1.78711H11.0156C12.2271 1.78711 13.2129 2.7729 13.2129 3.98438V11.0156Z"
                                fill="#13477C" />
                        </svg>
                    </a>
                    <a href="{{ $social_networks[2]->link }}" class="social-item">
                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0)">
                                <path
                                    d="M13.5 0H1.5C0.75 0 0 0.75 0 1.5V13.5C0 14.25 0.75 15 1.5 15H13.5C14.25 15 15 14.25 15 13.5V1.5C15 0.75 14.25 0 13.5 0ZM12.4427 9.14015C12.7168 9.41959 13.3117 9.8885 13.2037 10.3659C13.1042 10.8041 12.4501 10.6443 11.815 10.6697C11.0899 10.7004 10.6602 10.7163 10.2241 10.3659C10.0187 10.1997 9.89803 10.0028 9.70115 9.78265C9.52226 9.58366 9.2968 9.22694 8.98984 9.2407C8.43836 9.26822 8.6109 10.0367 8.41507 10.5607C5.34966 11.0433 4.11862 9.14967 3.0326 7.31212C2.50653 6.42192 1.74652 4.51027 1.74652 4.51027L3.91433 4.50286C3.91433 4.50286 4.60977 5.76777 4.79395 6.09378C4.9506 6.37111 5.12314 6.59128 5.30097 6.83897C5.45022 7.04432 5.68626 7.44655 5.94454 7.41373C6.36476 7.35975 6.44097 5.72966 6.18058 5.18347C6.07685 4.96225 5.8281 4.88498 5.57088 4.80982C5.65768 4.26152 8.00226 4.1472 8.3812 4.57272C8.93162 5.19088 8.00014 6.912 8.75379 7.41373C9.81229 6.85908 10.7163 4.53673 10.7163 4.53673L13.2545 4.55261C13.2545 4.55261 12.8576 5.80799 12.4416 6.36476C12.1992 6.69078 11.3947 7.41691 11.4265 7.95568C11.4519 8.38226 12.1061 8.79719 12.4427 9.14015Z"
                                    fill="#13477C" />
                            </g>
                            <defs>
                                <clipPath id="clip0">
                                    <rect width="15" height="15" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="header__catalog__inner">
            <div class="container">
                <div class="catalog__content">
                    <ul>
                        @foreach ($category as $key => $item)
                        <li><a href="{{ route('products.category', $item->slug) }}">{{ $item->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
      </header>

      <div class="header-mobile">
          <div class="header-mobile__head">
            <div class="container dflex">
              <a href="{{ route('main') }}" class="top__logo">
                <img src="{{ asset('img/header-logo.png') }}" alt="logo">
              </a>
              <i class="bi bi-list " id="show-body"></i>
            </div>
          </div>
          <div class="header-mobile__body" id="show-body-menu">
              <div class="container">
                  <div class="head-menu">
                      <div class="head-menu__search">
                          <input type="text" name="search" placeholder="Поиск по каталогу">
                          <a href="{{ route('search') }}"><svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                  xmlns="http://www.w3.org/2000/svg">
                                  <g clip-path="url(#clip0)">
                                      <path
                                          d="M14.8167 13.9337L10.5511 9.66814C11.3774 8.64753 11.8749 7.35066 11.8749 5.93818C11.8749 2.66447 9.21114 0.000732422 5.93742 0.000732422C2.6637 0.000732422 0 2.66444 0 5.93816C0 9.21187 2.66373 11.8756 5.93745 11.8756C7.34993 11.8756 8.6468 11.3781 9.66741 10.5519L13.933 14.8175C14.0549 14.9393 14.2149 15.0006 14.3749 15.0006C14.5349 15.0006 14.6949 14.9393 14.8168 14.8175C15.0611 14.5731 15.0611 14.1781 14.8167 13.9337ZM5.93745 10.6256C3.35247 10.6256 1.25 8.52314 1.25 5.93816C1.25 3.35317 3.35247 1.2507 5.93745 1.2507C8.52244 1.2507 10.6249 3.35317 10.6249 5.93816C10.6249 8.52314 8.52241 10.6256 5.93745 10.6256Z"
                                          fill="#13477C" />
                                  </g>
                                  <defs>
                                      <clipPath id="clip0">
                                          <rect width="15" height="15" fill="white" />
                                      </clipPath>
                                  </defs>
                              </svg>
                          </a>
                      </div>
                      <div class="head-menu__shedule">
                          <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path
                                  d="M12.6 1.4H11.9V0.7C11.9 0.28 11.62 0 11.2 0C10.78 0 10.5 0.28 10.5 0.7V1.4H3.5V0.7C3.5 0.28 3.22 0 2.8 0C2.38 0 2.1 0.28 2.1 0.7V1.4H0.7C0.35 1.4 0 1.68 0 2.1V11.9C0 12.32 0.35 12.6 0.7 12.6H4.97C4.48 11.76 4.2 10.78 4.2 9.8C4.2 6.72 6.72 4.2 9.8 4.2C11.13 4.2 12.32 4.69 13.3 5.46V2.1C13.3 1.75 12.95 1.4 12.6 1.4Z"
                                  fill="#fff" />
                              <path
                                  d="M9.79961 5.6001C7.48961 5.6001 5.59961 7.4901 5.59961 9.8001C5.59961 12.1101 7.48961 14.0001 9.79961 14.0001C12.1096 14.0001 13.9996 12.1101 13.9996 9.8001C13.9996 7.4901 12.1096 5.6001 9.79961 5.6001ZM11.1996 10.5001H9.79961C9.37961 10.5001 9.09961 10.2201 9.09961 9.8001V7.7001C9.09961 7.2801 9.37961 7.0001 9.79961 7.0001C10.2196 7.0001 10.4996 7.2801 10.4996 7.7001V9.1001H11.1996C11.6196 9.1001 11.8996 9.3801 11.8996 9.8001C11.8996 10.2201 11.6196 10.5001 11.1996 10.5001Z"
                                  fill="#fff" />
                          </svg>
                          <span id="shedule-text">График работы</span>
                          <div class="shedule-text" id="shedule-text-show">
                              <ul>
                                  <li>
                                      <span class="days">Пн-Пт</span>
                                      <span class="time">{{ $header[1]->value }}</span>
                                  </li>
                                  <li> <span class="days">Сб</span>
                                      <span class="time">{{ $header[2]->value }}</span>
                                  </li>
                                  <li>
                                      <span class="days">Вс</span>
                                      <span class="days">{{ $header[3]->value }}</span>
                                  </li>
                              </ul>
                          </div>
                      </div>
                      <div class="head-menu__phone">
                          <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <g clip-path="url(#clip0)">
                                  <path
                                      d="M6.23823 7.99524C5.1235 7.07862 4.37919 5.94756 3.98788 5.30399L3.69599 4.7537C3.79805 4.6442 4.57634 3.81079 4.91362 3.35861C5.33747 2.7908 4.72295 2.27798 4.72295 2.27798C4.72295 2.27798 2.99382 0.548607 2.59975 0.205566C2.20567 -0.137955 1.75205 0.0528368 1.75205 0.0528368C0.923806 0.58799 0.0651837 1.05326 0.0136736 3.29089C0.0117525 5.38587 1.60208 7.54666 3.32185 9.21947C5.04437 11.1087 7.4094 13.0022 9.69589 13C11.9333 12.949 12.3984 12.0905 12.9336 11.2622C12.9336 11.2622 13.1245 10.809 12.7813 10.4145C12.4379 10.0202 10.7083 8.29073 10.7083 8.29073C10.7083 8.29073 10.1959 7.67609 9.62793 8.1003C9.20469 8.41669 8.44464 9.12042 8.26154 9.29104C8.2619 9.29164 6.99047 8.61384 6.23823 7.99524Z"
                                      fill="#fff" />
                              </g>
                              <defs>
                                  <clipPath id="clip0">
                                      <rect width="13" height="13" fill="white" />
                                  </clipPath>
                              </defs>
                          </svg>
                          <a href="tel:{{ $header[0]->value }}">{{ $header[0]->value }}</a>
                      </div>
                      <div class="head-menu__social">
                          <a href="{{ $social_networks[0]->link }}" class="social-item">
                            <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                  xmlns="http://www.w3.org/2000/svg">
                                  <path
                                      d="M13.125 0H1.875C0.840937 0 0 0.840937 0 1.875V13.125C0 14.1591 0.840937 15 1.875 15H7.5V9.84375H5.625V7.5H7.5V5.625C7.5 4.07156 8.75906 2.8125 10.3125 2.8125H12.1875V5.15625H11.25C10.7325 5.15625 10.3125 5.1075 10.3125 5.625V7.5H12.6562L11.7188 9.84375H10.3125V15H13.125C14.1591 15 15 14.1591 15 13.125V1.875C15 0.840937 14.1591 0 13.125 0Z"
                                      fill="#fff" />
                              </svg>
                          </a>
                          <a href="{{ $social_networks[1]->link }}" class="social-item">
                              <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path
                                      d="M11.0156 2.66602H3.98438C3.25745 2.66602 2.66602 3.25745 2.66602 3.98438V11.0156C2.66602 11.7426 3.25745 12.334 3.98438 12.334H11.0156C11.7426 12.334 12.334 11.7426 12.334 11.0156V3.98438C12.334 3.25745 11.7426 2.66602 11.0156 2.66602ZM7.5 10.5762C5.80399 10.5762 4.42383 9.19601 4.42383 7.5C4.42383 5.80399 5.80399 4.42383 7.5 4.42383C9.19601 4.42383 10.5762 5.80399 10.5762 7.5C10.5762 9.19601 9.19601 10.5762 7.5 10.5762ZM10.5762 5.30273C10.0916 5.30273 9.69727 4.90837 9.69727 4.42383C9.69727 3.93929 10.0916 3.54492 10.5762 3.54492C11.0607 3.54492 11.4551 3.93929 11.4551 4.42383C11.4551 4.90837 11.0607 5.30273 10.5762 5.30273Z"
                                      fill="#fff" />
                                  <path
                                      d="M7.5 5.30273C6.28853 5.30273 5.30273 6.28853 5.30273 7.5C5.30273 8.71147 6.28853 9.69727 7.5 9.69727C8.71147 9.69727 9.69727 8.71147 9.69727 7.5C9.69727 6.28853 8.71147 5.30273 7.5 5.30273Z"
                                      fill="#fff" />
                                  <path
                                      d="M12.7734 0H2.22656C1.01509 0 0 1.01509 0 2.22656V12.7734C0 13.9849 1.01509 15 2.22656 15H12.7734C13.9849 15 15 13.9849 15 12.7734V2.22656C15 1.01509 13.9849 0 12.7734 0ZM13.2129 11.0156C13.2129 12.2271 12.2271 13.2129 11.0156 13.2129H3.98438C2.7729 13.2129 1.78711 12.2271 1.78711 11.0156V3.98438C1.78711 2.7729 2.7729 1.78711 3.98438 1.78711H11.0156C12.2271 1.78711 13.2129 2.7729 13.2129 3.98438V11.0156Z"
                                      fill="#fff" />
                              </svg>
                          </a>
                          <a href="{{ $social_networks[2]->link }}" class="social-item">
                              <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <g clip-path="url(#clip0)">
                                      <path
                                          d="M13.5 0H1.5C0.75 0 0 0.75 0 1.5V13.5C0 14.25 0.75 15 1.5 15H13.5C14.25 15 15 14.25 15 13.5V1.5C15 0.75 14.25 0 13.5 0ZM12.4427 9.14015C12.7168 9.41959 13.3117 9.8885 13.2037 10.3659C13.1042 10.8041 12.4501 10.6443 11.815 10.6697C11.0899 10.7004 10.6602 10.7163 10.2241 10.3659C10.0187 10.1997 9.89803 10.0028 9.70115 9.78265C9.52226 9.58366 9.2968 9.22694 8.98984 9.2407C8.43836 9.26822 8.6109 10.0367 8.41507 10.5607C5.34966 11.0433 4.11862 9.14967 3.0326 7.31212C2.50653 6.42192 1.74652 4.51027 1.74652 4.51027L3.91433 4.50286C3.91433 4.50286 4.60977 5.76777 4.79395 6.09378C4.9506 6.37111 5.12314 6.59128 5.30097 6.83897C5.45022 7.04432 5.68626 7.44655 5.94454 7.41373C6.36476 7.35975 6.44097 5.72966 6.18058 5.18347C6.07685 4.96225 5.8281 4.88498 5.57088 4.80982C5.65768 4.26152 8.00226 4.1472 8.3812 4.57272C8.93162 5.19088 8.00014 6.912 8.75379 7.41373C9.81229 6.85908 10.7163 4.53673 10.7163 4.53673L13.2545 4.55261C13.2545 4.55261 12.8576 5.80799 12.4416 6.36476C12.1992 6.69078 11.3947 7.41691 11.4265 7.95568C11.4519 8.38226 12.1061 8.79719 12.4427 9.14015Z"
                                          fill="#fff" />
                                  </g>
                                  <defs>
                                      <clipPath id="clip0">
                                          <rect width="15" height="15" fill="white" />
                                      </clipPath>
                                  </defs>
                              </svg>
                          </a>
                      </div>
                  </div>
                  <ul class="top__menu">
                      <li><a href="{{ route('about') }}">О нас</a></li>
                      <li><a href="{{ route('branches') }}">Филиалы</a></li>
                      <li><a href="{{ route('reviews') }}">Отзывы</a></li>
                      <li><a href="{{ route('news') }}">Новости</a></li>
                      <li><a href="{{ route('contacts') }}">Контакты</a></li>
                  </ul>
                  <ul class="body__menu">
                      <li><a href="{{ route('promotions') }}">Акции</a></li>
                      <li><a href="{{ route('certificates') }}">Сертификаты</a></li>
                      <li><a href="#" id="show-bottom"><i class="bi bi-list" id="bi-close"></i> Каталог</a></li>
                  </ul>
                  <ul class="bottom__menu" id="show-bottom-menu">
                      <li><a href="catalog.html">Задвижки</a></li>
                      <li><a href="catalog.html">Краны</a></li>
                      <li><a href="catalog.html">Обратные клапана</a></li>
                      <li><a href="catalog.html">Вентиля</a></li>
                      <li><a href="catalog.html">Противопожарная безопасность</a></li>
                      <li><a href="catalog.html">Фильтры</a></li>
                      <li><a href="catalog.html">Резьбовые фитинги
                              для труб</a></li>
                      <li><a href="catalog.html">Сварные фитинги для труб</a></li>
                      <li><a href="catalog.html">ПЭ фитинги</a></li>
                      <li><a href="catalog.html">PPR фитинги</a></li>
                      <li><a href="catalog.html">Нержавейка</a></li>
                      <li><a href="catalog.html">Электроды диски отрезные</a></li>
                      <li><a href="catalog.html">Прочие</a></li>
                  </ul>
              </div>
          </div>

      </div>

    <div class="modale" id="modale-hide">
        <div class="info__content">
            <form class="info__form" action="{{ route('application')}}" method="POST">
                @csrf
                <i class="bi bi-x-lg close" id="modale-close"></i>
                <div class="info__title">
                    Получите бесплатный
                </div>
                <div class="info__subtitle">
                    КАТАЛОГ С ЦЕНАМИ И АКЦИЯМИ
                </div>
                <input type="text" name="company" class="inp" placeholder="Ваша компания" required>
                <input type="tel" name="phone" class="inp" placeholder="Номер телефона" required>
                <input type="email" name="email" class="inp modal_email" placeholder="Ваш e-mail" required>
                <div class="form__agreement">
                    <input type="checkbox" name="check">
                    <label for="check">Согласие на обработку персональных данных</label>
                </div>
                <input type="submit" class="btn-catalog-dark" value="Получить каталог" >
            </form>
        </div>
    </div>
    @if (Session::has('message'))
    <div class="modale modale-thank modale-hide" id="modale-thank-hide">
        <div class="info__content">
            <form action="" class="info__form">
                <i class="bi bi-x-lg close" id="modale-thank-close"></i>
                <p><span>Спасибо!</span> <br><br>
                    Мы свяжемся с Вами в ближайшее время.</p>
                <i class="bi bi-check-lg check"></i>
            </form>
        </div>
    </div>
    @endif
    @if (Session::has('message-checkbox'))
    <div class="modale modale-thank modale-hide" id="modale-thank-hide">
        <div class="info__content">
            <form action="" class="info__form">
                <i class="bi bi-x-lg close" id="modale-thank-close"></i>
                <p>Вы не приняли согласие на обработку персональных данных!</p>
                <i class="bi bi-check2-square check" style="background: #FF7A7A;"></i>
            </form>
        </div>
    </div>
    @endif
    @if (Session::has('message-error'))
    <div class="modale modale-thank modale-hide" id="modale-thank-hide">
        <div class="info__content">
            <form action="" class="info__form">
                <i class="bi bi-x-lg close" id="modale-thank-close"></i>
                <p>Произошла ошибка</p>
                <i class="bi bi-x check" style="background: #FF7A7A;"></i>
            </form>
        </div>
    </div>
    @endif
    <!-- header end -->
    <!-- main content start -->
    <main>
    @yield('content')
    </main>
    <!-- main content end -->
    <!-- footer start -->
    <footer class="footer">
        <div class="container footer__head">
            <div class="footer__head-info">
                <div class="text">Получите бесплатный</div>
                <div class="title">КАТАЛОГ С ЦЕНАМИ И АКЦИЯМИ</div>
            </div>
            <div class="footer__head-mailing">
                <input type="email" class="footer_email" placeholder="Ваш e-mail">
                <div class="btn modal_window">Получить каталог</div>
            </div>
        </div>
        <div class="hr"></div>
        <div class="container footer__body">
            <div class="footer__body-content">
                <a href="{{ route('main') }}">Главная</a>
                <a href="{{ route('about') }}">О нас</a>
                <a href="{{ route('promotions') }}">Акции</a>
                <a href="{{ route('certificates') }}">Сертификаты</a>
                <a href="{{ route('reviews') }}">Отзывы</a>
                <a href="{{ route('news') }}">Новости</a>
            </div>
            <div class="footer__body-content">
                <a href="{{ route('products') }}">Каталог</a>
                <a href="{{ route('products.category', $category[0]->slug) }}" class="link">{{ $category[0]->name }}</a>
                <a href="{{ route('products.category', $category[1]->slug) }}" class="link">{{ $category[1]->name }}</a>
                <a href="{{ route('products.category', $category[2]->slug) }}" class="link">{{ $category[2]->name }}</a>
                <a href="{{ route('products.category', $category[3]->slug) }}" class="link">{{ $category[3]->name }}</a>
                <a href="{{ route('products.category', $category[4]->slug) }}" class="link">{{ $category[4]->name }}</a>
                <a href="{{ route('products.category', $category[5]->slug) }}" class="link">{{ $category[5]->name }}</a>
            </div>
            <div class="footer__body-content py">
                <a href="{{ route('products.category', $category[6]->slug) }}" class="link">{{ $category[6]->name }}</a>
                <a href="{{ route('products.category', $category[7]->slug) }}" class="link">{{ $category[7]->name }}</a>
                <a href="{{ route('products.category', $category[8]->slug) }}" class="link">{{ $category[8]->name }}</a>
                <a href="{{ route('products.category', $category[9]->slug) }}" class="link">{{ $category[9]->name }}</a>
                <a href="{{ route('products.category', $category[10]->slug) }}" class="link">{{ $category[10]->name }}</a>
                <a href="{{ route('products.category', $category[11]->slug) }}" class="link">{{ $category[11]->name }}</a>
                <a href="{{ route('products.category', $category[12]->slug) }}" class="link">{{ $category[12]->name }}</a>
            </div>
            <div class="footer__body-content">
                <a href="{{ route('contacts') }}">Контакты</a>
                {{-- Settings --}}
                <p class="link">{{ $footer[0]->value }}</p>
                <a href="mailto:{{ $footer[1]->value }}" class="link">E-mail: {{ $footer[1]->value }}</a>
                <p>Тел.: <a href="tel:{{ $footer[2]->value }}">{{ $footer[2]->value }}</a>, <a href="tel:{{ $footer[3]->value }}">{{ $footer[3]->value }}</a></p>
                <p>Моб.: <a href="tel:{{ $footer[4]->value }}">{{ $footer[4]->value }}</a>, <a href="tel:{{ $footer[5]->value }}">{{ $footer[5]->value }}</a></p>
                <div class="mess">
                    <a href="{{ $social_networks[0]->link }}"><i class="fb"></i></a>
                    <a href="{{ $social_networks[1]->link }}"><i class="insta"></i></a>
                    <a href="{{ $social_networks[2]->link }}"><i class="vk"></i></a>
                </div>
            </div>
        </div>
        <div class="hr"></div>
        <div class="container footer__bottom">
            <div class="text">Copyrght © 2002 - {{ now()->year }} TOO Alias Valve Group</div>
            <div class="logo"></div>
        </div>
    </footer>
    <!-- footer end -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
	
	<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(56789359, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/56789359" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>

</html>
