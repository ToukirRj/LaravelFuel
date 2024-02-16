  <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@stack('title') - {{ config('app.name', 'Laravel') }}</title>
@isset($vue)
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@else
@endisset

    <!-- vendor css -->
    <link href="{{ asset('template') }}/lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('template') }}/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="{{ asset('template') }}/lib/rickshaw/rickshaw.min.css" rel="stylesheet">
    <link href="{{ asset('template') }}/lib/select2/css/select2.min.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{ asset('template') }}/css/bracket.css">

    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    @stack('css')
