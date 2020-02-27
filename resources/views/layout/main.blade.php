<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head',[
        'styles' => [

        ]
    ])
</head>

<body class="load-full-screen">

@include('partials.loader')

<div class="site-wrapper">

    @include('partials.top-header')
    <div class="clearfix"></div>
    @include('partials.top-menu')
    <div class="clearfix"></div>

    @yield('content')

    <div class="clearfix"></div>
    @include('partials.contact-us-form')
    <div class="clearfix"></div>
    @include('partials.footer')

    @include('partials.scripts',[
    'scripts' => [

    ]
])

</div>
</body>
</html>


