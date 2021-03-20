<!DOCTYPE html>
<html style="font-size: 16px;">

<head>
    <title>@yield('title')</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
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
    </style>
</head>

<body>
    <div class="banner-logo">{{ $page_heading }}</div>
    @yield('content')
</body>

</html>
