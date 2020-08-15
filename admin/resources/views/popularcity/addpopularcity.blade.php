@extends('main')

@section('css')

@endsection
@php
    $selectedCities = array();


@endphp
@section('content')

    <div class="content-wrapper">

        <section class="content">
            <div class="row mb-2">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Add Popular City</h3>
                        </div>

                        <div class="card-body">

                            <form method="post" action="{{route('popularcity.insert')}}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="eventTitle"> City</label>
                                    {{--                                        <input type="text" id="nbtitle" name="cityid" class="form-control" placeholder="Enter email">--}}
                                    <select class="form-control select2" id="city" name="countryId"  data-placeholder="{{__("Select City")}}">
                                        @if(!blank($selectedCities))
                                            @foreach($selectedCities as $sci)
                                                <option selected value="{{$sci->id}}">{{$sci->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label for="eventDetails">Image</label>
                                    <input type="file" id="localtime" name="imageLink" class="form-control"  >
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" >Save</button>
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


        addSelect2AjaxAddress('#city','{{route('ajax.allCity')}}', null, {
            'tags' : false,"multiple" : false
        });
    </script>


@endsection
