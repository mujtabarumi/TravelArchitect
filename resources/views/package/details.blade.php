@extends('layout.main')
@push('styles')
    <style>
        .carousel-inner {
            max-height: 500px !important;
        }
        .package-detail-nav li {
            margin-bottom: 5px!important;
        }

        .shot-overlay .form-control {
            background-color: transparent;
            border: 1px solid #BEC4C8;
            border-radius: 0;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
            /* color: #07253F; */
            color: #fff;
            display: block;
            font-size: 15px;
            height: 40px;
            line-height: 1.42857;
            padding: 6px 12px;
            transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
            width: 100%;
        }

    </style>
@endpush
@section('content')
    @php
        $package_meta = json_decode($package->meta);
        $package_places = data_get($package_meta,'places',[]);

        $cover_image = $package->getMedia('cover_photo')->first();
        $p_pImage = $package->getMedia('slider_images');
        $slider1  = $p_pImage->where('order_column', 1)->first();
        $slider2  = $p_pImage->where('order_column', 2)->first();
        $slider3  = $p_pImage->where('order_column', 3)->first();
        $slider4  = $p_pImage->where('order_column', 4)->first();

        use App\Models\City;
        use App\Models\State;
        $inclutions = json_decode(data_get($package, 'inclusion'));
        $exclutions = json_decode(data_get($package, 'exclusion'));
        $additional_info = data_get($package, 'additional_info');
        $terms_and_conditions = data_get($package, 'terms_and_conditions');
        $itineraries = data_get($package,'itineraries',[]);
        $package_themes = json_decode(data_get($package,'theme_map',[]));
        $departureFrom = data_get($package,'departure_from');

        $package_costs = data_get($package_meta,'package_cost',[]);

    @endphp

    <!-- START: PAGE TITLE -->
    <div style="background-size: contain;background-repeat: no-repeat;background-image: @if($cover_image) url('{{url('admin'."/".$cover_image->getUrl())}}') @else url('{{url('assets/images/bg-image16.jpg')}}') @endif;" class="row page-title">
        <div class="container clear-padding text-center">
            <h3>{{strtoupper($package->title)}}</h3>
            <h4>{{$package->duration}}</h4>
            @if (!blank($package_places))
                <span>
                    @foreach($package_places as $p_p)

                        @if($loop->last)
                            {{$p_p}}
                        @else
                            {{$p_p}} <i class="fa fa-long-arrow-right"></i>
                        @endif
                    @endforeach
                </span>
            @endif

        </div>
    </div>
    <!-- END: PAGE TITLE -->

    <div class="row package-detail">
        <div class="container clear-padding">
            <div class="main-content col-md-8">
                <!-- START: HOLIDAY GALLERY -->
                <div id="gallery" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#gallery" data-slide-to="0" class="active"></li>
                        <li data-target="#gallery" data-slide-to="1"></li>
                        <li data-target="#gallery" data-slide-to="2"></li>
                        <li data-target="#gallery" data-slide-to="3"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">

                        <div class="item active">
                            <img style="height: 500px;width: 100%;opacity: 1;object-fit: cover;" src="@if($slider1) {{url('admin'."/".$slider1->getUrl())}} @else {{url('/assets/images/holiday-slide4.jpg')}} @endif" alt="{{$package->title}} Slider-1">
                        </div>
                        <div class="item">
                            <img style="height: 500px;width: 100%;opacity: 1;object-fit: cover;" src="@if($slider2) {{url('admin'."/".$slider2->getUrl())}} @else {{url('/assets/images/holiday-slide4.jpg')}} @endif" alt="{{$package->title}} Slider-2">
                        </div>
                        <div class="item">
                            <img style="height: 500px;width: 100%;opacity: 1;object-fit: cover;" src="@if($slider3) {{url('admin'."/".$slider3->getUrl())}} @else {{url('/assets/images/holiday-slide4.jpg')}} @endif" alt="{{$package->title}} Slider-3">
                        </div>
                        <div class="item">
                            <img style="height: 500px;width: 100%;opacity: 1;object-fit: cover;" src="@if($slider4) {{url('admin'."/".$slider3->getUrl())}} @else {{url('/assets/images/holiday-slide4.jpg')}} @endif" alt="{{$package->title}} Slider-4">
                        </div>


                    </div>
                    <a class="left carousel-control" href="#gallery" role="button" data-slide="prev">
                        <span class="fa fa-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#gallery" role="button" data-slide="next">
                        <span class="fa fa-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

            <!-- END: HOLIDAY GALLRY -->
                <div class="package-complete-detail">
                    <ul class="nav nav-tabs package-detail-nav">
                        <li><a data-toggle="tab" href="#overview"><i class="fa fa-suitcase"></i> <span>Detail</span></a></li>
                        <li><a data-toggle="tab" href="#inclusion"><i class="fa fa-check-square"></i> <span>Inclusion / Exclusion</span></a></li>
                        <li class="active"><a data-toggle="tab" href="#itinerary"><i class="fa fa-street-view"></i> <span>Itinerary</span></a></li>
                        <li><a data-toggle="tab" href="#add-info"><i class="fa fa-info-circle"></i> <span>Additional Info</span></a></li>
                        <li><a data-toggle="tab" href="#terms_and_conditons"><i class="fa fa-info-circle"></i> <span>Terms and Conditions</span></a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="overview" class="tab-pane fade">
                            <h4 class="tab-heading">Overview</h4>
                            <p>
                                {!! $package->details !!}
                            </p>
                        </div>
                        <div id="inclusion" class="tab-pane fade">
                            <h4 class="tab-heading">Inclusion</h4>

                            <p class="inc">
                                @if(!blank($inclutions))
                                    @foreach($inclutions as $inc)
                                        <i class="fa fa-check-circle"></i>{{$inc}}<br>
                                    @endforeach
                                @endif

                            </p>
                            <h4 class="tab-heading">Exclusion</h4>
                            <p class="inc">
                                @if(!blank($exclutions))

                                    @foreach($exclutions as $exc)
                                        <i class="fa fa-check-circle"></i>{{$exc}}<br>
                                    @endforeach

                                @endif

                            </p>
                        </div>
                        <div id="itinerary" class="tab-pane fade in active">
                            <h4 class="tab-heading">Package Itinerary</h4>
                            @foreach($itineraries as $iti)

                                <div class="daily-schedule">
                                    <div class="title">
                                        <p><span>{{$iti->title}}</span></p>
                                    </div>
                                    <div class="daily-schedule-body">

                                        <div class="col-md-12 col-sm-12">
                                            {!! $iti->details !!}
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-12 activity">
                                            <h4>Included</h4>
                                            @foreach($iti->itineraryIncludes as $include)
                                                <div class="col-md-6 col-sm-6">
                                                    <p><i class="fa fa-check-square"></i> {{$include->text}}</p>
                                                </div>
                                            @endforeach
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <div id="add-info" class="tab-pane fade">
                            <h4 class="tab-heading">Additional Info</h4>

                            <p>
                                {!! $additional_info !!}
                            </p>

                            {{--                            <p class="inc">--}}
                            {{--                                @foreach($inclutions as $inc)--}}
                            {{--                                    <i class="fa fa-check-circle"></i>{{$inc}}<br>--}}
                            {{--                                @endforeach--}}

                            {{--                            </p>--}}
                            {{--                            <h4 class="tab-heading">Exclusion</h4>--}}
                            {{--                            <p class="inc">--}}
                            {{--                                @foreach($exclutions as $exc)--}}
                            {{--                                    <i class="fa fa-check-circle"></i>{{$exc}}<br>--}}
                            {{--                                @endforeach--}}

                            {{--                            </p>--}}
                        </div>

                        <div id="terms_and_conditons" class="tab-pane fade">

                            <h4 class="tab-heading">Terms and Conditions</h4>
                            <p>
                                {!! $terms_and_conditions !!}
                            </p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 package-detail-sidebar">
                <div class="col-md-12 sidebar-wrapper clear-padding">
                    <div class="package-summary sidebar-item">
                        <h4><i class="fa fa-bookmark"></i> Package Summary</h4>
                        <div class="package-summary-body">
                            <h5><i class="fa fa-heart"></i>Theme</h5>
                            <p>
                                @foreach($package_themes as $p_t)

                                    @if(!$loop->last)
                                        {{$p_t}} ,
                                    @else
                                        {{$p_t}}
                                    @endif
                                @endforeach
                            </p>

                            @if(!blank($departureFrom))
                                <h5><i class="fa fa-map-marker"></i>Departure From</h5>
                                {{$departureFrom}}
                            @endif

                            <h5><i class="fa fa-globe"></i>Itinerary</h5>
                            <p>
                                @foreach($itineraries as $iti)
                                    @if(!$loop->last)
                                        {{$iti->title}},
                                    @else
                                        {{ $iti->title }}
                                    @endif

                                @endforeach
                            </p>
                        </div>
                        <div class="package-summary-footer text-center">
                            <div class="col-md-12 col-sm-12 col-xs-12 price">
                                @if (!blank($package_costs))
                                    @foreach($package_costs as $pa)
                                        @if($loop->first)
                                            <h5>Starting From</h5>
                                            <h5>BDT {{$pa->cost}}/{{$pa->person}} Person</h5>
                                        @endif
                                    @endforeach
                                @else
                                    <h5>Package Price</h5>
                                    <h5>BDT {{$package->budget}}</h5>
                                @endif

                            </div>
{{--                            <div class="col-md-6 col-sm-6 col-xs-6 book">--}}
{{--                                <a href="{{route('coming-soon')}}">BOOK NOW</a>--}}
{{--                            </div>--}}
                        </div>
                    </div>

                    <!-- show offer !-->
                    @php
                      //dd($package->offers);
                      $allOffers = [];
                      $allOffers = $package->offers;

                    @endphp
                    @if(!blank($allOffers))
                        @foreach($allOffers as $aO)
                    <div class="package-summary sidebar-item">
                        <h4><i class="fa fa-bookmark"></i> Package Offer</h4>
                        <div class="package-summary-body">
                            <h5 style="font-weight: bold;text-align: center">Departure Time: {{$aO->departure_time}}</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Valid From</h5>
                                    {{Carbon\Carbon::parse($aO->valid_from)->format('Y-m-d')}}
                                </div>
                                <div class="col-md-6">
                                    <h5>Valid Till</h5>
                                    {{Carbon\Carbon::parse($aO->valid_till)->format('Y-m-d')}}
                                </div>
                            </div>
                            @php
                                $roomCost = $aO->hotel_room_cost_info;
                           // dd($roomCost);
                            @endphp
                            @if(!blank($roomCost))

                            <div class="row">

                                @foreach($roomCost as $key=>$value)
                                    @if($key == 'single')
                                        <div class="col-md-6">
                                            <h5>per perosn Single</h5>
                                            BDT {{$value}}
                                        </div>
                                    @elseif($key == 'double')
                                        <div class="col-md-6">
                                            <h5>per perosn Double</h5>
                                            BDT {{$value}}
                                        </div>
                                    @elseif($key == 'twin')
                                        <div class="col-md-6">
                                            <h5>per perosn Twin</h5>
                                            BDT {{$value}}
                                        </div>
                                    @elseif($key == 'triple')
                                        <div class="col-md-6">
                                            <h5>per perosn Triple</h5>
                                            BDT {{$value}}
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            @endif


                        </div>
                        <div class="package-summary-footer text-center">
                            <div class="col-md-6 col-sm-6 col-xs-6 price">

                                    <h5>Departs</h5>
                                    <h5>{{$aO->departure_date}}</h5>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 book">
                                <a href="#" data-offer-id="{{$aO->id}}" data-package-id="{{$aO->package_id}}" class="book-offer" id="">BOOK NOW</a>
                            </div>
                        </div>
                    </div>
                        @endforeach
                    @endif


                    <div class="shot-overlay" style="display:none;">
                        <a href="#" id="close-box" class="close-overlay">Close</a>
                        <div class="close-outside" style="display:none;"></div>
                        <div class="overlay-content" style="background-color: #FFDE59">
                            <div class="main-content">
                                <form action="{{route('package.booking')}}" method="post">
                                    @csrf
                                            <input type="hidden" readonly required value="{{$package->id}}" id="package_id" name="package_id">
                                            <input type="hidden" readonly required value="" id="offer_id" name="offer_id">

                                            <div class="row">
                                                <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                                    <label>Start</label>
                                                    <div class="input-group margin-bottom-sm">
                                                        <input type="text" required id="check_in" autocomplete="off" name="departure_date" class="form-control" placeholder="DD/MM/YYYY">
                                                        <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                                    <label>Duration</label>
                                                    <select class="selectpicker" name="duration">
                                                        <option value="3">3 Days</option>
                                                        <option value="5">5 Days</option>
                                                        <option value="7">1 Week</option>
                                                        <option value="10">10 Days</option>
                                                        <option value="14">2 Week</option>
                                                        <option value="21">3 Week</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                    <label>Travel By</label>
                                                    <select class="selectpicker" name="travel_by">
                                                        <option>BUS</option>
                                                        <option>TRAIN</option>
                                                        <option selected>AIRPLANE</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                                    <label>Adult</label>
                                                    <select class="selectpicker" name="meta[person][adult]">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                        <option>6</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                                    <label>Child</label>
                                                    <select class="selectpicker" name="meta[person][child]">
                                                        <option>0</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                        <option>6</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                                    <label>Single Room</label>
                                                    <select class="selectpicker" name="meta[rooms][single_room]">
                                                        <option>0</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                        <option>6</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                                    <label>Double Room</label>
                                                    <select class="selectpicker" name="meta[rooms][double_room]">
                                                        <option>0</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                        <option>6</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                                    <label>Twin Room</label>
                                                    <select class="selectpicker" name="meta[rooms][twin_room]">
                                                        <option>0</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                        <option>6</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                                    <label>Tripple Room</label>
                                                    <select class="selectpicker" name="meta[rooms][tripple_room]">
                                                        <option>0</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                        <option>6</option>
                                                    </select>
                                                </div>
                                            </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <button onclick="return confirm('Are you sure you want to submit this request?')" style="float: right" class="btn btn-success" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

