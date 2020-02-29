
<div class="row">
    <div id="room-gallery" class="carousel slide bg-slider" data-ride="carousel">
        <ol class="carousel-indicators">
            @if(!blank($homeSlider))
                @foreach ($homeSlider as $hs)
                    <li data-target="#room-gallery" data-slide-to="{{$loop->index}}" class="@if($loop->first) active @endif"></li>
                @endforeach
            @else
                <li data-target="#room-gallery" data-slide-to="0" class="active"></li>
            @endif
        </ol>
        <div class="carousel-inner" role="listbox">
            @if(!blank($homeSlider))
                @foreach ($homeSlider as $hs)
                    @php
                        $cover_image = $hs->getMedia('cover_photo')->first();
                        $package_meta = json_decode($hs->meta);
                        $package_costs = data_get($package_meta,'package_cost',[]);
                    @endphp
                <div style="background-repeat: no-repeat;background-size: cover;background-image: @if($cover_image) url('{{url('admin'."/".$cover_image->getUrl())}}') @else url('{{url('assets/images/bg-image16.jpg')}}') @endif;"
                     class="item @if($loop->first) active @endif">
                    <img style="height: 230px;width: 1850px;object-fit: cover" src="@if($cover_image) {{url('admin'."/".$cover_image->getUrl())}} @else {{url('assets/images/bg-image16.jpg')}} @endif" alt="Cruise">
                    <div class="carousel-caption">
                        <div class="wrapper">
                            <h2><span> {{$hs->title}} </span></h2>
                            @if (!blank($package_costs))
                                @foreach($package_costs as $pa)
                                    @if($loop->first)
                                        <h4> Starts From <span>BDT {{$pa->cost}}/{{$pa->person}} Person</span></h4>
                                    @endif
                                @endforeach
                            @else
                                <h4><span>BDT {{$hs->budget}}</span></h4>
                            @endif
    {{--                        <h4>DUBAI TOURS STARTING FROM <span>$499/PERSON</span></h4>--}}
                            <a href="{{route('package.details',['package' => $hs->id])}}">VIEW DETAILS</a>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="item active">
                    <img style="height: 230px;width: 1850px;object-fit: cover" src="assets/images/holiday-slide3.jpg" alt="Cruise">
                    <div class="carousel-caption">
                        <div class="wrapper">
{{--                            <h2><span>SKY HIGH DUBAI</span></h2>--}}
{{--                            <h4>DUBAI TOURS STARTING FROM <span>$499/PERSON</span></h4>--}}
{{--                            <a href="#">VIEW DETAILS</a>--}}
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <a class="left carousel-control" href="#room-gallery" role="button" data-slide="prev">
            <span class="fa fa-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#room-gallery" role="button" data-slide="next">
            <span class="fa fa-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
