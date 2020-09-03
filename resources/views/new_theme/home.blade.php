<!DOCTYPE html>
<html lang="en">

<head>
    <title>Travel Architect</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <!--link(type="text/css", rel='stylesheet', href='assets/css/color-1/color-1.css', id="color-skins")-->
{{--    <link type="text/css" rel="stylesheet" href="#" id="color-skins">--}}
    <script src="{{url('public/newtheme/assets/libs/jquery/jquery-2.2.3.min.js')}}"></script>
{{--    <script src="{{url('public/newtheme/assets/libs/js-cookie/js.cookie.js')}}"></script>--}}
    <script>
        {{--if ((Cookies.get('color-skin') != undefined) && (Cookies.get('color-skin') != 'color-1'))--}}
        {{--{--}}
        {{--    $('#color-skins').attr('href', '{{url('public/newtheme/assets/css/')}}' + Cookies.get('color-skin') + '/' + 'color.css');--}}
        {{--}--}}
        {{--else if ((Cookies.get('color-skin') == undefined) || (Cookies.get('color-skin') == 'color-1'))--}}
        {{--{--}}
        {{--    $('#color-skins').attr('href', '{{url('public/newtheme/assets/css/color-1/color.css')}}');--}}
        {{--}--}}
    </script>
    <link type="text/css" rel="stylesheet" href="{{url('public/newtheme/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('public/assets/css/sharenetNew.css')}}">
