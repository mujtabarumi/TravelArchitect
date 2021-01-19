@extends('new_theme.layout.main')
@push('styles')

@endpush
@section('new_theme_content')

@endsection

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
                            {{--                                    <span class="slick-nav">--}}
                            {{--                                        <a class="next-arrow"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>--}}
                            {{--                                    </span>--}}
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

        {{--                <section class="a-fact padding-top padding-bottom">--}}
        {{--                    <div class="container">--}}
        {{--                        <div class="row">--}}
        {{--                            <div class="col-md-5">--}}
        {{--                                <div class="group-title">--}}
        {{--                                    <div class="sub-title">--}}
        {{--                                        <p class="text">PROUD NUMBERS</p>--}}
        {{--                                        <i class="icons flaticon-people"></i>--}}
        {{--                                    </div>--}}
        {{--                                    <h2 class="main-title">a fact of Travel Architect</h2>--}}
        {{--                                </div>--}}
        {{--                                <div class="a-fact-wrapper">--}}
        {{--                                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, by injected humour. </p>--}}
        {{--                                    <div class="a-fact-list">--}}
        {{--                                        <ul class="list-unstyled">--}}
        {{--                                            <li>--}}
        {{--                                                <p class="text">1456 flight in the world.</p>--}}
        {{--                                            </li>--}}
        {{--                                            <li>--}}
        {{--                                                <p class="text">2385 happy customer enjoy jouneys with Explooer.</p>--}}
        {{--                                            </li>--}}
        {{--                                            <li>--}}
        {{--                                                <p class="text">356 best destinational we explore.</p>--}}
        {{--                                            </li>--}}
        {{--                                            <li>--}}
        {{--                                                <p class="text">2345 package tours every year.</p>--}}
        {{--                                            </li>--}}
        {{--                                            <li>--}}
        {{--                                                <p class="text">top 10 best tourism services.</p>--}}
        {{--                                            </li>--}}
        {{--                                        </ul>--}}
        {{--                                    </div>--}}
        {{--                                    <a href="#" class="btn btn-maincolor">read more</a>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                            <div class="col-md-7">--}}
        {{--                                <div class="a-fact-image-wrapper">--}}
        {{--                                    <div class="a-fact-image">--}}
        {{--                                        <a href="#" class="icons icons-1">--}}
        {{--                                            <i class="fa fa-plane"></i>--}}
        {{--                                        </a>--}}
        {{--                                        <img src="{{url('public/newtheme/assets/images/homepage/area-1.png')}}" alt="" class="img-responsive">--}}
        {{--                                    </div>--}}
        {{--                                    <div class="a-fact-image">--}}
        {{--                                        <a href="#" class="icons icons-2">--}}
        {{--                                            <i class="fa fa-map-marker"></i>--}}
        {{--                                        </a>--}}
        {{--                                        <img src="{{url('public/newtheme/assets/images/homepage/area-2.png')}}" alt="" class="img-responsive">--}}
        {{--                                    </div>--}}
        {{--                                    <div class="a-fact-image">--}}
        {{--                                        <a href="#" class="icons icons-3">--}}
        {{--                                            <i class="fa fa-users"></i>--}}
        {{--                                        </a>--}}
        {{--                                        <img src="{{url('public/newtheme/assets/images/homepage/area-3.png')}}" alt="" class="img-responsive">--}}
        {{--                                    </div>--}}
        {{--                                    <div class="a-fact-image">--}}
        {{--                                        <a href="#" class="icons icons-4">--}}
        {{--                                            <i class="fa fa-suitcase"></i>--}}
        {{--                                        </a>--}}
        {{--                                        <img src="{{url('public/newtheme/assets/images/homepage/area-4.png')}}" alt="" class="img-responsive">--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </section>--}}
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


@push('scripts')
    <script>

    </script>
@endpush
