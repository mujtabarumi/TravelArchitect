@php
    use App\Models\City;
@endphp

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

                        $city = City::find($ph->city_id);
                           /* $phImage = $ph->getMedia('slider_images');
                            $slider1  = $phImage->where('order_column', 1)->first();*/

    /*                        dd(url('admin'."/".$slider1->getUrl())) */
                            //dd(data_get($reco,'meta.package_costing'));
                         //   dd(data_get($package_meta,'package_cost',[]));
                        @endphp

                        <div class="col-md-3">
                            <div onclick="location.href = '{{route('package.lists',['city' => $city->id])}}' ;" class="block fw hh"
                                 style="background-image: @if(!blank($ph->imageLink)) url('{{url('admin/public/popularcityImage'."/".$ph->imageLink)}}') @else url('{{url('assets/images/tour1.jpg')}}') @endif;
                                     background-repeat: no-repeat;
                                     background-size: cover;
                                ">
                                <div class="city overlay">
                                    <div class="text"><p> {{$city->name}} </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                @endif

            </div>
        </div>
    </div>
</section>
<!-- END: PRODUCT SECTION -->
