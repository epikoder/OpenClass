<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href={{asset('css/tailwind.css')}}>
    <link rel="stylesheet" href={{asset('css/app.css')}}>
    <title>@yield('title')</title>
    @stack('head')
</head>
<body>
    <header>
        @includeIf('partials.nav')
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        @includeIf('partials.footer')
    </footer>
</body>
</html>
