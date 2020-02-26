<style>
    .select2-container--default .select2-selection--single {
        background-color: transparent !important;
        border: 1px solid #BEC4C8;
        border-radius: 0;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
        /*color: #07253F;*/
        color: #fff;
        display: block;
        font-size: 15px;
        height: 40px;
        line-height: 1.42857;
        padding: 6px 12px;
        transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
        width: 100% !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #fff;
    }
    .select2-container {
        width: 100% !important;
    }
    .select2-container--default .select2-selection--multiple {
        background-color: transparent !important;
        border: 1px solid #BEC4C8;
        border-radius: 0;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
        /*color: #07253F;*/
        color: #fff;
        display: block;
        font-size: 15px;
        height: 40px;
        line-height: 1.42857;
        padding: 6px 12px;
        transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
        width: 100% !important;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #007bff;
        border-color: #006fe6;
    }

</style>
@php
    $countryBD = \App\Models\Country::select('countries.*')
              ->where('countries.sort_name','BD')
              ->get();
@endphp
<!-- BEGIN: SEARCH SECTION -->
<div class="row bottom-search">
    <div class="container clear-padding">
        <div class="col-md-12 search-section">
            <div role="tabpanel">
                <!-- BEGIN: CATEGORY TAB -->
                <ul class="nav nav-tabs search-top" role="tablist" id="searchTab">
{{--                    <li role="presentation" class="text-center">--}}
{{--                        <a href="#flight" aria-controls="flight" role="tab" data-toggle="tab">--}}
{{--                            <i class="fa fa-plane"></i>--}}
{{--                            <span>FLIGHTS</SPAN>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                    <li role="presentation" class="text-center active">
                        <a href="#holiday" aria-controls="holiday" role="tab" data-toggle="tab">
                            <i class="fa fa-suitcase"></i>
                            <span>HOLIDAYS</span>
                        </a>
                    </li>
                    <li role="presentation" class="text-center">
                        <a href="#cruise" aria-controls="cruise" role="tab" data-toggle="tab">
                            <i class="fa fa-facebook-f"></i>
                            <span>TOURS</span>
                        </a>
                    </li>
                </ul>
                <!-- END: CATEGORY TAB -->

                <!-- BEGIN: TAB PANELS -->
                <div class="tab-content">
                    <!-- BEGIN: FLIGHT SEARCH -->
                    <div role="tabpanel" class="tab-pane" id="flight">

                        <form  action="{{route('insertsearchflight')}}" method="post">
                        {{csrf_field()}}
                            <!--                                <div class="col-md-12 product-search-title">Book Flight Tickets</div>-->
                            <div class="col-md-12 search-col-padding">
                                <label class="radio-inline">
                                    <input type="radio" name="triptype" id="inlineRadio1" value="OneWay"> One Way
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="triptype" id="inlineRadio2" value="RoundTrip"> Round Trip
                                </label>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-3 col-sm-3 search-col-padding">
                                <label>Leaving From</label>
                                <div class="input-group">
                                    <select class="form-control select2"required id="From" name="departure_city" data-placeholder="E.g. London">

                                    </select>
{{--                                    <input type="text" id="From" name="departure_city" class="form-control" required placeholder="E.g. London">--}}
                                    <span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 search-col-padding">
                                <label>Leaving To</label>
                                <div class="input-group">
                                    <select class="form-control search select2" required id="To" name="destination_city" data-placeholder="E.g. New York">

                                    </select>
{{--                                    <input type="text" id="To" name="destination_city" class="form-control" required placeholder="E.g. New York">--}}
                                    <span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 search-col-padding">
                                <label>Departure</label>
                                <div class="input-group">
                                    <input type="text" id="departure_date" name="departure_date" class="form-control" placeholder="DD/MM/YYYY">
                                    <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 search-col-padding">
                                <label>Return</label>
                                <div class="input-group">
                                    <input type="text" id="return_date" class="form-control" name="return_date" placeholder="DD/MM/YYYY">
                                    <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-4 col-sm-4 search-col-padding">
                                <label>Adult</label><br>
                                <input id="adult_count" name="adult_count" value="1" class="form-control quantity-padding">
                            </div>
                            <div class="col-md-4 col-sm-4 search-col-padding">
                                <label>Child</label><br>
                                <input type="text" id="child_count" name="child_count" value="1" class="form-control quantity-padding">
                            </div>
                            <div class="col-md-4 col-sm-4 search-col-padding">
                                <label>Class</label><br>
                                <select class="selectpicker" name="classpicker">
                                    <option>Business</option>
                                    <option>Economy</option>
                                </select>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-12 search-col-padding">
                                <button id="open-box" type="button" class="search-button btn transition-effect">Search Flights</button>
                            </div>


                            <div class="shot-overlay" style="display:none;">
                                <a href="#" id="close-box" class="close-overlay">Close</a>
                                <div class="close-outside" style="display:none;"></div>
                                <div class="overlay-content" style="background-color: #FFDE59">
                                    <div class="main-content">
                                        Share your details to get the query: <br><br>
                                        <div class="form-group search-col-padding">
                                            <label>Name</label>
                                            <input class="form-control" type="text" name="name">
                                        </div>
                                        <div class="form-group search-col-padding">
                                            <label>Phone</label>
                                            <input class="form-control" type="number" name="phone">
                                        </div>
                                        <div class="form-group search-col-padding">
                                            <label>Email</label>
                                            <input class="form-control"type="email" name="email">
                                        </div>
                                        <button class="btn btn-success" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                    <!-- END: FLIGHT SEARCH -->

                    <!-- START: BEGIN HOLIDAY -->
                    <div role="tabpanel" class="tab-pane active" id="holiday">
                        <form action="{{route('insertsearchholiday')}}" method="post">
                            {{csrf_field()}}
                            <!--                                <div class="col-md-12 product-search-title">Book Holiday Packages</div>-->
                            <div class="col-md-4 col-sm-4 search-col-padding">
                                <label>From</label>
                                <div class="input-group">
{{--                                    <input type="text" name="pack_departure_city_from" class="form-control" required placeholder="E.g. New York">--}}
                                    <select readonly class="form-control" id="pack_departure_city_from" required name="pack_departure_city_from" data-placeholder="E.g. London">
                                        @if(!blank($countryBD))
                                            @foreach($countryBD as $bd)
                                                <option selected value="{{$bd->id}}">{{$bd->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 search-col-padding">
                                <label>I Want To Go</label>
                                <div class="input-group">
{{--                                    <input type="text" name="pack_destination_city_to" class="form-control" required placeholder="E.g. New York">--}}
                                    <select class="form-control select2" id="pack_destination_city_to" required name="pack_destination_city_to" data-placeholder="E.g. London">

                                    </select>

                                    <span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 search-col-padding">
                                <label>Starting From</label>
                                <div class="input-group">
                                    <input type="text" id="package_start" class="form-control" placeholder="DD/MM/YYYY">
                                    <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-4 col-sm-4 search-col-padding">
                                <label>Duration(Optional)</label><br>
                                <select class="selectpicker" name="holiday_duration">
                                    <option value="3">3 Days</option>
                                    <option value="5">5 Days</option>
                                    <option value="7">1 Week</option>
                                    <option value="30">1 Month</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-4 search-col-padding">
                                <label>Package Theme(Optional)</label><br>
                                <select class="form-control search select2" multiple required id="package_type_holiday" name="package_type[]">
                                    @foreach($packageThemes as $p_t)
                                        <option value="{{$p_t->name}}">{{$p_t->name}}</option>
                                    @endforeach

                                </select>
{{--                                <select class="selectpicker" name="package_type">--}}
{{--                                    <option value="Group">Group</option>--}}
{{--                                    <option value="Family">Family</option>--}}
{{--                                    <option value="Individual">Individual</option>--}}
{{--                                    <option value="Honeymoon"> Honeymoon</option>--}}
{{--                                </select>--}}
                            </div>
                            <div class="col-md-4 col-sm-4 search-col-padding">
                                <label>Budget(Optional)</label><br>
                                <select class="selectpicker" name="package_budget">
                                    <option value="500">500</option>
                                    <option value="1000">1000</option>
                                    <option value="1000+">1000+</option>
                                </select>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-12 search-col-padding">
                                <button id="open-box" type="button" class="search-button btn transition-effect">Search Packages</button>
                            </div>
                            <div class="shot-overlay" style="display:none;">
                                <a href="#" id="close-box" class="close-overlay">Close</a>
                                <div class="close-outside" style="display:none;"></div>
                                <div class="overlay-content" style="background-color: #FFDE59">
                                    <div class="main-content">
                                        Share your details to get the query: <br><br>
                                        <div class="form-group search-col-padding">
                                            <label>Name</label>
                                            <input class="form-control" type="text" name="name">
                                        </div>
                                        <div class="form-group search-col-padding">
                                            <label>Phone</label>
                                            <input class="form-control" type="number" name="phone">
                                        </div>
                                        <div class="form-group search-col-padding">
                                            <label>Email</label>
                                            <input class="form-control"type="email" name="email">
                                        </div>
                                        <button class="btn btn-success" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                    <!-- END: HOLIDAYS -->

                    <!-- START: CRUISE SEARCH -->
                    <div role="tabpanel" class="tab-pane" id="cruise">
                        <form action="{{route('insertsearchtours')}}" method="post">
                            {{csrf_field()}}
                            <!--                                <div class="col-md-12 product-search-title">TOURS</div>-->
                            <div class="col-md-4 col-sm-4 search-col-padding">
                                <label>From</label>
                                <div class="input-group">
{{--                                    <input type="text" name="pack_departure_city_from" class="form-control" required placeholder="E.g. New York">--}}
                                    <select class="form-control" readonly id="pack_departure_city_from_tour" required name="pack_departure_city_from" data-placeholder="E.g. London">
                                        @if(!blank($countryBD))
                                            @foreach($countryBD as $bd)
                                                <option selected value="{{$bd->id}}">{{$bd->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 search-col-padding">
                                <label>I Want To Go</label>
                                <div class="input-group">
{{--                                    <input type="text" name="pack_destination_city_to" class="form-control" required placeholder="E.g. New York">--}}
                                    <select class="form-control select2" id="pack_destination_city_to_tour" required name="pack_destination_city_to" data-placeholder="E.g. London">

                                    </select>
                                    <span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 search-col-padding">
                                <label>Starting From</label>
                                <div class="input-group">
                                    <input type="text" id="cruise_start" class="form-control" placeholder="DD/MM/YYYY">
                                    <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-4 col-sm-4 search-col-padding">
                                <label>Duration(Optional)</label><br>
                                <select class="selectpicker" name="holiday_duration">
                                    <option value="3">3 Days</option>
                                    <option value="5">5 Days</option>
                                    <option value="7">1 Week</option>
                                    <option value="30">1 Month</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-4 search-col-padding">
                                <label>Package Theme(Optional)</label><br>
                                <select class="form-control search select2" required id="package_type_tour" multiple name="package_type[]">
                                    @foreach($packageThemes as $p_t)
                                        <option value="{{$p_t->name}}">{{$p_t->name}}</option>
                                    @endforeach
                                </select>

{{--                                <select class="selectpicker" name="package_type">--}}
{{--                                    <option value="Group">Group</option>--}}
{{--                                    <option value="Family">Family</option>--}}
{{--                                    <option value="Individual">Individual</option>--}}
{{--                                    <option value="Honeymoon"> Honeymoon</option>--}}
{{--                                </select>--}}
                            </div>
                            <div class="col-md-4 col-sm-4 search-col-padding">
                                <label>Budget(Optional)</label><br>
                                <select class="selectpicker" name="package_budget">
                                    <option value="500">500</option>
                                    <option value="1000">1000</option>
                                    <option value="1000+">1000+</option>
                                </select>
                            </div>
                            <div class="shot-overlay" style="display:none;">
                                <a href="#" id="close-box" class="close-overlay">Close</a>
                                <div class="close-outside" style="display:none;"></div>
                                <div class="overlay-content" style="background-color: #FFDE59">
                                    <div class="main-content">
                                        Share your details to get the query: <br><br>
                                        <div class="form-group search-col-padding">
                                            <label>Name</label>
                                            <input class="form-control" type="text" name="name">
                                        </div>
                                        <div class="form-group search-col-padding">
                                            <label>Phone</label>
                                            <input class="form-control" type="number" name="phone">
                                        </div>
                                        <div class="form-group search-col-padding">
                                            <label>Email</label>
                                            <input class="form-control"type="email" name="email">
                                        </div>
                                        <button class="btn btn-success" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-12 search-col-padding">
                                <button id="open-box" type="button" class="search-button btn transition-effect">Search Tours</button>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                    <!-- END: CRUISE SEARCH -->

                </div>
                <!-- END: TAB PANE -->
            </div>
        </div>
    </div>
</div>
<!-- END: SEARCH SECTION -->




<script>
    $(document).ready(function(){
        $('#open-box, #close-box').click(function(){
            $(".shot-overlay, .close-outside").toggle();
            $("body").toggleClass("noscroll");
        });
        $('.close-outside').click(function(){
            $(".shot-overlay, .close-outside").toggle();
            $("body").toggleClass("noscroll");
        });

        {{--addSelect2Ajax('#From','{{route('ajax.city')}}', null, {--}}
        {{--    'tags' : false--}}
        {{--});--}}
        {{--addSelect2Ajax('#To','{{route('ajax.city')}}', null, {--}}
        {{--    'tags' : false--}}
        {{--});--}}

        addSelect2Ajax('#pack_destination_city_to','{{route('ajax.getAllActivePackage.city')}}', null, {
            'tags' : false
        });

        addSelect2Ajax('#pack_destination_city_to_tour','{{route('ajax.getAllActivePackage.city')}}', null, {
            'tags' : false
        });

        $('#package_type_holiday').select2({
            tags: false
        });
        $('#package_type_tour').select2({
            tags: false,
        });

    });
</script>
