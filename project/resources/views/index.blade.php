@extends('layouts.app')
@section('title', 'Capsule - car proection')
@section('content')

    <style>
        .error-message {
            color: red;
            line-height: 17px;
        }
    </style>
    <div class="main__container">
        <!---header-->
        <header class="header" id="header">
            <div class="header__wrapper">

                <a class="header__wrapper__image-a" href="{{ url(app()->getLocale()) }}">
                    <img src="{{ asset('public/images/logo_main.png') }}" alt="">
                </a>


                <div class="header__navigation">
                    <div class="header__nav__burger">
                        <img src="{{ asset('public/images/circum_menu-burger.png') }}" alt="" srcset="">
                    </div>
                    <div class="header__nav__element">
                        <button data-target="home">{{ __('main.header_home') }}</button>
                    </div>
                    <div class="header__nav__element">
                        <button data-target="about_us">{{ __('main.header_about') }}</button>
                    </div>
                    <div class="header__nav__element">
                        <button data-target="warranty">{{ __('main.header_warranty') }}</button>
                    </div>
                    <div class="header__nav__element">
                        <button data-target="catalog">{{ __('main.header_catalogue') }}</button>
                    </div>
                    <div class="header__nav__element">
                        <button data-target="gallery">{{ __('main.header_gallery') }}</button>
                    </div>

                    <div class="header__nav__element">
                        <button data-target="contact">{{ __('main.header_contacts') }}</button>
                    </div>
                    <img src="{{ asset('public/images/header_rectangle.png') }}" id="header_rectangle"
                        class="header_rectangle" alt="" />
                </div>


                <div class="header__languages">
                    <button id="languageButton">{{ strtoupper(app()->getLocale()) }}</button>
                    <div class="language-dropdown" id="languageDropdown">
                        <a href="{{ url('/en') }}" class="{{ app()->getLocale() === 'en' ? 'active' : '' }}">EN</a>
                        <a href="{{ url('/de') }}" class="{{ app()->getLocale() === 'de' ? 'active' : '' }}">DE</a>
                    </div>
                </div>


                <div class="header__burger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

            </div>


            <!-- Full-screen mobile menu -->
            <div class="mobile-menu" id="mobileMenu">
                <button class="mobile-menu__close" id="mobileMenuClose">X</button>
                <div class="mobile-menu__content">
                    <div class="mobile__menu__container">
                        <div class="mobile__burger-logo">
                            <img src="{{ asset('public/images/logo_main.png') }}" alt="">
                        </div>
                        <div class="mobile__burger-language">
                            <a href="{{ url('/en') }}" class="{{ app()->getLocale() === 'en' ? 'active' : '' }}">EN</a>
                            <a href="{{ url('/de') }}" class="{{ app()->getLocale() === 'de' ? 'active' : '' }}">DE</a>
                        </div>
                        <div class="mobile__burger-navigation">
                            <a href="#home">{{ __('main.header_home') }}</a>
                            <a href="#about_us">{{ __('main.header_about') }}</a>
                            <a href="#warranty">{{ __('main.header_warranty') }}</a>
                            <a href="#catalog">{{ __('main.header_catalogue') }}</a>
                            <a href="#gallery">{{ __('main.header_gallery') }}</a>
                            <a href="#contact">{{ __('main.header_contacts') }}</a>
                        </div>
                        <div class="mobile__burger__created">

                        </div>
                    </div>

                    <div class="mobile__menu__placeholder">
                        <img src="{{ asset('public/images/about_placeholder1.png') }}" alt="">
                    </div>
                </div>
            </div>
        </header>

        <!---main home section---->
        <section class="main" id="home">
            <!----text and car--->
            <div class="main__wrapper main__wrapper-pc">
                <!---- Name desc button ---->
                <div class="main__info">
                    <div class="main__name">
                        <h1>{{ __('main.title_line_1') }}</h1>
                        <h1>{{ __('main.title_line_2') }}</h1>
                    </div>

                    <div class="main__desc">
                        {{ __('main.title_main_text') }}
                    </div>
                    <div class="main__buttons">
                        <button>{{ __('main.title_main_contact') }}</button>

                        <button>{{ __('main.title_main_learn') }}</button>
                    </div>
                </div>

                <!---car and description---->
                <div class="main__car">

                    <img class="main__car__main__img" src="{{ asset('public/images/car_main.png') }}" alt="Car info image"
                        srcset="">
                    <div class="main__car__dot main__car__dot1">
                        <div class="main__car__dot-white"></div>
                    </div>
                    <div class="main__car__dot main__car__dot2">
                        <div class="main__car__dot-white"></div>
                    </div>
                    <div class="main__car__dot main__car__dot3">
                        <div class="main__car__dot-white"></div>
                    </div>
                    <div class="main__car__dot main__car__dot4">
                        <div class="main__car__dot-white"></div>
                    </div>
                    <div class="main__car__dot main__car__dot5">
                        <div class="main__car__dot-white"></div>
                    </div>



                    <div class="car-vector car-vector1">
                        <img src="{{ asset('public/images/car-vector1.png') }}" alt="" srcset="">
                    </div>
                    <div class="car-vector car-vector2">
                        <img src="{{ asset('public/images/car-vector2.png') }}" alt="" srcset="">
                    </div>
                    <div class="car-vector car-vector3">
                        <img src="{{ asset('public/images/car-vector3.png') }}" alt="" srcset="">
                    </div>

                    <div class="car-vector car-vector4">
                        <img src="{{ asset('public/images/car-vector4.png') }}" alt="" srcset="">
                    </div>
                    <div class="car-vector car-vector5">
                        <img src="{{ asset('public/images/car-vector5.png') }}" alt="" srcset="">
                    </div>


                    <div class="car-desc car-desc1">
                        {{ __('main.car_small_desc1') }}
                    </div>
                    <div class="car-desc car-desc2">
                        {{ __('main.car_small_desc2') }}
                    </div>
                    <div class="car-desc car-desc3">
                        {{ __('main.car_small_desc3') }}
                    </div>
                    <div class="car-desc car-desc4">
                        {{ __('main.car_small_desc4') }}
                    </div>
                    <div class="car-desc car-desc5">
                        {{ __('main.car_small_desc5') }}
                    </div>

                </div>
            </div>
            <div class="main__wrapper-mobile">
                <!--image-->
                <div class="mobile__main-background">
                    <img src="{{ asset('public/images/background-mobile.webp') }}" alt="Car Image">
                </div>
                <!--DESC + CONTACT-->
                <div class="mobile__main-desc">
                    <div class="mobile__main-name">
                        {{ __('main.title_line_1') }} <br>
                        {{ __('main.title_line_2') }}
                    </div>
                    <div class="mobile__main-text">
                        {{ __('main.title_main_text') }}
                    </div>
                    <div class="mobile__main-button">
                        <button data-target="contact">
                            {{ __('main.title_main_contact') }}
                        </button>
                    </div>
                </div>
                <!----CAR--->
                <div class="mobile__main-car-container">


                    <div class="mobile__main-car">
                        <div class="mobile__main-car-car">
                            <img src="{{ asset('public/images/aboutcar-mobile.png') }}" alt="">
                        </div>
                        <div class="mobile__main-car-desc">

                            <!---1--->
                            <div class="mobile__main-car-desc1-image">
                                <img src="{{ asset('public/images/mobile-vector1.svg') }}" alt=""
                                    srcset="">
                            </div>
                            <div class="mobile__main-car-desc-text mobile__main-car-desc1-text">
                                Premium quality
                            </div>
                            <div class="main__car__dot main__mobile__dot1">
                                <div class="main__car__dot-white"></div>
                            </div>

                            <!---2--->
                            <div class="mobile__main-car-desc2-image">
                                <img src="{{ asset('public/images/mobile-vector2.svg') }}" alt=""
                                    srcset="">
                            </div>
                            <div class="mobile__main-car-desc-text mobile__main-car-desc2-text">
                                High hydrophobicity
                            </div>
                            <div class="main__car__dot main__mobile__dot2">
                                <div class="main__car__dot-white"></div>
                            </div>
                            <!---3--->
                            <div class="mobile__main-car-desc3-image">
                                <img src="{{ asset('public/images/mobile-vector3.svg') }}" alt=""
                                    srcset="">
                            </div>
                            <div class="mobile__main-car-desc-text mobile__main-car-desc3-text">
                                100% Self-healing
                            </div>
                            <div class="main__car__dot main__mobile__dot3">
                                <div class="main__car__dot-white"></div>
                            </div>
                            <!---4--->
                            <div class="mobile__main-car-desc4-image">
                                <img src="{{ asset('public/images/mobile-vector4.svg') }}" alt=""
                                    srcset="">
                            </div>
                            <div class="mobile__main-car-desc-text mobile__main-car-desc4-text">
                                Anti-yellow warranty
                            </div>
                            <div class="main__car__dot main__mobile__dot4">
                                <div class="main__car__dot-white"></div>
                            </div>
                            <!---5--->
                            <div class="mobile__main-car-desc5-image">
                                <img src="{{ asset('public/images/mobile-vector5.svg') }}" alt=""
                                    srcset="">
                            </div>
                            <div class="mobile__main-car-desc-text mobile__main-car-desc5-text">
                                Excellent carrosion
                                resistance
                            </div>
                            <div class="main__car__dot main__mobile__dot5">
                                <div class="main__car__dot-white"></div>
                            </div>
                        </div>
                    </div>



                    <div class="mobile__main-background-car">
                        <img src="{{ asset('public/images/mobile_placeholder.svg') }}" alt="" srcset="">
                    </div>
                </div>
                <!----RIGHT CAR---->

                <div class="mobile__main-technology">
                    <div class="mobile__main-technoimage">
                        <img src="{{ asset('public/images/techno-mobile.png') }}" alt="" srcset="">
                    </div>
                    <div class="mobile__main-car-small">
                        <img src="{{ asset('public/images/mobile-car.png') }}" alt="" srcset="">
                    </div>
                </div>

            </div>

            <!---main background--->
            <div class="main__background main__background-mobile">

                <picture>
                    <source media="(max-width: 768px)" srcset="{{ asset('public/images/background-mobile.webp') }}">
                    <img src="{{ asset('public/images/background.png') }}" alt="Car Image">
                </picture>
            </div>
        </section>

        <!---AMERICAN QUALITY--->
        <section class="american" id="american">
            <div class="american__name">
                {{ __('main.american__name') }}
            </div>
            <div class="american__wrapper">
                <div class="american__text__block">
                    <img src="{{ asset('public/images/German_quality.png') }}" alt="">
                </div>
                <div class="american__car__block">
                    <img src="{{ asset('public/images/quality_car.png') }}" alt="">
                </div>
            </div>
        </section>

        <!---About us section---->
        <section class="about_us" id="about_us">
            <div class="about_us__container">
                <div class="about_us__name">
                    {{ __('main.about_us__name') }}
                </div>
                <div class="about_us__desc">
                    <div class="about_us__desc-text">
                        <p>
                            {{ __('main.about_us__desc-text1') }}
                        </p>
                        <p>
                            {{ __('main.about_us__desc-text2') }}
                        </p>

                        <p>
                            {{ __('main.about_us__desc-text3') }}
                        </p>
                    </div>
                    <div class="about_us__desc-back">

                    </div>
                </div>


                <div class="about_us__wrapper">
                    <div class="about_us__image">
                        <div class="about_us__image-car">
                            <img src="{{ asset('public/images/aboutcar.png') }}" alt="" srcset="">
                        </div>

                        <!--placeholders--->
                        <img class="about_us__image-placeholder1"
                            src="{{ asset('public/images/about_placeholder1.png') }}" alt="Placeholder" loading="lazy">
                    </div>

                    <div class="about_us__content">
                        <div class="about_us__content__name">
                            {{ __('main.about_us__content__name') }}
                        </div>
                        <div class="about_us__content__desc">
                            <p>
                                {{ __('main.about_us__content__desc1') }}
                            </p>

                            <p>
                                {{ __('main.about_us__content__desc2') }}
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!---warranty and verification--->

        <section class="warranty" id="warranty">
            <div class="warranty__name warranty__name-mobile">
                <p>{{ __('main.warranty__name') }}</p>
            </div>

            <div class="warranty__name__desc">
                <p>
                    {{ __('main.warranty__name__desc') }}
                </p>
            </div>
            <div class="warranty__container">

                <div class="warranty__element">
                    <div class="warranty__element__wrapper">
                        <div class="warranty__element__image">
                            <div class="warranty__element__image-block">

                            </div>
                            <div class="warranty__element__image-link">
                                <a target="_blank" href="{{ route('verification') }}">Verification check</a>
                            </div>
                        </div>
                        <div class="warranty__element__desc">
                            <p>
                                {{ __('main.warranty__element__verification') }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="warranty__name">
                    <p>
                        {{ __('main.warranty__name') }}
                    </p>
                </div>
                <div class="warranty__element2">
                    <div class="warranty__element__wrapper2">
                        <div class="warranty__element__image2">
                            <div class="warranty__element__image-block2">

                            </div>
                            <div class="warranty__element__image-link2">
                                <a target="_blank" href="{{ route('warranty') }}">warranty check</a>
                            </div>
                        </div>
                        <div class="warranty__element__desc2">
                            <p>{{ __('main.warranty__element__warranty') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!----CAR NUMBER CHECK---->
        <section class="car_number" id="car_number">
            <div class="car_number__wrapper">
                <div class="car__number__element">
                    <div class="car_number-content">
                        <div class="car_number-name">
                            <p>Check your warranty
                                by the car number</p>
                            <img src="{{ asset('public/images/new.png') }}" alt="" srcset="">
                        </div>
                        <div class="car_number-desc">
                            <p>Our Digital Warranty System safeguards your investment in paint protection films and your
                                consumer rights. Each product comes with a unique digital warranty certificate that verifies
                                its
                                authenticity and quality. The warranty is activated via an SMS notification from Capsule,
                                ensuring protection against fraud.</p>
                        </div>
                        <div class="car_number-btn">
                            <a target="_blank" href="https://capsuleppf.com/user/check">
                                <p>CHECK NOW</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="car__number__element">
                    <div class="car__number__car">
                        <img src="{{ asset('public/images/car-number.png') }}" alt="">
                    </div>
                </div>
            </div>
        </section>

        <!--- Catalogue --->
        <section class="catalog" id="catalog">

            <div class="ctalog__placeholder">
                <img src="{{ asset('public/images/catalog_placeholder.png') }}" alt="" srcset="">
            </div>

            <div class="catalog__wrapper">
                <div class="catalog__name">
                    <p>{{ __('main.catalog__name') }}</p>
                </div>

                <div class="catalog__swiper">
                    <div class="catalog__swiper-button">
                        <a href="{{ url('/catalog') }}">
                            {{ __('main.catalog__swiper-button') }}
                        </a>
                    </div>


                    <div class="catalog__swiper__wrapper">
                        <div class="glide">
                            <div class="glide__track" data-glide-el="track">
                                <ul class="glide__slides">
                                    <li class="glide__slide">
                                        <div class="glide__slide__wrapper">
                                            <div class="glide__slide__image">
                                                <img src="{{ 'public/images/urbanppf.jpg' }}" alt="">
                                            </div>
                                            <div class="glide__slide__name">
                                                {{ __('main.catalog_eleemnt1_name') }}
                                            </div>
                                            <div class="glide__slide__desc">
                                                <p>{{ __('main.catalog_eleemnt1_desc') }}</p>
                                            </div>
                                        </div>
                                        <button>
                                            <a href="{{ url('/catalog') }}">{{ __('main.catalog_element_button') }}</a>
                                        </button>
                                    </li>
                                    <li class="glide__slide">
                                        <div class="glide__slide__wrapper">
                                            <div class="glide__slide__image">
                                                <img src="{{ 'public/images/optimappf.jpg' }}" alt="">
                                            </div>
                                            <div class="glide__slide__name">
                                                {{ __('main.catalog_eleemnt5_name') }}
                                            </div>
                                            <div class="glide__slide__desc">
                                                <p>{{ __('main.catalog_eleemnt5_desc') }}</p>
                                            </div>
                                        </div>
                                        <button>
                                            <a href="{{ url('/catalog') }}">{{ __('main.catalog_element_button') }}</a>
                                        </button>
                                    </li>
                                    <li class="glide__slide">
                                        <div class="glide__slide__wrapper">
                                            <div class="glide__slide__image">
                                                <img src="{{ 'public/images/elementppf.jpg' }}" alt="">
                                            </div>
                                            <div class="glide__slide__name">
                                                {{ __('main.catalog_eleemnt2_name') }}
                                            </div>
                                            <div class="glide__slide__desc">
                                                <p>{{ __('main.catalog_eleemnt2_desc') }}</p>
                                            </div>
                                        </div>
                                        <button>
                                            <a href="{{ url('/catalog') }}">{{ __('main.catalog_element_button') }}</a>
                                        </button>
                                    </li>

                                    <li class="glide__slide">
                                        <div class="glide__slide__wrapper">
                                            <div class="glide__slide__image">
                                                <img src="{{ 'public/images/hurakanppf.jpg' }}" alt="">
                                            </div>
                                            <div class="glide__slide__name">
                                                {{ __('main.catalog_eleemnt3_name') }}
                                            </div>
                                            <div class="glide__slide__desc">
                                                <p>
                                                    {{ __('main.catalog_eleemnt3_desc') }}
                                                </p>
                                            </div>
                                        </div>
                                        <button>
                                            <a href="{{ url('/catalog') }}">{{ __('main.catalog_element_button') }}</a>
                                        </button>
                                    </li>

                                    <li class="glide__slide">
                                        <div class="glide__slide__wrapper">
                                            <div class="glide__slide__image">
                                                <img src="{{ 'public/images/matteppf.jpg' }}" alt="">
                                            </div>
                                            <div class="glide__slide__name">

                                                {{ __('main.catalog_eleemnt4_name') }}
                                            </div>
                                            <div class="glide__slide__desc">
                                                <p>
                                                    {{ __('main.catalog_eleemnt4_desc') }}
                                                </p>
                                            </div>
                                        </div>
                                        <button>
                                            <a href="{{ url('/catalog') }}">{{ __('main.catalog_element_button') }}</a>
                                        </button>
                                    </li>

                                    <li class="glide__slide">
                                        <div class="glide__slide__wrapper">
                                            <div class="glide__slide__image">
                                                <img src="{{ 'public/images/blackppf.jpg' }}" alt="">
                                            </div>
                                            <div class="glide__slide__name">
                                                {{ __('main.catalog_eleemnt6_name') }}
                                            </div>
                                            <div class="glide__slide__desc">
                                                <p>
                                                    {{ __('main.catalog_eleemnt6_desc') }}
                                                </p>
                                            </div>
                                        </div>
                                        <button>
                                            <a href="{{ url('/catalog') }}">{{ __('main.catalog_element_button') }}</a>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <div class="glide__arrows" data-glide-el="controls">
                                <button class="glide__arrow glide__arrow--left" data-glide-dir="<"
                                    aria-label="Previous Slide">
                                    <img src="{{ asset('public/images/arrow_catalog.png') }}" alt=""
                                        srcset="">
                                </button>
                                <button class="glide__arrow glide__arrow--right" data-glide-dir=">"
                                    aria-label="Next Slide">
                                    <img src="{{ asset('public/images/arrow_catalog.png') }}" alt=""
                                        srcset="">
                                </button>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </section>



        <!------Gallery---->
        <section class="gallery" id="gallery">
            <div class="gallery__car__placeholder">
                <img src="{{ asset('public/images/gallery_car.png') }}" alt="" srcset="">
            </div>
            <div class="gallery__wrapper">
                <div class="gallery__name">
                    <div class="gallery__name-text">
                        {{ __('main.gallery__name-text') }}
                    </div>
                </div>

                <div class="gallery__images__wrapper">
                    <div class="gallery__images__small gallery__images__small-mobile">
                        <a href="{{ asset('public/images/gallery/1.png') }}" data-fancybox="gallery"
                            data-caption="Royal Park L-16A">
                            <img src="{{ asset('public/images/gallery/1.png') }}" alt="Gallery Image" />
                        </a>
                        <a href="{{ asset('public/images/gallery/2.png') }}" data-fancybox="gallery"
                            data-caption="Royal Park L-16A">
                            <img src="{{ asset('public/images/gallery/2.png') }}" alt="Gallery Image" />
                        </a>
                    </div>
                    <div class="gallery__images__big">
                        <a href="{{ asset('public/images/gallery/3.png') }}" data-fancybox="gallery"
                            data-caption="Royal Park L-16A">
                            <img src="{{ asset('public/images/gallery/3.png') }}" alt="Gallery Image" />
                        </a>
                    </div>
                    <div class="gallery__images__small">
                        <a href="{{ asset('public/images/gallery/4.png') }}" data-fancybox="gallery"
                            data-caption="Royal Park L-16A">
                            <img src="{{ asset('public/images/gallery/4.png') }}" alt="Gallery Image" />
                        </a>
                        <a href="{{ asset('public/images/gallery/5.png') }}" data-fancybox="gallery"
                            data-caption="Royal Park L-16A">
                            <img src="{{ asset('public/images/gallery/5.png') }}" alt="Gallery Image" />
                        </a>
                    </div>
                    <div class="gallery__images__small gallery__images__medium">
                        <a href="{{ asset('public/images/gallery/6.png') }}" data-fancybox="gallery"
                            data-caption="Royal Park L-16A">
                            <img src="{{ asset('public/images/gallery/6.png') }}" alt="Gallery Image" />
                        </a>

                    </div>
                    <div class="gallery__images__small">
                        <a href="{{ asset('public/images/gallery/7.png') }}" data-fancybox="gallery"
                            data-caption="Royal Park L-16A">
                            <img src="{{ asset('public/images/gallery/7.png') }}" alt="Gallery Image" />
                        </a>
                        <a href="{{ asset('public/images/gallery/8.png') }}" data-fancybox="gallery"
                            data-caption="Royal Park L-16A">
                            <img src="{{ asset('public/images/gallery/8.png') }}" alt="Gallery Image" />
                        </a>
                    </div>
                </div>

                <div class="gallery__images__wrapper">
                    <div class="gallery__images__small">
                        <a href="{{ asset('public/images/gallery/9.png') }}" data-fancybox="gallery"
                            data-caption="Royal Park L-16A">
                            <img src="{{ asset('public/images/gallery/9.png') }}" alt="Gallery Image" />
                        </a>
                        <a href="{{ asset('public/images/gallery/10.png') }}" data-fancybox="gallery"
                            data-caption="Royal Park L-16A">
                            <img src="{{ asset('public/images/gallery/10.png') }}" alt="Gallery Image" />
                        </a>
                    </div>
                    <div class="gallery__images__big">
                        <a href="{{ asset('public/images/gallery/11.png') }}" data-fancybox="gallery"
                            data-caption="Royal Park L-16A">
                            <img src="{{ asset('public/images/gallery/11.png') }}" alt="Gallery Image" />
                        </a>
                    </div>
                    <div class="gallery__images__small">
                        <a href="{{ asset('public/images/gallery/12.png') }}" data-fancybox="gallery"
                            data-caption="Royal Park L-16A">
                            <img src="{{ asset('public/images/gallery/12.png') }}" alt="Gallery Image" />
                        </a>
                        <a href="{{ asset('public/images/gallery/13.png') }}" data-fancybox="gallery"
                            data-caption="Royal Park L-16A">
                            <img src="{{ asset('public/images/gallery/13.png') }}" alt="Gallery Image" />
                        </a>
                    </div>
                    <div class="gallery__images__small gallery__images__medium">
                        <a href="{{ asset('public/images/gallery/14.png') }}" data-fancybox="gallery"
                            data-caption="Royal Park L-16A">
                            <img src="{{ asset('public/images/gallery/14.png') }}" alt="Gallery Image" />
                        </a>

                    </div>
                    <div class="gallery__images__small">
                        <a href="{{ asset('public/images/gallery/15.png') }}" data-fancybox="gallery"
                            data-caption="Royal Park L-16A">
                            <img src="{{ asset('public/images/gallery/15.png') }}" alt="Gallery Image" />
                        </a>
                        <a href="{{ asset('public/images/gallery/16.png') }}" data-fancybox="gallery"
                            data-caption="Royal Park L-16A">
                            <img src="{{ asset('public/images/gallery/16.png') }}" alt="Gallery Image" />
                        </a>
                    </div>
                </div>

            </div>
        </section>

        <!----MAP---->
        <section class="map">
            <div class="map__wrapper">
                <div class="map__name-container">
                    <div class="map__name">
                        <h4>{{ __('main.map_map__name') }}</h4>
                        <p>{{ __('main.map_name__desc') }}</p>
                    </div>
                </div>

                <div class="map__container">
                    <div class="map__container-map">
                        <img src="{{ 'public/images/map.png' }}" alt="" srcset="">
                    </div>

                    <div class="map__container-desc">
                        <p class="map__container-p1" data-target="9">0</p>
                        <span class="map__container-country">countries</span>
                        <p class="map_margin map__container-p2" data-target="34">0</p>
                        <span class="map_dealers">dealers</span>
                    </div>
                </div>
            </div>
        </section>

        <!---COntact US----->
        <section class="contact" id="contact">
            <div class="contact_wrapper">
                <div class="contact_wrapper__animation">
                    <div class="contact__text__block">
                        <img src="{{ asset('public/images/contact_us.png') }}" alt="">
                    </div>
                    <div class="contact__car__block">
                        <img src="{{ asset('public/images/contact_car.png') }}" alt="">
                    </div>
                </div>

                <div class="contact__main__container">
                    <div class="contact__form__container">
                        <form id="contact-form">
                            @csrf
                            <div class="contact__form__name-message">
                                <div class="contact__form__block name">
                                    <div class="contact__form__block-name">
                                        Name
                                    </div>
                                    <div class="contact__form__block-input">
                                        <input type="text" name="name" id="name" placeholder="Your name">
                                    </div>
                                </div>

                                <div class="contact__form__block message">
                                    <div class="contact__form__block-name">
                                        How can we help you?
                                    </div>
                                    <div class="contact__form__block-input">
                                        <textarea placeholder="Leave your message" name="message" id="message"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="contact__form__number-country">
                                <div class="contact__form__block number">
                                    <div class="contact__form__block-name">
                                        Number
                                    </div>
                                    <div class="contact__form__block-input">
                                        <input type="text" inputmode="numeric" pattern="[0-9]*" name="number"
                                            id="number" placeholder="Your mobile number" required>

                                    </div>
                                </div>

                                <div class="contact__form__block contact__form__block-country country">
                                    <div class="contact__form__block-name">
                                        Country
                                    </div>
                                    <div class="contact__form__block-input">
                                        <select class="contact__form__block-select" name="countries" id="countries">
                                            <option value="" disabled selected>Select Country</option>
                                            <option value="US">United States</option>
                                            <option value="CA">Canada</option>
                                            <option value="GB">United Kingdom</option>
                                            <option value="AU">Australia</option>
                                            <option value="DE">Germany</option>
                                            <option value="FR">France</option>
                                            <option value="IT">Italy</option>
                                            <option value="ES">Spain</option>
                                            <option value="RU">Russia</option>
                                            <option value="UA">Ukraine</option>
                                            <option value="PL">Poland</option>
                                            <option value="NL">Netherlands</option>
                                            <option value="BE">Belgium</option>
                                            <option value="CH">Switzerland</option>
                                            <option value="SE">Sweden</option>
                                            <option value="NO">Norway</option>
                                            <option value="DK">Denmark</option>
                                            <option value="FI">Finland</option>
                                            <option value="IE">Ireland</option>
                                            <option value="PT">Portugal</option>
                                            <option value="AT">Austria</option>
                                            <option value="AZ">Azerbaijan</option>
                                            <option value="CZ">Czech Republic</option>
                                            <option value="SK">Slovakia</option>
                                            <option value="HU">Hungary</option>
                                            <option value="RO">Romania</option>
                                            <option value="BG">Bulgaria</option>
                                            <option value="GR">Greece</option>
                                            <option value="TR">Turkey</option>
                                            <option value="IL">Israel</option>
                                            <option value="AE">United Arab Emirates</option>
                                            <option value="SA">Saudi Arabia</option>
                                            <option value="IN">India</option>
                                            <option value="PK">Pakistan</option>
                                            <option value="CN">China</option>
                                            <option value="JP">Japan</option>
                                            <option value="KR">South Korea</option>
                                            <option value="VN">Vietnam</option>
                                            <option value="TH">Thailand</option>
                                            <option value="MY">Malaysia</option>
                                            <option value="ID">Indonesia</option>
                                            <option value="PH">Philippines</option>
                                            <option value="BR">Brazil</option>
                                            <option value="AR">Argentina</option>
                                            <option value="MX">Mexico</option>
                                            <option value="CL">Chile</option>
                                            <option value="CO">Colombia</option>
                                            <option value="ZA">South Africa</option>
                                            <option value="EG">Egypt</option>
                                            <option value="NG">Nigeria</option>
                                            <option value="KE">Kenya</option>
                                            <option value="GE">Georgia</option>
                                            <option value="TT">Other</option>
                                        </select>

                                    </div>
                                </div>

                            </div>

                            <div class="contact__form__email-contact">
                                <div class="contact__form__block email">
                                    <div class="contact__form__block-name">
                                        E-mail
                                    </div>
                                    <div class="contact__form__block-input">
                                        <input type="email" name="email" id="email"
                                            placeholder="Your mobile number">
                                    </div>
                                </div>

                                <div class="contact__form__block method">
                                    <div class="contact__form__block-name">
                                        How can we contact you?
                                    </div>
                                    <div class="contact__form__block-input">
                                        <div class="radio-group">
                                            <label class="radio">
                                                <input type="radio" name="contact-method" value="email" />
                                                <span class="radio-label">E-Mail</span>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="contact-method" value="phone" />
                                                <span class="radio-label">Phone</span>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="contact-method" value="both" />
                                                <span class="radio-label">Both</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="contact__from-terms">
                                <div class="checkbox-wrapper">
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="consent" />
                                        <span class="checkbox-label"></span>
                                    </label>
                                    <span class="checkbox-text">
                                        I give my consent to the processing of personal data in accordance with the <a
                                            href="#">Terms*</a>
                                    </span>
                                </div>

                            </div>



                            <div class="contact__form-submit">
                                <button type="submit">
                                    SEND REQUEST
                                </button>
                            </div>
                        </form>
                        <div class="contact__form__container-blur"></div>
                        <div class="contact__form__container-bg"></div>
                    </div>

                    <div class="contact__map__logo">
                        <div class="contact__map-logo">
                            <img src="{{ 'public/images/logo_main.png' }}" alt="" srcset="">
                        </div>

                        <div class="contact__map-map">


                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3104.5949588474564!2d-77.0222031!3d38.91037680000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2saz!4v1735153252338!5m2!1sru!2saz"
                                width="100%" height="100%" style="border: none;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"
                                title="Google Maps - Capsule Location"></iframe>
                        </div>
                    </div>

                    <div class="contact__adress__block">
                        <div class="contact__adress__element">
                            <div class="contact__adress__name">
                                Address:
                            </div>
                            <div class="contact__adress__content">
                                635 E 28th Street Brooklyn NY 11210
                            </div>
                        </div>
                        <div class="contact__adress__element">
                            <div class="contact__adress__name">
                                Phone:
                            </div>
                            <div class="contact__adress__content">
                                +1 (302) 853-3979
                            </div>
                        </div>
                        <div class="contact__adress__element">
                            <div class="contact__adress__name">
                                Email:
                            </div>
                            <div class="contact__adress__content">
                                contact@capsule.com
                            </div>
                        </div>
                    </div>
                </div>



                <div class="footer__copyright">
                    <p>Copyright {{ date('Y') }} &copy;</p>
                </div>


            </div>
        </section>
    </div>


    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <!-- GlideJS -->
    <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>

    <!-- Fancybox (optional, if used) -->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>

    <!-- Main App JS -->
    <script src="{{ asset('public/js/main.js') }}"></script>



    <script>
        const langBtn = document.getElementById('languageButton');
        const langDropdown = document.getElementById('languageDropdown');

        langBtn?.addEventListener('click', e => {
            e.stopPropagation();
            langDropdown.style.display = langDropdown.style.display === 'block' ? 'none' : 'block';
        });

        document.addEventListener('click', e => {
            if (!e.target.closest('.header__languages')) {
                langDropdown.style.display = 'none';
            }
        });

        document.addEventListener('DOMContentLoaded', () => {

            /*************HEADER LNGUAGE**/

            /*** SELECT2 PLUGIN: Country Picker ***/
            if (typeof $ !== 'undefined' && $.fn.select2) {
                function format(item) {
                    if (!item.id) return item.text;
                    const url = 'https://hatscripts.github.io/circle-flags/flags/';
                    return $('<span>')
                        .append($('<img>', {
                            class: 'img-flag',
                            width: 26,
                            src: url + item.element.value.toLowerCase() + '.svg'
                        }))
                        .append(' ' + item.text);
                }

                $('#countries').select2({
                    placeholder: "Select Country",
                    templateResult: format,
                    templateSelection: format,
                    allowClear: true
                });
            }

            /*** GLIDE SLIDER INIT ***/
            if (typeof Glide !== 'undefined') {
                const glide = new Glide('.glide', {
                    type: 'carousel',
                    startAt: 0,
                    perView: 4,
                    focusAt: 'center',
                    gap: 40,
                    autoplay: 3000,
                    animationDuration: 800,
                    breakpoints: {
                        1024: {
                            perView: 2
                        },
                        600: {
                            perView: 1.5
                        }
                    }
                });

                glide.on('move', () => {
                    const slides = document.querySelectorAll('.glide__slide');
                    slides.forEach(slide => slide.classList.remove('is-next'));
                    const nextIndex = (glide.index + 1) % slides.length;
                    slides[nextIndex]?.classList.add('is-next');
                });

                glide.mount();
            }

            /*** MOBILE MENU TOGGLE ***/
            const burger = document.querySelector('.header__burger');
            const mobileMenu = document.getElementById('mobileMenu');
            const mobileMenuClose = document.getElementById('mobileMenuClose');
            const mobileMenuLinks = document.querySelectorAll('.mobile-menu a');
            const body = document.body;

            burger?.addEventListener('click', () => {
                mobileMenu?.classList.add('active');
                body.style.overflow = 'hidden';
            });

            mobileMenuClose?.addEventListener('click', () => {
                mobileMenu?.classList.remove('active');
                body.style.overflow = '';
            });

            mobileMenuLinks.forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu?.classList.remove('active');
                    body.style.overflow = '';
                });
            });

            /*** SMALL CAR ANIMATION (mobile) ***/
            setTimeout(() => {
                const car = document.querySelector('.mobile__main-car-small');
                if (car) car.style.animation = 'carAnimationSmall 3.2s ease-in-out forwards';
            }, 1000);

            /*** INTERSECTION OBSERVER FOR COUNTERS ***/
            const animateNumbers = (element, target, duration) => {
                let start = 0;
                const stepTime = Math.abs(Math.floor(duration / target));
                const timer = setInterval(() => {
                    start++;
                    element.textContent = start;
                    if (start >= target) clearInterval(timer);
                }, stepTime);
            };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const el = entry.target;
                        const target = parseInt(el.getAttribute('data-target'));
                        animateNumbers(el, target, 1000);
                        observer.unobserve(el);
                    }
                });
            }, {
                threshold: 1.0
            });

            document.querySelectorAll('.map__container-desc p').forEach(p => {
                observer.observe(p);
            });

            /*** REMOVE DESKTOP WRAPPER ON MOBILE ***/
            const removeMainWrapperPC = () => {
                if (window.innerWidth < 768) {
                    const wrapper = document.querySelector('.main__wrapper.main__wrapper-pc');
                    wrapper?.remove();
                }
            };
            removeMainWrapperPC();
            window.addEventListener('resize', removeMainWrapperPC);

            /*** LANGUAGE DROPDOWN ***/
            const langBtn = document.getElementById('languageButton');
            const langDropdown = document.getElementById('languageDropdown');

            langBtn?.addEventListener('click', e => {
                e.stopPropagation();
                langDropdown.style.display = (langDropdown.style.display === 'block') ? 'none' : 'block';
            });

            document.addEventListener('click', e => {
                if (!e.target.closest('.header__languages')) {
                    langDropdown.style.display = 'none';
                }
            });
        });
    </script>




    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.querySelector("#contact-form");
            const submitButtonContainer = document.querySelector(
                ".contact__form-submit"); // Get the button container
            const submitButton = submitButtonContainer.querySelector("button");
            const termsCheckbox = document.querySelector("input[name='consent']");
            const checkboxWrapper = document.querySelector(".custom-checkbox");

            // Function to show error message under input fields
            function showError(input, message) {
                let errorSpan = input.parentElement.querySelector(".error-message");
                if (!errorSpan) {
                    errorSpan = document.createElement("span");
                    errorSpan.classList.add("error-message");
                    errorSpan.style.color = "red";
                    errorSpan.style.fontSize = "12px";
                    input.parentElement.appendChild(errorSpan);
                }
                errorSpan.textContent = message;
                input.style.border = "2px solid red"; // Add red border
            }

            // Function to clear error message
            function clearError(input) {
                let errorSpan = input.parentElement.querySelector(".error-message");
                if (errorSpan) {
                    errorSpan.remove();
                }
                input.style.border = ""; // Remove red border
            }

            // Function to highlight checkbox error
            function highlightError(input) {
                input.style.border = "2px solid red";
            }

            // Function to clear checkbox error styling
            function clearHighlight(input) {
                input.style.border = "";
            }

            form.addEventListener("submit", function(event) {
                event.preventDefault();

                let isValid = true;

                // Get form fields
                const name = document.querySelector("#name");
                const email = document.querySelector("#email");
                const number = document.querySelector("#number");
                const country = document.querySelector("#countries");
                const message = document.querySelector("#message");

                // Validation checks
                function validateField(field, message) {
                    if (field.value.trim() === "") {
                        showError(field, message);
                        isValid = false;
                    } else {
                        clearError(field);
                    }
                }

                validateField(name, "Name is required.");
                validateField(email, "Email is required.");
                validateField(number, "Phone number is required.");
                validateField(country, "Please select a country.");
                validateField(message, "Message cannot be empty.");

                // Validate Terms Checkbox (No error message, only red border)
                if (!termsCheckbox.checked) {
                    highlightError(checkboxWrapper);
                    isValid = false;
                } else {
                    clearHighlight(checkboxWrapper);
                }

                if (!isValid) {
                    return;
                }

                // Form submission logic
                let formData = new FormData(form);
                submitButton.disabled = true;
                submitButton.textContent = "Sending...";

                fetch("{{ route('send.email') }}", {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
                                .getAttribute("content"),
                            "Accept": "application/json"
                        },
                        body: formData
                    })
                    .then(response => {
                        // ✅ Handle non-strict JSON responses
                        return response.text().then(text => {
                            try {
                                return {
                                    status: response.status,
                                    body: JSON.parse(text)
                                };
                            } catch (error) {
                                console.error("JSON Parse Error:", error, "Raw response:",
                                    text);
                                return {
                                    status: response.status,
                                    body: {
                                        success: false,
                                        error: "Invalid JSON response"
                                    }
                                };
                            }
                        });
                    })
                    .then(result => {
                        console.log("Response Data:", result);

                        if (result.status === 200 && result.body.success) {
                            alert("Your message has been sent successfully!");
                            form.reset();

                            // ✅ Replace the submit button with a success message
                            submitButtonContainer.innerHTML =
                                `<p style="color: green; font-size: 16px; font-weight: bold;">✔ Email Sent Successfully!</p>`;
                        } else if (result.status === 422) {
                            console.error("Validation Error:", result.body.details);
                            alert("Validation Error: " + JSON.stringify(result.body.details));
                            submitButton.disabled = false;
                            submitButton.textContent = "SEND REQUEST";
                        } else {
                            alert("Error: " + (result.body.error || "Unknown error"));
                            submitButton.disabled = false;
                            submitButton.textContent = "SEND REQUEST";
                        }
                    })
                    .catch(error => {
                        console.error("Fetch Error:", error);
                        alert("An error occurred. Please try again.");
                        submitButton.disabled = false;
                        submitButton.textContent = "SEND REQUEST";
                    });
            });

            // Remove red border when checkbox is checked
            termsCheckbox.addEventListener("change", function() {
                if (termsCheckbox.checked) {
                    clearHighlight(checkboxWrapper);
                }
            });
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof $ !== 'undefined' && $.fn.select2) {
                $('#countries').select2({
                    placeholder: 'Select Country',
                    width: '100%' // Match parent container
                });
            }
        });
    </script>




@endsection
