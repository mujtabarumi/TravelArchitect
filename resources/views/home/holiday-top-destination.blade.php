<!-- START: PRODUCT SECTION-->
<section class="home-topdestinations">
    <div class="container clear-padding">
        <div class="section-title text-center">
            <h2 style="align-content: center">Holidays in popular cities</h2>
            <strong class="mr-0"><a style="float: right" href="{{route('package.lists')}}">See all <i class="fa fa-angle-right"></i></a></strong>
        </div>
        <div class="row block-container">
            <div class="row">
                @if(!blank($popularHolidays))
                    @foreach($popularHolidays as $ph)
                        @php
                            $phImage = $ph->getMedia('slider_images');
                            $slider1  = $phImage->where('order_column', 1)->first();

    /*                        dd(url('admin'."/".$slider1->getUrl())) */
                            //dd(data_get($reco,'meta.package_costing'));
                         //   dd(data_get($package_meta,'package_cost',[]));
                        @endphp

                        <div class="col-md-3">
                            <div onclick="location.href = '{{route('package.details',['package' => $ph->id])}}' ;" class="block fw hh"
                                 style="background-image: @if($slider1) url('{{url('admin'."/".$slider1->getUrl('popular'))}}') @else url('{{url('assets/images/tour1.jpg')}}') @endif;
                                background-repeat: no-repeat;
                                ">
                                <div class="city overlay">
                                    <div class="text"><p> {{$ph->address->city->name}} </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                @endif
{{--                <div class="col-md-3">--}}
{{--                    <div class="block fw hh" style="background-image: url('assets/images/tour2.jpg');">--}}
{{--                        <div class="city">--}}
{{--                            <div class="text"><p>Kuala Lumpur </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-3">--}}
{{--                    <div class="block fw hh" style="background-image: url('assets/images/tour3.jpg');">--}}
{{--                        <div class="city">--}}
{{--                            <div class="text"><p>Kuala Lumpur </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-3">--}}
{{--                    <div class="block fw hh" style="background-image: url('assets/images/tour4.jpg');">--}}
{{--                        <div class="city">--}}
{{--                            <div class="text"><p>Kuala Lumpur </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-3">--}}
{{--                    <div class="block fw hh" style="background-image: url('assets/images/tour5.jpg');">--}}
{{--                        <div class="city">--}}
{{--                            <div class="text"><p>Kuala Lumpur </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-3">--}}
{{--                    <div class="block fw hh" style="background-image: url('assets/images/tour6.jpg');">--}}
{{--                        <div class="city">--}}
{{--                            <div class="text"><p>Kuala Lumpur </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-3">--}}
{{--                    <div class="block fw hh" style="background-image: url('assets/images/tour7.jpg');">--}}
{{--                        <div class="city">--}}
{{--                            <div class="text"><p>Kuala Lumpur </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-3">--}}
{{--                    <div class="block fw hh" style="background-image: url('assets/images/tour8.jpg');">--}}
{{--                        <div class="city">--}}
{{--                            <div class="text"><p>Kuala Lumpur </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-3">--}}
{{--                    <div class="block fw hh" style="background-image: url('assets/images/tour10.jpg');">--}}
{{--                        <div class="city">--}}
{{--                            <div class="text"><p>Kuala Lumpur </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-3">--}}
{{--                    <div class="block fw hh" style="background-image: url('assets/images/tour11.jpg');">--}}
{{--                        <div class="city">--}}
{{--                            <div class="text"><p>Kuala Lumpur </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-3">--}}
{{--                    <div class="block fw hh" style="background-image: url('assets/images/tour12.jpg');">--}}
{{--                        <div class="city">--}}
{{--                            <div class="text"><p>Kuala Lumpur </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-3">--}}
{{--                    <div class="block fw hh" style="background-image: url('assets/images/tour1.jpg');">--}}
{{--                        <div class="city">--}}
{{--                            <div class="text"><p>Kuala Lumpur </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
</section>
<!-- END: PRODUCT SECTION -->
