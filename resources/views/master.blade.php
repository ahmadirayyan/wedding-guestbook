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
<body sty>
    <div id="app">
        @yield('content')

        <signature-form></signature-form>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
    @yield('libjs')
</body>
</html>