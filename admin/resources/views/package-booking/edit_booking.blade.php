@extends('main')

@section('css')
    <style>
        .select2-container--default .select2-selection--single {
            width: 100%;
            height: calc(2.25rem + 2px);
            padding: .375rem .75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            box-shadow: inset 0 0 0 transparent;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }
    </style>
@endsection
@php
    use App\Models\Package;
    $offerId =  old('offer_id', data_get($bookingInfo,'offer_id'));
    $selectedOfferId = null;
    if (!blank($offerId)) {
            $selectedOfferId = $offerId;
    }
    $package = Package::find($bookingInfo->package_id);
    $allOffers = $package->offers;
@endphp
@section('content')

    <div class="content-wrapper">

        <section class="content">
            <div class="row mb-2">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Booking</h3>
                        </div>

                        <div class="card-body">

                            <form method="post" action="{{route('package.booking.update')}}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="hidden" name="id" value="{{$bookingInfo->id}}" name="id">
                                <input type="hidden" name="package_id" value="{{$bookingInfo->package_id}}" name="id">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="col-form-label" for="expiry_date">Start*</label>

                                            <div class="input-group">
                                                <input type="text" required class="form-control date" name="departure_date" autocomplete="off" value="{{ Carbon\Carbon::parse($bookingInfo->departure_date)->format("Y/m/d") }}" placeholder="{{__("yyyy/mm/dd")}}">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="ti-notepad"></i></span>
                                                </div>
                                            </div>
                                            <!-- input-group -->
                                            @component('components.input-validation-error',['field' => 'departure_date']) @endcomponent
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="col-form-label" for="expiry_date">Duration*</label>
                                            <div class="input-group">
                                                <select class="form-control select2" required name="duration">
                                                    <option @if($bookingInfo->duration == "3") selected @endif value="3">3 Days</option>
                                                    <option @if($bookingInfo->duration == "5") selected @endif value="5">5 Days</option>
                                                    <option @if($bookingInfo->duration == "7") selected @endif value="7">1 Week</option>
                                                    <option @if($bookingInfo->duration == "10") selected @endif value="10">10 Days</option>
                                                    <option @if($bookingInfo->duration == "14") selected @endif value="14">2 Week</option>
                                                    <option @if($bookingInfo->duration == "21") selected @endif value="21">3 Week</option>
                                                </select>
                                            </div><!-- input-group -->
                                            @component('components.input-validation-error',['field' => 'duration']) @endcomponent
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label class="col-form-label" for="expiry_date">Travel By*</label>

                                            <div class="input-group">
                                                <select class="form-control select2" required name="travel_by">
                                                    <option @if($bookingInfo->travel_by == "BUS") selected @endif value="BUS">BUS</option>
                                                    <option @if($bookingInfo->travel_by == "TRAIN") selected @endif value="TRAIN">TRAIN</option>
                                                    <option @if($bookingInfo->travel_by == "AIRPLANE") selected @endif value="AIRPLANE">AIRPLANE</option>
                                                </select>
                                            </div>
                                            <!-- input-group -->
                                            @component('components.input-validation-error',['field' => 'travel_by']) @endcomponent
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="col-form-label" for="expiry_date">Adult</label>

                                            <div class="input-group">
                                                <select class="form-control select2" name="meta[person][adult]">
                                                    <option @if($bookingInfo->meta['person']['adult'] == "1") selected @endif >1</option>
                                                    <option @if($bookingInfo->meta['person']['adult'] == "2") selected @endif >2</option>
                                                    <option @if($bookingInfo->meta['person']['adult'] == "3") selected @endif >3</option>
                                                    <option @if($bookingInfo->meta['person']['adult'] == "4") selected @endif >4</option>
                                                    <option @if($bookingInfo->meta['person']['adult'] == "5") selected @endif >5</option>
                                                    <option @if($bookingInfo->meta['person']['adult'] == "6") selected @endif >6</option>
                                                </select>
                                            </div>
                                            <!-- input-group -->
                                            @component('components.input-validation-error',['field' => 'meta[person][adult]']) @endcomponent
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="col-form-label" for="expiry_date">child</label>
                                            <div class="input-group">
                                                <select class="form-control select2" name="meta[person][child]">
                                                    <option @if($bookingInfo->meta['person']['child'] == "0") selected @endif >0</option>
                                                    <option @if($bookingInfo->meta['person']['child'] == "1") selected @endif >1</option>
                                                    <option @if($bookingInfo->meta['person']['child'] == "2") selected @endif >2</option>
                                                    <option @if($bookingInfo->meta['person']['child'] == "3") selected @endif >3</option>
                                                    <option @if($bookingInfo->meta['person']['child'] == "4") selected @endif >4</option>
                                                    <option @if($bookingInfo->meta['person']['child'] == "5") selected @endif >5</option>
                                                    <option @if($bookingInfo->meta['person']['child'] == "6") selected @endif >6</option>
                                                </select>
                                            </div><!-- input-group -->
                                            @component('components.input-validation-error',['field' => 'meta[person][child]']) @endcomponent
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="col-form-label" for="expiry_date">Single Room</label>

                                            <div class="input-group">
                                                <select class="form-control select2" name="meta[rooms][single_room]">
                                                    <option @if($bookingInfo->meta['rooms']['single_room'] == "1") selected @endif >1</option>
                                                    <option @if($bookingInfo->meta['rooms']['single_room'] == "2") selected @endif >2</option>
                                                    <option @if($bookingInfo->meta['rooms']['single_room'] == "3") selected @endif >3</option>
                                                    <option @if($bookingInfo->meta['rooms']['single_room'] == "4") selected @endif >4</option>
                                                    <option @if($bookingInfo->meta['rooms']['single_room'] == "5") selected @endif >5</option>
                                                    <option @if($bookingInfo->meta['rooms']['single_room'] == "6") selected @endif >6</option>
                                                </select>
                                            </div>
                                            <!-- input-group -->
                                            @component('components.input-validation-error',['field' => 'meta[rooms][single_room]']) @endcomponent
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="col-form-label" for="expiry_date">Double Room</label>
                                            <div class="input-group">
                                                <select class="form-control select2" name="meta[rooms][double_room]">
                                                    <option @if($bookingInfo->meta['rooms']['double_room'] == "1") selected @endif >1</option>
                                                    <option @if($bookingInfo->meta['rooms']['double_room'] == "2") selected @endif >2</option>
                                                    <option @if($bookingInfo->meta['rooms']['double_room'] == "3") selected @endif >3</option>
                                                    <option @if($bookingInfo->meta['rooms']['double_room'] == "4") selected @endif >4</option>
                                                    <option @if($bookingInfo->meta['rooms']['double_room'] == "5") selected @endif >5</option>
                                                    <option @if($bookingInfo->meta['rooms']['double_room'] == "6") selected @endif >6</option>
                                                </select>
                                            </div><!-- input-group -->
                                            @component('components.input-validation-error',['field' => 'meta[rooms][double_room]']) @endcomponent
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="col-form-label" for="expiry_date">Twin Room</label>

                                            <div class="input-group">
                                                <select class="form-control select2" name="meta[rooms][twin_room]">
                                                    <option @if($bookingInfo->meta['rooms']['twin_room'] == "1") selected @endif >1</option>
                                                    <option @if($bookingInfo->meta['rooms']['twin_room'] == "2") selected @endif >2</option>
                                                    <option @if($bookingInfo->meta['rooms']['twin_room'] == "3") selected @endif >3</option>
                                                    <option @if($bookingInfo->meta['rooms']['twin_room'] == "4") selected @endif >4</option>
                                                    <option @if($bookingInfo->meta['rooms']['twin_room'] == "5") selected @endif >5</option>
                                                    <option @if($bookingInfo->meta['rooms']['twin_room'] == "6") selected @endif >6</option>
                                                </select>
                                            </div>
                                            <!-- input-group -->
                                            @component('components.input-validation-error',['field' => 'meta[rooms][twin_room]']) @endcomponent
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="col-form-label" for="expiry_date">Double Room</label>
                                            <div class="input-group">
                                                <select class="form-control select2" name="meta[rooms][tripple_room]">
                                                    <option @if($bookingInfo->meta['rooms']['tripple_room'] == "1") selected @endif >1</option>
                                                    <option @if($bookingInfo->meta['rooms']['tripple_room'] == "2") selected @endif >2</option>
                                                    <option @if($bookingInfo->meta['rooms']['tripple_room'] == "3") selected @endif >3</option>
                                                    <option @if($bookingInfo->meta['rooms']['tripple_room'] == "4") selected @endif >4</option>
                                                    <option @if($bookingInfo->meta['rooms']['tripple_room'] == "5") selected @endif >5</option>
                                                    <option @if($bookingInfo->meta['rooms']['tripple_room'] == "6") selected @endif >6</option>
                                                </select>
                                            </div><!-- input-group -->
                                            @component('components.input-validation-error',['field' => 'meta[rooms][tripple_room]']) @endcomponent
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="col-form-label" for="expiry_date">Status*</label>

                                            <div class="input-group">
                                                <select class="form-control" name="status">
                                                    <option @if($bookingInfo->status == "0") selected @endif value="0" >New Booking Request</option>
                                                    <option @if($bookingInfo->status == "1") selected @endif value="1" >Pending</option>
                                                    <option @if($bookingInfo->status == "2") selected @endif value="2" >Confirmed</option>
                                                </select>
                                            </div>
                                            <!-- input-group -->
                                            @component('components.input-validation-error',['field' => 'meta[person][adult]']) @endcomponent
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div style="text-align: center" class="form-group mb-3">
                                            <label  class="col-form-label" for="expiry_date">Offer Info</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label class="col-form-label" for="expiry_date">Offer</label>
                                            <select class="form-control select2" required name="offer_id" data-placeholder="{{__("Select Offer")}}">
                                                @foreach($allOffers as $offers)
                                                    <option @if(!blank($selectedOfferId) && $selectedOfferId == $offers->id ) selected @endif value="{{ $offers->id }}">{{ $offers->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <button onclick="return confirm('Are you sure you want to submit this request?')" style="float: right" class="btn btn-success" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">NoticeBoard</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>

    <!-- The Edit Modal -->
    <div class="modal" id="editModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">View Search</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="editModalBody">

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')


    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });

        $('.date').datepicker({
            autoclose : true,
            format: 'yyyy/mm/dd',
        });

        {{--addSelect2Ajax('#offer_id','{{route('ajax.package.alloffer',['id' => $bookingInfo->package_id ])}}', null, {--}}
        {{--    'tags' : true--}}
        {{--});--}}

        {{--addSelect2Ajax('#offer_id', "{{ route('ajax.package.alloffer',$bookingInfo->package_id) }}", function (e) {--}}
        {{--    var countryId = $(this).val();--}}
        {{--    $('#state').val("").trigger("change");--}}
        {{--    $('#city').val("").trigger("change");--}}
        {{--    var stateRoute = "{{ route('ajax.state',':id') }}".replace(':id',countryId);--}}
        {{--    addSelect2Ajax('#state', stateRoute, function (e) {--}}
        {{--        var stateId = $(this).val();--}}
        {{--        $('#city').val("").trigger("change");--}}
        {{--        var cityRoute = "{{ route('ajax.city',[':country',':state']) }}".replace(":country",countryId).replace(':state',stateId);--}}
        {{--        addSelect2Ajax('#city',cityRoute,null,{ 'tags' : true });--}}
        {{--    },{ 'tags' : true })--}}
        {{--});--}}
    </script>


@endsection
