
<div class="tab-content__header">
    <div class="row justify-content-between">
        <div class="col-lg-3 col-sm-6">
            <form class="input-group mb-3 mb-sm-0" method="get" action="{{ route('package.listing', [$param]) }}">
                <input type="text" class="form-control" name="search" value="{{ $search }}" placeholder="{{__('Search')}}..."/>
                <div class="input-group-append">
                    <button class="btn" type="submit">
                        <i class="fe-search"></i>
                    </button>
                </div>
            </form>
        </div>
        <div class="col-lg-4 col-sm-6 text-center text-sm-right">
            <a class="btn btn-danger" href="{{ route('package.add') }}">
                <i class="ti-plus"></i>
                {{__('Create a New Package')}}
            </a>
        </div>
    </div>
</div>
