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
                            <h3 class="card-title">Add Visa Guide</h3>
                        </div>

                        <div class="card-body">

                                <form method="post" action="{{route('visaguide.insert')}}" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="eventTitle"> City</label>
{{--                                        <input type="text" id="nbtitle" name="cityid" class="form-control" placeholder="Enter email">--}}
                                        <select class="form-control select2" id="city" name="countryid"  data-placeholder="{{__("Select City")}}">

                                                @foreach($country as $sci)
                                                    <option selected value="{{$sci->id}}">{{$sci->name}}</option>
                                                @endforeach

                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label for="eventDetails">Local Time</label>
                                        <input type="text" id="localtime" name="localtime" class="form-control"  >
                                    </div>
                                    <div class="form-group">
                                        <label for="eventStartDate">Telephone Code</label>
                                        <input type="text" id="tcode" name="tcode" class="form-control date" placeholder="Enter date" >
                                    </div>
                                    <div class="form-group">
                                        <label for="eventDate">Bank Time</label>
                                        <input type="text" id="banktime" name="banktime" class="form-control"  >
                                    </div>
                                    <div class="form-group">
                                        <label for="eventDate">Exchange Rate</label>
                                        <input type="text" id="exchangerate" name="exchangerate" class="form-control"  >
                                    </div>
                                    <div class="form-group">
                                        <label for="eventDate">Embassy Address</label>
                                        <input type="text" id="embassyaddress" name="embassyaddress" class="form-control"  >
                                    </div>
                                    <div class="form-group">
                                        <label for="eventDetails">Visa Requirements</label>
                                        <textarea type="text" rows="5" id="localtime" name="visarequirements" class="form-control snow-editor"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="eventVenue">Status</label>
                                        <select id="noticeStatus" name="noticeStatus" class="form-control">
                                            <option value="">Select</option>
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
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

        $(function () {

            var editorToolbar = [
                [{
                    font: []
                }, {
                    size: []
                }],
                ["bold", "italic", "underline", "strike"],
                [{
                    color: []
                }, {
                    background: []
                }],
                [{
                    script: "super"
                }, {
                    script: "sub"
                }],
                [{
                    header: [!1, 1, 2, 3, 4, 5, 6]
                }, "blockquote", "code-block"],
                [{
                    list: "ordered"
                }, {
                    list: "bullet"
                }, {
                    indent: "-1"
                }, {
                    indent: "+1"
                }],
                ["direction", {
                    align: []
                }],
                ["link", "image", "video", "formula"],
                ["clean"]
            ];

            new Quill(".snow-editor", {
                theme: "snow",
                modules: {
                    toolbar: editorToolbar
                }
            });
        });



        {{--addSelect2AjaxAddress('#city','{{route('ajax.allCity')}}', null, {--}}
        {{--    'tags' : false,"multiple" : false--}}
        {{--});--}}
    </script>


@endsection
