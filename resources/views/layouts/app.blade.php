<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/alpinejs" defer></script>

</head>

</html>
<!doctype html>
<html lang="en">

  <head>
    <title>Indie &mdash; Blog Community</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('blog/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('blog/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('blog/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('blog/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('blog/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('blog/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('blog/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('blog/css/aos.css') }}">

    <title>@yield('title')</title>
    @vite('resources/css/app.css')

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('blog/css/style.css') }}">

  </head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    @yield('content')
</body>