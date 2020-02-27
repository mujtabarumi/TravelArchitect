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
    </style>
@endpush
<!-- START: FILTER AREA -->
<div class="col-md-3 clear-padding">
    <div class="filter-head text-center">
        <h4>25 Result Found Matching Your Search.</h4>
    </div>
    <div class="filter-area">
        <div class="price-filter filter">
            <h5><i class="fa fa-usd"></i> Price</h5>
            <p>
                <label></label>
                <input type="text" id="amount" readonly>
            </p>
            <div id="price-range"></div>
        </div>
        <div class="star-filter filter">
            <h5><i class="fa fa-calendar"></i> Duration</h5>
            <select class="selectpicker">
                <option>Any</option>
                <option>Upto 3 Days</option>
                <option>5 to 7 Days</option>
                <option>9 to 11 Days</option>
                <option>12 to 14 Days</option>
                <option>Above 14 Days</option>
            </select>
        </div>
        <div class="location-filter filter">
            <h5><i class="fa fa-globe"></i> Country</h5>
            <select class="select2 form-control" id="country_filter" name="country_filter">
                <option value="0">Any</option>
                @foreach($allPackagedCountry as $country)
                    <option value="{{$country->id}}">{{$country->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="filter">
            <h5><i class="fa fa-pagelines"></i>Theme</h5>
            <select id="search_themes" class="selectpicker">
                <option>Any</option>
                @foreach($allthemes as $themes)
                <option value="{{$themes->name}}">{{$themes->name}}</option>
                @endforeach
            </select>
        </div>
{{--        <div class="facilities-filter filter">--}}
{{--            <h5><i class="fa fa-list"></i> Inclusion</h5>--}}
{{--            <select class="selectpicker">--}}
{{--                <option>Any</option>--}}
{{--                <option>Flight</option>--}}
{{--                <option>Transportation</option>--}}
{{--                <option>Sightseeing</option>--}}
{{--                <option>Meals</option>--}}
{{--                <option>Drinks</option>--}}
{{--            </select>--}}
{{--        </div>--}}
    </div>
</div>
<!-- END: FILTER AREA -->

@push('scripts')
    <script>
        /* Price Range Slider */

        $(function() {
            "use strict";
            $( "#price-range" ).slider({
                range: true,
                min: 0,
                max: 100,
                values: [ 3, 50 ],
                slide: function( event, ui ) {
                    $( "#amount" ).val( "$ " + ui.values[ 0 ] + " - $ " + ui.values[ 1 ] );
                }
            });
            $( "#amount" ).val( "$ " + $( "#price-range" ).slider( "values", 0 ) +
                " - $ " + $( "#price-range" ).slider( "values", 1 ) );

            let select2Poka = $('#country_filter').select2({
                placeholder : "Select a Country",
                // allowClear : true,
                closeOnSelect : true,

            });

            $( "#search_themes" ).change(function() {
                alert($(this).val());
                filter_package();

            });

            function filter_package() {

                var data = {
                    'package_themes': $( "#search_themes" ).val(),
                };

                $.ajax({
                    type: "GET",
                    url: "{{route('package.lists')}}",
                    data: data,
                    cache: false,
                    success: function(data){
                        console.log(data);
                    }
                });
            }

        });
    </script>
@endpush
