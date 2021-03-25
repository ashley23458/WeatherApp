<!DOCTYPE html>
<html lang="{{App::getLocale()}}">
	<head>
	    @include('layouts.partials.head')
	</head>
	<body>
		<div class="container">
		    @yield('content')
		</div>
	@include('layouts.partials.footer')
	</body>
</html>
