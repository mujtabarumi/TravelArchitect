@push('styles')
    <style>
        .select2-container--default .select2-selection--single {
            background: transparent none repeat scroll 0 0;
            border: 1px solid #BEC4C8;
            border-radius: 0;
            height: 40px !important;
            width: 100% !important;

        }
        .select2-container .select2-selection--single .select2-selection__rendered {
            padding: 6px 12px;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            position: absolute;
            top: 4px;
            right: 10px;
            margin-top: 4px;
            vertical-align: middle;
        }
        .select2-container--default .select2-selection--single .select2-selection__clear {
            float: left;
        }
    </style>
@endpush
@php
    use App\Models\City;
    $selectedCity = null;
    if($cityId && !blank($cityId)) {
        $selectedCity = City::find($cityId);
    }
@endphp
<!-- START: FILTER AREA -->
<div class="col-md-4 clear-padding">
    <div class="filter-head text-center">
        <h4>Filter your choice</h4>
    </div>
    <div class="filter-area">
{{--        <div class="price-filter filter">--}}
{{--            <h5><i class="fa fa-usd"></i> Price</h5>--}}
{{--            <p>--}}
{{--                <label></label>--}}
{{--                <input type="text" id="amount" readonly>--}}
{{--            </p>--}}
{{--            <div id="price-range"></div>--}}
{{--        </div>--}}
        <div class="star-filter filter">
            <h5><i class="fa fa-calendar"></i> Duration</h5>
            <select id="duration_filter" class="selectpicker">
                <option value="">Any</option>
                @foreach($allPackagedDuration as $duration)
                    <option value="{{$duration}}">{{$duration}} days</option>
                @endforeach
            </select>
        </div>
{{--        <div class="location-filter filter">--}}
{{--            <h5><i class="fa fa-globe"></i> Country</h5>--}}
{{--            <select class="select2 form-control" id="country_filter" name="country_filter" data-placeholder="{{__("Select Country")}}">--}}
{{--                <option value="">Any</option>--}}
{{--                @foreach($allPackagedCountry as $country)--}}
{{--                    <option value="{{$country->id}}">{{$country->name}}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div>--}}
{{--        <div class="location-filter filter">--}}
{{--            <h5><i class="fa fa-globe"></i> State</h5>--}}
{{--            <select class="select2 form-control" id="state_filter" name="state_filter">--}}

{{--            </select>--}}
{{--        </div>--}}
        <div class="location-filter filter">
            <h5><i class="fa fa-globe"></i> City</h5>
            <select class="form-control select2" id="city_filter" name=city_filter" data-placeholder="{{__("Select City")}}">
                @if(!blank($selectedCity))
                    <option selected value="{{$selectedCity->id}}">{{$selectedCity->name}}</option>
                @endif
            </select>
        </div>
        <div class="filter">
            <h5><i class="fa fa-pagelines"></i>Theme</h5>
            <select id="search_themes" class="selectpicker">
                <option value="">Any</option>
                @foreach($allthemes as $themes)
                <option value="{{$themes->name}}">{{$themes->name}}</option>
                @endforeach
            </select>
        </div>

    </div>
</div>
<!-- END: FILTER AREA -->

@push('scripts')
    <script>
        /* Price Range Slider */

        $(function() {

            // $( "#price-range" ).slider({
            //     range: true,
            //     min: 0,
            //     max: 200000,
            //     values: [ 0, 50000 ],
            //     slide: function( event, ui ) {
            //         $( "#amount" ).val( "৳ " + ui.values[ 0 ] + " - ৳ " + ui.values[ 1 ] );
            //
            //         if (window.location.hash) {
            //             var page = window.location.hash.replace('#', '');
            //             if (page == Number.NaN || page <= 0) {
            //                 return false;
            //             }else{
            //               //  getData(page);
            //             }
            //         } else {
            //             var page = 1;
            //            // getData(page);
            //         }
            //
            //     }
            // });
            //
            // $( "#amount" ).val( "৳ " + $( "#price-range" ).slider( "values", 0 ) +
            //     " - ৳ " + $( "#price-range" ).slider( "values", 1 ) );


            $( "#search_themes" ).change(function() {

                if (window.location.hash) {
                    var page = window.location.hash.replace('#', '');
                    if (page == Number.NaN || page <= 0) {

                        return false;
                    }else{
                        getData(page);

                    }
                } else {
                    var page = 1;
                    getData(page);
                }

            });

            $( "#country_filter" ).change(function() {

                if (window.location.hash) {
                    var page = window.location.hash.replace('#', '');
                    if (page == Number.NaN || page <= 0) {
                        return false;
                    }else{
                        getData(page);
                    }
                } else {
                    var page = 1;
                    getData(page);
                }

            });
            $( "#city_filter" ).change(function() {

                if (window.location.hash) {
                    var page = window.location.hash.replace('#', '');
                    if (page == Number.NaN || page <= 0) {
                        return false;
                    }else{
                        getData(page);
                    }
                } else {
                    var page = 1;
                    getData(page);
                }

            });

            $( "#duration_filter" ).change(function() {

                if (window.location.hash) {
                    var page = window.location.hash.replace('#', '');
                    if (page == Number.NaN || page <= 0) {
                        return false;
                    }else{
                        var page = 1;
                        getData(page);
                    }
                } else {
                    var page = 1;
                    getData(page);
                }

            });

            $('.select2').select2({
                placeholder: 'This is my placeholder',
                allowClear: true
            });

            addSelect2AjaxAddress('#city_filter','{{route('ajax.allCity')}}', null, {
                'tags' : false,"multiple" : false,
                'placeholder': 'This is my placeholder',
                'allowClear': true
            });

        });
    </script>
@endpush
