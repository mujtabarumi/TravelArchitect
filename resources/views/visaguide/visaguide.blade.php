@extends('layout.main')
@section('content')
    @php
        $selectedCities = array();

    @endphp
    <div class="row page-title modify-holiday">
        <div class="container clear-padding text-center">
            <h3>Visa Guide</h3>
            <h5>We provide outstanding travel visa processing facilities.
                <br>Save yourself the hassle of running to and from travel agencies
                <br>and get your processing done in a breeze with us.</h5>
        </div>
    </div>
    <!-- END: PAGE TITLE -->

    <div class="row package-detail">
        <div class="container clear-padding">
            <div class="main-content col-md-12">
                <div class="row ">
                    <div class="form-gp col-lg-6">
                        <label>Please select a country</label>
                        <select class="form-control" id="country" name="countryid" data-placeholder="Select a country" >
                            <option value="">Select a Country</option>
                                @foreach($country as $sci)
                                    <option  value="{{$sci->id}}">{{$sci->name}}</option>
                                @endforeach
                        </select>


                    </div>

                    <div class="form-gp col-lg-2 modify-search" style="margin-top: -60px">
                        <button type="submit" class="modify-search-button btn transition-effect text-center" onclick="searchvisaguide()">
                            SEARCH
                        </button>
                    </div>
                </div>

                <br>
               <div id="viewvisaguide"></div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')

    <script>

        function searchvisaguide() {
            var countryid = document.getElementById("country").value;

            $.ajax({
                type: 'POST',
                url: "{!! route('viewvisaguide') !!}",
                cache: false,
                data: {_token: "{{csrf_token()}}",'id': countryid},
                success: function (data) {
                    $("#viewvisaguide").html(data);
                   // $('#editModal').modal();
                    // console.log(data);
                }
            });
        }

        {{--addSelect2AjaxAddress('#city','{{route('ajax.allCity')}}', null, {--}}
        {{--    'tags' : false,"multiple" : false--}}
        {{--});--}}
    </script>
@endpush