<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} - Notebase</title>
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
    @yield('head-content')
    <!-- Polymer Icons -->
    <script src = "https://user-content-dot-custom-elements.appspot.com/PolymerElements/iron-icon/v1.0.13/webcomponentsjs/webcomponents-lite.js"></script>
    <link rel = "import" href = "https://user-content-dot-custom-elements.appspot.com/PolymerElements/iron-icon/v1.0.13/iron-icons/iron-icons.html">
    <link rel = "import" href = "https://user-content-dot-custom-elements.appspot.com/PolymerElements/iron-icon/v1.0.13/iron-icon/iron-icon.html">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="/css/global.css">
    <link rel="stylesheet" href="/css/sidebar.css">
    <link rel="stylesheet" href="/css/modal.css">

    <!-- csrf token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
    @include('partials.header')
    @if(session()->has('user'))
        @include('partials.sidebar')
    @endif
    @include('partials.modal')
    <div id="layout" class="px-4">
        @yield('body-content')
    </div>
    @include('partials.footer')

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="/js/modal.js"></script>
</body>
</html>