<!DOCTYPE html>
<html style="font-size: 16px;">

<head>
    <title>@yield('title')</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    @yield('scripts', "")
    @yield('styles', "")
    <style>
        .banner-logo {
            font-family: fontawesome;
            text-decoration: none;
            line-height: 1;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            font-size: 37px;
            letter-spacing: 3px;
            color: #555555;
            display: block;
            top: 17px;
            margin-bottom:10px;
        }

        body {
            font-family: "Open Sans", Arial, sans-serif !important;
        }

		a.banner-logo-link {
			text-decoration: none;
			color: inherit;
		}
    </style>
</head>

<body>
    <div class="banner-logo" style="float:left;">
        <a class="banner-logo-link" href="{{ route('home') }}">
			{{ $page_heading }}
		</a>
    </div>

	<div style="float:right;">
		<a style="display:block; padding:10px;" href="{{ route('create_new') }}">
			<input type="button" value="Create New" />
		</a>
	</div>

	<div style="clear:both;"></div>
    @yield('content')
</body>

</html>
