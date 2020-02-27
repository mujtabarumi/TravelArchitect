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
                            <h3 class="card-title">Event</h3>
                            <button class="float-right btn btn-sm btn-primary" data-toggle="modal" data-target="#eventModal"> Create</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="eventTable" class="table table-bordered table-striped"></table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="modal fade" id="eventModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Event</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="eventForm">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="eventTitle">Title</label>
                        <input type="text" id="eventTitle" class="form-control" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="eventStartDate">Start date</label>
                        <input type="text" id="eventStartDate" class="form-control" placeholder="Enter start date" readonly>
                    </div>
                    <div class="form-group">
                        <label for="eventDate">Event Date</label>
                        <input type="text" id="eventDate" class="form-control" placeholder="Enter event date" readonly>
                    </div>
                    <div class="form-group">
                        <label for="eventTime">Time</label>
                        <input type="text" id="eventTime" class="form-control" placeholder="Enter event time" >
                    </div>
                    <div class="form-group">
                        <label for="eventVenue">Venue</label>
                        <input type="text" id="eventVenue" class="form-control" placeholder="Enter event venue">
                    </div>
                    <div class="form-group">
                        <label for="eventRegFee">Registration Fee</label>
                        <input type="text" id="eventRegFee" class="form-control" placeholder="Enter event reg fee">
                    </div>
                    <div class="form-group">
                        <label for="eventVenue">Status</label>
                        <select id="eventStatus" class="form-control">
                            <option value="">Select</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="eventDetails">Details</label>
                        <textarea type="text" id="eventDetails" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="eventSubmit(this)">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('js')

    <script>
        $(document).ready(function() {
            $('#eventTable').DataTable({
                processing: true,
                serverSide: true,
                stateSave: true,
                "ajax":{
                    "url": "{{ route('event.all') }}",
                    "type": "POST",
                    data:function (d){
                        d._token="{{csrf_token()}}";
                    },
                },
                columns: [
                    { title: 'Title', data: 'eventTitle', name: 'eventTitle',orderable: false, searchable:true },
                    { title: 'Start Date', data: 'eventStartdate', name: 'eventStartdate',orderable: true, searchable:true },
                    { title: 'Event Date', data: 'eventDate', name: 'eventDate',orderable: true, searchable:true },
                    { title: 'Time', data: 'eventTime', name: 'eventTime',orderable: true, searchable:true },
                    { title: 'Fees', data: 'eventRegFee', name: 'eventRegFee',orderable: true, searchable:true },
                    { title: 'Status', data: 'status', orderable: true, searchable:true },
                    { title: 'Created', data: 'created', name: 'created_at',orderable: true, searchable:false },
                    { title: 'Action', data: 'action', orderable: false, searchable:false }
                ]
            });

            $('#eventStartDate').datepicker({ dateFormat: 'yy-mm-dd' });
            $('#eventDate').datepicker({ dateFormat: 'yy-mm-dd' });
        } );

        function eventSubmit(data) {
                $.ajax({
                    url: "{{ url('/event-create') }}",
                    method: 'post',
                    data: {
                        _token: '{{csrf_token()}}',
                        eventTitle: $('#eventTitle').val(),
                        eventStartDate: $('#eventStartDate').val(),
                        eventDate: $('#eventDate').val(),
                        eventTime: $('#eventTime').val(),
                        eventVenue: $('#eventVenue').val(),
                        eventRegFee: $('#eventRegFee').val(),
                        eventStatus: $('#eventStatus').val(),
                        eventDetails: $('#eventDetails').val()
                    },
                    success: function(data){
                        $('#eventModal').modal('hide');
                        $('#eventForm').trigger('reset');
                        toastr.success(data.message);
                        $('#eventTable').DataTable().draw(true);
                    },
                    error: function (err) {
                        if (err.status == 422) {
                            // console.log(err.responseJSON);
                            // $('#success_message').fadeIn().html(err.responseJSON.message);
                            // console.warn(err.responseJSON.errors);

                            $.each(err.responseJSON.errors, function (i, error) {
                                var el = $(document).find('[id="'+i+'"]');
                                el.after($('<span style="color: red;">'+error[0]+'</span>'));
                            });
                        }
                    }
                });
        }
    </script>


@endsection
