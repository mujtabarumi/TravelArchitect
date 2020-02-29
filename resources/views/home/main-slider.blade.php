
<div class="row">
    <div id="room-gallery" class="carousel slide bg-slider" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach ($homeSlider as $hs)
                <li data-target="#room-gallery" data-slide-to="{{$loop->index}}" class="@if($loop->first) active @endif"></li>
            @endforeach
        </ol>
        <div class="carousel-inner" role="listbox">
            @foreach ($homeSlider as $hs)
                @php
                    $cover_image = $hs->getMedia('cover_photo')->first();
                @endphp
            <div style="background-repeat: no-repeat;background-size: cover;background-image: @if($cover_image) url('{{url('admin'."/".$cover_image->getUrl())}}') @else url('{{url('assets/images/bg-image16.jpg')}}') @endif;"
                 class="item @if($loop->first) active @endif">
{{--                <img style="height: 230px;width: 1348px" src="@if($cover_image) {{url('admin'."/".$cover_image->getUrl())}} @else {{url('assets/images/bg-image16.jpg')}} @endif" alt="Cruise">--}}
                <div class="carousel-caption">
                    <div class="wrapper">
                        <h2><span>SKY HIGH DUBAI</span></h2>
                        <h4>DUBAI TOURS STARTING FROM <span>$499/PERSON</span></h4>
                        <a href="#">VIEW DETAILS</a>
                    </div>
                </div>
            </div>
            @endforeach
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
