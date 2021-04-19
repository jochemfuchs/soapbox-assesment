<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Soapbox - Product Page</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body>
    <div class="container" id="app">
        <div class="row">
            <div class="left-column">
                <img src="/img/logo.png" class="d-inline-block d-md-none img-fluid logo">
                <h1>Registration form</h1>
                <h2>to submit your product</h2>
            </div>
            <div class="right-column">
                <img src="/img/logo.png" class="img-fluid logo">
            </div>
        </div>
        <product-overview></product-overview>
    </div>
</body>
</html>