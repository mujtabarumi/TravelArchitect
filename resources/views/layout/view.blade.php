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
<!-- BEGIN: SITE-WRAPPER -->
<div class="site-wrapper">
@include('partials.top-header')
<div class="clearfix"></div>
@include('partials.top-menu')
@include('home.main-slider')
@include('partials.social-share')
@include('home.main-query-section')
@include('home.holiday-top-destination')
@include('home.recomanded-holidays')
@include('partials.contact-us-form')
@include('partials.footer')

</div>
@include('partials.scripts',[
    'scripts' => [

    ]
])
</body>
</html>
