
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Meta -->
    <meta name="description" content="">
    <meta name="author" content="ThemePixels">

    <title>@yield('title') : {{ config('app.name', 'Laravel') }}</title>

    <!-- vendor css -->
    <link href="{{ asset('template') }}/lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('template') }}/lib/ionicons/css/ionicons.min.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{ asset('template') }}/css/bracket.css">
  </head>

  <body>

    
    @yield('content')

    <script src="{{ asset('template') }}/lib/jquery/jquery.min.js"></script>
    <script src="{{ asset('template') }}/lib/jquery-ui/ui/widgets/datepicker.js"></script>
    <script src="{{ asset('template') }}/lib/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
