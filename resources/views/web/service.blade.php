@extends("web.layouts.master")
@section("title","Service")
@section("main")
<!-- main-area -->
<main>

    <section class="service-area service-page">
       <div class="container">
          <div class="service-field">
             <div class="head-text text-center">
                <h5 class="p-0">Mobile Refueling Service</h5>
                <h2>Our Delivery Service</h2>
                <p class="mb-4">Tired of wasting time at fueling stations waiting for a refuel? We can help you change that with mobile refueling. Mobile refueling <br>
                   is the on-demand delivery of vital fuels directly to vehicles, equipment, and storage tanks.</p>
             </div>
             @foreach ($services as $row)
                <div class="service-box">
                    <div class="row justify-content-center align-items-center">
                    <div class="col-lg-5 col-md-12 col-sm-12">
                        <span>
                            <img src="{{ asset($row->image) }}" alt="{{ $row->name }}"/>
                        </span>
                    </div>
                    <div class="col-lg-7 col-md-12 col-sm-12">
                        <h4 class="mt-1 text-start">{{ $row->name }}</h4>
                        {!! $row->details !!}
                    </div>
                    </div>
                </div>
             @endforeach

          </div>
       </div>
    </section>


    <!-- newslater-area -->
    <section class="newslater-area">
       <div class="container">
          <div class="newslater-field text-center" style="background-image:url({{ asset("frontend") }}/img/about/last-fuel.webp);">
             <div class="head-text">
                <h2 class="mb-4">Need Immediate Gasoline</h2>
                <p>On energy service industry, EZ Fuel service has positioned itself as a leader in offering<br> top-tier mobile refueling solutions throughout.</p>
             </div>
             <a href="{{ route("contact") }}" class="start-btn mt-3">Contact Us Now
                <span>
                   <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 1024 1024" >
                      <path fill="#F9C158" d="M754.752 480H160a32 32 0 1 0 0 64h594.752L521.344 777.344a32 32 0 0 0 45.312 45.312l288-288a32 32 0 0 0 0-45.312l-288-288a32 32 0 1 0-45.312 45.312z" />
                   </svg>
                </span>
             </a>
          </div>
       </div>
    </section>
 </main>
 <!-- main-area-end -->
@endsection
