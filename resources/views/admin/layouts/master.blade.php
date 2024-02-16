<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.layouts.includes_top')
  </head>

  <body>

    <div id="app">
      

    <!-- ########## START: LEFT PANEL ########## -->
    @include('admin.layouts.sidebar')
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    @include('admin.layouts.header')
    <!-- ########## END: HEAD PANEL ########## -->


    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      @yield('content')
      @include('admin.layouts.footer')
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    </div>
 @include('admin.layouts.includes_bottom')
  </body>
</html>
