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
                            <h3 class="card-title">All Booking Request</h3>
{{--                            <a href="{{route('visaguide.add')}}"> <button  class="float-right btn btn-sm btn-primary" > Create</button></a>--}}

                        </div>

                        <div class="card-body">
                            <div class="table table-responsive">
                                <table id="noticboardTable" class="table table-bordered table-striped ">
                                    <thead>
                                    <tr>
                                        <th>User Info</th>
                                        <th>Travel Info</th>
                                        <th>Package Info</th>
                                        <th>Price</th>
                                        <th>Status</th>
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

@endsection

@section('js')

    <script>
        $(document).ready( function () {

            $('#noticboardTable').DataTable({
                processing: true,
                serverSide: true,
                Filter: true,
                stateSave: true,
                type:"POST",
                "ajax":{
                    "url": "{!! route('package.booking.request.getdata') !!}",
                    "type": "POST",
                    "data":{ _token: "{{csrf_token()}}"},
                },
                columns: [

                    { data: 'User-info', name: 'User-info'},

                    { data: 'travel_by', name: 'travel_by'},
                    { data: 'Package-info', name: 'Package-info'},

                    { data: 'price', name: 'price'},
                    { "data": function(data){

                            if (data.status === 0) {
                                return '<span style="color: red">New Booking Request</span>';
                            } else if (data.status === 1) {
                                return '<span style="color: green">Booking Confirmed</span>';
                            }
                        },
                        "orderable": false, "searchable":false, "name":"selected_rows"
                    },
                    { title: 'Action', data: 'action', orderable: false, searchable:false }

                ]

            });

        } );


    </script>


@endsection
