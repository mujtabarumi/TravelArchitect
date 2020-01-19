@php
    $title = oldOrElse('title', $tabData);
    $duration = oldOrElse('duration', $tabData);
    $packageTypeId = oldOrElse('package_type_id', $tabData);
    $budget = oldOrElse('budget', $tabData);
    $recommended = oldOrElse('recommended', $tabData);
    $popular = oldOrElse('popular', $tabData);
    $air_price_included = oldOrElse('air_price_included', $tabData);
    $departure_date = oldOrElse('departure_date', $tabData);
    $valid_from = oldOrElse('valid_from', $tabData);
    $valid_till = oldOrElse('valid_till', $tabData);
    $is_everyday_departs = oldOrElse('is_everyday_departs', $tabData);

    $countryId = oldOrElse('address.country', $tabData);
    $stateId = oldOrElse('address.state', $tabData);
    $cityId = oldOrElse('address.city', $tabData);

    $selectedCountry = null;
    $selectedState = null;
    $selectedCity = null;
    $selectedPackageType = null;

    if (!blank($packageTypeId)) {
        $selectedPackageType = \App\Models\PackageType::find($packageTypeId);
    }

    if (!blank($countryId)) {
        $selectedCountry = \App\Models\Country::find($countryId);
        if (!blank($stateId)) {
            $selectedState = $selectedCountry->states->where('id',$stateId)->first();

        }
    }

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
                <input type="text" class="form-control" id="job_title" value="{{ $title }}" name="title" placeholder="{{__("Package title")}}">
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
                    <label>{{__("Package Type")}}</label>
                </div>
                <select class="form-control select2" id="package_type" name="package_type" data-placeholder="{{__("Select Type")}}">
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
                <select class="form-control select2" id="package_theme" name="package_theme" multiple data-placeholder="{{__("Select Theme")}}">

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
                    <input type="text" class="form-control date" name="valid_from" autocomplete="off" value="{{ $valid_from }}" placeholder="{{__("yyyy/mm/dd")}}" id="valid_from">
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
                    <input type="text" class="form-control" name="valid_till" autocomplete="off" value="{{ $valid_till }}" placeholder="{{__("yyyy/mm/dd")}}" id="valid_till">
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
                <div class="title-from-input d-flex justify-content-between">
                    <label class="col-form-label">{{__("Country")}}</label>
                </div>
                <select class="form-control select2" id="country" name="address[country]" data-placeholder="{{__("Select Country")}}">
                    @if(!blank($selectedCountry))
                        <option value="{{ $selectedCountry->id }}"> {{ $selectedCountry->name }}</option>
                    @endif
                </select>
                @component('components.input-validation-error',['field' => 'address.country']) @endcomponent
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">

                <div class="title-from-input d-flex justify-content-between" style="margin-top: 8px">
                    <label>{{__("State")}}</label> <small class="pull-right">
                        <a href="javascript:void(0)" id="addState"
                           data-meta-modal="#create_meta_data"
                           data-meta-modal-url=""
                           data-meta-modal-title="{{__("Create new state")}}"
                           data-meta-modal-placeholder="{{__("New state")}}"
                           data-meta-modal-type="state"
                           data-meta-option-id="#state"
                           data-meta-parent="country"
                           data-meta-parent-id="#country"
                           class="text-primary add-category"><i class="ti ti-plus"></i>{{__("Add State")}}</a>
                    </small>
                </div>


                <select class="form-control select2" id="state" name="address[state]" data-placeholder="{{__("Select State")}}">
                    @if(!blank($selectedState))
                        <option value="{{ $selectedState->id }}">{{ $selectedState->name }}</option>
                    @endif
                </select>
                @component('components.input-validation-error',['field' => 'address.state']) @endcomponent
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group mb-3">
                <div class="title-from-input d-flex justify-content-between" style="margin-top: 8px">
                    <label>{{__("City")}}</label> <small class="pull-right">
                        <a href="javascript:void(0)" id="addCity"
                           data-meta-modal="#create_meta_data"
                           data-meta-modal-url=""
                           data-meta-modal-title="{{__("Create new city")}}"
                           data-meta-modal-placeholder="{{__("New city")}}"
                           data-meta-modal-type="city"
                           data-meta-option-id="#city"
                           data-meta-parent="state"
                           data-meta-parent-id="#state"
                           class="text-primary add-category"><i class="ti ti-plus"></i>{{__("Add City")}}</a>
                    </small>
                </div>

                <select class="form-control select2" id="city" name="address[city]" data-placeholder="{{__("Select City")}}">
                    @if(!blank($selectedState) && !blank($cityId))
                        @foreach($selectedState->cities as $city)
                            <option value="{{ $city->id }}" {{ ($city->id == $cityId) ? "selected" : "" }}>{{ $city->name }}</option>
                        @endforeach
                    @endif
                </select>
                @component('components.input-validation-error',['field' => 'address.city']) @endcomponent
            </div>
        </div>
        <div class="col-md-6">
            <div class="title-from-input d-flex justify-content-between">
                <label class="col-form-label">{{__("Quick Infos")}}</label>
                @component('components.input-validation-error',['field' => 'recommended']) @endcomponent
                @component('components.input-validation-error',['field' => 'popular']) @endcomponent
                @component('components.input-validation-error',['field' => 'is_everyday_departs']) @endcomponent
                @component('components.input-validation-error',['field' => 'air_price_included']) @endcomponent
            </div>
            <div class="table table-responsive quick-info">
                <table class="table">
                    <tbody>
                    <tr>
                        <td>
                            <label class="form-check-label" for="recommended">{{__("Is Recomanded")}}</label>
                        </td>
                        <td class="border-right">
                            <input type="checkbox" class="form-check-input" name="recommended" id="recommended">
                        </td>
                        <td>
                            <label class="form-check-label" for="popular">{{__("Is Popular")}}</label>
                        </td>
                        <td>
                            <input type="checkbox" class="form-check-input" name="popular" id="popular">
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="col-form-label" for="departure_date">{{__("Departure Date")}}*</label>
                <div style="float: right" class="form-check">
                    <input type="checkbox" class="form-check-input" name="is_everyday_departs" id="is_everyday_departs">
                    <label class="form-check-label" for="is_everyday_departs">{{__("Is Everyday Departs")}}</label>
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
            <div class="form-group mb-3">
                <label class="col-form-label" for="departure_date">{{__("Budget")}}*</label>
                <div style="float: right" class="form-check">
                    <input type="checkbox" class="form-check-input" name="air_price_included" id="air_price_included">
                    <label class="form-check-label" for="air_price_included">{{__("Is Air Price Included")}}</label>
                </div>
                <div class="input-group">
                    <input type="number" class="form-control" name="budget" autocomplete="off" value="{{ $departure_date }}" placeholder="{{__("Budget")}}" id="budget">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="ti-notepad"></i></span>
                    </div>
                </div><!-- input-group -->
                @component('components.input-validation-error',['field' => 'budget']) @endcomponent
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
                startDate :date
            });
            addSelect2Ajax('#package_type','{{route('ajax.package.type')}}', null, {
                'tags' : true
            });
            addMultipleSelect2Ajax('#package_theme','{{route('ajax.package.theme')}}', null, {
                'tags' : true
            });

            addSelect2Ajax('#country', "{{ route('ajax.country') }}", function (e) {
                var countryId = $(this).val();
                $('#state').val("").trigger("change");
                $('#city').val("").trigger("change");
                var stateRoute = "{{ route('ajax.state',':id') }}".replace(':id',countryId);
                addSelect2Ajax('#state', stateRoute, function (e) {
                    var stateId = $(this).val();
                    $('#city').val("").trigger("change");
                    var cityRoute = "{{ route('ajax.city',[':country',':state']) }}".replace(":country",countryId).replace(':state',stateId);
                    addSelect2Ajax('#city',cityRoute,null,{ 'tags' : true });
                },{ 'tags' : true })
            });
        })
    </script>
@endpush
