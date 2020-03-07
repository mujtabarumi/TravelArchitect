<!-- START: HOTEL LIST VIEW -->
<div id="package-listing" class="switchable col-md-12 clear-padding">
    @foreach($allPackages as $package)
        @php
            $p_image = $package->getMedia('list_images')->first();

            $inclutions = json_decode(data_get($package, 'inclusion'));
            if (blank($inclutions)) {
             $inclutions = [];
            }
            $package_meta = json_decode($package->meta);
            $package_costs = data_get($package_meta,'package_cost',[]);
            $package_address = data_get($package_meta,'address');
            $package_address_city = data_get($package_address,'city',[]);
            $package_address_country = data_get($package_address,'country',[]);

            $addressCountry = \App\Models\Country::select('countries.*')
                                ->whereIn('countries.id',$package_address_country)
                                ->distinct('countries.id')
                                ->orderBy('countries.name', 'ASC')
                                ->get();
            $addressCity = \App\Models\City::whereIn('id',$package_address_city)
                                ->distinct('id')
                                ->orderBy('name', 'ASC')
                                ->get();

        @endphp
        <div onclick="location.href='{{route('package.details',['package' => $package->id])}}';" style="cursor: pointer;" class="hotel-list-view">
            <div class="wrapper">
                <div class="col-md-4 col-sm-6 switch-img clear-padding">
                    <img style="height: 200px;width: 200px" src="@if($p_image) {{url('admin'."/".$p_image->getUrl())}} @else {{url('assets/images/tour3.jpg')}} @endif" alt="{{$package->title}}">
                </div>
                <div class="col-md-6 col-sm-6 hotel-info">
                    <div>
                        <div class="hotel-header">
                            <h5>{{$package->title}}</h5>
                            <p>
                                <i class="fa fa-map-marker">

                                </i>
                                @if(!blank($addressCountry))
                                    @foreach($addressCountry as $ac)
                                        @if(!$loop->last)
                                            {{$ac->name}},
                                        @else
                                            {{$ac->name}}
                                        @endif
                                    @endforeach
                                @endif
                            </p>
                            <p>
                                <i class="fa fa-map-marker">

                                </i>
                                @if(!blank($addressCity))
                                    @foreach($addressCity as $acity)
                                        @if(!$loop->last)
                                            {{$acity->name}},
                                        @else
                                            {{$acity->name}}
                                        @endif
                                    @endforeach
                                @endif
                            </p>
                            <p><i class="fa fa-calendar"></i>{{$package->duration}}</p>
                        </div>
                        <div class="hotel-facility">
                            <p>

                                @foreach($inclutions as $inc)
                                    <i class="fa fa-asterisk"></i>{{$inc}}
                                @endforeach
                            </p>
                        </div>
                        <div class="hotel-desc">
                            <p class="list-inline">

                                {{str_limit( strip_tags( str_replace( '</p>', ' ', $package->details) ), 100)}} ....

                            </p>
                        </div>
                    </div>
                </div>
                <div class="clearfix visible-sm-block"></div>
                <div class="col-md-2 rating-price-box text-center clear-padding">
                    <div class="rating-box">
                        {{--                                    <div class="tripadvisor-rating">--}}
                        {{--                                        <img src="assets/images/tripadvisor.png" alt="cruise"><span>4.5/5.0</span>--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="user-rating">--}}
                        {{--                                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>--}}
                        {{--                                        <span>128 Guest Reviews.</span>--}}
                        {{--                                    </div>--}}
                        <div class="price">

                            @if (!blank($package_costs))
                                @foreach($package_costs as $pa)
                                    @if($loop->first)
                                        <h5>Starts From</h5>
                                        <h5>BDT {{$pa->cost}}<br>{{$pa->person}} Person</h5>
                                    @endif
                                @endforeach
                            @else
                                <h5>BDT {{$package->budget}}</h5>
                            @endif

                        </div>
                    </div>
                    {{--                                <div class="room-book-box">--}}
                    {{--                                    <div class="price">--}}

                    {{--                                        @if (!blank($package_costs))--}}
                    {{--                                            @foreach($package_costs as $pa)--}}
                    {{--                                                @if($loop->first)--}}
                    {{--                                                    <h5>BDT {{$pa->cost}} / <br>{{$pa->person}} Person</h5>--}}
                    {{--                                                @endif--}}
                    {{--                                            @endforeach--}}
                    {{--                                        @else--}}
                    {{--                                            <h5>BDT {{$package->budget}}</h5>--}}
                    {{--                                        @endif--}}

                    {{--                                    </div>--}}

                    {{--                                </div>--}}
                    <div class="room-book-box">
                        <div class="book">
                            <a href="{{route('coming-soon')}}">BOOK</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix visible-sm-block"></div>
@endforeach

<!-- END: HOTEL LIST VIEW -->
    <div class="clearfix"></div>

    <!-- START: PAGINATION -->
    <div class="bottom-pagination">
        <nav class="pull-right">
            @if(!blank($allPackages))
                {!! $allPackages->render() !!}
            @endif
        </nav>
    </div>
    <!-- END: PAGINATION -->
</div>
