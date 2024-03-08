@extends('web.layouts.master')
@section('title', 'Home')
@section('main')
    @php
    $page = $pages->where("slug","home-banner")->first();
    @endphp
    <!-- main-area -->
    <main>
        <!-- banner-area -->
        <section class="banner-area">
            <div class="container">
                <div class="banner-field" style="background-image:url({{asset($page?->image)}});background-size:cover;">
                    <div class="banner-content">
                        <h2>{!! $page->title !!}</h2>
                        <p>{!!$page->details!!}</p>
                        <a href="{{ route("register") }}" class="start-btn">Request Delivery
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 1024 1024"
                                    >
                                    <path fill="#F9C158"
                                        d="M754.752 480H160a32 32 0 1 0 0 64h594.752L521.344 777.344a32 32 0 0 0 45.312 45.312l288-288a32 32 0 0 0 0-45.312l-288-288a32 32 0 1 0-45.312 45.312z" />
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- banner-area-end -->
        
        <!-- banner-area -->
        <section class="step-area">
            <div class="container">
                <h2 class="text-center">Simple Steps To Get Started</h2>
                <div class="my-4 all-steps d-flex align-items-center justify-content-center">
                    <div class="each-step mx-3 d-flex align-items-center justify-content-center">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" viewBox="0 0 256 256">
                                <path fill="#18232B"
                                    d="M254 136a6 6 0 0 1-6 6h-18v18a6 6 0 0 1-12 0v-18h-18a6 6 0 0 1 0-12h18v-18a6 6 0 0 1 12 0v18h18a6 6 0 0 1 6 6m-57.41 60.14a6 6 0 1 1-9.18 7.72C166.9 179.45 138.69 166 108 166s-58.89 13.45-79.41 37.86a6 6 0 0 1-9.18-7.72C35.14 177.41 55 164.48 77 158.25a66 66 0 1 1 62 0c22 6.23 41.86 19.16 57.59 37.89M108 154a54 54 0 1 0-54-54a54.06 54.06 0 0 0 54 54" />
                            </svg>
                        </span>
                        <h4 class="mt-1">Create Your Account First</h4>
                    </div>
                    <div class="each-step mx-3 d-flex flex-column align-items-center justify-content-center">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" viewBox="0 0 256 256">
                                <path fill="#18232B"
                                    d="M139 158.25a66 66 0 1 0-62 0c-22 6.23-41.88 19.16-57.61 37.89a6 6 0 0 0 9.18 7.72C49.1 179.44 77.31 166 108 166s58.9 13.44 79.41 37.86a6 6 0 1 0 9.18-7.72C180.86 177.41 161 164.48 139 158.25M54 100a54 54 0 1 1 54 54a54.06 54.06 0 0 1-54-54m189.25 44.8l-5.92-3.41a22 22 0 0 0 0-10.78l5.92-3.41a6 6 0 0 0-6-10.4l-5.93 3.43a22 22 0 0 0-9.32-5.39V108a6 6 0 0 0-12 0v6.84a22 22 0 0 0-9.32 5.39l-5.93-3.43a6 6 0 0 0-6 10.4l5.92 3.41a22 22 0 0 0 0 10.78l-5.92 3.41a6 6 0 0 0 6 10.4l5.93-3.43a22 22 0 0 0 9.32 5.39V164a6 6 0 0 0 12 0v-6.84a22 22 0 0 0 9.32-5.39l5.93 3.43a6 6 0 0 0 6-10.4M216 146a10 10 0 1 1 10-10a10 10 0 0 1-10 10" />
                            </svg>
                        </span>
                        <h4 class="mt-1">Choose Your Membership</h4>
                    </div>
                    <div class="each-step mx-3 d-flex flex-column align-items-center justify-content-center">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" viewBox="0 0 256 256">
                                <path fill="#18232B"
                                    d="M224.42 104.2c-3.9-4.07-7.93-8.27-9.55-12.18c-1.5-3.63-1.58-9-1.67-14.68c-.14-9.38-.3-20-7.42-27.12S188 42.94 178.66 42.8c-5.68-.09-11-.17-14.68-1.67c-3.91-1.62-8.11-5.65-12.18-9.55C145.16 25.22 137.64 18 128 18s-17.16 7.22-23.8 13.58c-4.07 3.9-8.27 7.93-12.18 9.55c-3.63 1.5-9 1.58-14.68 1.67c-9.38.14-20 .3-27.12 7.42S42.94 68 42.8 77.34c-.09 5.68-.17 11-1.67 14.68c-1.62 3.91-5.65 8.11-9.55 12.18C25.22 110.84 18 118.36 18 128s7.22 17.16 13.58 23.8c3.9 4.07 7.93 8.27 9.55 12.18c1.5 3.63 1.58 9 1.67 14.68c.14 9.38.3 20 7.42 27.12s17.78 7.28 27.12 7.42c5.68.09 11 .17 14.68 1.67c3.91 1.62 8.11 5.65 12.18 9.55c6.64 6.36 14.16 13.58 23.8 13.58s17.16-7.22 23.8-13.58c4.07-3.9 8.27-7.93 12.18-9.55c3.63-1.5 9-1.58 14.68-1.67c9.38-.14 20-.3 27.12-7.42s7.28-17.74 7.42-27.12c.09-5.68.17-11 1.67-14.68c1.62-3.91 5.65-8.11 9.55-12.18c6.36-6.64 13.58-14.16 13.58-23.8s-7.22-17.16-13.58-23.8m-8.66 39.3c-4.67 4.86-9.5 9.9-12 15.9c-2.38 5.74-2.48 12.52-2.58 19.08c-.11 7.44-.23 15.14-3.9 18.82s-11.38 3.79-18.82 3.9c-6.56.1-13.34.2-19.08 2.58c-6 2.48-11 7.31-15.91 12c-5.25 5-10.68 10.24-15.49 10.24s-10.24-5.21-15.5-10.24c-4.86-4.67-9.9-9.5-15.9-12c-5.74-2.38-12.52-2.48-19.08-2.58c-7.44-.11-15.14-.23-18.82-3.9s-3.79-11.38-3.9-18.82c-.1-6.56-.2-13.34-2.58-19.08c-2.48-6-7.31-11-12-15.91C35.21 138.24 30 132.81 30 128s5.21-10.24 10.24-15.5c4.67-4.86 9.5-9.9 12-15.9c2.38-5.74 2.48-12.52 2.58-19.08c.11-7.44.23-15.14 3.9-18.82s11.38-3.79 18.82-3.9c6.56-.1 13.34-.2 19.08-2.58c6-2.48 11-7.31 15.91-12C117.76 35.21 123.19 30 128 30s10.24 5.21 15.5 10.24c4.86 4.67 9.9 9.5 15.9 12c5.74 2.38 12.52 2.48 19.08 2.58c7.44.11 15.14.23 18.82 3.9s3.79 11.38 3.9 18.82c.1 6.56.2 13.34 2.58 19.08c2.48 6 7.31 11 12 15.91c5 5.25 10.24 10.68 10.24 15.49s-5.23 10.22-10.26 15.48m-43.52-43.74a6 6 0 0 1 0 8.48l-56 56a6 6 0 0 1-8.48 0l-24-24a6 6 0 0 1 8.48-8.48L112 151.51l51.76-51.75a6 6 0 0 1 8.48 0" />
                            </svg>
                        </span>
                        <h4 class="mt-1">Request Your Delivery</h4>
                    </div>
                    <div class="each-step mx-3 d-flex flex-column align-items-center justify-content-center">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" viewBox="0 0 24 24"
                                >
                                <path fill="18232b"
                                    d="m21.47 11.185l-1.03-1.43a2.5 2.5 0 0 0-2.03-1.05h-4.38v-2.14a2.5 2.5 0 0 0-2.5-2.5H4.56a2.507 2.507 0 0 0-2.5 2.5v9.94a1.5 1.5 0 0 0 1.5 1.5h1.22a2.242 2.242 0 0 0 4.44 0h5.56a2.242 2.242 0 0 0 4.44 0h1.22a1.5 1.5 0 0 0 1.5-1.5v-3.87a2.508 2.508 0 0 0-.47-1.45M7 18.935a1.25 1.25 0 1 1 1.25-1.25A1.25 1.25 0 0 1 7 18.935m6.03-1.93H9.15a2.257 2.257 0 0 0-4.3 0H3.56a.5.5 0 0 1-.5-.5v-9.94a1.5 1.5 0 0 1 1.5-1.5h6.97a1.5 1.5 0 0 1 1.5 1.5Zm3.97 1.93a1.25 1.25 0 1 1 1.25-1.25a1.25 1.25 0 0 1-1.25 1.25m3.94-2.43a.5.5 0 0 1-.5.5h-1.29a2.257 2.257 0 0 0-4.3 0h-.82v-7.3h4.38a1.516 1.516 0 0 1 1.22.63l1.03 1.43a1.527 1.527 0 0 1 .28.87Z" />
                                <path fill="18232b" d="M18.029 12.205h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 0 1" />
                            </svg>
                        </span>
                        <h4 class="mt-1">We deliver to Your Home</h4>
                    </div>
                </div>
            </div>
        </section>
        <!-- banner-area-end -->
        @php
    $page = $pages->where("slug","about-us")->first();
    @endphp
        <!-- about-area -->
        <section class="about-area">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="about-img">
                            <img src="{{asset($page?->image)}}" alt="img">
                            <div class="about-tag">
                                <div class="line2">
                                    <span>white<br>glove<br>service</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="about-text">
                            <div class="head-text">
                                <h5>{{$page->title}}</h5>
                                <h2>{{$page->title_2}}</h2>
                            </div>
                            {!! $page->details !!}
                            <a href="{{ route("register") }}" class="start-btn btn2">Request Delivery
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 1024 1024"
                                        >
                                        <path fill="#18232B"
                                            d="M754.752 480H160a32 32 0 1 0 0 64h594.752L521.344 777.344a32 32 0 0 0 45.312 45.312l288-288a32 32 0 0 0 0-45.312l-288-288a32 32 0 1 0-45.312 45.312z" />
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-area-end -->
        
        @php
            $page = $pages->where("slug","mobile-refueling-service")->first();
        @endphp
        <section class="service-area">
            <div class="container">
                <div class="service-field">
                    <div class="head-text text-center">
                        <h5 class="p-0">{{$page->title}}</h5>
                        <h2>{{$page->title_2}}</h2>
                        {!! $page->details !!}
                    </div>
                    <!--<div class="service-box">-->
                    <!--    <div class="row justify-content-center align-items-center">-->
                    <!--        <div class="col-lg-5 col-md-12 col-sm-12">-->
                    <!--            <span>-->
                    <!--                <img src="{{ asset('/frontend/img/services/s-1.png') }}" alt="name" />-->
                    <!--            </span>-->
                    <!--        </div>-->
                    <!--        <div class="col-lg-7 col-md-12 col-sm-12">-->
                    <!--            <h4 class="mt-1 text-start">Gasoline Delivery</h4>-->
                    <!--            <p>-->
                    <!--                Having gasoline delivered to your home ensures your family vehicles are always fueled-->
                    <!--                and ready for that weekend getaway or unexpected errand.<br><br>-->

                    <!--                Do you need gasoline for your fleet of cars or equipment? EZ Fuel service proudly offers-->
                    <!--                all grades of gasoline — including regular, midgrade,-->
                    <!--                premium, andGloved hand holding a gas pump, filling up a large truck. non-ethanol-->
                    <!--                (recreational/marine) — and related service.<br><br>-->

                    <!--                Our service team has helped to get the fuel on their home to reduce hastle and don't-->
                    <!--                need to go pamp. Backed by a fleet of trained professionals-->
                    <!--                and equipped service vehicles, guaranteed on-site fuel supplies, and supplementary fuel-->
                    <!--                service, we can meet all your gasoline needs. Need dependable-->
                    <!--                gasoline delivery service in your home?-->
                    <!--            </p>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                </div>
            </div>
        </section>
        
        
        <!--@php-->
        <!--    $page = $pages->where("slug","service")->first();-->
        <!--@endphp-->
        <!--<section class="about-area">-->
        <!--    <div class="container">-->
        <!--        <div class="row justify-content-center align-items-center">-->
        <!--            <div class="col-lg-6 col-md-12 col-sm-12">-->
        <!--                <div class="about-text oposite-text">-->
        <!--                    <div class="head-text oposite-head text-end">-->
        <!--                        <h5>{{$page->title}}</h5>-->
        <!--                <h2>{{$page->title_2}}</h2>-->
                        
        <!--                    </div>-->
        <!--                    {!! $page->details !!}-->
        <!--                    <div class="d-flex justify-content-end">-->
        <!--                        <a href="{{ route("service") }}" class="start-btn btn2">Our Service-->
        <!--                            <span>-->
        <!--                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"-->
        <!--                                    viewBox="0 0 1024 1024" >-->
        <!--                                    <path fill="18232b"-->
        <!--                                        d="M754.752 480H160a32 32 0 1 0 0 64h594.752L521.344 777.344a32 32 0 0 0 45.312 45.312l288-288a32 32 0 0 0 0-45.312l-288-288a32 32 0 1 0-45.312 45.312z" />-->
        <!--                                </svg>-->
        <!--                            </span>-->
        <!--                        </a>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="col-lg-6 col-md-12 col-sm-12">-->
        <!--                <div class="about-img">-->
        <!--                    <img src="{{asset($page?->image)}}" alt="img">-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</section>-->
        
        
        
        <!--@php-->
        <!--    $page = $pages->where("slug","plans")->first();-->
        <!--@endphp-->
        <!--<section class="about-area">-->
        <!--    <div class="container">-->
        <!--        <div class="row justify-content-center align-items-center">-->
        <!--            <div class="col-lg-6 col-md-12 col-sm-12">-->
        <!--                <div class="about-img">-->
        <!--                    <img src="{{asset($page?->image)}}" alt="img">-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="col-lg-6 col-md-12 col-sm-12">-->
        <!--                <div class="about-text">-->
        <!--                    <div class="head-text">-->
        <!--                    <h5>{{$page->title}}</h5>-->
        <!--                <h2>{{$page->title_2}}</h2>-->
                        
        <!--                    </div>-->
        <!--                    {!! $page->details !!}-->
                            
        <!--                    <a href="{{ route("plans") }}" class="start-btn btn2">Membership Plans-->
        <!--                        <span>-->
        <!--                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"-->
        <!--                                viewBox="0 0 1024 1024" >-->
        <!--                                <path fill="18232b"-->
        <!--                                    d="M754.752 480H160a32 32 0 1 0 0 64h594.752L521.344 777.344a32 32 0 0 0 45.312 45.312l288-288a32 32 0 0 0 0-45.312l-288-288a32 32 0 1 0-45.312 45.312z" />-->
        <!--                            </svg>-->
        <!--                        </span>-->
        <!--                    </a>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</section>-->
        
        <!--@if ($testimonials->count())-->
        <!--    <section class="testimonial-area">-->
        <!--        <div class="container">-->
        <!--            <div class="row">-->
        <!--                <div class="col-lg-4">-->
        <!--                    <div class="head-text oposite-head text-end">-->
        <!--                        <h5><i class="fas fa-bolt"></i> Testimonial</h5>-->
        <!--                        <h2>-->
        <!--                            Our Clients Satisfaction-->
        <!--                        </h2>-->
        <!--                        <p>Trusted by many customers</p>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="col-lg-8">-->
        <!--                    <div id="carouselExampleIndicators" class="carousel slide">-->
        <!--                        <div class="carousel-indicators">-->
        <!--                            @foreach ($testimonials as $key => $row)-->
        <!--                                <button type="button" data-bs-target="#carouselExampleIndicators"-->
        <!--                                    data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"-->
        <!--                                    aria-current="true" aria-label="Slide {{ $key + 1 }}"></button>-->
        <!--                            @endforeach-->
        <!--                        </div>-->
        <!--                        <div class="carousel-inner">-->
        <!--                            @foreach ($testimonials as $key => $row)-->
        <!--                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }} ">-->
        <!--                                    <div class="single-testimonial">-->
        <!--                                        <p>-->
        <!--                                            “{{ $row->message }}”.-->
        <!--                                        </p>-->
        <!--                                        <div class="mt-3 d-flex align-items-center">-->
        <!--                                            <img src="{{ asset($row->image) }}" alt="img">-->
        <!--                                            <div class="te-info">-->
        <!--                                                <h6>{{ $row->name }}</h6>-->
        <!--                                                <span>{{ $row->designation }}</span>-->
        <!--                                            </div>-->
        <!--                                        </div>-->
        <!--                                    </div>-->
        <!--                                </div>-->
        <!--                            @endforeach-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </section>-->
        <!--@endif-->
        
        <!-- newslater-area -->
        <!--<section class="newslater-area">-->
        <!--    <div class="container">-->
        <!--        <div class="newslater-field text-center"-->
        <!--            style="background-image:url({{ asset('frontend') }}/img/about/last-fuel.webp);">-->
        <!--            <div class="head-text">-->
        <!--                <h2 class="mb-4">Need Immediate Gasoline</h2>-->
        <!--                <p>On energy service industry, EZ Fuel service has positioned itself as a leader in offering<br>-->
        <!--                    top-tier mobile refueling solutions throughout.</p>-->
        <!--            </div>-->
        <!--            <a href="{{ route("contact") }}" class="start-btn mt-3">Contact Us Now-->
        <!--                <span>-->
        <!--                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"-->
        <!--                        viewBox="0 0 1024 1024" >-->
        <!--                        <path fill="#F9C158"-->
        <!--                            d="M754.752 480H160a32 32 0 1 0 0 64h594.752L521.344 777.344a32 32 0 0 0 45.312 45.312l288-288a32 32 0 0 0 0-45.312l-288-288a32 32 0 1 0-45.312 45.312z" />-->
        <!--                    </svg>-->
        <!--                </span>-->
        <!--            </a>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</section>-->
    </main>
    <!-- main-area-end -->
@endsection
