<!-- BEGIN: SEARCH SECTION -->
<div class="row bottom-search">
    <div class="container clear-padding">
        <div class="col-md-12 search-section">
            <div role="tabpanel">
                <!-- BEGIN: CATEGORY TAB -->
                <ul class="nav nav-tabs search-top" role="tablist" id="searchTab">
                    <li role="presentation" class="text-center active">
                        <a href="#flight" aria-controls="flight" role="tab" data-toggle="tab">
                            <i class="fa fa-plane"></i>
                            <span>FLIGHTS</SPAN>
                        </a>
                    </li>
                    <li role="presentation" class="text-center">
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
                    <div role="tabpanel" class="tab-pane active" id="flight">

                        <form  action="{{route('insertsearchflight')}}" method="post">
                        {{csrf_field()}}
                            <!--                                <div class="col-md-12 product-search-title">Book Flight Tickets</div>-->
                            <div class="col-md-12 search-col-padding">
                                <label class="radio-inline">
                                    <input type="radio" name="triptype" id="inlineRadio1" value="One Way"> One Way
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="triptype" id="inlineRadio2" value="Round Trip"> Round Trip
                                </label>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-3 col-sm-3 search-col-padding">
                                <label>Leaving From</label>
                                <div class="input-group">
                                    <input type="text" id="From" name="departure_city" class="form-control" required placeholder="E.g. London">
                                    <span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 search-col-padding">
                                <label>Leaving To</label>
                                <div class="input-group">
                                    <input type="text" id="To" name="destination_city" class="form-control" required placeholder="E.g. New York">
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
                    <div role="tabpanel" class="tab-pane" id="holiday">
                        <form >
                            <!--                                <div class="col-md-12 product-search-title">Book Holiday Packages</div>-->
                            <div class="col-md-4 col-sm-4 search-col-padding">
                                <label>From</label>
                                <div class="input-group">
                                    <input type="text" name="pack-departure-city" class="form-control" required placeholder="E.g. New York">
                                    <span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 search-col-padding">
                                <label>I Want To Go</label>
                                <div class="input-group">
                                    <input type="text" name="pack-destination-city" class="form-control" required placeholder="E.g. New York">
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
                                    <option>3 Days</option>
                                    <option>5 Days</option>
                                    <option>1 Week</option>
                                    <option>2 Weeks</option>
                                    <option>1 Month</option>
                                    <option>1+ Month</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-4 search-col-padding">
                                <label>Package Type(Optional)</label><br>
                                <select class="selectpicker" name="package_type">
                                    <option>Group</option>
                                    <option>Family</option>
                                    <option>Individual</option>
                                    <option>Honeymoon</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-4 search-col-padding">
                                <label>Budget(Optional)</label><br>
                                <select class="selectpicker" name="package_budget">
                                    <option>500</option>
                                    <option>1000</option>
                                    <option>1000+</option>
                                </select>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-12 search-col-padding">
                                <button type="submit" class="search-button btn transition-effect">Search Packages</button>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                    <!-- END: HOLIDAYS -->

                    <!-- START: CAR SEARCH -->
                    <div role="tabpanel" class="tab-pane" id="taxi">
                        <form >
                            <div class="col-md-12 product-search-title">Search Perfect Car</div>
                            <div class="col-md-4 col-sm-4 search-col-padding">
                                <label>Pick Up Location</label>
                                <div class="input-group">
                                    <input type="text" name="departure-city" class="form-control" required placeholder="E.g. New York">
                                    <span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 search-col-padding">
                                <label>Drop Off Location</label>
                                <div class="input-group">
                                    <input type="text" name="destination-city" class="form-control" required placeholder="E.g. New York">
                                    <span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 search-col-padding">
                                <label>Pick Up Date</label>
                                <div class="input-group">
                                    <input type="text" id="car_start" class="form-control" placeholder="MM/DD/YYYY">
                                    <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-4 col-sm-4 search-col-padding">
                                <label>Pick Off Date</label>
                                <div class="input-group">
                                    <input type="text" id="car_end" class="form-control" placeholder="MM/DD/YYYY">
                                    <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 search-col-padding">
                                <label>Car Brnad(Optional)</label><br>
                                <select class="selectpicker" name="brand">
                                    <option>BMW</option>
                                    <option>Audi</option>
                                    <option>Mercedes</option>
                                    <option>Suzuki</option>
                                    <option>Honda</option>
                                    <option>Hyundai</option>
                                    <option>Toyota</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-4 search-col-padding">
                                <label>Car Type(Optional)</label><br>
                                <select class="selectpicker" name="car_type">
                                    <option>Limo</option>
                                    <option>Sedan</option>
                                </select>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-12 search-col-padding">
                                <button type="submit" class="search-button btn transition-effect">Search Cars</button>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                    <!-- END: CAR SEARCH -->

                    <!-- START: CRUISE SEARCH -->
                    <div role="tabpanel" class="tab-pane" id="cruise">
                        <form >
                            <!--                                <div class="col-md-12 product-search-title">TOURS</div>-->
                            <div class="col-md-4 col-sm-4 search-col-padding">
                                <label>From</label>
                                <div class="input-group">
                                    <input type="text" name="pack-departure-city" class="form-control" required placeholder="E.g. New York">
                                    <span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 search-col-padding">
                                <label>I Want To Go</label>
                                <div class="input-group">
                                    <input type="text" name="pack-destination-city" class="form-control" required placeholder="E.g. New York">
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
                                    <option>3 Days</option>
                                    <option>5 Days</option>
                                    <option>1 Week</option>
                                    <option>2 Weeks</option>
                                    <option>1 Month</option>
                                    <option>1+ Month</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-4 search-col-padding">
                                <label>Package Type(Optional)</label><br>
                                <select class="selectpicker" name="package_type">
                                    <option>Group</option>
                                    <option>Family</option>
                                    <option>Individual</option>
                                    <option>Honeymoon</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-4 search-col-padding">
                                <label>Budget(Optional)</label><br>
                                <select class="selectpicker" name="package_budget">
                                    <option>500</option>
                                    <option>1000</option>
                                    <option>1000+</option>
                                </select>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-12 search-col-padding">
                                <button type="submit" class="search-button btn transition-effect">Search Tours</button>
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





    </div>


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
    });
</script>