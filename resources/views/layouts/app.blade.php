<!DOCTYPE html>
<html lang="{{App::getLocale()}}">
<head>
    @include('layouts.partials.head')
</head>
<body class="d-flex flex-column">
<div id="main">
    <div class="container">
        @yield('content')
    </div>
</div>
@include('layouts.partials.footer')
</body>
</html>
