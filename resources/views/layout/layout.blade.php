<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} - Notebase</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @yield('head-content')
    <script src = "https://user-content-dot-custom-elements.appspot.com/PolymerElements/iron-icon/v1.0.13/webcomponentsjs/webcomponents-lite.js"></script>
    <link rel = "import" href = "https://user-content-dot-custom-elements.appspot.com/PolymerElements/iron-icon/v1.0.13/iron-icons/iron-icons.html">
    <link rel = "import" href = "https://user-content-dot-custom-elements.appspot.com/PolymerElements/iron-icon/v1.0.13/iron-icon/iron-icon.html">
</head>
<body>
    @include('partials.header')
    <div id="layout" class="px-4">

        @yield('body-content')
    </div>
    @include('partials.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>