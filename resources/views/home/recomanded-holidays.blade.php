<!-- BEGIN: Recomanded holidays -->
<section id="recent-blog">
    <div class="row top-offer">
        <div class="container">
            <div class="section-title text-center">
                <h2>Recommended Holidays</h2>
            </div>
            @if(!empty($recommendedHolidays))
                @foreach($recommendedHolidays as $reco)
                    @php
                        $recoImage = $reco->getMedia('slider_images');
                        $slider1  = $recoImage->where('order_column', 1)->first();
                        $package_meta = json_decode($reco->meta);
                        $package_costs = data_get($package_meta,'package_cost',[]);
                        $package_places = data_get($package_meta,'places',[]);
                       // dd(url('admin'."/".$slider1->getUrl()))
                        //dd(data_get($reco,'meta.package_costing'));
                     //   dd(data_get($package_meta,'package_cost',[]));
                    @endphp
            <div class="owl-carousel" id="post-list">
                <div class="room-grid-view wow slideInUp" data-wow-delay="0.{{$loop->iteration}}s">
                   <div onclick="location.href = '{{route('package.details',['package' => $reco->id])}}' ;" class="holiday-custom" style="background-image: @if($slider1) url('{{url('admin'."/".$slider1->getUrl('recommended'))}}') @else url('{{url('assets/images/holiday-slide3.jpg')}}') @endif">
                            <div class="text">
                                <div class="top">
                                    <ul>
                                        <li>
                                            <img src="assets/images/calender.png">
                                            <span>{{$reco->duration}}</span>
                                        </li>
                                        <li>
                                            <img src="assets/images/coin.png">
                                            <span>{{$reco->budget}}</span>
                                        </li>
{{--                                        <li>--}}
{{--                                            <img src="assets/images/share.png">--}}
{{--                                            <span>5</span>--}}
{{--                                        </li>--}}
                                    </ul>
                                </div>
                                <div class="bottom">
                                    <h4>
                                    @if (!blank($package_costs))
                                        @foreach($package_costs as $pa)
                                            @if($loop->first)
                                                <span>Price starts from ({{$pa->person}})</span><br>
                                                <span>BDT {{$pa->cost}}</span>
                                            @endif
                                        @endforeach
                                    @endif

                                        <span>
                                            <p>
                                                {{$reco->title}}
                                            </p>
                                            <p>
                                                <small>
                                                    <i class="fa fa-map-marker">
                                                        @if (!blank($package_places))
                                                            {{implode(' - ',$package_places)}}
                                                        @endif
                                                        </i>
                                                </small>
                                            </p>

                                            </span>
                                        </h4>

                                </div>

                            </div>
                            <div class="clearfix"></div>
                   </div>

                </div>
            </div>
                @endforeach
            @endif
{{--                <div class="room-grid-view wow slideInUp" data-wow-delay="0.2s">--}}
{{--                    <div class="holiday-custom" style="background-image: url('assets/images/holiday-slide4.jpg');">--}}
{{--                        <div class="text">--}}

{{--                            <div class="top">--}}
{{--                                <ul>--}}
{{--                                    <li>--}}
{{--                                        <img src="assets/images/calender.png">--}}
{{--                                        <span>5 Days</span>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <img src="assets/images/coin.png">--}}
{{--                                        <span>5000</span>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <img src="assets/images/share.png">--}}
{{--                                        <span>5</span>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <div class="bottom">--}}
{{--                                <span>Price starts from (per person)</span>--}}
{{--                                <h4>--}}
{{--                                <span>--}}
{{--                                    BDT 23,100--}}
{{--                                </span>--}}
{{--                                    <span>--}}
{{--                                            <p>--}}
{{--                                            Amazing Thailand--}}
{{--                                        </p>--}}
{{--                                        <p>--}}
{{--                                            <small>--}}
{{--                                                <i class="fa fa-map-marker">Bangkok, Thailand - Phuket, Thailand</i>--}}
{{--                                            </small>--}}
{{--                                        </p>--}}

{{--                                        </span>--}}

{{--                                </h4>--}}
{{--                            </div>--}}

{{--                        </div>--}}

