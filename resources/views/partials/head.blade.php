<meta charset="utf-8" />
<title>@yield('page-title',"Travel Architect - Travel Architect")</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<!-- App favicon -->
<link rel="shortcut icon" href="{{ asset('favicon.png') }}" />

<meta name="description" content="@yield('meta-description',"")"/>
<meta name="robots" content="follow,index,max-snippet:-1,max-video-preview:-1,max-image-preview:large"/>
<link rel="canonical" href="" />
<meta property="og:locale" content="en_US">
<meta property="og:type" content="website">
<meta property="og:title" content="@yield('page-title',"Travel Architect - Travel Architect")">
<meta property="og:description" content="@yield('meta-description',"")">
<meta property="og:url" content="@yield("graph-url","")">
<meta property="og:site_name" content="Travel Architect">
<meta property="og:updated_time" content="2020-01-01T08:11:54+00:00">
<meta property="og:image" content="@yield("graph-image","")">
<meta property="og:image:secure_url" content="@yield("graph-image","")">
<meta property="og:image:width" content="521">
<meta property="og:image:height" content="310">
<meta property="og:image:alt" content="Travel Architect">
<meta property="og:image:type" content="image/png">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="@yield('page-title',"Travel Architect - Travel Architect")">
<meta name="twitter:description" content="@yield('meta-description',"")">
<meta name="twitter:creator" content="">
<meta name="twitter:image" content="">


@if(isset($styles) && !blank($styles))
    @foreach($styles as $style)
        <link href="{{ $style }}" rel="stylesheet" type="text/css"/>
    @endforeach
@endif

@stack('pre-styles')

<!-- STYLES -->
<link href="{{asset("/assets/css/animate.min.css")}}" rel="stylesheet">
<link href="{{asset("/assets/css/bootstrap-select.min.css")}}" rel="stylesheet">
<link href="{{asset("/assets/css/owl.carousel.css")}}" rel="stylesheet">
<link href="{{asset("/assets/css/owl-carousel-theme.css")}}" rel="stylesheet">
<link href="{{asset("/assets/css/bootstrap.min.css")}}" rel="stylesheet" media="screen">
<link href="{{asset("/assets/css/flexslider.css")}}" rel="stylesheet" media="screen">
<link href="{{asset("/assets/css/style.css")}}" rel="stylesheet" media="screen">
<!-- LIGHT -->

<link href="{{asset("/assets/font-awesome/css/font-awesome.min.css")}}" rel="stylesheet">

<!-- make site yellow -->
<link href="{{asset("/assets/css/color/yellow.css")}}" rel="stylesheet">
<link href="{{asset("/assets/css/light.css")}}" rel="stylesheet">

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,800,700,600' rel='stylesheet' type='text/css'>

<link href="{{asset("/assets/css/sharenet.css")}}" rel="stylesheet">

{{--<link href='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css' rel='stylesheet' type='text/css'>--}}
@stack('styles')

