@php
    $title = oldOrElse('title', $tabData);
    $duration = oldOrElse('duration', $tabData);
    $duration_in_days = old('duration_in_days', data_get($tabData,'meta.duration_in_days'));
    $packageTypeId = old('package_type', data_get($tabData,'package_type_id'));
    $packageTheme = old('package_theme', data_get($tabData,'theme_map'));
    if (!is_array($packageTheme)) {
        $packageTheme = json_decode($packageTheme);
    }
    $budget = oldOrElse('budget', $tabData);

    $air_price_included = oldOrElse('air_price_included', $tabData);
    $departure_date = oldOrElse('departure_date', $tabData);
    $valid_from = oldOrElse('valid_from', $tabData);
    $valid_till = oldOrElse('valid_till', $tabData);
    $is_everyday_departs = oldOrElse('is_everyday_departs', $tabData);

    $selectedPackageType = null;

    if (!blank($packageTypeId)) {
        $selectedPackageType = \App\Models\PackageType::find($packageTypeId);
    }

    $package_address = old('meta.address', data_get($tabData,'meta.address',[]));

    $selectedCountries = array();

    $selectedCities = array();

    if (!blank($package_address)) {
        $country = data_get($package_address,'country',[]);
        $city = data_get($package_address,'city',[]);
        if (!blank($country)) {
            foreach ($country as $co) {
                $dataCo = \App\Models\Country::find($co);
                array_push($selectedCountries,$dataCo);
            }
        }
        if (!blank($city)) {
            foreach ($city as $ci) {
                $dataCi = \App\Models\City::find($ci);
                array_push($selectedCities,$dataCi);
            }
        }
    }

  /*  $countryId = old('address.country', data_get($tabData,'address.country_id'));
    $stateId = old('address.state',data_get($tabData,'address.state_id'));
    $cityId = old('address.city',data_get($tabData,'address.city_id'));



    if (!blank($countryId)) {
        $selectedCountry = \App\Models\Country::find($countryId);
        if (!blank($stateId)) {
            $selectedState = $selectedCountry->states->where('id',$stateId)->first();

        }
    }*/

@endphp
@push('styles')
    <style>
        .quick-info table tbody tr td {
            border: none;
        }
        .quick-info table {
            border: 1px solid #ced4da !important;
        }
    </style>
