@extends("web.layouts.master")
@section("title","About")
@section("main")

    <!-- main-area -->
    <main>
        
        @php
    $page = $pages->where("slug","about-us")->first();
    @endphp
        <!-- about-area -->
        <section class="about-area about-page">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="about-img">
                            <img src="{{asset($page?->image)}}" alt="img">
                            <div class="about-tag">
                                <div class="line2">
                                    <span>Quick Quality Support</span>
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
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @php
    $page = $pages->where("slug","service")->first();
    @endphp
        <!-- about-area -->
        <section class="about-area">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="about-text oposite-text">
                            <div class="head-text oposite-head text-end">
                                <h5>{{$page->title}}</h5>
                        <h2>{{$page->title_2}}</h2>
                        
                            </div>
                            {!! $page->details !!}
                            <div class="d-flex justify-content-end">
                                <a href="{{ route("service") }}" class="start-btn btn2">Our Service
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                            viewBox="0 0 1024 1024" >
                                            <path fill="18232b"
                                                d="M754.752 480H160a32 32 0 1 0 0 64h594.752L521.344 777.344a32 32 0 0 0 45.312 45.312l288-288a32 32 0 0 0 0-45.312l-288-288a32 32 0 1 0-45.312 45.312z" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="about-img">
                            <img src="{{asset($page?->image)}}" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-area-end -->
        @php
    $page = $pages->where("slug","plans")->first();
    @endphp
        <!-- about-area -->
        <section class="about-area">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="about-img">
                            <img src="{{asset($page?->image)}}" alt="img">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="about-text">
                            <div class="head-text">
                            <h5>{{$page->title}}</h5>
                        <h2>{{$page->title_2}}</h2>
                        
                            </div>
                            {!! $page->details !!}
                            
                            <a href="{{ route("plans") }}" class="start-btn btn2">Membership Plans
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                        viewBox="0 0 1024 1024" >
                                        <path fill="18232b"
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
        @if ($testimonials->count())
            <!-- testimonial-area -->
            <section class="testimonial-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="head-text oposite-head text-end">
                                <h5><i class="fas fa-bolt"></i> Testimonial</h5>
                                <h2>
                                    Our Clients Satisfaction
                                </h2>
                                <p>Trusted by many customers</p>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div id="carouselExampleIndicators" class="carousel slide">
                                <div class="carousel-indicators">
                                    @foreach ($testimonials as $key => $row)
                                        <button type="button" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"
                                            aria-current="true" aria-label="Slide {{ $key + 1 }}"></button>
                                    @endforeach
                                </div>
                                <div class="carousel-inner">
                                    @foreach ($testimonials as $key => $row)
                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }} ">
                                            <div class="single-testimonial">
                                                <p>
                                                    “{{ $row->message }}”.
                                                </p>
                                                <div class="mt-3 d-flex align-items-center">
                                                    <img src="{{ asset($row->image) }}" alt="img">
                                                    <div class="te-info">
                                                        <h6>{{ $row->designation }}</h6>
                                                        <span>{{ $row->name }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    <div class="carousel-item">
                                        <div class="single-testimonial">
                                            <p>
                                                “Mauris non laoreet eros. Fusce sed varius diam. Ut sapien mauris, fermentum
                                                vel porta et,
                                                convallis a lacus. Nulla facilisi. Ut vehicula dignissim rutrum configurable
                                                but are already
                                                optimized”.
                                            </p>
                                            <div class="mt-3 d-flex align-items-center">
                                                <img src="{{ asset('frontend/img/testimonial/testi_avatar.png') }}"
                                                    alt="img">
                                                <div class="te-info">
                                                    <h6>Christine Eve</h6>
                                                    <span>Head Of Idea</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="single-testimonial">
                                            <p>
                                                “Mauris non laoreet eros. Fusce sed varius diam. Ut sapien mauris, fermentum
                                                vel porta et,
                                                convallis a lacus. Nulla facilisi. Ut vehicula dignissim rutrum configurable
                                                but are already
                                                optimized”.
                                            </p>
                                            <div class="mt-3 d-flex align-items-center">
                                                <img src="{{ asset('frontend/img/testimonial/testi_avatar.png') }}"
                                                    alt="img">
                                                <div class="te-info">
                                                    <h6>Christine Eve</h6>
                                                    <span>Head Of Idea</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- testimonial-area-end -->
        @endif
        <!-- newslater-area -->
        <section class="newslater-area">
            <div class="container">
                <div class="newslater-field text-center"
                    style="background-image:url({{ asset('frontend') }}/img/about/last-fuel.webp);">
                    <div class="head-text">
                        <h2 class="mb-4">Need Immediate Gasoline</h2>
                        <p>On energy service industry, EZ Fuel service has positioned itself as a leader in offering<br>
                            top-tier mobile refueling solutions throughout.</p>
                    </div>
                    <a href="{{ route("contact") }}" class="start-btn mt-3">Contact Us Now
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                viewBox="0 0 1024 1024" >
                                <path fill="#F9C158"
                                    d="M754.752 480H160a32 32 0 1 0 0 64h594.752L521.344 777.344a32 32 0 0 0 45.312 45.312l288-288a32 32 0 0 0 0-45.312l-288-288a32 32 0 1 0-45.312 45.312z" />
                            </svg>
                        </span>
                    </a>
                </div>
            </div>
        </section>
    </main>
    <!-- main-area-end -->
@endsection