{{--                        <div class="clearfix"></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="room-grid-view wow slideInUp" data-wow-delay="0.3s">--}}
{{--                    <div class="holiday-custom" style="background-image: url('assets/images/holiday-slide2.jpg');">--}}
{{--                        <div class="text">--}}

{{--                            <div class="top">--}}
{{--                                <ul>--}}
{{--                                    <li>--}}
{{--                                        <img src="assets/images/calender.png">--}}
{{--                                        <span>5 Days</span>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <img src="assets/images/coin.png">--}}
{{--                                        <span>5000</span>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <img src="assets/images/share.png">--}}
{{--                                        <span>5</span>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <div class="bottom">--}}
{{--                                <span>Price starts from (per person)</span>--}}
{{--                                <h4>--}}
{{--                                <span>--}}
{{--                                    BDT 23,100--}}
{{--                                </span>--}}
{{--                                    <span>--}}
{{--                                            <p>--}}
{{--                                            Amazing Thailand--}}
{{--                                        </p>--}}
{{--                                        <p>--}}
{{--                                            <small>--}}
{{--                                                <i class="fa fa-map-marker">Bangkok, Thailand - Phuket, Thailand</i>--}}
{{--                                            </small>--}}
{{--                                        </p>--}}

{{--                                        </span>--}}

{{--                                </h4>--}}
{{--                            </div>--}}

{{--                        </div>--}}

{{--                        <div class="clearfix"></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="room-grid-view wow slideInUp" data-wow-delay="0.4s">--}}
{{--                    <div class="holiday-custom" style="background-image: url('assets/images/holiday-slide5.jpg');">--}}
{{--                        <div class="text">--}}

{{--                            <div class="top">--}}
{{--                                <ul>--}}
{{--                                    <li>--}}
{{--                                        <img src="assets/images/calender.png">--}}
{{--                                        <span>5 Days</span>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <img src="assets/images/coin.png">--}}
{{--                                        <span>5000</span>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <img src="assets/images/share.png">--}}
{{--                                        <span>5</span>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <div class="bottom">--}}
{{--                                <span>Price starts from (per person)</span>--}}
{{--                                <h4>--}}
{{--                                <span>--}}
{{--                                    BDT 23,100--}}
{{--                                </span>--}}
{{--                                    <span>--}}
{{--                                            <p>--}}
{{--                                            Amazing Thailand--}}
{{--                                        </p>--}}
{{--                                        <p>--}}
{{--                                            <small>--}}
{{--                                                <i class="fa fa-map-marker">Bangkok, Thailand - Phuket, Thailand</i>--}}
{{--                                            </small>--}}
{{--                                        </p>--}}

{{--                                        </span>--}}

{{--                                </h4>--}}
{{--                            </div>--}}

{{--                        </div>--}}

{{--                        <div class="clearfix"></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="room-grid-view wow slideInUp" data-wow-delay="0.5s">--}}
{{--                    <div class="holiday-custom" style="background-image: url('assets/images/holiday-thumb3.jpg');">--}}
{{--                        <div class="text">--}}

{{--                            <div class="top">--}}
{{--                                <ul>--}}
{{--                                    <li>--}}
{{--                                        <img src="assets/images/calender.png">--}}
{{--                                        <span>5 Days</span>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <img src="assets/images/coin.png">--}}
{{--                                        <span>5000</span>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <img src="assets/images/share.png">--}}
{{--                                        <span>5</span>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <div class="bottom">--}}
{{--                                <span>Price starts from (per person)</span>--}}
{{--                                <h4>--}}
{{--                                <span>--}}
{{--                                    BDT 23,100--}}
{{--                                </span>--}}
{{--                                    <span>--}}
{{--                                            <p>--}}
{{--                                            Amazing Thailand--}}
{{--                                        </p>--}}
{{--                                        <p>--}}
{{--                                            <small>--}}
{{--                                                <i class="fa fa-map-marker">Bangkok, Thailand - Phuket, Thailand</i>--}}
{{--                                            </small>--}}
{{--                                        </p>--}}

{{--                                        </span>--}}

{{--                                </h4>--}}
{{--                            </div>--}}

{{--                        </div>--}}

