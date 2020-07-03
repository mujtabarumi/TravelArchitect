@extends('layout.main')
@push('styles')
<style>
    .product-grid-view img {
        margin: 15px 20px;
    }
    .hotel-list-view img {
        margin: 10px 15px;
        padding: 0px !important;
    }

</style>
@endpush

@section('content')

    @include('package.package_search')

    <!-- START: LISTING AREA-->
    <div class="row">
        <div class="container">

            @include('package.package_search_filter')

            <!-- START: INDIVIDUAL LISTING AREA -->
                <div class="col-md-8 hotel-listing">

                    <!-- START: SORT AREA -->
{{--                    <div class="sort-area col-sm-10">--}}
{{--                        <div class="col-md-3 col-sm-3 col-xs-6 sort">--}}
{{--                            <select class="selectpicker">--}}
{{--                                <option>Price</option>--}}
{{--                                <option> Low to High</option>--}}
{{--                                <option> High to Low</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-3 col-sm-3 col-xs-6 sort">--}}
{{--                            <select class="selectpicker">--}}
{{--                                <option>Name</option>--}}
{{--                                <option> Ascending</option>--}}
{{--                                <option> Descending</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <!-- END: SORT AREA -->
                    <div class="clearfix visible-xs-block"></div>

{{--                    <div class="col-sm-2 view-switcher">--}}
{{--                        <div class="pull-right">--}}
{{--                            <a class="switchgrid" title="Grid View">--}}
{{--                                <i class="fa fa-th-large"></i>--}}
{{--                            </a>--}}
{{--                            <a class="switchlist active" title="List View">--}}
{{--                                <i class="fa fa-list"></i>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="clearfix"></div>

                    @include('package.package_lists')

                </div>


        </div>
    </div>
    <!-- END: LISTING AREA -->

@endsection


@push('scripts')

    <script>
        $(window).on('hashchange', function() {
            if (window.location.hash) {
                var page = window.location.hash.replace('#', '');
                if (page == Number.NaN || page <= 0) {
                    return false;
                }else{
                    getData(page);
                }
            }
        });

        $(document).ready(function()
        {
            $(document).on('click', '.pagination a',function(event)
            {
                event.preventDefault();

                $('li').removeClass('active');
                $(this).parent('li').addClass('active');

                var myurl = $(this).attr('href');
                var page=$(this).attr('href').split('page=')[1];
                getData(page);
            });

{{--            @if($cityId && !blank($cityId))--}}
{{--                var cityId = "{{$cityId}}";--}}
{{--                $('#city_filter').val(cityId).trigger('change');--}}
{{--            @endif--}}

        });

        function getData(page){

            var data = {
                'package_themes': $( "#search_themes" ).val(),

                'package_cities': $( "#city_filter" ).val(),
                // 'package_prices': $('#price-range').slider('values'),
                'package_types': $('#package_types').val(),
                'duration_filter': $('#duration_filter').val(),
            };

            console.log(data);

            $.ajax(
                {
                    url: '?page=' + page,
                    type: "get",
                    datatype: "html",
                    data: data
                }).done(function(data){

                $("#package-listing").empty().html(data);

                location.hash = page;
            }).fail(function(jqXHR, ajaxOptions, thrownError){
                alert('No response from server');
            });
        }

    </script>

@endpush
