<script src="{{ asset('template') }}/lib/jquery/jquery.min.js"></script>
<script src="{{ asset('template') }}/lib/jquery-ui/ui/widgets/datepicker.js"></script>
<script src="{{ asset('template') }}/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('template') }}/lib/select2/js/select2.full.min.js"></script>
<script src="{{ asset('template') }}/js/bracket.js"></script>

<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

@stack('js')

<script>
  $(function(){
    'use strict'

    // FOR DEMO ONLY
    // menu collapsed by default during first page load or refresh with screen
    // having a size between 992px and 1299px. This is intended on this page only
    // for better viewing of widgets demo.
    $(window).resize(function(){
      minimizeMenu();
    });

    minimizeMenu();

    function minimizeMenu() {
      if(window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
        // show only the icons and hide left menu label by default
        $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
        $('body').addClass('collapsed-menu');
        $('.show-sub + .br-menu-sub').slideUp();
      } else if(window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
        $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
        $('body').removeClass('collapsed-menu');
        $('.show-sub + .br-menu-sub').slideDown();
      }
    }
  });
</script>
{!! Toastr::message() !!}