@endpush
<div class="tab-pane active" id="step1">
    <div class="row">
        <div class="col-12">
            <div class="form-group mb-3">
                <label class="col-form-label" for="job_title">{{__("Package Title")}}*</label>
                <input type="text" class="form-control"  id="job_title" value="{{ $title }}" name="title" placeholder="{{__("Package title")}}">
                @component('components.input-validation-error',['field' => 'title']) @endcomponent
                <div class="d-flex mt-2">
                    <span class="text-blue text-uppercase mr-2">{{__("tips")}}:</span>
                    <p class="text-muted mb-0">{{__("Package Title")}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group mb-3">
                <div class="title-from-input d-flex justify-content-between" style="margin-top: 8px">
                    <label>{{__("Package Type")}}*</label>
                </div>
                <select class="form-control select2" required id="package_type" name="package_type" data-placeholder="{{__("Select Type")}}">
                    @if(!blank($selectedPackageType))
                        <option value="{{ $selectedPackageType->id }}">{{ $selectedPackageType->name }}</option>
                    @endif
                </select>
                @component('components.input-validation-error',['field' => 'Package Type']) @endcomponent
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <div class="title-from-input d-flex justify-content-between" style="margin-top: 8px">
                    <label>{{__("Package Theme")}}</label>
                </div>
                <select class="form-control select2" id="package_theme" name="package_theme[]" multiple data-placeholder="{{__("Select Theme")}}">
                    @if(!blank($packageTheme))
                        @foreach($packageTheme as $pt)
                        <option selected value="{{ $pt }}">{{ $pt }}</option>
                        @endforeach
                    @endif
                </select>
                @component('components.input-validation-error',['field' => 'Package Type']) @endcomponent
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="col-form-label" for="expiry_date">{{__("Valid From")}}*</label>
                <div class="input-group">
                    <input type="text" required class="form-control date" name="valid_from" autocomplete="off" value="{{ $valid_from }}" placeholder="{{__("yyyy/mm/dd")}}" id="valid_from">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="ti-notepad"></i></span>
                    </div>
                </div><!-- input-group -->
                @component('components.input-validation-error',['field' => 'valid_from']) @endcomponent
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="col-form-label" for="expiry_date">{{__("Valid Till")}}*</label>
                <div class="input-group">
                    <input type="text" required class="form-control date" name="valid_till" autocomplete="off" value="{{ $valid_till }}" placeholder="{{__("yyyy/mm/dd")}}" id="valid_till">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="ti-notepad"></i></span>
                    </div>
                </div><!-- input-group -->
                @component('components.input-validation-error',['field' => 'valid_till']) @endcomponent
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="col-form-label" for="departure_date">{{__("Departure Date")}}</label>
                <div style="float: right" class="form-check mt-2">
                    <input type='hidden' value='0' name='is_everyday_departs'>
                    <input type="checkbox" class="form-check-input" value="1" {{ oldOrElse('is_everyday_departs', $tabData) == 1 ? 'checked' : "" }} name="is_everyday_departs" id="is_everyday_departs">
                    <label class="form-check-label" for="is_everyday_departs">{{__("Is Everyday Departs")}}</label>
                    @component('components.input-validation-error',['field' => 'is_everyday_departs']) @endcomponent
                </div>
                <div class="input-group">
                    <input type="text" class="form-control date" name="departure_date" autocomplete="off" value="{{ $departure_date }}" placeholder="{{__("yyyy/mm/dd")}}" id="departure_date">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="ti-notepad"></i></span>
                    </div>
                </div><!-- input-group -->
                @component('components.input-validation-error',['field' => 'departure_date']) @endcomponent
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">

                <div class="form-group col-md-4 mb-3">
                    <label class="col-form-label" for="departure_date">{{__("Budget")}}*</label>
                    <div style="float: right" class="form-check mt-2">
                        <input type='hidden' value='0' name='air_price_included'>
                        <input type="checkbox" class="form-check-input" value="1" {{ oldOrElse('air_price_included', $tabData) == 1 ? 'checked' : "" }} name="air_price_included" id="air_price_included">
                        <label class="form-check-label" for="air_price_included">{{__("Is Air Price Included")}}</label>
                        @component('components.input-validation-error',['field' => 'air_price_included']) @endcomponent
                    </div>
                    <div class="input-group">
                        <input type="number" class="form-control" required name="budget" autocomplete="off" value="{{ $budget }}" placeholder="{{__("Budget")}}" id="budget">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="ti-notepad"></i></span>
                        </div>
                    </div><!-- input-group -->
                    @component('components.input-validation-error',['field' => 'budget']) @endcomponent
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label class="col-form-label" for="duration">Duration<span style="color: red">(text)</span>*</label>
                    <div class="input-group">
                        <input type="text" class="form-control" required name="duration" autocomplete="off" value="{{ $duration }}" placeholder="{{__("7 days 6 night")}}" id="duration">
                    </div><!-- input-group -->
                    @component('components.input-validation-error',['field' => 'duration']) @endcomponent
                </div>
                <div class="form-group col-md-2 mb-3">
                    <label class="col-form-label" for="duration">Duration<span style="color: red">(days)</span>*</label>
                    <div class="input-group">
                        <input type="number" min="0" class="form-control" required name="duration_in_days" autocomplete="off" value="{{ $duration_in_days }}" placeholder="{{__("Duration in days only number")}}" id="duration_in_days">
                    </div><!-- input-group -->
                    @component('components.input-validation-error',['field' => 'duration_in_days']) @endcomponent
                </div>

            </div>
        </div>
    </div>
{{-- address --}}
    <div class="row">
        <div class="col-md-6">
            <div class="form-group mb-3">
                <div class="title-from-input d-flex justify-content-between" style="margin-top: 8px">
                    <label>Country*</label>
                </div>
                <select class="form-control select2" id="country" name="meta[address][country][]" multiple data-placeholder="{{__("Select Country")}}">
                    @if(!blank($selectedCountries))
                        @foreach($selectedCountries as $sco)
                            <option selected value="{{$sco->id}}">{{$sco->name}}</option>
                        @endforeach
                    @endif
                </select>
                @component('components.input-validation-error',['field' => 'meta.address.country']) @endcomponent
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <div class="title-from-input d-flex justify-content-between" style="margin-top: 8px">
                    <label>city*</label>
                </div>
                <select class="form-control select2" id="city" name="meta[address][city][]" multiple data-placeholder="{{__("Select City")}}">
                    @if(!blank($selectedCities))
                        @foreach($selectedCities as $sci)
                            <option selected value="{{$sci->id}}">{{$sci->name}}</option>
                        @endforeach
                    @endif
                </select>
                @component('components.input-validation-error',['field' => 'meta.address.city']) @endcomponent
            </div>
        </div>
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

            addSelect2Ajax('#package_type','{{route('ajax.package.type')}}', null, {
                'tags' : true
            });
            addMultipleSelect2Ajax('#package_theme','{{route('ajax.package.theme')}}', null, {
                'tags' : true
            });
            addSelect2AjaxAddress('#country','{{route('ajax.country')}}', null, {
                'tags' : false,"multiple" : true
            });

            addSelect2AjaxAddress('#city','{{route('ajax.allCity')}}', null, {
                'tags' : false,"multiple" : true
            });

            {{--addSelect2Ajax('#country', "{{ route('ajax.country') }}", function (e) {--}}
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
        })
    </script>
@endpush
