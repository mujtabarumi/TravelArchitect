<!-- START: MODIFY SEARCH -->
<div class="row modify-search modify-holiday">
    <div class="container">
        <div class="col-md-12 col-md-offset-3">
            <form method="get" action="{{route('package.lists')}}">
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="form-gp">
                        <label>Package Type</label>
                        <select name="package_types" id="package_types" class="selectpicker">
                            <option value="">Any</option>
                        @foreach($packageTypes as $types)
                            <option @if($types->id == $package_types) selected @endif value="{{$types->id}}">{{$types->name}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
{{--                <div class="col-md-3 col-sm-6 col-xs-6">--}}
{{--                    <div class="form-gp">--}}
{{--                        <label>Budget</label>--}}
{{--                        <select name="package_budget" id="package_budget" class="selectpicker">--}}
{{--                            <option @if("" == $package_budget) selected @endif value="">All</option>--}}
{{--                            <option @if('0,10000' == $package_budget) selected @endif value="0,10000">Upto BDT 10000</option>--}}
{{--                            <option @if('10000,50000' == $package_budget) selected @endif value="10000,50000">BDT (10000 - 50000)</option>--}}
{{--                            <option @if('50000,100000' == $package_budget) selected @endif value="50000,100000">BDT (50000 - 100000)</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="col-md-2 col-sm-6 col-xs-9">
                    <div class="form-gp">
{{--                        <button type="submit" class="modify-search-button btn transition-effect text-center">MODIFY SEARCH</button>--}}
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
<!-- END: MODIFY SEARCH -->
@push('scripts')
    <script>
        $( "#package_types" ).change(function() {

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

        $( "#package_budget" ).change(function() {

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
    </script>
@endpush
