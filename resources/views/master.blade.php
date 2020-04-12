<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wedding Guestbook</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
    @yield('libcss')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">AA's Wedding Guests</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerMenu" aria-controls="navbarTogglerMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerMenu">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                           <button type="button" class="btn btn-outline-light my-2 my-sm-0" data-toggle="modal" data-target="#fillModal">Sign Here</button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')

        <signature-form></signature-form>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
    @yield('libjs')
</body>
</html>