{{--                        <div class="clearfix"></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="room-grid-view wow slideInUp" data-wow-delay="0.6s">--}}
{{--                    <div class="holiday-custom" style="background-image: url('assets/images/offer1.jpg');">--}}
{{--                        <div class="text">--}}

{{--                            <div class="top">--}}
{{--                                <ul>--}}
{{--                                    <li>--}}
{{--                                        <img src="assets/images/calender.png">--}}
{{--                                        <span>5 Days</span>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <img src="assets/images/coin.png">--}}
{{--                                        <span>5000</span>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <img src="assets/images/share.png">--}}
{{--                                        <span>5</span>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <div class="bottom">--}}
{{--                                <span>Price starts from (per person)</span>--}}
{{--                                <h4>--}}
{{--                                <span>--}}
{{--                                    BDT 23,100--}}
{{--                                </span>--}}
{{--                                    <span>--}}
{{--                                            <p>--}}
{{--                                            Amazing Thailand--}}
{{--                                        </p>--}}
{{--                                        <p>--}}
{{--                                            <small>--}}
{{--                                                <i class="fa fa-map-marker">Bangkok, Thailand - Phuket, Thailand</i>--}}
{{--                                            </small>--}}
{{--                                        </p>--}}

{{--                                        </span>--}}

{{--                                </h4>--}}
{{--                            </div>--}}

{{--                        </div>--}}

{{--                        <div class="clearfix"></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="room-grid-view wow slideInUp" data-wow-delay="0.7s">--}}
{{--                    <div class="holiday-custom" style="background-image: url('assets/images/offer4.jpg');">--}}
{{--                        <div class="text">--}}

{{--                            <div class="top">--}}
{{--                                <ul>--}}
{{--                                    <li>--}}
{{--                                        <img src="assets/images/calender.png">--}}
{{--                                        <span>5 Days</span>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <img src="assets/images/coin.png">--}}
{{--                                        <span>5000</span>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <img src="assets/images/share.png">--}}
{{--                                        <span>5</span>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <div class="bottom">--}}
{{--                                <span>Price starts from (per person)</span>--}}
{{--                                <h4>--}}
{{--                                <span>--}}
{{--                                    BDT 23,100--}}
{{--                                </span>--}}
{{--                                    <span>--}}
{{--                                            <p>--}}
{{--                                            Amazing Thailand--}}
{{--                                        </p>--}}
{{--                                        <p>--}}
{{--                                            <small>--}}
{{--                                                <i class="fa fa-map-marker">Bangkok, Thailand - Phuket, Thailand</i>--}}
{{--                                            </small>--}}
{{--                                        </p>--}}

{{--                                        </span>--}}

{{--                                </h4>--}}
{{--                            </div>--}}

{{--                        </div>--}}

{{--                        <div class="clearfix"></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="room-grid-view wow slideInUp" data-wow-delay="0.8s" >--}}
{{--                    <div class="holiday-custom" style="background-image: url('assets/images/offer1.jpg');">--}}
{{--                        <div class="text">--}}

{{--                            <div class="top">--}}
{{--                                <ul>--}}
{{--                                    <li>--}}
{{--                                        <img src="assets/images/calender.png">--}}
{{--                                        <span>5 Days</span>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <img src="assets/images/coin.png">--}}
{{--                                        <span>5000</span>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <img src="assets/images/share.png">--}}
{{--                                        <span>5</span>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <div class="bottom">--}}
{{--                                <span>Price starts from (per person)</span>--}}
{{--                                <h4>--}}
{{--                                <span>--}}
{{--                                    BDT 23,100--}}
{{--                                </span>--}}
{{--                                    <span>--}}
{{--                                            <p>--}}
{{--                                            Amazing Thailand--}}
{{--                                        </p>--}}
{{--                                        <p>--}}
{{--                                            <small>--}}
{{--                                                <i class="fa fa-map-marker">Bangkok, Thailand - Phuket, Thailand</i>--}}
{{--                                            </small>--}}
{{--                                        </p>--}}

{{--                                        </span>--}}

{{--                                </h4>--}}
{{--                            </div>--}}

{{--                        </div>--}}

{{--                        <div class="clearfix"></div>--}}
{{--                    </div>--}}
{{--                </div>--}}

            </div>
        </div>
    </div>
</section>
<!-- END: Recomanded holidays -->
