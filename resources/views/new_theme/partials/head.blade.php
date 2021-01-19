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

@stack('new_theme.pre-styles')

<!-- FONT CSS-->
<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900">
<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Montserrat:400,700">
<link type="text/css" rel="stylesheet" href="{{url('public/newtheme/assets/font/font-icon/font-awesome/css/font-awesome.css')}}">
<link type="text/css" rel="stylesheet" href="{{url('public/newtheme/assets/font/font-icon/font-flaticon/flaticon.css')}}">
<!-- LIBRARY CSS-->
<link type="text/css" rel="stylesheet" href="{{url('public/newtheme/assets/libs/bootstrap/css/bootstrap.min.css')}}">
<link type="text/css" rel="stylesheet" href="{{url('public/newtheme/assets/libs/animate/animate.css')}}">
<link type="text/css" rel="stylesheet" href="{{url('public/newtheme/assets/libs/slick-slider/slick.css')}}">
<link type="text/css" rel="stylesheet" href="{{url('public/newtheme/assets/libs/slick-slider/slick-theme.css')}}">
<link type="text/css" rel="stylesheet" href="{{url('public/newtheme/assets/libs/selectbox/css/jquery.selectbox.css')}}">
<link type="text/css" rel="stylesheet" href="{{url('public/newtheme/assets/libs/please-wait/please-wait.css')}}">
<link type="text/css" rel="stylesheet" href="{{url('public/newtheme/assets/libs/fancybox/css/jquery.fancybox8cbb.css?v=2.1.5')}}">
<link type="text/css" rel="stylesheet" href="{{url('public/newtheme/assets/libs/fancybox/css/jquery.fancybox-buttons3447.css?v=1.0.5')}}">
<link type="text/css" rel="stylesheet" href="{{url('public/newtheme/assets/libs/fancybox/css/jquery.fancybox-thumbsf2ad.css?v=1.0.7')}}">
<!-- STYLE CSS-->
<link type="text/css" rel="stylesheet" href="{{url('public/newtheme/assets/css/layout.css')}}">
<link type="text/css" rel="stylesheet" href="{{url('public/newtheme/assets/css/components.css')}}">
<link type="text/css" rel="stylesheet" href="{{url('public/newtheme/assets/css/responsive.css')}}">
<link type="text/css" rel="stylesheet" href="{{url('public/newtheme/assets/css/color.css')}}">
<script src="{{url('public/newtheme/assets/libs/jquery/jquery-2.2.3.min.js')}}"></script>

<link type="text/css" rel="stylesheet" href="{{url('public/newtheme/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}">
<link type="text/css" rel="stylesheet" href="{{url('public/assets/css/sharenetNew.css')}}">

@stack('new_theme.styles')

