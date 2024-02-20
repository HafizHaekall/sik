<!DOCTYPE html>
<html lang="en" class="!scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | SIK</title>

    <!-- Tailwind is included -->
    <link rel="stylesheet" href="{{ URL::asset('css/main.css'); }} ">
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-130795909-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-130795909-1');
    </script>

</head>
<body>

    <div>
        @yield('container')
    </div>

    <script type="text/javascript" src="{{ URL::asset('js/main.min.js'); }}"></script>
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
</body>
</html>