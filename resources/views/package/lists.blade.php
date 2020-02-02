@extends('layout.main')
@push('styles')

@endpush

@section('content')

    @include('package.package_search')

    <!-- START: LISTING AREA-->
    <div class="row">
        <div class="container">

            @include('package.package_search_filter')

            <!-- START: INDIVIDUAL LISTING AREA -->
            <div class="col-md-9 hotel-listing">

                <!-- START: SORT AREA -->
                <div class="sort-area col-sm-10">
                    <div class="col-md-3 col-sm-3 col-xs-6 sort">
                        <select class="selectpicker">
                            <option>Price</option>
                            <option> Low to High</option>
                            <option> High to Low</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6 sort">
                        <select class="selectpicker">
                            <option>Name</option>
                            <option> Ascending</option>
                            <option> Descending</option>
                        </select>
                    </div>
                </div>
                <!-- END: SORT AREA -->
                <div class="clearfix visible-xs-block"></div>

                <div class="col-sm-2 view-switcher">
                    <div class="pull-right">
                        <a class="switchgrid" title="Grid View">
                            <i class="fa fa-th-large"></i>
                        </a>
                        <a class="switchlist active" title="List View">
                            <i class="fa fa-list"></i>
                        </a>
                    </div>
                </div>

                <div class="clearfix"></div>

                <!-- START: HOTEL LIST VIEW -->
                <div class="switchable col-md-12 clear-padding">
                    @foreach($allPackages as $package)
                        @php
                            $p_image = $package->getMedia('slider_images');
                            $slider1  = $p_image->where('order_column', 1)->first();
                            $inclutions = json_decode(data_get($package, 'inclusion'));
                            $package_meta = json_decode($package->meta);
                            $package_costs = data_get($package_meta,'package_cost',[]);
                        @endphp
                    <div  class="hotel-list-view">
                        <div class="wrapper">
                            <div class="col-md-4 col-sm-6 switch-img clear-padding">
                                <img src="@if($slider1) {{url('admin'."/".$slider1->getUrl('search-list'))}} @else {{url('assets/images/tour3.jpg')}} @endif" alt="{{$package->title}}">
                            </div>
                            <div class="col-md-6 col-sm-6 hotel-info">
                                <div>
                                    <div class="hotel-header">
                                        <h5>{{$package->title}}</h5>
                                        <p><i class="fa fa-map-marker">

                                            </i>{{$package->address->city->name.", ".$package->address->country->name}} &nbsp;
                                            <i class="fa fa-calendar"></i>{{$package->duration}}</p>
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
{{--                                <div class="rating-box">--}}
{{--                                    <div class="tripadvisor-rating">--}}
{{--                                        <img src="assets/images/tripadvisor.png" alt="cruise"><span>4.5/5.0</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="user-rating">--}}
{{--                                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>--}}
{{--                                        <span>128 Guest Reviews.</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="price">--}}

{{--                                        @if (!blank($package_costs))--}}
{{--                                            @foreach($package_costs as $pa)--}}
{{--                                                @if($loop->first)--}}
{{--                                                    <h5>BDT {{$pa->cost}}/{{$pa->person}} Person</h5>--}}
{{--                                                @endif--}}
{{--                                            @endforeach--}}
{{--                                        @else--}}
{{--                                            <h5>BDT {{$package->budget}}</h5>--}}
{{--                                        @endif--}}

{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="room-book-box">
                                    <div class="price   ">

                                        @if (!blank($package_costs))
                                            @foreach($package_costs as $pa)
                                                @if($loop->first)
                                                    <h5>BDT {{$pa->cost}} / <br>{{$pa->person}} Person</h5>
                                                @endif
                                            @endforeach
                                        @else
                                            <h5>BDT {{$package->budget}}</h5>
                                        @endif

                                    </div>

                                </div>
                                <div class="room-book-box">
                                    <div class="book">
                                        <a href="#">BOOK</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix visible-sm-block"></div>
                    @endforeach

                    <!-- END: HOTEL LIST VIEW -->
                </div>

                <div class="clearfix"></div>



                <!-- START: PAGINATION -->
                <div class="bottom-pagination">
                    <nav class="pull-right">
                        @if(!blank($allPackages))
                            {{ $allPackages->links() }}
                        @endif
                    </nav>
                </div>
                <!-- END: PAGINATION -->
            </div>

        </div>
    </div>
    <!-- END: LISTING AREA -->

@endsection


@push('scripts')

@endpush
