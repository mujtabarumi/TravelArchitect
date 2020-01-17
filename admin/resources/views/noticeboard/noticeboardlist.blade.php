@extends('main')

@section('css')

@endsection

@section('content')

    <div class="content-wrapper">

        <section class="content">
            <div class="row mb-2">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Noticeboard</h3>
                            <button class="float-right btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-lg"> Create</button>
                        </div>

                        <div class="card-body">
                            <div class="table table-responsive">
                            <table id="noticboardTable" class="table table-bordered table-striped ">
                                <thead>
                                <tr>
                                    <th>Notice Title</th>
                                    <th>Notice Date</th>
                                    <th>Status</th>
                                    <th>Last Update</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                            </table>
                            </div>
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
                    <form method="post" action="{{route('noticeboard.insert')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                    <div class="form-group">
                        <label for="eventTitle"> Notice Title</label>
                        <input type="text" id="nbtitle" name="nbtitle" class="form-control" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="eventDetails">Notice Details</label>
                        <textarea type="text" id="nbDetails" name="nbDetails" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="eventStartDate">Notice date</label>
                        <input type="date" id="nbDate" name="nbDate" class="form-control date" placeholder="Enter date" >
                    </div>
                    <div class="form-group">
                        <label for="eventDate">Notice Image</label>
                        <input type="file" id="nbImage" name="nbImage" class="form-control"  >
                    </div>
                    <div class="form-group">
                        <label for="eventDate">Notice Document</label>
                        <input type="file" id="nbDocument" name="nbDocument" class="form-control"  >
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
@endsection

@section('js')

    <script>
        // $(document).ready(function() {
        //     $('#eventTable').DataTable({
        //         "paging": true,
        //         "lengthChange": false,
        //         "searching": false,
        //         "ordering": true,
        //         "info": true,
        //         "autoWidth": false,
        //     });
        //     $('#eventStartDate').datepicker();
        //     $('#eventDate').datepicker();
        // } );

        // function eventSubmit(data) {
        //     var eventTitle = $('#eventTitle').val();
        //     var eventStartDate = $('#eventStartDate').val();
        //     var eventDate = $('#eventDate').val();
        //     var eventTime = $('#eventTime').val();
        //     var eventVenue = $('#eventVenue').val();
        //     var eventRegFee = $('#eventRegFee').val();
        //     var eventStatus = $('#eventStatus').val();
        //     var eventDetails = $('#eventDetails').val();
        //     alert(eventTitle);
        // }
    </script>

    <script>
        $(document).ready( function () {
            $('#nbDate').datepicker({ dateFormat: 'yy-mm-dd' });

            $('#noticboardTable').DataTable({
                processing: true,
                serverSide: true,
                Filter: true,
                stateSave: true,
                type:"POST",
                "ajax":{
                    "url": "{!! route('noticeboard.getdata') !!}",
                    "type": "POST",
                    "data":{ _token: "{{csrf_token()}}"},
                },
                columns: [

                    { data: 'nbTitle', name: 'nbTitle'},
                    { data: 'nbDate', name: 'noticeboard.nbDate'},
                    { title: 'Status', data: 'status', orderable: true, searchable:true },
                    { data: 'updated_at', name: 'noticeboard.updated_at'},
                    { title: 'Action', data: 'action', orderable: false, searchable:false }
                    // { "data": function(data){
                    //
                    //         return '<a class="btn btn-default btn-sm"  data-panel-id="'+data.noticeboardId+'" onclick="editNoticeBoard(this)"><i class="fa fa-edit"></i></a>'
                    //             ;},
                    //     "orderable": false, "searchable":false, "name":"selected_rows" },
                ]

            });

        } );


        {{--function editClient(x) {--}}
        {{--    var id=$(x).data('panel-id');--}}

        {{--    $.ajax({--}}
        {{--        type: 'POST',--}}
        {{--        url: "{!! route('client.edit') !!}",--}}
        {{--        cache: false,--}}
        {{--        data: {_token: "{{csrf_token()}}",'id': id},--}}
        {{--        success: function (data) {--}}
        {{--            $("#editModalBody").html(data);--}}
        {{--            $('#editModal').modal();--}}
        {{--            // console.log(data);--}}
        {{--        }--}}
        {{--    });--}}
        {{--}--}}

            function noticeboardEdit(x){

                var id=$(x).data('panel-id');

                alert(id);


                {{--$.ajax({--}}
                {{--    type: 'POST',--}}
                {{--    url: "{!! route('noticeboard.edit') !!}",--}}
                {{--    cache: false,--}}
                {{--    data: {_token: "{{csrf_token()}}",'id': id},--}}
                {{--    success: function (data) {--}}
                {{--        $("#editModalBody").html(data);--}}
                {{--        $('#editModal').modal();--}}
                {{--        // console.log(data);--}}
                {{--    }--}}
                {{--});--}}
        }


    </script>


@endsection
