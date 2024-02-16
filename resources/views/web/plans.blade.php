@extends("web.layouts.master")
@section("title","Plans")
@section("main")

<!-- main-area -->
<main>
    <!-- pricing-area -->
    <section class="pricing-area">
       <div class="container">
          <div class="row justify-content-center align-items-center">
             <div class="col-lg-12 col-md-12">
                <div class="head-text text-center">
                   <h2 class="mb-0">Membership Plans</h2>
                   <p class="mb-3">Choose the best plan by your need! Be a Long time member for long term delivery request service.</p>
                </div>
             </div>
             <div class="col-lg-12 col-md-12">
                <div class="row">
                    @foreach ($plans as $row)
                    <div class="col-lg-4 col-md-6">
                        <div class="default-form {{ $row->is_popular ? "stand" :"" }}">
                           <div class="pricing text-center">
                              <h5>{{ $row->name }}</h5>
                              <h1>${{ $row->price }}/<strong>{{ $row->type }}</strong></h1>
                              {!! $row->details !!}
                              <a href="{{ route("plans.show",$row->id) }}" class="start-btn btn2">Buy Now
                                 <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 1024 1024" >
                                       <path fill="#18232b" d="M754.752 480H160a32 32 0 1 0 0 64h594.752L521.344 777.344a32 32 0 0 0 45.312 45.312l288-288a32 32 0 0 0 0-45.312l-288-288a32 32 0 1 0-45.312 45.312z" />
                                    </svg>
                                 </span>
                              </a>
                           </div>
                        </div>
                     </div>
                    @endforeach

                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- pricing-area-end -->

 </main>
 <!-- main-area-end -->
@endsection
