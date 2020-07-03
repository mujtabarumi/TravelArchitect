@php
    $selectedOffers = old('offers',data_get($tabData,'offers',[]));
    $offers = [];
        if (!blank($selectedOffers)) {
            $offers = \App\Models\PackageOffers::find($selectedOffers);
        }

@endphp


<style>
    /* Thick red border */
    hr {
        border: 1px solid red;
    }
</style>
<div class="card">
    <div class="card-body">
        <div class="tab-pane active" id="step5">
            @if(!blank($offers))
                @foreach($offers as $offers)
                    <div id="itineraryDiv{{$loop->index}}" class="">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="col-form-label" for="expiry_date">{{__("Valid From")}}*</label>

                                    <div class="input-group">
                                        <input type="text" required class="form-control date" name="offer[{{$loop->index}}][valid_from]" autocomplete="off" value="{{ Carbon\Carbon::parse($offers->valid_from)->format("y/m/d") }}" placeholder="{{__("yyyy/mm/dd")}}">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="ti-notepad"></i></span>
                                        </div>
                                    </div>
                                    <!-- input-group -->
                                    @component('components.input-validation-error',['field' => 'offer[{{$loop->index}}][valid_from]']) @endcomponent
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="col-form-label" for="expiry_date">{{__("Valid Till")}}*</label>
                                    @if($loop->count > 1 || $loop->index != 0)
                                        <button class="btn btn-danger btn-sm removeItinerary" id="RemoveItinerary" data-div-id="{{$loop->index}}" style="float: right">Remove</button>
                                    @endif
                                    <div class="input-group">
                                        <input type="text" required class="form-control date" name="offer[{{$loop->index}}][valid_till]" autocomplete="off" value="{{ Carbon\Carbon::parse($offers->valid_till)->format("y/m/d") }}" placeholder="{{__("yyyy/mm/dd")}}">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="ti-notepad"></i></span>
                                        </div>
                                    </div><!-- input-group -->
                                    @component('components.input-validation-error',['field' => 'offer[{{$loop->index}}][valid_till]']) @endcomponent
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label class="col-form-label" for="expiry_date">Name*</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" required value="{{ $offers->name }}" name="offer[{{$loop->index}}][name]" placeholder="">
                                    </div><!-- input-group -->
                                    @component('components.input-validation-error',['field' => 'offer[{{$loop->index}}][name]']) @endcomponent
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="col-form-label" for="expiry_date">{{__("Departure Date")}}*</label>
                                    <div class="input-group">
                                        <input type="text" required class="form-control" name="offer[{{$loop->index}}][departure_date]" autocomplete="off" value="{{ $offers->departure_date }}" placeholder="">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="ti-notepad"></i></span>
                                        </div>
                                    </div><!-- input-group -->
                                    @component('components.input-validation-error',['field' => 'offer[{{$loop->index}}][departure_date]']) @endcomponent
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="col-form-label" for="expiry_date">{{__("Departure Time")}}*</label>
                                    <div class="input-group">
                                        <input type="text" required class="form-control" name="offer[{{$loop->index}}][departure_time]" autocomplete="off" value="{{ $offers->departure_time }}" placeholder="">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="ti-notepad"></i></span>
                                        </div>
                                    </div><!-- input-group -->
                                    @component('components.input-validation-error',['field' => 'offer[{{$loop->index}}][departure_time]']) @endcomponent
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div align="middle" class="form-group">
                                    <label for="">{{__("Hotel Room Cost (per person)")}}</label>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="col-form-label" for="expiry_date">{{__("Single")}}*</label>
                                    <div class="input-group">
                                        <input type="number" min="1" required class="form-control col-md-5" id="cost" value="{{$offers->hotel_room_cost_info['single']}}" name="offer[{{$loop->index}}][hotel_room_cost][single]" autocomplete="off" placeholder="cost">
                                    </div><!-- input-group -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="col-form-label" for="expiry_date">{{__("Double")}}*</label>
                                    <div class="input-group">
                                        <input type="number" min="1" required class="form-control col-md-5" id="cost" value="{{$offers->hotel_room_cost_info['double']}}" name="offer[{{$loop->index}}][hotel_room_cost][double]" autocomplete="off" placeholder="cost">
                                    </div><!-- input-group -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="col-form-label" for="expiry_date">{{__("Twin")}}*</label>
                                    <div class="input-group">
                                        <input type="number" min="1" required class="form-control col-md-5" id="cost" value="{{$offers->hotel_room_cost_info['twin']}}" name="offer[{{$loop->index}}][hotel_room_cost][twin]" autocomplete="off" placeholder="cost">
                                    </div><!-- input-group -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="col-form-label" for="expiry_date">{{__("Triple")}}*</label>
                                    <div class="input-group">
                                        <input type="number" min="1" required class="form-control col-md-5" id="cost" value="{{$offers->hotel_room_cost_info['triple']}}" name="offer[{{$loop->index}}][hotel_room_cost][triple]" autocomplete="off" placeholder="cost">
                                    </div><!-- input-group -->
                                </div>
                            </div> <!-- end col -->
                        </div>
{{--                        <div class="row">--}}
{{--                            <div class="col-12">--}}
{{--                                <div align="middle" class="form-group">--}}
{{--                                    <label for="">{{__("Cost Additional")}}</label>--}}
{{--                                </div>--}}
{{--                            </div> <!-- end col -->--}}
{{--                        </div>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-md-6">--}}
{{--                                <div class="form-group mb-3">--}}
{{--                                    <label class="col-form-label" for="expiry_date">{{__("Addional cost (Hotel)")}}</label>--}}
{{--                                    <div class="input-group">--}}
{{--                                        <input type="text" class="form-control col-md-5" name="" id="title{{$loop->index}}" autocomplete="off" placeholder=" title " >--}}
{{--                                        &nbsp;&nbsp;<input type="number" min="1" class="form-control col-md-5" id="cost{{$loop->index}}" name="" autocomplete="off" placeholder="cost">--}}
{{--                                        &nbsp;&nbsp;<button class="btn btn-info btn-sm" data-log-id="{{$loop->index}}" id="addHotelAdditionalCost{{$loop->index}}" style="float: right">Add More</button>--}}
{{--                                    </div><!-- input-group -->--}}

{{--                                </div>--}}
{{--                                <ul class="mt-1" id="package-costWrapper{{$loop->index}}">--}}
{{--                                    @foreach($package_costs as $p_c)--}}
{{--                                        <li class="package-cost-list">--}}
{{--                                            <span>{{ $p_c['title'] }}</span><b> - Cost: </b><span>{{$p_c['cost']}}</span>--}}
{{--                                            <input type="hidden" value="{{ $p_c['title'] }}" name="hotel[additional_cost][{{$loop->index}}][title]">--}}
{{--                                            <input type="hidden" value="{{$p_c['cost']}}" name="hotel[additional_cost][{{$loop->index}}][cost]">--}}
{{--                                            <i class="ti-close pointer ml-1"></i>--}}
{{--                                        </li>--}}
{{--                                    @endforeach--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        @if(!$loop->last)
                            <hr id="line{{$loop->index}}">
                        @endif

                    </div>
                @endforeach
            @else

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="col-form-label" for="expiry_date">{{__("Valid From")}}*</label>
                            <div class="input-group">
                                <input type="text" required class="form-control date" name="offer[0][valid_from]" autocomplete="off" value="" placeholder="{{__("yyyy/mm/dd")}}">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="ti-notepad"></i></span>
                                </div>
                            </div><!-- input-group -->
                            @component('components.input-validation-error',['field' => 'offer[0][valid_from]']) @endcomponent
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="col-form-label" for="expiry_date">{{__("Valid Till")}}*</label>
                            <div class="input-group">
                                <input type="text" required class="form-control date" name="offer[0][valid_till]" autocomplete="off" value="" placeholder="{{__("yyyy/mm/dd")}}">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="ti-notepad"></i></span>
                                </div>
                            </div><!-- input-group -->
                            @component('components.input-validation-error',['field' => 'offer[0][valid_till]']) @endcomponent
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label class="col-form-label" for="expiry_date">Name*</label>
                            <div class="input-group">
                                <input type="text" class="form-control" required value="" name="offer[0][name]" placeholder="">
                            </div><!-- input-group -->
                            @component('components.input-validation-error',['field' => 'offer[0][name]']) @endcomponent
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="col-form-label" for="expiry_date">{{__("Departure Date")}}*</label>
                            <div class="input-group">
                                <input type="text" required class="form-control" name="offer[0][departure_date]" autocomplete="off" value="" placeholder="">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="ti-notepad"></i></span>
                                </div>
                            </div><!-- input-group -->
                            @component('components.input-validation-error',['field' => 'offer[0][departure_date]']) @endcomponent
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="col-form-label" for="expiry_date">{{__("Departure Time")}}*</label>
                            <div class="input-group">
                                <input type="text" required class="form-control" name="offer[0][departure_time]" autocomplete="off" value="" placeholder="">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="ti-notepad"></i></span>
                                </div>
                            </div><!-- input-group -->
                            @component('components.input-validation-error',['field' => 'offer[0][departure_time]']) @endcomponent
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div align="middle" class="form-group">
                            <label for="">{{__("Hotel Room Cost (per person)")}}</label>
                        </div>
                    </div> <!-- end col -->
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="col-form-label" for="expiry_date">{{__("Single")}}*</label>
                            <div class="input-group">
                                <input type="number" min="1" required class="form-control col-md-5" id="cost" value="" name="offer[0][hotel_room_cost][single]" autocomplete="off" placeholder="cost">
                            </div><!-- input-group -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="col-form-label" for="expiry_date">{{__("Double")}}*</label>
                            <div class="input-group">
                                <input type="number" min="1" required class="form-control col-md-5" id="cost" value="" name="offer[0][hotel_room_cost][double]" autocomplete="off" placeholder="cost">
                            </div><!-- input-group -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="col-form-label" for="expiry_date">{{__("Twin")}}*</label>
                            <div class="input-group">
                                <input type="number" min="1" required class="form-control col-md-5" id="cost" value="" name="offer[0][hotel_room_cost][twin]" autocomplete="off" placeholder="cost">
                            </div><!-- input-group -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="col-form-label" for="expiry_date">{{__("Triple")}}*</label>
                            <div class="input-group">
                                <input type="number" min="1" required class="form-control col-md-5" id="cost" value="" name="offer[0][hotel_room_cost][triple]" autocomplete="off" placeholder="cost">
                            </div><!-- input-group -->
                        </div>
                    </div> <!-- end col -->
                </div>
{{--                <div class="row">--}}
{{--                    <div class="col-12">--}}
{{--                        <div align="middle" class="form-group">--}}
{{--                            <label for="">{{__("Cost Additional")}}</label>--}}
{{--                        </div>--}}
{{--                    </div> <!-- end col -->--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-6">--}}
{{--                        <div class="form-group mb-3">--}}

{{--                            <div class="input-group">--}}
{{--                                <input type="text" class="form-control col-md-5" name="" id="title0" autocomplete="off" placeholder=" title " >--}}
{{--                                &nbsp;&nbsp;<input type="number" min="1" class="form-control col-md-5" id="cost0" name="" autocomplete="off" placeholder="cost">--}}
{{--                                &nbsp;&nbsp;<button class="btn btn-info btn-sm addHotelAdditionalCost" data-log-id="0" id="addHotelAdditionalCost0" style="float: right">Add More</button>--}}
{{--                            </div><!-- input-group -->--}}

{{--                        </div>--}}
{{--                        <ul class="mt-1" id="package-costWrapper0">--}}
{{--                            @foreach($package_costs as $p_c)--}}
{{--                                <li class="package-cost-list">--}}
{{--                                    <span>{{ $p_c['title'] }}</span><b> - Cost: </b><span>{{$p_c['cost']}}</span>--}}
{{--                                    <input type="hidden" value="{{ $p_c['title'] }}" name="hotel[additional_cost][{{$loop->index}}][title]">--}}
{{--                                    <input type="hidden" value="{{$p_c['cost']}}" name="hotel[additional_cost][{{$loop->index}}][cost]">--}}
{{--                                    <i class="ti-close pointer ml-1"></i>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <hr id="line0">--}}
            @endif

            <div id="itineraryWrapper"></div>

        </div>
    </div>
    <div class="card-footer">
        <button class="btn btn-info btn-sm" id="addMoreItinerary" style="float: right">Add More</button>
    </div>
</div>



@push('scripts')
    <script>
        $(function () {

            let date = new Date();
            date.setDate(date.getDate() + 1);

            $('.date').datepicker({
                autoclose : true,
                startDate :date,
                format: 'yyyy/mm/dd',
            });

            @if(session()->get('errors'))
                toastr.error("{{ session()->get('errors')->first() }}");
            @endif

            var itineraryWrapper = $('#itineraryWrapper');
            var btnRemoveItinerary = '.ti-close';

            @if(!blank($offers))

            var index = "{{$offers->count()}}";
                // $('#line'+(index-1)).hide();
            @else
            var index = 0;
                // $('#line'+index).hide();
            @endif

            {{--var btnRemovePackageCost = '.ti-close';--}}
            {{--bindRemovePackageCost();--}}
            {{--var packagege_cost_count = "{{count($package_costs)}}";--}}

            {{--$('#addHotelAdditionalCost'+index).click(function () {--}}
            {{--    event.preventDefault();--}}
            {{--    var log = $(this).data('log-id');--}}
            {{--    var inputTtile = $('#title'+log);--}}
            {{--    var inputCost = $('#cost'+log);--}}
            {{--    var title = $(inputTtile).val();--}}
            {{--    var cost = $(inputCost).val();--}}



            {{--    $('#package-costWrapper'+log).append(packageCostTemplates.replace(/:title/g,title)--}}
            {{--        .replace(/:cost/g,cost).replace(/:count/g,packagege_cost_count));--}}
            {{--    $(inputTtile).val("");--}}
            {{--    $(inputCost).val("");--}}
            {{--    bindRemovePackageCost();--}}
            {{--    packagege_cost_count++;--}}


            {{--});--}}

            {{--function bindRemovePackageCost(){--}}
            {{--    $(btnRemovePackageCost).unbind('click').click(function (e) {--}}
            {{--        e.preventDefault();--}}
            {{--        $(this).closest('.package-cost-list').remove();--}}
            {{--    });--}}
            {{--}--}}

            {{--var packageCostTemplates = `--}}
            {{--    <li class="benefit-list-item">--}}
            {{--        <span>:title</span> <b>- BDT:</b> <span>:cost</span>--}}
            {{--        <input type="hidden" value=":title" name="hotel[additional_cost][:count][title]">--}}
            {{--        <input type="hidden" value=":cost" name="hotel[additional_cost][:count][cost]">--}}
            {{--        <i class="fa fa-trash-o pointer ml-1"></i>--}}
            {{--    </li>--}}
            {{--`;--}}

            $('#addMoreItinerary').click(function () {
                index++;
                $(itineraryWrapper).append(
                    `
                <div id="itineraryDiv${index}" class="">
                    <hr id="line${index}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="col-form-label" for="expiry_date">Valid From*</label>
                            <div class="input-group">
                                <input type="text" required class="form-control date" id="offer[${index}][valid_from]" name="offer[${index}][valid_from]" autocomplete="off" value="" placeholder="yyyy/mm/dd">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="ti-notepad"></i></span>
                                </div>
                            </div>

                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group mb-3">
                    <label class="col-form-label" for="expiry_date">Valid Till*</label>
                    <button class="btn btn-danger btn-sm removeItinerary" onclick="removeItinerary(this)" id="RemoveItinerary" data-div-id="${index}" style="float: right">Remove</button>
                    <div class="input-group">
                    <input type="text" required class="form-control date" id="offer[${index}][valid_till]" name="offer[${index}][valid_till]" autocomplete="off" value="" placeholder="yyyy/mm/dd">
                    <div class="input-group-append">
                    <span class="input-group-text"><i class="ti-notepad"></i></span>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label class="col-form-label" for="expiry_date">Name</label>
                            <div class="input-group">
                                <input type="text" required class="form-control"  value="" name="offer[${index}][name]" placeholder="">
                            </div>

                    </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="col-form-label" for="expiry_date">Departure Date*</label>
                            <div class="input-group">
                                <input type="text" required class="form-control" name="offer[${index}][departure_date]" autocomplete="off" value="" placeholder="">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="ti-notepad"></i></span>
                                </div>
                            </div>


                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group mb-3">
                    <label class="col-form-label" for="expiry_date">Departure Time*</label>
                    <div class="input-group">
                    <input type="text" required class="form-control" name="offer[${index}][departure_time]" autocomplete="off" value="" placeholder="">
                    <div class="input-group-append">
                    <span class="input-group-text"><i class="ti-notepad"></i></span>
                    </div>
                    </div>

                    </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-12">
                        <div align="middle" class="form-group">
                            <label for="">Hotel Room Cost (per person)</label>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                    <div class="form-group mb-3">
                    <label class="col-form-label" for="expiry_date">Single*</label>
                    <div class="input-group">
                    <input type="number" min="1" required class="form-control col-md-5" id="cost" value="" name="offer[${index}][hotel_room_cost][single]" autocomplete="off" placeholder="cost">
                    </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group mb-3">
                    <label class="col-form-label" for="expiry_date">Double*</label>
                    <div class="input-group">
                    <input type="number" min="1" required class="form-control col-md-5" id="cost" value="" name="offer[${index}][hotel_room_cost][double]" autocomplete="off" placeholder="cost">
                    </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group mb-3">
                    <label class="col-form-label" for="expiry_date">Twin*</label>
                    <div class="input-group">
                    <input type="number" min="1" required class="form-control col-md-5" id="cost" value="" name="offer[${index}][hotel_room_cost][twin]" autocomplete="off" placeholder="cost">
                    </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group mb-3">
                    <label class="col-form-label" for="expiry_date">Triple*</label>
                    <div class="input-group">
                    <input type="number" min="1" required class="form-control col-md-5" id="cost" value="" name="offer[${index}][hotel_room_cost][triple]" autocomplete="off" placeholder="cost">
                    </div>
                    </div>
                    </div>
                    </div>

                </div>
            `
                );



                let date = new Date();
                date.setDate(date.getDate() + 1);


                $('.date').datepicker({
                    autoclose : true,
                    startDate :date,
                    format: 'yyyy/mm/dd',
                });


            });

            $('.removeItinerary').click(function () {
                event.preventDefault();
                var divId = $(this).data('div-id');
                $('#itineraryDiv'+divId).remove();
                $('#line'+(divId-1)).hide();
            });

        });
        function removeItinerary(x) {

            var divId = $(x).data('div-id');
            $('#itineraryDiv'+divId).remove();
            //$('#line'+(divId-1)).hide();
        }

        // function globalBindRemovePackageCost(){
        //     $(btnRemovePackageCost).unbind('click').click(function (e) {
        //         e.preventDefault();
        //         $(this).closest('.package-cost-list').remove();
        //     });
        // }

        // var globalPackageCostTemplates = `
        //         <li class="benefit-list-item">
        //             <span>:title</span> <b>- BDT:</b> <span>:cost</span>
        //             <input type="hidden" value=":title" name="hotel[additional_cost][:count][title]">
        //             <input type="hidden" value=":cost" name="hotel[additional_cost][:count][cost]">
        //             <i class="fa fa-trash-o pointer ml-1"></i>
        //         </li>
        //     `;
        //
        // function addHotelAdditionalCost(x) {
        //
        //     event.preventDefault();
        //
        //     var inputTtile = $('#title'+x);
        //     var inputCost = $('#cost'+x);
        //     var title = $(inputTtile).val();
        //     var cost = $(inputCost).val();
        //
        //
        //
        //     $('#package-costWrapper'+x).append(globalPackageCostTemplates.replace(/:title/g,title)
        //         .replace(/:cost/g,cost).replace(/:count/g,packagege_cost_count));
        //     $(inputTtile).val("");
        //     $(inputCost).val("");
        //     globalBindRemovePackageCost();
        //     packagege_cost_count++;
        // }

    </script>
@endpush
