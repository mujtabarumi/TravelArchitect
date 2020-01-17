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
                            <button class="float-right btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-lg"> Create</button>
                        </div>

                        <div class="card-body">
                            <table id="eventTable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Question</th>
                                    <th>Answer</th>
                                </tr>
                                </thead>

                            </table>
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
                    <h4 class="modal-title">FAQ</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Question</label>
                        <input class="form-control" id="qus" name="qus" required type="text">
                    </div>

                    <div class="form-group">
                        <label>Question</label>
                        <input class="form-control" id="qus" name="qus" required type="text">
                    </div>

                    <button type="button" class="btn btn-primary" onclick="eventSubmit(this)">Save</button>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('js')



@endsection
