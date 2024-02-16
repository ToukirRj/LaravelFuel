@extends("web.layouts.master")
@section("title","Contact Us")
@section("main")

<main>
    <!-- contact-area -->
    <section class="contact-area">
       <div class="container">
          <div class="head-text text-center">
             <h2 class="mb-0">Contact with Us </h2>
             <p class="mb-4">Let us know, How can we help you from our end?</p>
          </div>
          <div class="row justify-content-center align-items-center">
             <div class="col-lg-6">
                <form action="{{ route('contactmessage.store') }}" class="default-form" method="POST">
                  @csrf
                   <h2>Request for a Call back</h2>
                   <p>Please fill up form bellow and submit, We will call you ASAP!</p>
                   <div class="row">
                      <div class="col-lg-12">
                         <div class="form-group">
                            <label>Full Name</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text"
                                id="name" value="{{ old('name') }}" name="name"
                                placeholder="Type Full Name" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                         </div>
                      </div>
                      <div class="col-lg-12">
                         <div class="form-group">
                            <label>Your Email</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="text"
                                id="email" value="{{ old('email') }}" name="email"
                                placeholder="Type Email" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                         </div>
                      </div>
                      <div class="col-lg-12">
                         <div class="form-group">
                            <label>Your Phone</label>
                            <input class="form-control @error('phone') is-invalid @enderror" type="text"
                                id="phone" value="{{ old('phone') }}" name="phone"
                                placeholder="Type phone" required>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                         </div>
                      </div>
                      <div class="col-lg-12">
                         <div class="form-group">
                            <label>Your Message</label>
                            <textarea class="form-control  @error('phone') is-invalid @enderror" name="message" id="message" rows="5" placeholder="Type Here" >{!! old('message') !!}</textarea>
                            @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                         </div>
                      </div>
                      <div class="col-lg-12">
                         <div class="form-group mb-0">
                            <button type="submit" class="start-btn btn2">Submit Now
                               <span>
                                  <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 1024 1024" >
                                     <path fill="#18232b" d="M754.752 480H160a32 32 0 1 0 0 64h594.752L521.344 777.344a32 32 0 0 0 45.312 45.312l288-288a32 32 0 0 0 0-45.312l-288-288a32 32 0 1 0-45.312 45.312z" />
                                  </svg>
                               </span>
                            </button>
                         </div>
                      </div>
                   </div>
                </form>
             </div>
          </div>
       </div>
    </section>
    <!-- contact-area-end -->
 </main>
 <!-- main-area-end -->
@endsection
