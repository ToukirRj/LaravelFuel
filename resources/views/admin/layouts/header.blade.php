<div class="br-header">
  <div class="br-header-left">
    <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
    <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
  </div><!-- br-header-left -->
  <div class="br-header-right">
    <nav class="nav">
     <!-- dropdown -->
      <div class="dropdown">
        <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
          <span class="logged-name hidden-md-down">{{ Auth::user()->name }}</span>
          @if(Auth::user()->image)
              <img src="{{ asset(Auth::user()->image) }}" class="wd-32 rounded-circle" width="32" alt="">
            @else
              <img src="https://via.placeholder.com/500" class="wd-32 rounded-circle" width="32" alt="">
            @endif

          <span class="square-10 bg-success"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-header wd-250">
          <div class="tx-center">


            @if(Auth::user()->image)
              <a href=""><img src="{{ asset(Auth::user()->image) }}"  class="wd-80 rounded-circle" class="m-3" alt=""></a>
            @else
              <a href=""><img src="{{ asset("avater.webp") }}" class="wd-80 rounded-circle" alt=""></a>
            @endif

            <h6 class="logged-fullname"> {{ Auth::user()->name }}</h6>
            <p> {{ Auth::user()->email }}</p>
          </div>
          <hr>

          <ul class="list-unstyled user-profile-nav">
            <li><a href="{{ route('admin.profile.edit') }}"><i class="icon ion-ios-person"></i> Edit Profile</a></li>
            {{-- <li><a href="{{ route('admin.profile.edit') }}"><i class="icon ion-ios-gear"></i> Settings</a></li> --}}
            <li>
            <a class="" href="{{ route('admin.logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  <i class="icon ion-power"></i> {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
            </li>
          </ul>
        </div><!-- dropdown-menu -->
      </div><!-- dropdown -->
    </nav>
  </div><!-- br-header-right -->
</div><!-- br-header -->
