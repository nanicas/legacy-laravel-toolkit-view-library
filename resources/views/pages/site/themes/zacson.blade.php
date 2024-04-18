@extends('layouts.site-theme')

@section('css')
    <!--<link rel="stylesheet" href="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/css/owl.carousel.min.css') }}">-->
    <link rel="stylesheet" href="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/css/slicknav.css') }}">
    <!--<link rel="stylesheet" href="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/css/gijgo.css') }}">-->
    <link rel="stylesheet" href="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/css/animated-headline.css') }}">
    <link rel="stylesheet" href="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/css/magnific-popup.css') }}">
    <!--<link rel="stylesheet" href="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/css/themify-icons.css') }}">-->
    <link rel="stylesheet" href="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/css/slick.css') }}">
    <!--<link rel="stylesheet" href="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/css/nice-select.css') }}">-->
    <link rel="stylesheet" href="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/css/style.css') }}">

    <style>
        .team-area .single-cat .cat-icon img {
            max-height: 300px;
        }
        .logo a {
            font-size: 40px;
            font-weight: 600;
        }
        .preloader .preloader-img a {
            color: black;
            font-size: 15px;
        }
        .footer-logo h1 {
            font-size: 60px;
            color: white;
        }
        .pricing-area .features-caption p {
            margin-top: 5px;
        }
        .pricing-area .features-icon svg {
            color: green
        }
        .services-area .single-services .features-icon {
            color: red;
        }
        .footer-area .footer-bottom {
            padding-bottom: 5px;
        }
        .footer-padding {
            padding-bottom: 0px;
        }
        .slider-area .hero__caption h1 {
            font-size: 80px;
        }
    </style>

@endsection

