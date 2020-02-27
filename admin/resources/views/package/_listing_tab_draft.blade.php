<div role="tabpanel" class="tab-pane fade show active" id="draft_jobs">
    @include('package._listing_search_add')
    <div class="table-responsive bg-white mt-3 mb-4 draft_jobs">
        <table class="table table-bordered mb-0">
            <thead>
            <tr>
                <th style="width: 25%">{{{__("Title")}}}</th>
                <th style="width: 30%">{{__("Location")}}</th>
                <th style="width: 15%">{{__("Duration")}}</th>
                <th style="width: 10%">{{__("Budget")}}</th>
                <th style="width: 15%">{{__("Expiry Date")}}</th>
                <th style="width: 5%">{{__("Action")}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($packages as $package)
                @php
                    $package_address = data_get($package,'meta.address',[]);
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

                @endphp

                @if($package->status == \App\Enums\PackageStatus::DRAFT)
                    <tr>
                        <td class="text-center">
                            {{ $package->title }}
                        </td>
                        <td class="text-center">
                            <b>Country: </b>
                            @if(!blank($selectedCountries))
                                @foreach($selectedCountries as $sco)
                                    @if(!$loop->last)
                                        {{$sco->name}} ,
                                    @else
                                        {{$sco->name}}
                                    @endif
                                @endforeach
                            @endif
                            <br>
                            <b>City: </b>
                            @if(!blank($selectedCities))
                                @foreach($selectedCities as $sci)
                                    @if(!$loop->last)
                                        {{$sci->name}} ,
                                    @else
                                        {{$sci->name}}
                                    @endif
                                @endforeach
                            @endif

                        </td>
                        <td class="text-center">{{ $package->duration }} </td>
                        <td class="text-center">{{ $package->budget }} </td>
                        <td class="text-center">
                            {{ $package->valid_till->format(config('travelarchitect.user.date_format')) }}
                        </td>
                        <td class="text-center">
                            <div class="dropdown">
                                <a href="javascript:void;" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-settings"></i></a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('package.edit', $package->id) }}">{{__("Edit")}}</a>
                                    <a class="dropdown-item" href="{{ route('package.duplicate', $package->id) }}" onclick="return confirm('{{__("Are you sure, you want to duplicate this package?")}}')">{{__("Duplicate")}}</a>
                                    <a class="dropdown-item text-danger btn-delete-job" href="{{ route('package.delete', $package->id) }}"
                                       onclick="return confirm('{{__("Are you sure, you want to delete this package?")}}')">{{__("Delete")}}</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
        @if(blank($packages))
            <div class="alert alert-danger">{{__("No record found")}}</div>
        @endif
    </div>
</div>
@push('scripts')
    <script>
        $(function () {
            $('.table-responsive').on('show.bs.dropdown', function () {
                $('.table-responsive').css("overflow", "inherit");
            });

            $('.table-responsive').on('hide.bs.dropdown', function () {
                $('.table-responsive').css("overflow", "auto");
            });
        })
    </script>
@endpush
@push('styles')
    <style>
        .draft_jobs table thead tr th {
            text-align: center;
        }

    </style>
@endpush