{{--                    <div class="modal modal--setting fade" id="bookOfferModal" tabindex="-1" role="dialog" aria-hidden="true">--}}
{{--                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">--}}
{{--                            <form action="{{route('package.booking')}}" method="post">--}}
{{--                                @csrf--}}
{{--                                <div class="modal-content">--}}
{{--                                    <div class="modal-header">--}}
{{--                                        <h5 class="modal-title" id="modalTitle"></h5>--}}
{{--                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                            <span aria-hidden="true"><i class="ti-close"></i></span>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                    <div class="modal-body">--}}
{{--                                        <input type="hidden" readonly required value="{{$package->id}}" id="package_id" name="package_id">--}}
{{--                                        <input type="hidden" readonly required value="" id="offer_id" name="offer_id">--}}

{{--                                        <div class="row">--}}
{{--                                            <div class="col-md-6 col-sm-6 col-xs-6">--}}
{{--                                                <label>Start</label>--}}
{{--                                                <div class="input-group margin-bottom-sm">--}}
{{--                                                    <input type="text" required id="check_in" autocomplete="off" name="departure_date" class="form-control" placeholder="DD/MM/YYYY">--}}
{{--                                                    <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="col-md-6 col-sm-6 col-xs-6">--}}
{{--                                                <label>Duration</label>--}}
{{--                                                <select class="selectpicker" name="duration">--}}
{{--                                                    <option value="3">3 Days</option>--}}
{{--                                                    <option value="5">5 Days</option>--}}
{{--                                                    <option value="7">1 Week</option>--}}
{{--                                                    <option value="10">10 Days</option>--}}
{{--                                                    <option value="14">2 Week</option>--}}
{{--                                                    <option value="21">3 Week</option>--}}
{{--                                                </select>--}}
{{--                                            </div>--}}

{{--                                        </div>--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-md-12 col-sm-12 col-xs-12">--}}
{{--                                                <label>Travel By</label>--}}
{{--                                                <select class="selectpicker" name="travel_by">--}}
{{--                                                    <option>BUS</option>--}}
{{--                                                    <option>TRAIN</option>--}}
{{--                                                    <option selected>AIRPLANE</option>--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-md-6 col-sm-6 col-xs-6">--}}
{{--                                                <label>Adult</label>--}}
{{--                                                <select class="selectpicker" name="adult">--}}
{{--                                                    <option>1</option>--}}
{{--                                                    <option>2</option>--}}
{{--                                                    <option>3</option>--}}
{{--                                                    <option>4</option>--}}
{{--                                                    <option>5</option>--}}
{{--                                                    <option>6</option>--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-6 col-sm-6 col-xs-6">--}}
{{--                                                <label>Child</label>--}}
{{--                                                <select class="selectpicker" name="child">--}}
{{--                                                    <option>1</option>--}}
{{--                                                    <option>2</option>--}}
{{--                                                    <option>3</option>--}}
{{--                                                    <option>4</option>--}}
{{--                                                    <option>5</option>--}}
{{--                                                    <option>6</option>--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-md-6 col-sm-6 col-xs-6">--}}
{{--                                                <label>Single Room</label>--}}
{{--                                                <select class="selectpicker" name="meta[rooms][single_room]">--}}
{{--                                                    <option>0</option>--}}
{{--                                                    <option>1</option>--}}
{{--                                                    <option>2</option>--}}
{{--                                                    <option>3</option>--}}
{{--                                                    <option>4</option>--}}
{{--                                                    <option>5</option>--}}
{{--                                                    <option>6</option>--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-6 col-sm-6 col-xs-6">--}}
{{--                                                <label>Double Room</label>--}}
{{--                                                <select class="selectpicker" name="meta[rooms][double_room]">--}}
{{--                                                    <option>0</option>--}}
{{--                                                    <option>1</option>--}}
{{--                                                    <option>2</option>--}}
{{--                                                    <option>3</option>--}}
{{--                                                    <option>4</option>--}}
{{--                                                    <option>5</option>--}}
{{--                                                    <option>6</option>--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-md-6 col-sm-6 col-xs-6">--}}
{{--                                                <label>Twin Room</label>--}}
{{--                                                <select class="selectpicker" name="meta[rooms][twin_room]">--}}
{{--                                                    <option>0</option>--}}
{{--                                                    <option>1</option>--}}
{{--                                                    <option>2</option>--}}
{{--                                                    <option>3</option>--}}
{{--                                                    <option>4</option>--}}
{{--                                                    <option>5</option>--}}
{{--                                                    <option>6</option>--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-6 col-sm-6 col-xs-6">--}}
{{--                                                <label>Tripple Room</label>--}}
{{--                                                <select class="selectpicker" name="meta[rooms][tripple_room]">--}}
{{--                                                    <option>0</option>--}}
{{--                                                    <option>1</option>--}}
{{--                                                    <option>2</option>--}}
{{--                                                    <option>3</option>--}}
{{--                                                    <option>4</option>--}}
{{--                                                    <option>5</option>--}}
{{--                                                    <option>6</option>--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}


{{--                                    </div>--}}
{{--                                    <div class="modal-footer">--}}
{{--                                        <button type="button" class="btn btn-outline-dark btn-rounded" data-dismiss="modal">{{__("Cancel")}}</button>--}}
{{--                                        <button type="submit" class="btn btn-primary btn-rounded btn-save">{{__("Submit")}}</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="sidebar-booking-box">--}}
{{--                        <h3 class="text-center">MAKE A BOOKING</h3>--}}
{{--                        <div class="booking-box-body">--}}
{{--                            <form method="post" action="{{route('package.booking')}}">--}}
{{--                                @csrf--}}
{{--                                <input type="hidden" readonly value="{{$package->id}}" name="package_id">--}}
{{--                                <div class="col-md-12 col-sm-12 col-xs-12">--}}
{{--                                    <label>Start</label>--}}
{{--                                    <div class="input-group margin-bottom-sm">--}}
{{--                                        <input type="text" required id="check_in" autocomplete="off" name="departure_date" class="form-control" placeholder="DD/MM/YYYY">--}}
{{--                                        <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-12 col-sm-12 col-xs-12">--}}
{{--                                    <label>Duration</label>--}}
{{--                                    <select class="selectpicker" name="duration">--}}
{{--                                        <option value="3">3 Days</option>--}}
{{--                                        <option value="5">5 Days</option>--}}
{{--                                        <option value="7">1 Week</option>--}}
{{--                                        <option value="10">10 Days</option>--}}
{{--                                        <option value="14">2 Week</option>--}}
{{--                                        <option value="21">3 Week</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-12 col-sm-12 col-xs-12">--}}
{{--                                    <label>Travel By</label>--}}
{{--                                    <select class="selectpicker" name="travel_by">--}}
{{--                                        <option>BUS</option>--}}
{{--                                        <option>TRAIN</option>--}}
{{--                                        <option selected>AIRPLANE</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-6 col-sm-6 col-xs-6">--}}
{{--                                    <label>Adult</label>--}}
{{--                                    <select class="selectpicker" name="adult">--}}
{{--                                        <option>1</option>--}}
{{--                                        <option>2</option>--}}
{{--                                        <option>3</option>--}}
{{--                                        <option>4</option>--}}
{{--                                        <option>5</option>--}}
{{--                                        <option>6</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-6 col-sm-6 col-xs-6">--}}
{{--                                    <label>Child</label>--}}
{{--                                    <select class="selectpicker" name="child">--}}
{{--                                        <option>1</option>--}}
{{--                                        <option>2</option>--}}
{{--                                        <option>3</option>--}}
{{--                                        <option>4</option>--}}
{{--                                        <option>5</option>--}}
{{--                                        <option>6</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}

{{--                                <div class="col-md-6 col-sm-6 col-xs-6">--}}
{{--                                    <label>Single Room</label>--}}
{{--                                    <select class="selectpicker" name="meta[rooms][single_room]">--}}
{{--                                        <option>0</option>--}}
{{--                                        <option>1</option>--}}
{{--                                        <option>2</option>--}}
{{--                                        <option>3</option>--}}
{{--                                        <option>4</option>--}}
{{--                                        <option>5</option>--}}
{{--                                        <option>6</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-6 col-sm-6 col-xs-6">--}}
{{--                                    <label>Double Room</label>--}}
{{--                                    <select class="selectpicker" name="meta[rooms][double_room]">--}}
{{--                                        <option>0</option>--}}
{{--                                        <option>1</option>--}}
{{--                                        <option>2</option>--}}
{{--                                        <option>3</option>--}}
{{--                                        <option>4</option>--}}
{{--                                        <option>5</option>--}}
{{--                                        <option>6</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}

{{--                                <div class="col-md-6 col-sm-6 col-xs-6">--}}
{{--                                    <label>Twin Room</label>--}}
{{--                                    <select class="selectpicker" name="meta[rooms][twin_room]">--}}
{{--                                        <option>0</option>--}}
{{--                                        <option>1</option>--}}
{{--                                        <option>2</option>--}}
{{--                                        <option>3</option>--}}
{{--                                        <option>4</option>--}}
{{--                                        <option>5</option>--}}
{{--                                        <option>6</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-6 col-sm-6 col-xs-6">--}}
{{--                                    <label>Tripple Room</label>--}}
{{--                                    <select class="selectpicker" name="meta[rooms][tripple_room]">--}}
{{--                                        <option>0</option>--}}
{{--                                        <option>1</option>--}}
{{--                                        <option>2</option>--}}
{{--                                        <option>3</option>--}}
{{--                                        <option>4</option>--}}
{{--                                        <option>5</option>--}}
{{--                                        <option>6</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                                <div class="room-price">--}}
{{--                                    <div class="col-md-8 col-sm-8 col-xs-8">--}}
{{--                                        <label><input type="checkbox" name="single"><span>Deluxe Single Room</span></label>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-4 col-sm-4 col-xs-4">--}}
{{--                                        <h5>$99/Night</h5>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="clearfix"></div>--}}
{{--                                <div class="room-price">--}}
{{--                                    <div class="col-md-8 col-sm-8 col-xs-8">--}}
{{--                                        <label><input type="checkbox" name="double"><span>Deluxe Double Room</span></label>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-4 col-sm-4 col-xs-4">--}}
{{--                                        <h5>$199/Night</h5>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="clearfix"></div>--}}
{{--                                <div class="room-price">--}}
{{--                                    <div class="col-md-8 col-sm-8 col-xs-8">--}}
{{--                                        <label><input type="checkbox" name="royal"><span>Royal Suite</span></label>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-4 col-sm-4 col-xs-4">--}}
{{--                                        <h5>$299/Night</h5>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="clearfix"></div>--}}
{{--                                <div class="grand-total text-center">--}}
{{--                                    <div class="col-md-6 col-sm-6 col-xs-6">--}}
{{--                                        <h4>Total $599</h4>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-6 col-sm-6 col-xs-6">--}}
{{--                                        <button type="submit">BOOK</button>--}}
{{--                                    </div>--}}
{{--                                    <div align="center" class="col-md-12 col-sm-12 col-xs-12">--}}
{{--                                        <button type="submit">BOOK REQUEST</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="assistance-box sidebar-item">
                        <h4><i class="fa fa-phone"></i> Need Assistance</h4>
                        <div class="assitance-body text-center">
                            <h5>Need Help? Call us or drop a message. Our agents will be in touch shortly.</h5>
                            <h2>+880 1730-206887</h2>
                            <h3>Or</h3>
                            <a href="mailto:travelarchitectbd@gmail.com"><i class="fa fa-envelope-o"></i> Email Us</a>
                        </div>
                    </div>
                    {{--                    <div class="review sidebar-item">--}}
                    {{--                        <h4><i class="fa fa-comments"></i> Package Reviews</h4>--}}
                    {{--                        <div class="sidebar-item-body text-center">--}}
                    {{--                            <div class="rating-box">--}}
                    {{--                                <div class="col-md-6 col-sm-6 col-xs-6 clear-padding tripadvisor">--}}
                    {{--                                    <img src="assets/images/tripadvisor.png" alt="cruise"><br>--}}
                    {{--                                    <i class="fa fa-star"></i>--}}
                    {{--                                    <i class="fa fa-star"></i>--}}
                    {{--                                    <i class="fa fa-star"></i>--}}
                    {{--                                    <i class="fa fa-star"></i>--}}
                    {{--                                    <i class="fa fa-star-o"></i>--}}
                    {{--                                    <h5>4.0/5.0 Based on 12 Reviews</h5>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="col-md-6 col-sm-6 col-xs-6 clear-padding">--}}
                    {{--                                    <i class="fa fa-users"></i>--}}
                    {{--                                    <i class="fa fa-star"></i>--}}
                    {{--                                    <i class="fa fa-star"></i>--}}
                    {{--                                    <i class="fa fa-star"></i>--}}
                    {{--                                    <i class="fa fa-star"></i>--}}
                    {{--                                    <i class="fa fa-star-o"></i>--}}
                    {{--                                    <h5>Based on 128 Guest Reviews</h5>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="clearfix"></div>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="guest-say rating-box">--}}
                    {{--                                <h2><i class="fa fa-check-circle"></i> Perfect</h2>--}}
                    {{--                                <div>--}}
                    {{--                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="col-md-5 col-sm-5 col-xs-5 clear-padding user-img">--}}
                    {{--                                    <img src="assets/images/user1.jpg" alt="cruise">--}}
                    {{--                                </div>--}}
                    {{--                                <div class="col-md-7 col-sm-7 col-xs-7 clear-padding user-name">--}}
                    {{--                                    <span>Lenore, USA</span>--}}
                    {{--                                    <span>--}}
                    {{--										<i class="fa fa-star"></i>--}}
                    {{--										<i class="fa fa-star"></i>--}}
                    {{--										<i class="fa fa-star"></i>--}}
                    {{--										<i class="fa fa-star-o"></i>--}}
                    {{--										<i class="fa fa-star-o"></i>--}}
                    {{--									</span>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
    <!-- END: ROOM GALLERY -->


@endsection


@push('scripts')
    <script>
        $(document).ready(function(){


            $('.book-offer').click(function(){

                var offerId = $(this).attr('data-offer-id');

                $('#modalTitle').html('Booking Request');
                $('#offer_id').val(offerId);

                $(".shot-overlay, .close-outside").toggle();
                $("body").toggleClass("noscroll");
            });
            $('#close-box').click(function(){

                $('#modalTitle').html('Booking Request');
                $('#offer_id').val();

                $(".shot-overlay, .close-outside").toggle();
                $("body").toggleClass("noscroll");
            });

            $('.close-outside').click(function(){
                $(".shot-overlay, .close-outside").toggle();
                $("body").toggleClass("noscroll");
            });

        });
    </script>

@endpush

