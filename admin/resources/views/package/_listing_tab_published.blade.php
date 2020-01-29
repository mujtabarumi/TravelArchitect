<div role="tabpanel" class="tab-pane fade show active" id="published_jobs">
    @include('package._listing_search_add')
    <div class="mt-3 mb-4">
    @foreach($packages as $package)
        @if($package->status == \App\Enums\PackageStatus::PUBLISHED)

                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-pills card-header-pills">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="#">Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="#">Itinerary</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="#">Media</a>
                            </li>

                        </ul>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">{{ $package->title }}</h4>
                        <p class="card-text">
                            <div class="job-list-meta">
                                <h6 class="job-list-category"><b>City:</b> {{ $package->address->city->name }}</h6>
                                    <span><b>Duration:</b> {{ $package->duration }}</span> &nbsp;&nbsp;
                                    <span><b>Budget:</b> {{ $package->budget }}</span> &nbsp;&nbsp;
                                <span><b>{{ __("Expiry Date") }}:</b> {{ $package->valid_till->format(config('travelarchitect.user.date_format')) }}</span>
                            </div>
                            <div class="job-list-meta">

                                @if($package->is_expired)
                                    <div class="btn btn-danger btn-sm">{{__("Expired")}}</div>
                                @else
                                    <div class="btn btn-success btn-sm">{{__("Active")}}</div>
                                @endif

                                @if($package->is_recommended)
                                    <div class="btn btn-primary btn-sm">{{__("Recomanded")}}</div>
                                @endif

                                @if($package->is_popular)
                                    <div class="btn btn-danger btn-sm">{{__("Popular")}}</div>
                                @endif

                            </div>
                        </p>

                    </div>
                    <div style="text-align: right" class="card-footer">

{{--                            <li>--}}
{{--                                <div class="dropdown">--}}
{{--                                    <a href="javascript:;" class="socialShareBtn" id="social-share-{{$loop->iteration}}" data-toggle="dropdown" data-placement="top" title="{{__('Social Share')}}">--}}
{{--                                        <i class="dripicons-export"></i>--}}
{{--                                    </a>--}}
{{--                                    <div class="dropdown-menu" aria-labelledby="social-share-{{$loop->iteration}}">--}}
{{--                                        <a class="dropdown-item disabled" href="javascript:void(0);">{{__('Social Share')}}</a>--}}
{{--                                        <div class="dropdown-divider"></div>--}}
{{--                                        @foreach($job->shareLinks() as $name => $link)--}}
{{--                                            <a class="dropdown-item btn-job-share" href="{{ url($link) }}" target="_blank"><i class="{{ getSocialShareIcon($name) }}"></i> {{ ucfirst($name) }}</a>--}}
{{--                                        @endforeach--}}
{{--                                        <a class="dropdown-item copy-job-link" href="{{ $job->previewLink() }}"><i class="fas fa-copy"></i> {{__("Copy Link")}}</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
                            <a class="btn btn-sm btn-primary" href="{{ route('package.edit', $package->id) }}">{{__('Edit')}}</a>
                            <a class="btn btn-sm btn-default" href="{{ route('package.duplicate', $package->id) }}" onclick="return confirm('{{__("Are you sure, you want to duplicate this package?")}}')">{{__('Duplicate')}}</a>
                            <a class="btn btn-sm btn-danger" href="{{ route('package.delete', $package->id) }}" onclick="return confirm('{{__("Are you sure, you want to delete this package?")}}')" >{{__('Delete')}}</a>

                    </div>
                </div>
            @endif
        @endforeach

        @if(blank($packages))
            <div class="alert alert-danger">{{__("No record found")}}</div>
        @endif
    </div>
</div>
@push('scripts')
    <script>

    </script>
@endpush

@push('styles')
<style>

</style>
@endpush