@section('site-content')

    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <a href="#">Carregando ...</a>
    <!--                    <img src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/img/logo/loder.png') }}" alt="">-->
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        <div class="header-area header-transparent">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="menu-wrapper d-flex align-items-center justify-content-between">
                        <!-- Logo -->
                        <div class="logo">
                            @php $slugName = $config['slug']->getName() @endphp
                            <a href="#">{{ $slugName }}</a>
    <!--                            <a href="index.html"><img src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/img/logo/logo.png') }}" alt=""></a>-->
                        </div>
                        <!-- Main-menu -->
                        <div class="main-menu f-right d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a href="#">Inicial</a></li>
                                    <li><a href="#about-area2">Sobre</a></li>
                                    <li><a href="#traning-categories">Especialidades</a></li>
                                    <li><a href="#pricing-area">Planos</a></li>
                                    <li><a href="#gallery-area">Galeria</a></li>
                                    <li><a href="#home-blog-area">Blog</a>
                                        <ul class="submenu">
                                            <li><a href="#">Blog</a></li>
                                            <li><a href="#">Detalhes</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#services-area">Contato</a></li>
                                </ul>
                            </nav>
                        </div>          
                        <!-- Header-btn -->
                        <div class="header-btns d-none d-lg-block f-right">
                            <a href="{{ ($config['logged']) ? route('home.index') : route('login') }}" class="btn">
                               {{ ($config['logged']) ? 'Entrar' : 'Login' }}
                            </a>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
    <main>
        @php
            $hasCategories = (!empty($entities['categories']));
            $hasSliderCategory = ($hasCategories && isset($entities['categories']['slider']));
            $hasTopSliderComponent = ($hasSliderCategory && isset($entities['categories']['slider']['components']['top_slider']));
            $hasTopSliderEntity = ($hasTopSliderComponent && isset($entities['categories']['slider']['components']['top_slider']['entities'][0]));
            $topSliderEntity = ($hasTopSliderEntity) ? $entities['categories']['slider']['components']['top_slider']['entities'][0] : null;
        @endphp
        
        @if($hasTopSliderEntity)
            <x-package-dynamic-entity-component construct='{{ base64_encode($topSliderEntity->toJson()) }}'/>
        @else
            <!--? slider Area Start-->
            <div class="slider-area position-relative">
                <div class="slider-active">
                    <!-- Single Slider -->
                    <div class="single-slider slider-height d-flex align-items-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-9 col-lg-9 col-md-10">
                                    <div class="hero__caption">
                                        <span data-animation="fadeInLeft" data-delay="0.1s">Hi This is  Zacson</span>
                                        <h1 data-animation="fadeInLeft" data-delay="0.4s">Gym Trainer</h1>
                                        <a href="courses.html" class="border-btn hero-btn" data-animation="fadeInLeft" data-delay="0.8s">My Courses</a>
                                    </div>
                                </div>
                            </div>
                        </div>          
                    </div>
                </div>
            </div>
            <!-- slider Area End-->
        @endif
        
        <!-- Traning categories Start -->
        @php
            $hasTrainingCategory = ($hasCategories && isset($entities['categories']['training']));
            $hasTrainingTopicComponent = ($hasTrainingCategory && isset($entities['categories']['training']['components']['training_topic']));
            $hasTrainingTopicEntities = ($hasTrainingTopicComponent && !empty($entities['categories']['training']['components']['training_topic']['entities']));
            $trainingTopicsEntities = ($hasTrainingTopicEntities) ? $entities['categories']['training']['components']['training_topic']['entities'] : [];
        @endphp
        
        <section id="traning-categories" class="traning-categories black-bg">
            <div class="container-fluid">
                @if(!empty($trainingTopicsEntities))
                    <div class="row">
                        @foreach($trainingTopicsEntities as $entity)
                            <x-package-dynamic-entity-component construct='{{ base64_encode($entity->toJson()) }}'/>
                        @endforeach
                    </div>
                @else
                    <div class="row">
                        <div class="col-xl-6 col-lg-6">
                            <div class="single-topic text-center mb-30">
                                <div class="topic-img">
                                    <img src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/img/gallery/cat1.png') }}" alt="">
                                    <div class="topic-content-box">
                                        <div class="topic-content">
                                            <h3>Personal traning</h3>
                                            <p>You’ll look at graphs and charts in Task One, how to approach the task and <br> the language needed for a successful answer.</p>
                                            <a href="#" class="border-btn">View Courses</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="single-topic text-center mb-30">
                                <div class="topic-img">
                                    <img src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/img/gallery/cat2.png') }}" alt="">
                                    <div class="topic-content-box">
                                        <div class="topic-content">
                                            <h3>Group traning</h3>
                                            <p>You’ll look at graphs and charts in Task One, how to approach the task and <br> the language needed for a successful answer.</p>
                                            <a href="#" class="btn">View Courses</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section>
        <!-- Traning categories End-->
        <!--? Team -->
        <section id="team-area" class="team-area fix">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section-tittle text-center mb-55 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                            <h2>Oferecemos</h2>
                        </div>
                    </div>
                </div>
                
                @php
                    $hasTeamCategory = ($hasCategories && isset($entities['categories']['team']));
                    $hasResourcesComponent = ($hasTeamCategory && isset($entities['categories']['team']['components']['resources']));
                    $hasResourcesEntities = ($hasResourcesComponent && !empty($entities['categories']['team']['components']['resources']['entities']));
                    $resourcesEntities = ($hasResourcesEntities) ? $entities['categories']['team']['components']['resources']['entities'] : [];
                @endphp
                
                <div class="row">
                    @if(!empty($resourcesEntities))
                        @foreach($resourcesEntities as $entity)
                            <x-package-dynamic-entity-component construct='{{ base64_encode($entity->toJson()) }}'/>
                        @endforeach
                    @else
                        <div class="col-lg-4 col-md-6">
                            <div class="single-cat text-center mb-30 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s" >
                                <div class="cat-icon">
                                    <img src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/img/gallery/team1.png') }}" alt="">
                                </div>
                                <div class="cat-cap">
                                    <h5><a href="#">Body Building</a></h5>
                                    <p>You’ll look at graphs and charts in Task One, how to approach the task </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-cat text-center mb-30 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                                <div class="cat-icon">
                                    <img src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/img/gallery/team2.png') }}" alt="">
                                </div>
                                <div class="cat-cap">
                                    <h5><a href="#">Muscle Gain</a></h5>
                                    <p>You’ll look at graphs and charts in Task One, how to approach the task </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-cat text-center mb-30 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s">
                                <div class="cat-icon">
                                    <img src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/img/gallery/team3.png') }}" alt="">
                                </div>
                                <div class="cat-cap">
                                    <h5><a href="#">Weight Loss</a></h5>
                                    <p>You’ll look at graphs and charts in Task One, how to approach the task </p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
        <!-- Services End -->
        <!--? Gallery Area Start -->
        <div id="gallery-area" class="gallery-area section-padding30 ">
            <div class="container-fluid ">
                
                @php
                    $hasGalleryCategory = ($hasCategories && isset($entities['categories']['gallery']));
                    $hasPhotosGalleryComponent = ($hasGalleryCategory && isset($entities['categories']['gallery']['components']['photos_gallery']));
                    $hasPhotosGalleryEntities = ($hasPhotosGalleryComponent && !empty($entities['categories']['gallery']['components']['photos_gallery']['entities']));
                    $galleryPhotosEntities = ($hasPhotosGalleryEntities) ? $entities['categories']['gallery']['components']['photos_gallery']['entities'] : [];
                @endphp
                
                
                <div class="row">
                    @if(!empty($galleryPhotosEntities))
                        @foreach($galleryPhotosEntities as $entity)
                            <x-package-dynamic-entity-component construct='{{ base64_encode($entity->toJson()) }}'/>
                        @endforeach
                    @else
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                            <div class="box snake mb-30">
                                <div class="gallery-img big-img" style="background-image: url('{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/img/gallery/gallery1.png') }}')"></div>
                                <div class="overlay">
                                    <div class="overlay-content">
                                        <h3>Muscle gaining </h3>
                                        <a href="#"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                            <div class="box snake mb-30">
                                <div class="gallery-img big-img" style="background-image: url('{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/img/gallery/gallery2.png') }}')"></div>
                                <div class="overlay">
                                    <div class="overlay-content">
                                        <h3>Muscle gaining </h3>
                                        <a href="#"><i class="ti-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                            <div class="box snake mb-30">
                                <div class="gallery-img big-img" style="background-image: url('{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/img/gallery/gallery3.png') }}')"></div>
                                <div class="overlay">
                                    <div class="overlay-content">
                                        <h3>Muscle gaining </h3>
                                        <a href="#"><i class="ti-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <div class="box snake mb-30">
                                <div class="gallery-img big-img" style="background-image: url('{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/img/gallery/gallery4.png') }}')"></div>
                                <div class="overlay">
                                    <div class="overlay-content">
                                        <h3>Muscle gaining </h3>
                                        <a href="#"><i class="ti-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <div class="box snake mb-30">
                                <div class="gallery-img big-img" style="background-image: url('{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/img/gallery/gallery5.png') }}')"></div>
                                <div class="overlay">
                                    <div class="overlay-content">
                                        <h3>Muscle gaining </h3>
                                        <a href="#"><i class="ti-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                            <div class="box snake mb-30">
                                <div class="gallery-img big-img" style="background-image: url('{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/img/gallery/gallery6.png') }}')"></div>
                                <div class="overlay">
                                    <div class="overlay-content">
                                        <h3>Muscle gaining </h3>
                                        <a href="#"><i class="ti-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- Gallery Area End -->
        
        <!-- Courses area start -->
        <section id="pricing-area" class="pricing-area section-padding40 fix">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section-tittle text-center mb-55 wow fadeInUp" data-wow-duration="2s" data-wow-delay=".1s">
                            <h2>Planos</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @if(!empty($entities['plans']))
                        @foreach($entities['plans'] as $plan)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="properties mb-30 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                                    <div class="properties__card">
                                        <div class="about-icon">
                                            <img src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/img/icon/price.svg') }}" alt="">
                                        </div>
                                        <div class="properties__caption">
                                            <span class="month">{{ $plan->getName() }}</span>
                                            @php $planCost = (empty($cost = $plan->getCost())) ? 0 : $cost @endphp
                                            <p class="mb-25">{{ $planCost }},00 R$  <span>(Single class)</span></p>
                                            @forelse($plan->modalities as $modality)
                                                <div class="single-features">
                                                    <div class="features-icon">
                                                        <i data-feather="check-square"></i>
                <!--                                                <img src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/img/icon/check.svg') }}" alt="">-->
                                                    </div>
                                                    <div class="features-caption">
                                                        <p>{{ $modality->getName() }}</p>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="single-features">
                                                    <div class="features-icon">
                                                        <i data-feather="alert-triangle"></i>
                <!--                                                <img src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/img/icon/check.svg') }}" alt="">-->
                                                    </div>
                                                    <div class="features-caption">
                                                        <p>Nenhuma modalidade ou benefício cadastrado</p>
                                                    </div>
                                                </div>
                                                <li>Nenhuma modalidade ou benefício cadastrado</li>
                                            @endforelse
                                            <a href="#" class="border-btn border-btn2">Join Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="properties mb-30 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                                <div class="properties__card">
                                    <div class="about-icon">
                                        <img src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/img/icon/price.svg') }}" alt="">
                                    </div>
                                    <div class="properties__caption">
                                        <span class="month">6 month</span>
                                        <p class="mb-25">$30/m  <span>(Single class)</span></p>
                                        <div class="single-features">
                                            <div class="features-icon">
                                                <img src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/img/icon/check.svg') }}" alt="">
                                            </div>
                                            <div class="features-caption">
                                                <p>Free riding </p>
                                            </div>
                                        </div>
                                        <div class="single-features">
                                            <div class="features-icon">
                                                <img src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/img/icon/check.svg') }}" alt="">
                                            </div>
                                            <div class="features-caption">
                                                <p>Unlimited equipments</p>
                                            </div>
                                        </div>
                                        <div class="single-features">
                                            <div class="features-icon">
                                                <img src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/img/icon/check.svg') }}" alt="">
                                            </div>
                                            <div class="features-caption">
                                                <p>Personal trainer</p>
                                            </div>
                                        </div>
                                        <div class="single-features">
                                            <div class="features-icon">
                                                <img src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/img/icon/check.svg') }}" alt="">
                                            </div>
                                            <div class="features-caption">
                                                <p>Weight losing classes</p>
                                            </div>
                                        </div>
                                        <div class="single-features mb-20">
                                            <div class="features-icon">
                                                <img src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/img/icon/check.svg') }}" alt="">
                                            </div>
                                            <div class="features-caption">
                                                <p>Month to mouth</p>
                                            </div>
                                        </div>
                                        <a href="#" class="border-btn border-btn2">Join Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="properties mb-30 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                                <div class="properties__card">
                                    <div class="about-icon">
                                        <img src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/img/icon/price.svg') }}" alt="">
                                    </div>
                                    <div class="properties__caption">
                                        <span class="month">6 month</span>
                                        <p class="mb-25">$30/m  <span>(Single class)</span></p>
                                        <div class="single-features">
                                            <div class="features-icon">
                                                <img src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/img/icon/check.svg') }}" alt="">
                                            </div>
                                            <div class="features-caption">
                                                <p>Free riding </p>
                                            </div>
                                        </div>
                                        <div class="single-features">
                                            <div class="features-icon">
                                                <img src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/img/icon/check.svg') }}" alt="">
                                            </div>
                                            <div class="features-caption">
                                                <p>Unlimited equipments</p>
                                            </div>
                                        </div>
                                        <div class="single-features">
                                            <div class="features-icon">
                                                <img src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/img/icon/check.svg') }}" alt="">
                                            </div>
                                            <div class="features-caption">
                                                <p>Personal trainer</p>
                                            </div>
                                        </div>
                                        <div class="single-features">
                                            <div class="features-icon">
                                                <img src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/img/icon/check.svg') }}" alt="">
                                            </div>
                                            <div class="features-caption">
                                                <p>Weight losing classes</p>
                                            </div>
                                        </div>
                                        <div class="single-features mb-20">
                                            <div class="features-icon">
                                                <img src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/img/icon/check.svg') }}" alt="">
                                            </div>
                                            <div class="features-caption">
                                                <p>Month to mouth</p>
                                            </div>
                                        </div>
                                        <a href="#" class="border-btn border-btn2">Join Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="properties mb-30 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s">
                                <div class="properties__card">
                                    <div class="about-icon">
                                        <img src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/img/icon/price.svg') }}" alt="">
                                    </div>
                                    <div class="properties__caption">
                                        <span class="month">6 month</span>
                                        <p class="mb-25">$30/m  <span>(Single class)</span></p>
                                        <div class="single-features">
                                            <div class="features-icon">
                                                <img src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/img/icon/check.svg') }}" alt="">
                                            </div>
                                            <div class="features-caption">
                                                <p>Free riding </p>
                                            </div>
                                        </div>
                                        <div class="single-features">
                                            <div class="features-icon">
                                                <img src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/img/icon/check.svg') }}" alt="">
                                            </div>
                                            <div class="features-caption">
                                                <p>Unlimited equipments</p>
                                            </div>
                                        </div>
                                        <div class="single-features">
                                            <div class="features-icon">
                                                <img src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/img/icon/check.svg') }}" alt="">
                                            </div>
                                            <div class="features-caption">
                                                <p>Personal trainer</p>
                                            </div>
                                        </div>
                                        <div class="single-features">
                                            <div class="features-icon">
                                                <img src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/img/icon/check.svg') }}" alt="">
                                            </div>
                                            <div class="features-caption">
                                                <p>Weight losing classes</p>
                                            </div>
                                        </div>
                                        <div class="single-features mb-20">
                                            <div class="features-icon">
                                                <img src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/img/icon/check.svg') }}" alt="">
                                            </div>
                                            <div class="features-caption">
                                                <p>Month to mouth</p>
                                            </div>
                                        </div>
                                        <a href="#" class="border-btn border-btn2">Join Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
        <!-- Courses area End -->
        <!--? About Area-2 Start -->
        
        @php
            $hasAboutCategory = ($hasCategories && isset($entities['categories']['about']));
            $hasAboutComponent = ($hasAboutCategory && isset($entities['categories']['about']['components']['site_about']));
            $hasSiteAboutEntity = ($hasAboutComponent && isset($entities['categories']['about']['components']['site_about']['entities'][0]));
            $siteAboutEntity = ($hasSiteAboutEntity) ? $entities['categories']['about']['components']['site_about']['entities'][0] : null;
        @endphp
        
        <section id="about-area2" class="about-area2 fix pb-padding pt-50 pb-80">
            @if(!empty($siteAboutEntity))
                <x-package-dynamic-entity-component construct='{{ base64_encode($siteAboutEntity->toJson()) }}'/>
            @else
                <div class="support-wrapper align-items-center">
                    <div class="right-content2">
                        <!-- img -->
                        <div class="right-img wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                            <img src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/img/gallery/about.png') }}" alt="">
                        </div>
                    </div>
                    <div class="left-content2">
                        <!-- section tittle -->
                        <div class="section-tittle2 mb-20 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                            <div class="front-text">
                                <h2 class="">About Me</h2>
                                <p>You’ll look at graphs and charts in Task One, how to approach the task and the language needed 
                                    for a successful answer. You’ll examine Task Two questions and learn how to plan, write and 
                                check academic essays.</p>
                                <p class="mb-40">Task One, how to approach the task and the language needed for a successful answer. You’ll 
                                examine Task Two questions and learn how to plan, write and check academic essays.</p>
                                <a href="courses.html" class="border-btn">My Courses</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </section>
        <!-- About Area End -->
        <!--? Blog Area Start -->
        <section id="home-blog-area" class="home-blog-area pt-10 pb-50">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row justify-content-center">
                    <div class="col-lg-7 col-md-9 col-sm-10">
                        <div class="section-tittle text-center mb-100 wow fadeInUp" data-wow-duration="2s" data-wow-delay=".2s">
                            <h2>Blog</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="home-blog-single mb-30 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                            <div class="blog-img-cap">
                                <div class="blog-img">
                                    <img src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/img/gallery/blog1.png') }}" alt="">
                                </div>
                                <div class="blog-cap">
                                    <span>Gym & Fitness</span>
                                    <h3><a href="#">Your Antibiotic One Day To 10 Day Options</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="home-blog-single mb-30 wow fadeInUp" data-wow-duration="2s" data-wow-delay=".6s">
                            <div class="blog-img-cap">
                                <div class="blog-img">
                                    <img src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/img/gallery/blog2.png') }}" alt="">
                                </div>
                                <div class="blog-cap">
                                    <span>Gym & Fitness</span>
                                    <h3><a href="#">Your Antibiotic One Day To 10 Day Options</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog Area End -->
        <!--? video_start -->
        <div class="video-area section-bg2 d-flex align-items-center" data-background="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/img/gallery/video-bg.png') }}">
            <div class="container">
                <div class="video-wrap position-relative">
                    <div class="video-icon" >
                        <a class="popup-video btn-icon" href="https://www.youtube.com/watch?v=up68UAfH0d0"><i data-feather="play"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- video_end -->
        <!-- ? services-area -->
        <section id="services-area" class="services-area">
            @php
                $slugData = $entities['slug_data'] ?? null;
                $addressData = ($slugData) ? $slugData->addresses->first() : null;
            @endphp

            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="d-none d-sm-block mb-5 pb-4">
                            <div id="map" style="height: 480px; position: relative; overflow: hidden;"></div>
                            <input type="hidden" id="latitude" value="{{ ($addressData) ? $addressData->getLatitude() : 0 }}"/>
                            <input type="hidden" id="longitude" value="{{ ($addressData) ? $addressData->getLongitude() : 0 }}"/>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col">
                                <div class="single-services mb-40 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                                    <div class="features-icon">
                                        <i data-feather="map-pin"></i>
                                    </div>
                                    <div class="features-caption">
                                        <h3>Endereço</h3>

                                        @if($addressData)
                                            <p>
                                               {{ $addressData->getStreet() }}, n° {{ $addressData->getNumber() }}, {{ $addressData->getCity() }}/{{ $addressData->getState() }}
                                                - {{ $addressData->getZipcode() }}, {{ $addressData->getCountry() }}
                                            </p>
                                            <p>Aberto às {{ $addressData->getOpenAt() }}</p>
                                            <p>Fechado às {{ $addressData->getCloseAt() }}</p>
                                        @else
                                            <p>Nenhum endereço cadastrado</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="single-services mb-40 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                                    <div class="features-icon">
                                        <i data-feather="phone"></i>
                                    </div>
                                    <div class="features-caption">
                                        <h3>Contato</h3>
                                        <p>{{ ($addressData && !empty($phone = $addressData->getPhone())) ? $phone : 'Nenhum telefone cadastrado' }}</p>
                                        <p>{{ ($addressData && !empty($cellPhone = $addressData->getCellPhone())) ? $cellPhone : 'Nenhum celular cadastrado' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="single-services mb-40 wow fadeInUp" data-wow-duration="2s" data-wow-delay=".4s">
                                    <div class="features-icon">
                                        <i data-feather="mail"></i>
                                    </div>
                                    <div class="features-caption">
                                        <h3>Email</h3>
                                        <p>{{ ($addressData && !empty($email = $addressData->getEmail())) ? $email : 'Nenhum email cadastrado' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="single-services mb-40 wow fadeInUp" data-wow-duration="2s" data-wow-delay=".4s">
                                    <div class="features-icon">
                                        <i data-feather="award"></i>
                                    </div>
                                    <div class="features-caption">
                                        <h3>Observações</h3>
                                        <p>{{ ($addressData && !empty($observation = $addressData->getObservation())) ? $observation : 'Sem mais ...' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <!--? Footer Start-->
        <div class="footer-area black-bg">
            <div class="container">
                <div class="footer-top footer-padding">
                    <!-- Footer Menu -->
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="single-footer-caption mb-50 text-center">
                                <!-- logo -->
                                <div class="footer-logo wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
    <!--                                <a href="index.html"><img src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/img/logo/logo2_footer.png') }}" alt=""></a>-->
                                    <h1>{{ $slugName }}</h1>
                                </div>
                                <!-- Menu -->
                                <!-- Header Start -->
                                <div class="header-area main-header2 wow fadeInUp" data-wow-duration="2s" data-wow-delay=".4s">
                                    <div class="main-header main-header2">
                                        <div class="menu-wrapper menu-wrapper2">
                                            <!-- Main-menu -->
                                            <div class="main-menu main-menu2 text-center">
                                                <nav>
                                                    <ul>
                                                        <li><a href="#">Home</a></li>
                                                        <li><a href="#about-area2">Sobre</a></li>
                                                        <li><a href="#traning-categories">Especialidades</a></li>
                                                        <li><a href="#pricing-area">Planos</a></li>
                                                        <li><a href="#gallery-area">Galeria</a></li>
                                                        <li><a href="#services-area">Contato</a></li>
                                                    </ul>
                                                </nav>
                                            </div>   
                                        </div>
                                    </div>
                                </div>
                                <!-- Header End -->
                                <!-- social -->
                                <div class="footer-social mt-30 wow fadeInUp" data-wow-duration="3s" data-wow-delay=".8s">
                                    @if($slugData)
                                        @if(!empty($facebook = $slugData->getFacebook()))
                                            <a href="{{ (strlen($facebook) == 1) ? '#' : $facebook }}"><i data-feather="facebook" aria-hidden="true"></i></a>
                                        @endif
                                        @if(!empty($youtube = $slugData->getYoutube()))
                                            <a href="{{ (strlen($youtube) == 1) ? '#' : $youtube }}"><i data-feather="youtube" aria-hidden="true"></i></a>
                                        @endif
                                        @if(!empty($twitter = $slugData->getTwitter()))
                                            <a href="{{ (strlen($twitter) == 1) ? '#' : $twitter }}"><i data-feather="twitter" aria-hidden="true"></i></a>
                                        @endif
                                        @if(!empty($instagram = $slugData->getInstagram()))
                                            <a href="{{ (strlen($instagram) == 1) ? '#' : $instagram }}" target="_blank"><i data-feather="instagram" aria-hidden="true"></i></a>
                                        @endif
                                        <a href="#"><i data-feather="message-circle" aria-hidden="true"></i></a>
                                    @else
                                        <a href="#"><i data-feather="twitter" aria-hidden="true"></i></a>
                                        <a href="#"><i data-feather="facebook" aria-hidden="true"></i></a>
                                        <a href="#"><i data-feather="youtube" aria-hidden="true"></i></a>
                                        <a href="#"><i data-feather="instagram" aria-hidden="true"></i></a>
                                        <a href="#"><i data-feather="message-circle" aria-hidden="true"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer Bottom -->
                <div class="footer-bottom">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-12">
                            <div class="footer-copy-right text-center">
                                <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>
    <!-- Scroll Up -->
    <div id="back-top" >
        <a title="Go to Top" href="#"> <i data-feather="arrow-up"></i></a>
    </div>

@endsection

@section('js')

    <!-- Jquery, Popper, Bootstrap 
    <script defer src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/js/popper.min.js') }}"></script>
    <script src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/js/bootstrap.min.js') }}"></script>-->
    <!-- Jquery Mobile Menu -->
    <script defer src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/js/jquery.slicknav.min.js') }}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins 
    <script defer src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/js/owl.carousel.min.js') }}"></script>-->
    <script defer src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/js/slick.min.js') }}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script defer src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/js/wow.min.js') }}"></script>
    <script defer src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/js/animated.headline.js') }}"></script>
    <script defer src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/js/jquery.magnific-popup.js') }}"></script>

    <!-- Date Picker 
    <script src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/js/gijgo.min.js') }}"></script>-->
    <!-- Nice-select, sticky 
    <script src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/js/jquery.sticky.js') }}"></script>-->

    <!-- counter, waypoint, Hover Direction 
    <script defer src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/js/jquery.counterup.min.js') }}"></script>
    <script defer src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/js/waypoints.min.js') }}"></script>
    <script defer src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/js/jquery.countdown.min.js') }}"></script>-->
    <script defer src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/js/hover-direction-snake.min.js') }}"></script>

    <!-- contact js 
    <script src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/js/contact.js') }}"></script>
    <script src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/js/jquery.form.js') }}"></script>
    <script src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/js/mail-script.js') }}"></script>
    <script src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/js/jquery.ajaxchimp.min.js') }}"></script>-->

    <!-- Icons -->
    <script src="{{ asset($packaged_assets_prefix . '/vendor/bootstrap-theme/feather.min.js') }}"></script>

    <!-- Jquery Plugins, main Jquery -->	
    <script defer src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/js/plugins.js') }}"></script>
    <script defer src="{{ asset($packaged_assets_prefix . '/resources/layouts/site/themes/zacson/js/main.js') }}"></script>
    
    <!-- Map -->
    <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=initMap"></script>
@endsection

