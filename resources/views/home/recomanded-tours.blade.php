
<!-- BEGIN: Recomanded holidays -->
<section id="recent-blog">
    <div class="row top-offer">
        <div class="container">
            <div class="section-title text-center">
                <h2>Recommended Tours</h2>
            </div>

            @if(!empty($recommendedTours))
                <div class="" id="post-list">
                    @foreach($recommendedTours as $recoTour)
                        @php
                            $recoImage = $recoTour->getMedia('recomanded_images')->first();
                            $slider1  = $recoImage->where('order_column', 1)->first();
                            $package_meta = json_decode($recoTour->meta);
                            $package_costs = data_get($package_meta,'package_cost',[]);
                            $package_places = data_get($package_meta,'places',[]);
                        @endphp

                                        <div class="room-grid-view wow slideInUp" style="margin-right: 30px;width: 262px"
                                             data-wow-delay="0.{{$loop->iteration}}s">
                                           <div class="holiday-custom"
                                                style="background-image: @if($recoImage) url('{{url('admin'."/".$recoImage->getUrl())}}') @else url('{{url('assets/images/holiday-slide3.jpg')}}') @endif;
                                                    background-repeat: no-repeat;
                                                    background-size: cover;">
                                                    <div class="text">
                                                        <div class="top">
                                                            <ul>
                                                                <li>
                                                                    <img src="assets/images/calender.png">
                                                                    <span>{{$recoTour->duration}}</span>
                                                                </li>
                                                                <li>
                                                                    <img src="assets/images/coin.png">
                                                                    <span>{{$recoTour->budget}}</span>
                                                                </li>
                                                                <li>
                                                                    <img src="assets/images/share.png">
                                                                    <span>5</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div onclick="location.href = '{{route('package.details',['package' => $recoTour->id])}}' ;" class="bottom">
                                                            <h4>
                                                            @if (!blank($package_costs))
                                                                @foreach($package_costs as $pa)
                                                                    @if($loop->first)
                                                                        <span>Price starts from ({{$pa->person}} person)</span><br>
                                                                        <span>BDT {{$pa->cost}}</span>
                                                                    @endif
                                                                @endforeach
                                                            @endif

                                                                <span>
                                                                    <p>
                                                                        {{$recoTour->title}}
                                                                    </p>
                                                                    <p>
                                                                        @if (!blank($package_places))
                                                                            <small>
                                                                                <i class="fa fa-map-marker">
                                                                                    {{implode(' - ',$package_places)}}
                                                                                </i>
                                                                            </small>
                                                                        @endif
                                                                    </p>

                                                                    </span>
                                                                </h4>

                                                        </div>

                                                    </div>
                                                    <div class="clearfix"></div>
                                           </div>

                                        </div>


                    @endforeach


                </div>

            @endif
        </div>
    </div>
</section>
<!-- END: Recomanded holidays -->
@push('scripts')
    <script>
        $(document).ready(function() {

            var owl = $('#post-list');
            owl.owlCarousel({
                items : 4,
                loop:true,
                navigation : true,
                autoplay:true,
                autoplayTimeout:10000,
                autoplayHoverPause:true,
                nav:true,
                pagination:true
            });

        });
    </script>
@endpush