</head>
<body>
<div class="body-wrapper">
    <!-- MENU MOBILE-->
    <div class="wrapper-mobile-nav">
        <div class="header-topbar">
            <div class="topbar-search search-mobile">
                <form class="search-form">
                    <div class="input-icon">
                        <i class="btn-search fa fa-search"></i>
                        <input type="text" placeholder="Search here..." class="form-control" />
                    </div>
                </form>
            </div>
        </div>
        <div class="header-main">
            <div class="menu-mobile">
                <ul class="nav-links nav navbar-nav">
                    <li class="dropdown">
                        <a href="index-2.html" class="main-menu">
                            <span class="text">Home</span>
                        </a>
                        <span class="icons-dropdown">
                                    <i class="fa fa-angle-down"></i>
                                </span>
                        <ul class="dropdown-menu dropdown-menu-1">
                            <li>
                                <a href="index-2.html" class="link-page">Homepage default</a>
                            </li>
                            <li>
                                <a href="homepage-02.html" class="link-page">Homepage 02</a>
                            </li>
                            <li>
                                <a href="homepage-03.html" class="link-page">Homepage 03</a>
                            </li>
                            <li>
                                <a href="homepage-04.html" class="link-page">Homepage 04</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="about-us.html" class="main-menu">
                            <span class="text">about</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="tour-result.html" class="main-menu">
                            <span class="text">Tour</span>
                        </a>
                        <span class="icons-dropdown">
                                    <i class="fa fa-angle-down"></i>
                                </span>
                        <ul class="dropdown-menu dropdown-menu-1">
                            <li>
                                <a href="tour-result.html" class="link-page">tour result</a>
                            </li>
                            <li>
                                <a href="tour-view.html" class="link-page">tour view</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="hotel-result.html" class="main-menu">
                            <span class="text">packages</span>
                        </a>
                        <span class="icons-dropdown">
                                    <i class="fa fa-angle-down"></i>
                                </span>
                        <ul class="dropdown-menu dropdown-menu-1">
                            <li>
                                <a href="hotel-result.html" class="link-page">hotel result</a>
                            </li>
                            <li>
                                <a href="hotel-view.html" class="link-page">hotel view</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="blog.html" class="main-menu">
                            <span class="text">blog</span>
                        </a>
                        <span class="icons-dropdown">
                                    <i class="fa fa-angle-down"></i>
                                </span>
                        <ul class="dropdown-menu dropdown-menu-1">
                            <li>
                                <a href="blog.html" class="link-page">blog list</a>
                            </li>
                            <li>
                                <a href="blog-detail.html" class="link-page">blog detail</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="car-rent-result.html" class="main-menu">
                            <span class="text">page</span>
                        </a>
                        <span class="icons-dropdown">
                                    <i class="fa fa-angle-down"></i>
                                </span>
                        <ul class="dropdown-menu dropdown-menu-1">
                            <li>
                                <a href="car-rent-result.html" class="link-page">car rent result</a>
                            </li>
                            <li>
                                <a href="cruises-result.html" class="link-page">cruises result</a>
                            </li>
                            <li>
                                <a href="404.html" class="link-page">page 404</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="contact.html" class="main-menu">
                            <span class="text">contact</span>
                        </a>
                    </li>
                </ul>
                <ul class="list-unstyled list-inline login-widget">
                    <li>
                        <a href="#" class="item">login</a>
                    </li>
                    <li>
                        <a href="#" class="item">register</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- WRAPPER CONTENT-->
    <div class="wrapper-content">
        <!-- HEADER-->
        <header>
            <div class="bg-transparent header-01">
                <div class="header-topbar">
                    <div class="container">
{{--                        <ul class="topbar-left list-unstyled list-inline pull-left">--}}
{{--                            <li>--}}
{{--                                <a href="javascript:void(0)" class="country dropdown-text">--}}
{{--                                    <span>Country</span>--}}
{{--                                    <i class="topbar-icon icons-dropdown fa fa-angle-down"></i>--}}
{{--                                </a>--}}
{{--                                <ul class="dropdown-topbar list-unstyled hide">--}}
{{--                                    <li>--}}
{{--                                        <a href="#" class="link">Vietnam</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#" class="link">Japan</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#" class="link">Korea</a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="javascript:void(0)" class="language dropdown-text">--}}
{{--                                    <span>English</span>--}}
{{--                                    <i class="topbar-icon icons-dropdown fa fa-angle-down"></i>--}}
{{--                                </a>--}}
{{--                                <ul class="dropdown-topbar list-unstyled hide">--}}
{{--                                    <li>--}}
{{--                                        <a href="#" class="link">Vietnam</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#" class="link">Japan</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#" class="link">Korea</a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="javascript:void(0)" class="monney dropdown-text">--}}
{{--                                    <span>USD</span>--}}
{{--                                    <i class="topbar-icon icons-dropdown fa fa-angle-down"></i>--}}
{{--                                </a>--}}
{{--                                <ul class="dropdown-topbar list-unstyled hide">--}}
{{--                                    <li>--}}
{{--                                        <a href="#" class="link">VND</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#" class="link">Euro</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#" class="link">JPY</a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
                        <ul class="topbar-right pull-right list-unstyled list-inline login-widget">
                            <li>
                                <a href="sign-up.html" class="item">login</a>
                            </li>
                            <li>
                                <a href="register.html" class="item">register</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="header-main">
                    <div class="container">
                        <div class="header-main-wrapper">
                            <div class="hamburger-menu">
                                <div class="hamburger-menu-wrapper">
                                    <div class="icons"></div>
                                </div>
                            </div>
                            <div class="navbar-header">
                                <div class="logo">
                                    <a href="{{route('newHome')}}" class="header-logo">
                                        <img src="{{url('public/newtheme/assets/images/logo/logo-white-color-1.png')}}" alt="" />
                                    </a>
                                </div>
                            </div>
                            <nav class="navigation">
                                <ul class="nav-links nav navbar-nav">
                                    <li class="active">
                                        <a href="about-us.html" class="main-menu">
                                            <span class="text">Home</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="about-us.html" class="main-menu">
                                            <span class="text">HOLIDAY</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="about-us.html" class="main-menu">
                                            <span class="text">TOURS</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="about-us.html" class="main-menu">
                                            <span class="text">VISA GUIDE</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="contact.html" class="main-menu">
                                            <span class="text">contact</span>
                                        </a>
                                    </li>
{{--                                    <li class="button-search">--}}
{{--                                        <p class="main-menu">--}}
{{--                                            <i class="fa fa-search"></i>--}}
{{--                                        </p>--}}
{{--                                    </li>--}}
                                </ul>
{{--                                <div class="nav-search hide">--}}
{{--                                    <form>--}}
{{--                                        <input type="text" placeholder="Search" class="searchbox" />--}}
{{--                                        <button type="submit" class="searchbutton fa fa-search"></button>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
                            </nav>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- WRAPPER-->
        <div id="wrapper-content">
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <section class="page-banner homepage-default">
                    <div class="container">
                        <div class="homepage-banner-warpper">
                            <div class="homepage-banner-content">
{{--                                <div class="group-title">--}}
{{--                                    <h1 class="title">discover</h1>--}}
{{--                                    <p class="text">The world you have never seen--}}
{{--                                        <span class="boder"></span>--}}
{{--                                    </p>--}}
{{--                                </div>--}}
                                <div class="group-btn">
                                    <a href="#" data-hover="CLICK ME" class="btn-click">
                                        <span class="text">go explore now</span>
                                        <span class="icons fa fa-long-arrow-right"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="tab-search tab-search-long tab-search-default">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12">
                                    <ul role="tablist" class="nav nav-tabs">
                                        <li role="presentation" class="tab-btn-wrapper active">
                                            <a href="#flight" aria-controls="flight" role="tab" data-toggle="tab" class="tab-btn">
                                                <i class="flaticon-transport-1"></i>
                                                <span class="text">FLIGHT</span>
                                                <span class="xs">FIND YOUR FLIGHT</span>
                                            </a>
                                        </li>
                                        <li role="presentation" class="tab-btn-wrapper">
                                            <a href="#holiday" aria-controls="holiday" role="tab" data-toggle="tab" class="tab-btn">
                                                <i class="flaticon-three"></i>
                                                <span class="text">HOLIDAY</span>
                                                <span class="xs">FIND HOLIDAY</span>
                                            </a>
                                        </li>
                                        <li role="presentation" class="tab-btn-wrapper">
                                            <a href="#tours" aria-controls="tours" role="tab" data-toggle="tab" class="tab-btn">
                                                <i class="flaticon-people"></i>
                                                <span class="text">TOURS</span>
                                                <span class="xs">FIND TOURS</span>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content-bg">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="tab-content">
                                            <div role="tabpanel" id="flight" class="tab-pane fade in active">
                                                <div class="find-widget find-flight-widget widget">
                                                    <h4 class="title-widgets">FIND YOUR FLIGHT</h4>
                                                    <form class="content-widget">
                                                        <div class="ffw-radio-selection">
                                                                    <span class="ffw-radio-btn-wrapper">
                                                                        <input type="radio" name="flight type" value="one way" id="flight-type-1" checked="checked" class="ffw-radio-btn">
                                                                        <label for="flight-type-1" class="ffw-radio-label">One Way</label>
                                                                    </span>
                                                            <span class="ffw-radio-btn-wrapper">
                                                                        <input type="radio" name="flight type" value="round trip" id="flight-type-2" class="ffw-radio-btn">
                                                                        <label for="flight-type-2" class="ffw-radio-label">Round Trip</label>
                                                                    </span>
                                                            <span class="ffw-radio-btn-wrapper">
                                                                        <input type="radio" name="flight type" value="multiple cities" id="flight-type-3" class="ffw-radio-btn">
                                                                        <label for="flight-type-3" class="ffw-radio-label">Multiple Cities</label>
                                                                    </span>
                                                            <div class="stretch">&nbsp;</div>
                                                        </div>
                                                        <div class="text-input small-margin-top">
                                                            <div class="place text-box-wrapper">
                                                                <label class="tb-label">Where do you want to go?</label>
                                                                <div class="input-group">
                                                                    <input type="text" placeholder="Write the place" class="tb-input">
                                                                </div>
                                                            </div>
                                                            <div class="input-daterange">
                                                                <div class="text-box-wrapper half">
                                                                    <label class="tb-label">Check in</label>
                                                                    <div class="input-group">
                                                                        <input type="text" placeholder="MM/DD/YY" class="tb-input">
                                                                        <i class="tb-icon fa fa-calendar input-group-addon"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="text-box-wrapper half">
                                                                    <label class="tb-label">Check out</label>
                                                                    <div class="input-group">
                                                                        <input type="text" placeholder="MM/DD/YY" class="tb-input">
                                                                        <i class="tb-icon fa fa-calendar input-group-addon"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="count adult-count text-box-wrapper">
                                                                <label class="tb-label">Adult</label>
                                                                <div class="select-wrapper">
                                                                    <!--i.fa.fa-chevron-down-->
                                                                    <select class="form-control custom-select selectbox">
                                                                        <option selected="selected">1</option>
                                                                        <option>2</option>
                                                                        <option>3</option>
                                                                        <option>4</option>
                                                                        <option>5</option>
                                                                        <option>6</option>
                                                                        <option>7</option>
                                                                        <option>8</option>
                                                                        <option>9</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="count child-count text-box-wrapper">
                                                                <label class="tb-label">Child</label>
                                                                <div class="select-wrapper">
                                                                    <!--i.fa.fa-chevron-down-->
                                                                    <select class="form-control custom-select selectbox">
                                                                        <option selected="selected">0</option>
                                                                        <option>1</option>
                                                                        <option>2</option>
                                                                        <option>3</option>
                                                                        <option>4</option>
                                                                        <option>5</option>
                                                                        <option>6</option>
                                                                        <option>7</option>
                                                                        <option>8</option>
                                                                        <option>9</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <button type="submit" data-hover="SEARCH NOW" class="btn btn-slide">
                                                                <span class="text">SEARCH NOW</span>
                                                                <span class="icons fa fa-long-arrow-right"></span>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                            <div role="tabpanel" id="holiday" class="tab-pane fade">
                                                <div class="find-widget find-tours-widget widget">
                                                    <h4 class="title-widgets">FIND HOLIDAY</h4>
                                                    <form class="content-widget">
                                                        <div class="text-input small-margin-top">
                                                            <div class="place text-box-wrapper">
                                                                <label class="tb-label">Where do you want to go?</label>
                                                                <div class="input-group">
                                                                    <input type="text" placeholder="Write the place" class="tb-input">
                                                                </div>
                                                            </div>
                                                            <div class="date text-box-wrapper">
                                                                <label class="tb-label">When do you want to go?</label>
                                                                <div class="input-group">
                                                                    <input type="text" placeholder="MM/DD/YY" class="tb-input">
                                                                    <i class="tb-icon fa fa-calendar input-group-addon"></i>
                                                                </div>
                                                            </div>
                                                            <div class="count adult-count text-box-wrapper">
                                                                <label class="tb-label">Duration</label>
                                                                <div class="select-wrapper">
                                                                    <!--i.fa.fa-chevron-down-->
                                                                    <select class="form-control custom-select selectbox">
                                                                        <option selected="selected">1</option>
                                                                        <option>2</option>
                                                                        <option>3</option>
                                                                        <option>4</option>
                                                                        <option>5</option>
                                                                        <option>6</option>
                                                                        <option>7</option>
                                                                        <option>8</option>
                                                                        <option>9</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="count adult-count text-box-wrapper">
                                                                <label class="tb-label">Theme</label>
                                                                <div class="select-wrapper">
                                                                    <!--i.fa.fa-chevron-down-->
                                                                    <select class="form-control custom-select selectbox">
                                                                        <option selected="selected">none</option>
                                                                        <option>Honeymoon</option>
                                                                        <option>Group</option>
                                                                        <option>Beach</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <button type="submit" data-hover="SEARCH NOW" class="btn btn-slide">
                                                                <span class="text">SEARCH NOW</span>
                                                                <span class="icons fa fa-long-arrow-right"></span>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div role="tabpanel" id="tours" class="tab-pane fade">
                                                <div class="find-widget find-tours-widget widget">
                                                    <h4 class="title-widgets">FIND TOURS</h4>
                                                    <form class="content-widget">
                                                        <div class="text-input small-margin-top">
                                                            <div class="place text-box-wrapper">
                                                                <label class="tb-label">Where do you want to go?</label>
                                                                <div class="input-group">
                                                                    <input type="text" placeholder="Write the place" class="tb-input">
                                                                </div>
                                                            </div>
                                                            <div class="date text-box-wrapper">
                                                                <label class="tb-label">When do you want to go?</label>
                                                                <div class="input-group">
                                                                    <input type="text" placeholder="MM/DD/YY" class="tb-input">
                                                                    <i class="tb-icon fa fa-calendar input-group-addon"></i>
                                                                </div>
                                                            </div>

                                                            <div class="count adult-count text-box-wrapper">
                                                                <label class="tb-label">Duration</label>
                                                                <div class="select-wrapper">
                                                                    <!--i.fa.fa-chevron-down-->
                                                                    <select class="form-control custom-select selectbox">
                                                                        <option selected="selected">1</option>
                                                                        <option>2</option>
                                                                        <option>3</option>
                                                                        <option>4</option>
                                                                        <option>5</option>
                                                                        <option>6</option>
                                                                        <option>7</option>
                                                                        <option>8</option>
                                                                        <option>9</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="count adult-count text-box-wrapper">
                                                                <label class="tb-label">Theme</label>
                                                                <div class="select-wrapper">
                                                                    <!--i.fa.fa-chevron-down-->
                                                                    <select class="form-control custom-select selectbox">
                                                                        <option selected="selected">none</option>
                                                                        <option>Honeymoon</option>
                                                                        <option>Group</option>
                                                                        <option>Beach</option>
                                                                    </select>
                                                                </div>
                                                            </div>

{{--                                                            <div class="count adult-count text-box-wrapper">--}}
{{--                                                                <label class="tb-label">Adult</label>--}}
{{--                                                                <div class="select-wrapper">--}}
{{--                                                                    <!--i.fa.fa-chevron-down-->--}}
{{--                                                                    <select class="form-control custom-select selectbox">--}}
{{--                                                                        <option selected="selected">1</option>--}}
{{--                                                                        <option>2</option>--}}
{{--                                                                        <option>3</option>--}}
{{--                                                                        <option>4</option>--}}
{{--                                                                        <option>5</option>--}}
{{--                                                                        <option>6</option>--}}
{{--                                                                        <option>7</option>--}}
{{--                                                                        <option>8</option>--}}
{{--                                                                        <option>9</option>--}}
{{--                                                                    </select>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="count child-count text-box-wrapper">--}}
{{--                                                                <label class="tb-label">Child</label>--}}
{{--                                                                <div class="select-wrapper">--}}
{{--                                                                    <!--i.fa.fa-chevron-down-->--}}
{{--                                                                    <select class="form-control custom-select selectbox">--}}
{{--                                                                        <option selected="selected">0</option>--}}
{{--                                                                        <option>1</option>--}}
{{--                                                                        <option>2</option>--}}
{{--                                                                        <option>3</option>--}}
{{--                                                                        <option>4</option>--}}
{{--                                                                        <option>5</option>--}}
{{--                                                                        <option>6</option>--}}
{{--                                                                        <option>7</option>--}}
{{--                                                                        <option>8</option>--}}
{{--                                                                        <option>9</option>--}}
{{--                                                                    </select>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
                                                            <button type="submit" data-hover="SEARCH NOW" class="btn btn-slide">
                                                                <span class="text">SEARCH NOW</span>
                                                                <span class="icons fa fa-long-arrow-right"></span>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="tours padding-top padding-bottom">
                    <div class="container">
                        <div class="tours-wrapper">
                            <div class="group-title">
                                <h2 class="main-title">Recomanded Holidays</h2>
                                <div class="right">
                                    <strong>SEE ALL</strong>
                                    <span class="slick-nav">
                                        <a class="prev-arrow"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                                        <a class="next-arrow"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                                    </span>
                                </div>
                            </div>
                            <div class="tours-content margin-top70">
                                <div class="tours-list slick-slider-added">
{{--                                    <div class="tours-layout">--}}
{{--                                        <div class="image-wrapper">--}}
{{--                                            <a href="tour-view.html" class="link">--}}
{{--                                                <img src="assets/images/tours/tour-1.jpg" alt="" class="img-responsive">--}}
{{--                                            </a>--}}
{{--                                            <div class="title-wrapper">--}}
{{--                                                <a href="tour-view.html" class="title">Newyork city</a>--}}
{{--                                                <i class="icons flaticon-circle"></i>--}}
{{--                                            </div>--}}
{{--                                            <div class="label-sale">--}}
{{--                                                <p class="text">sale</p>--}}
{{--                                                <p class="number">35%</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="content-wrapper">--}}
{{--                                            <ul class="list-info list-inline list-unstyle">--}}
{{--                                                <li>--}}
{{--                                                    <a href="#" class="link">--}}
{{--                                                        <i class="icons fa fa-eye"></i>--}}
{{--                                                        <span class="text number">234</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="#" class="link">--}}
{{--                                                        <i class="icons fa fa-heart"></i>--}}
{{--                                                        <span class="text number">234</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="#" class="link">--}}
{{--                                                        <i class="icons fa fa-comment"></i>--}}
{{--                                                        <span class="text number">234</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                            <div class="content">--}}
{{--                                                <div class="title">--}}
{{--                                                    <div class="price">--}}
{{--                                                        <sup>$</sup>--}}
{{--                                                        <span class="number">350</span>--}}
{{--                                                    </div>--}}
{{--                                                    <p class="for-price">3 days 2 nights</p>--}}
{{--                                                </div>--}}
{{--                                                <p class="text">Lorem ipsum dolor sit amet, consectetur elit. Nulla rhoncus ultrices purus, volutpat.</p>--}}
{{--                                                <div class="group-btn-tours">--}}
{{--                                                    <a href="tour-view.html" class="left-btn">book now</a>--}}
{{--                                                    <a href="blog.html" class="right-btn">add to list</a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                    <div class="col-md-4">
                                        <div class="content-wrapper tours-layout" style="background-image: url('{{url('assets/images/tour1.jpg')}}');background-repeat: no-repeat;
                                            background-size: cover;background-position: 50%">
                                            <div class="content overlay">
                                                <div class="text">
                                                    <div class="top">
                                                        <ul style="list-style: none">
                                                            <li><span>1 day</span></li>
                                                        </ul>
                                                    </div>
                                                    <div class="bottom">
                                                        <span>Name</span>
                                                        <h5><span>price</span></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div><div class="col-md-4">
                                        <div class="content-wrapper tours-layout" style="background-image: url('{{url('assets/images/tour1.jpg')}}');background-repeat: no-repeat;
                                            background-size: cover;background-position: 50%">
                                            <div class="content overlay">
                                                <div class="text">
                                                    <div class="top">
                                                        <ul style="list-style: none">
                                                            <li><span>1 day</span></li>
                                                        </ul>
                                                    </div>
                                                    <div class="bottom">
                                                        <span>Name</span>
                                                        <h5><span>price</span></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div><div class="col-md-4">
                                        <div class="content-wrapper tours-layout" style="background-image: url('{{url('assets/images/tour1.jpg')}}');background-repeat: no-repeat;
                                            background-size: cover;background-position: 50%">
                                            <div class="content overlay">
                                                <div class="text">
                                                    <div class="top">
                                                        <ul style="list-style: none">
                                                            <li><span>1 day</span></li>
                                                        </ul>
                                                    </div>
                                                    <div class="bottom">
                                                        <span>Name</span>
                                                        <h5><span>price</span></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div><div class="col-md-4">
                                        <div class="content-wrapper tours-layout" style="background-image: url('{{url('assets/images/tour1.jpg')}}');background-repeat: no-repeat;
                                            background-size: cover;background-position: 50%">
                                            <div class="content overlay">
                                                <div class="text">
                                                    <div class="top">
                                                        <ul style="list-style: none">
                                                            <li><span>1 day</span></li>
                                                        </ul>
                                                    </div>
                                                    <div class="bottom">
                                                        <span>Name</span>
                                                        <h5><span>price</span></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div><div class="col-md-4">
                                        <div class="content-wrapper tours-layout" style="background-image: url('{{url('assets/images/tour1.jpg')}}');background-repeat: no-repeat;
                                            background-size: cover;background-position: 50%">
                                            <div class="content overlay">
                                                <div class="text">
                                                    <div class="top">
                                                        <ul style="list-style: none">
                                                            <li><span>1 day</span></li>
                                                        </ul>
                                                    </div>
                                                    <div class="bottom">
                                                        <span>Name</span>
                                                        <h5><span>price</span></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="content-wrapper tours-layout" style="background-image: url('{{url('assets/images/tour1.jpg')}}');background-repeat: no-repeat;
                                            background-size: cover;background-position: 50%">
                                            <div class="content overlay">
                                                <div class="text">
                                                    <div class="top">
                                                        <ul style="list-style: none">
                                                            <li><span>1 day</span></li>
                                                        </ul>
                                                    </div>
                                                    <div class="bottom">
                                                        <span>Name</span>
                                                        <h5><span>price</span></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
{{--                <section class="videos layout-1">--}}
{{--                    <div class="container">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-md-5">--}}
{{--                                <div class="video-wrapper padding-top padding-bottom">--}}
{{--                                    <h5 class="sub-title">it’s a--}}
{{--                                        <strong>big world</strong> out there</h5>--}}
{{--                                    <h2 class="title">go explore</h2>--}}
{{--                                    <div class="text">There are many variations of passages of. Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look.</div>--}}
{{--                                    <a href="tour-result.html"--}}
{{--                                       class="btn btn-maincolor">read more</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-7">--}}
{{--                                <div class="video-thumbnail">--}}
{{--                                    <div class="video-bg">--}}
{{--                                        <img src="assets/images/homepage/video-bg.jpg" alt="" class="img-responsive">--}}
{{--                                    </div>--}}
{{--                                    <div class="video-button-play">--}}
{{--                                        <i class="icons fa fa-play"></i>--}}
{{--                                    </div>--}}
{{--                                    <div class="video-button-close"></div>--}}
{{--                                    <iframe src="https://www.youtube.com/embed/moOosWuoDyA?rel=0" allowfullscreen="allowfullscreen" class="video-embed"></iframe>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </section>--}}
                <section class="hotels padding-top padding-bottom">
                    <div class="container">
                        <div class="hotels-wrapper">
                            <div class="group-title">
{{--                                <div class="sub-title">--}}
{{--                                    <p class="text">GUARANTEED QUALITY</p>--}}
{{--                                    <i class="icons flaticon-people"></i>--}}
{{--                                </div>--}}
                                <h2 class="main-title">Trips in Popular Cities</h2>
                                <div class="right">
                                    <strong>SEE ALL</strong>
                                    <span class="slick-nav">
                                        <a class="next-arrow"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                                    </span>
                                </div>
                            </div>
                            <div class="hotels-content margin-top70">
                                <div class="row hotels-list">
                                    <div class="col-lg-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="block fw hh" style="background-image: url('{{url('assets/images/tour1.jpg')}}');background-repeat: no-repeat;
                                                    background-size: cover;background-position: 50%">
                                                    <div class="popular-city">
                                                        <div class="popular-city-text">name 1</div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="block hw hh" style="background-image: url('{{url('assets/images/tour1.jpg')}}');background-repeat: no-repeat;
                                                    background-size: cover;background-position: 50%">
                                                    <div class="popular-city">
                                                        <div class="popular-city-text">name 1</div>
                                                    </div>
                                                </div>
                                                <div class="block hw hh" style="background-image: url('{{url('assets/images/tour1.jpg')}}');background-repeat: no-repeat;
                                                    background-size: cover;background-position: 50%">
                                                    <div class="popular-city">
                                                        <div class="popular-city-text">name 1</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="block hw fh" style="background-image: url('{{url('assets/images/tour1.jpg')}}');background-repeat: no-repeat;
                                                    background-size: cover;background-position: 50%">
                                                    <div class="popular-city">
                                                        <div class="popular-city-text">name 1</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="block fw fh" style="background-image: url('{{url('assets/images/tour1.jpg')}}');background-repeat: no-repeat;
                                                    background-size: cover;background-position: 50%">
                                                    <div class="popular-city">
                                                        <div class="popular-city-text">name 1</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="block fw hh" style="background-image: url('{{url('assets/images/tour1.jpg')}}');background-repeat: no-repeat;
                                                    background-size: cover;background-position: 50%">
                                                    <div class="popular-city">
                                                        <div class="popular-city-text">name 1</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="block fw hh" style="background-image: url('{{url('assets/images/tour1.jpg')}}');background-repeat: no-repeat;
                                                    background-size: cover;background-position: 50%">
                                                    <div class="popular-city">
                                                        <div class="popular-city-text">name 1</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="block fw hh" style="background-image: url('{{url('assets/images/tour1.jpg')}}');background-repeat: no-repeat;
                                                    background-size: cover;background-position: 50%">
                                                    <div class="popular-city">
                                                        <div class="popular-city-text">name 1</div>
                                                    </div>
                                                </div>
                                                <div class="block fw hh" style="background-image: url('{{url('assets/images/tour1.jpg')}}');background-repeat: no-repeat;
                                                    background-size: cover;background-position: 50%">
                                                    <div class="popular-city">
                                                        <div class="popular-city-text">name 1</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="block fw fh" style="background-image: url('{{url('assets/images/tour1.jpg')}}');background-repeat: no-repeat;
                                                    background-size: cover;background-position: 50%">
                                                    <div class="popular-city">
                                                        <div class="popular-city-text">name 1</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="block fw hh" style="background-image: url('{{url('assets/images/tour1.jpg')}}');background-repeat: no-repeat;
                                                    background-size: cover;background-position: 50%">
                                                    <div class="popular-city">
                                                        <div class="popular-city-text">name 1</div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="travelers">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="traveler-wrapper padding-top padding-bottom">
                                    <div class="group-title white">
                                        <div class="sub-title">
                                            <p class="text">RELAX AND ENJOY</p>
                                            <i class="icons flaticon-people"></i>
                                        </div>
                                        <h2 class="main-title">our happy clients</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="traveler-list slick-slider-added">
                                    <div class="traveler">
                                        <div class="cover-image">
                                            <img src="assets/images/homepage/cover-image-1.jpg" alt="">
                                        </div>
                                        <div class="wrapper-content">
                                            <div class="avatar">
                                                <img src="assets/images/homepage/avatar-1.jpg" alt="" class="img-responsive">
                                            </div>
                                            <p class="name">Sandara park</p>
                                            <p class="address">roma, italy</p>
                                            <p class="description">" There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form."</p>
                                        </div>
                                    </div>
                                    <div class="traveler">
                                        <div class="cover-image">
                                            <img src="assets/images/homepage/cover-image-2.jpg" alt="">
                                        </div>
                                        <div class="wrapper-content">
                                            <div class="avatar">
                                                <img src="assets/images/homepage/avatar-2.jpg" alt="" class="img-responsive">
                                            </div>
                                            <p class="name">Kown Jiyong</p>
                                            <p class="address">london, England</p>
                                            <p class="description">" There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form."</p>
                                        </div>
                                    </div>
                                    <div class="traveler">
                                        <div class="cover-image">
                                            <img src="assets/images/homepage/cover-image-3.jpg" alt="">
                                        </div>
                                        <div class="wrapper-content">
                                            <div class="avatar">
                                                <img src="assets/images/homepage/avatar-3.jpg" alt="" class="img-responsive">
                                            </div>
                                            <p class="name">taylor rose</p>
                                            <p class="address">pari, France</p>
                                            <p class="description">" There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form."</p>
                                        </div>
                                    </div>
                                    <div class="traveler">
                                        <div class="cover-image">
                                            <img src="assets/images/homepage/cover-image-4.jpg" alt="">
                                        </div>
                                        <div class="wrapper-content">
                                            <div class="avatar">
                                                <img src="assets/images/homepage/avatar-4.jpg" alt="" class="img-responsive">
                                            </div>
                                            <p class="name">john smith</p>
                                            <p class="address">new york, USA</p>
                                            <p class="description">" There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form."</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="a-fact padding-top padding-bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="group-title">
                                    <div class="sub-title">
                                        <p class="text">PROUD NUMBERS</p>
                                        <i class="icons flaticon-people"></i>
                                    </div>
                                    <h2 class="main-title">a fact of Travel Architect</h2>
                                </div>
                                <div class="a-fact-wrapper">
                                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, by injected humour. </p>
                                    <div class="a-fact-list">
                                        <ul class="list-unstyled">
                                            <li>
                                                <p class="text">1456 flight in the world.</p>
                                            </li>
                                            <li>
                                                <p class="text">2385 happy customer enjoy jouneys with Explooer.</p>
                                            </li>
                                            <li>
                                                <p class="text">356 best destinational we explore.</p>
                                            </li>
                                            <li>
                                                <p class="text">2345 package tours every year.</p>
                                            </li>
                                            <li>
                                                <p class="text">top 10 best tourism services.</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <a href="#" class="btn btn-maincolor">read more</a>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="a-fact-image-wrapper">
                                    <div class="a-fact-image">
                                        <a href="#" class="icons icons-1">
                                            <i class="fa fa-plane"></i>
                                        </a>
                                        <img src="{{url('public/newtheme/assets/images/homepage/area-1.png')}}" alt="" class="img-responsive">
                                    </div>
                                    <div class="a-fact-image">
                                        <a href="#" class="icons icons-2">
                                            <i class="fa fa-map-marker"></i>
                                        </a>
                                        <img src="{{url('public/newtheme/assets/images/homepage/area-2.png')}}" alt="" class="img-responsive">
                                    </div>
                                    <div class="a-fact-image">
                                        <a href="#" class="icons icons-3">
                                            <i class="fa fa-users"></i>
                                        </a>
                                        <img src="{{url('public/newtheme/assets/images/homepage/area-3.png')}}" alt="" class="img-responsive">
                                    </div>
                                    <div class="a-fact-image">
                                        <a href="#" class="icons icons-4">
                                            <i class="fa fa-suitcase"></i>
                                        </a>
                                        <img src="{{url('public/newtheme/assets/images/homepage/area-4.png')}}" alt="" class="img-responsive">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="contact style-1">
                    <div class="container">
                        <div class="row">
                            <div class="wrapper-contact-style">
                                <div data-wow-delay="0.5s" class="contact-wrapper-images wow fadeInLeft">
                                    <img src="{{url('public/newtheme/assets/images/homepage/contact-people.png')}}" alt="" class="img-responsive">
                                </div>
                                <div class="col-lg-6 col-sm-7 col-lg-offset-4 col-sm-offset-5">
                                    <div data-wow-delay="0.4s" class="contact-wrapper padding-top padding-bottom wow fadeInRight">
                                        <div class="contact-box">
                                            <h5 class="title">contact us</h5>
                                            <p class="text">Just pack and go! Let leave your travel plan to travel experts!</p>
                                            <form class="contact-form">
                                                <input type="text" placeholder="Your Name" class="form-control form-input">
                                                <!--label.control-label.form-label.warning-label(for="") Warning for the above !-->
                                                <input type="email" placeholder="Your Email" class="form-control form-input">
                                                <!--label.control-label.form-label.warning-label(for="") Warning for the above !-->
                                                <textarea placeholder="Your Message" class="form-control form-input"></textarea>
                                                <div class="contact-submit">
                                                    <button type="submit" data-hover="SEND NOW" class="btn btn-slide">
                                                        <span class="text">send message</span>
                                                        <span class="icons fa fa-long-arrow-right"></span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- BUTTON BACK TO TOP-->
            <div id="back-top">
                <a href="#top" class="link">
                    <i class="fa fa-angle-double-up"></i>
                </a>
            </div>
        </div>
        <!-- FOOTER-->
        <footer>
            <div class="footer-main padding-top padding-bottom">
                <div class="container">
                    <div class="footer-main-wrapper">
                        <a href="index-2.html" class="logo-footer">
                            <img src="{{url('public/newtheme/assets/images/logo/logo-white-color-1.png')}}" alt="" class="img-responsive" />
                        </a>
                        <div class="row">
                            <div class="col-2">
                                <div class="col-md-3 col-xs-5">
                                    <div class="contact-us-widget widget">
                                        <div class="title-widget">contact us</div>
                                        <div class="content-widget">
                                            <div class="info-list">
                                                <ul class="list-unstyled">
                                                    <li>
                                                        <i class="icons fa fa-map-marker"></i>
                                                        <a href="#" class="link">Navana Cordelia, Road:17, House: 61 (Level: 3), Block: C, Banani, Dhaka, Bangladesh</a>
                                                    </li>
                                                    <li>
                                                        <i class="icons fa fa-phone"></i>
                                                        <a href="#" class="link">+880 1730-206887</a>
                                                    </li>
                                                    <li>
                                                        <i class="icons fa fa-envelope-o"></i>
                                                        <a href="#" class="link">travelarchitectbd@gmail.com</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="form-email">
                                                <p class="text">Sign up for our mailing list to get latest updates and offers.</p>
                                                <form action="http://swlabs.co/exploore/index.html">
                                                    <div class="input-group">
                                                        <input type="text" placeholder="Email address" class="form-control form-email-widget" />
                                                        <span class="input-group-btn">
                                                                    <button type="submit" class="btn-email">&#10004;</button>
                                                                </span>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-xs-3">
                                    <div class="booking-widget widget text-center">
                                        <div class="title-widget">book now</div>
                                        <div class="content-widget">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <a href="#" class="link">Flights</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="link">Holiday</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="link">Tours</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-xs-4">
                                    <div class="top-deals-widget widget">
                                        <div class="title-widget">HELP</div>
                                        <div class="content-widget">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <a href="#" class="link">FAQ</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="link">Support Center</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="link">Privacy Policy</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="link">Discount FAQ</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="link">Payment Security</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="link">EMI</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-2">
                                <div class="col-md-2 col-xs-6">
                                    <div class="explore-widget widget">
                                        <div class="title-widget">TERMS & CONDITION</div>
                                        <div class="content-widget">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <a href="#" class="link">General Terms & Conditions</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-xs-6">
                                    <div class="explore-widget widget">
                                        <div class="title-widget">Company</div>
                                        <div class="content-widget">
                                            <ul class="list-unstyled list-inline">
                                                <li>
                                                    <a href="#" class="link">About Us</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hyperlink">
                <div class="container">
                    <div class="slide-logo-wrapper">
                        <div class="logo-item">
                            <a href="#" class="link">
                                <img src="assets/images/footer/logo-01.png" alt="" class="img-responsive" />
                            </a>
                        </div>
                        <div class="logo-item">
                            <a href="#" class="link">
                                <img src="assets/images/footer/logo-02.png" alt="" class="img-responsive" />
                            </a>
                        </div>
                        <div class="logo-item">
                            <a href="#" class="link">
                                <img src="assets/images/footer/logo-03.png" alt="" class="img-responsive" />
                            </a>
                        </div>
                        <div class="logo-item">
                            <a href="#" class="link">
                                <img src="assets/images/footer/logo-04.png" alt="" class="img-responsive" />
                            </a>
                        </div>
                        <div class="logo-item">
                            <a href="#" class="link">
                                <img src="assets/images/footer/logo-05.png" alt="" class="img-responsive" />
                            </a>
                        </div>
                        <div class="logo-item">
                            <a href="#" class="link">
                                <img src="assets/images/footer/logo-06.png" alt="" class="img-responsive" />
                            </a>
                        </div>
                        <div class="logo-item">
                            <a href="#" class="link">
                                <img src="assets/images/footer/logo-01.png" alt="" class="img-responsive" />
                            </a>
                        </div>
                        <div class="logo-item">
                            <a href="#" class="link">
                                <img src="assets/images/footer/logo-02.png" alt="" class="img-responsive" />
                            </a>
                        </div>
                        <div class="logo-item">
                            <a href="#" class="link">
                                <img src="assets/images/footer/logo-03.png" alt="" class="img-responsive" />
                            </a>
                        </div>
                        <div class="logo-item">
                            <a href="#" class="link">
                                <img src="assets/images/footer/logo-04.png" alt="" class="img-responsive" />
                            </a>
                        </div>
                        <div class="logo-item">
                            <a href="#" class="link">
                                <img src="assets/images/footer/logo-05.png" alt="" class="img-responsive" />
                            </a>
                        </div>
                        <div class="logo-item">
                            <a href="#" class="link">
                                <img src="assets/images/footer/logo-06.png" alt="" class="img-responsive" />
                            </a>
                        </div>
                    </div>
                    <div class="social-footer">
                        <ul class="list-inline list-unstyled">
                            <li>
                                <a href="#" class="link facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="link twitter">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="link pinterest">
                                    <i class="fa fa-pinterest-p"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="link google">
                                    <i class="fa fa-google"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="name-company">&copy; Designed by Travel Architect.</div>
                </div>
            </div>
        </footer>
    </div>
</div>

<!-- LIBRARY JS-->
<script src="{{url('public/newtheme/assets/libs/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{url('public/newtheme/assets/libs/detect-browser/browser.js')}}"></script>
<script src="{{url('public/newtheme/assets/libs/smooth-scroll/jquery-smoothscroll.js')}}"></script>
<script src="{{url('public/newtheme/assets/libs/wow-js/wow.min.js')}}"></script>
<script src="{{url('public/newtheme/assets/libs/slick-slider/slick.min.js')}}"></script>
<script src="{{url('public/newtheme/assets/libs/selectbox/js/jquery.selectbox-0.2.js')}}"></script>
<script src="{{url('public/newtheme/assets/libs/please-wait/please-wait.min.js')}}"></script>
<script src="{{url('public/newtheme/assets/libs/fancybox/js/jquery.fancybox.js')}}"></script>
<script src="{{url('public/newtheme/assets/libs/fancybox/js/jquery.fancybox-buttons.js')}}"></script>
<script src="{{url('public/newtheme/assets/libs/fancybox/js/jquery.fancybox-thumbs.js')}}"></script>
<!--script(src="assets/libs/parallax/jquery.data-parallax.min.js")-->
<!-- MAIN JS-->
<script src="{{url('public/newtheme/assets/js/main.js')}}"></script>
<!-- LOADING JS FOR PAGE-->
<script src="{{url('public/newtheme/assets/js/pages/home-page.js')}}"></script>
<script src="{{url('public/newtheme/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script>

    var slick = $(".slick-slider-added");

    slick.each(function() {
        if ($(this).is(".tours-list")) {
            $(this).slick({
                dots: true,
                infinite: true,
                speed: 300,
                slidesToShow: 3,
                slidesToScroll: 3,
                autoPlay: true,
                prevArrow: $('.prev-arrow'),
                nextArrow: $('.next-arrow'),
                arrows: true,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        }
        else if ($(this).is(".traveler-list")){
            $(this).slick({
                dots: false,
                infinite: true,
                slidesToShow: 2
            });
        }
    });

    window.loading_screen = window.pleaseWait(
        {
            logo: logo_str,
            backgroundColor: '#fff',
            loadingHtml: "<div class='spinner sk-spinner-wave'><div class='rect1'></div><div class='rect2'></div><div class='rect3'></div><div class='rect4'></div><div class='rect5'></div></div>",
        });
</script>
</body>

</html>
