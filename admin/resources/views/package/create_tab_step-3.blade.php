@php
$selectedIteneraries = old('itineraries',data_get($tabData,'itineraries',[]));
$itineraries = [];
    if (!blank($selectedIteneraries)) {
        $itineraries = \App\Models\PackageItinerary::find($selectedIteneraries);
    }


@endphp
<style>
    /* Thick red border */
    hr {
        border: 1px solid red;
    }
</style>
<div class="card">
    <div class="card-body">
        <div class="tab-pane active" id="step3">
            @if(!blank($itineraries))
                @foreach($itineraries as $itenerary)
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label class="col-form-label" for="itinerary_title">{{__("Title")}}*</label>
                                <input type="text" class="form-control" required id="itinerary_title" value="{{ $itenerary->title }}" name="itinerary[{{$loop->index}}][title]" placeholder="{{__("title")}}">
                                @component('components.input-validation-error',['field' => 'itinerary[{{$loop->index}}][title]']) @endcomponent
                                <div class="d-flex mt-2">
                                    <span class="text-blue text-uppercase mr-2">{{__("tips")}}:</span>
                                    <p class="text-muted mb-0">{{__("Title")}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label class="col-form-label" for="details">{{__("Itinerary Details")}}*</label>
                                <div id="snow-editor{{$loop->index}}" style="height: 300px;width: 100%">{!! $itenerary->details !!}</div> <!-- end Snow-editor-->
                                <textarea id="details{{$loop->index}}" class="details" name="itinerary[{{$loop->index}}][details]" style="visibility: hidden; height: 0; width: 0; overflow: hidden"></textarea>
                                @component('components.input-validation-error',['field' => 'itinerary[{{$loop->index}}][details]']) @endcomponent
                            </div>
                        </div> <!-- end col -->
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="inclusion">{{__("Itinerary Includes")}}</label>
                                <select data-placeholder="Add inclusions here" class="form-control select2" multiple id="inclusion" name="itinerary[{{$loop->index}}][includes][]">
                                    @foreach($itenerary->itineraryIncludes as $include)
                                        <option selected value="{{$include->id}}">{{$include->text}}</option>
                                    @endforeach
                                </select>
                                @component('components.input-validation-error',['field' => 'itinerary[{{$loop->index}}][includes][]']) @endcomponent
                            </div>
                        </div> <!-- end col -->
                    </div>
                @endforeach
            @else
                <div class="row">
                    <div class="col-12">
                        <div class="form-group mb-3">
                            <label class="col-form-label" for="job_title">{{__("Title")}}*</label>
                            <input type="text" class="form-control" required id="job_title" value="" name="itinerary[0][title]" placeholder="{{__("title")}}">
                            @component('components.input-validation-error',['field' => 'itinerary[0][title]']) @endcomponent
                            <div class="d-flex mt-2">
                                <span class="text-blue text-uppercase mr-2">{{__("tips")}}:</span>
                                <p class="text-muted mb-0">{{__("Title")}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group mb-3">
                            <label class="col-form-label" for="details">{{__("Itinerary Details")}}*</label>
                            <div id="snow-editor0" style="height: 300px;width: 100%"></div> <!-- end Snow-editor-->
                            <textarea id="details0" class="details" name="itinerary[0][details]" style="visibility: hidden; height: 0; width: 0; overflow: hidden"></textarea>
                            @component('components.input-validation-error',['field' => 'itinerary[0][details]']) @endcomponent
                        </div>
                    </div> <!-- end col -->
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="inclusion">{{__("Itinerary Includes")}}</label>
                            <select data-placeholder="Add inclusions here" class="form-control select2" multiple id="inclusion" name="itinerary[0][includes][]">

                            </select>
                            @component('components.input-validation-error',['field' => 'itinerary[0][includes][]']) @endcomponent
                        </div>
                    </div> <!-- end col -->
                </div>
            @endif
            <hr id="line0">
            <div id="itineraryWrapper"></div>

        </div>
    </div>
    <div class="card-footer">
        <button class="btn btn-danger btn-sm" id="addMoreItinerary" style="float: right">Add More</button>
    </div>
</div>



@push('scripts')
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

            $('form').submit(function (e) {
                for (var i =0; i<=index; i++) {
                    $('#details'+index).val($('#snow-editor'+index).find('.ql-editor').html());
                }
            });

            var itineraryWrapper = $('#itineraryWrapper');
            var btnRemoveItinerary = '.ti-close';

            @if(!blank($itineraries))
                var index = "{{$itineraries->count()}}";
            @else
                var index = 0;
            @endif

            var details = new Quill("#snow-editor"+index, {
                    theme: "snow",
                    modules: {
                        toolbar: editorToolbar
                    }
                });

            $('.select2').select2({
                tags: true,
                tokenSeparators: [',']
            });
            $('#line'+index).hide();
            $('#addMoreItinerary').click(function () {

                $('#line'+index).show();
                index++;

                $(itineraryWrapper).append(
                    `
                <div class="row">
                    <div class="col-12">
                        <div class="form-group mb-3">
                            <label class="col-form-label" for="job_title">Title*</label>
                            <input type="text" class="form-control" required id="job_title" value="" name="itinerary[${index}][title]" placeholder="title">

                            <div class="d-flex mt-2">
                                <span class="text-blue text-uppercase mr-2">tips:</span>
                                <p class="text-muted mb-0">Title</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group mb-3">
                            <label class="col-form-label" for="details">Itinerary Details*</label>
                            <div id="snow-editor${index}" class="snow-editor" style="height: 300px;width: 100%"></div>
                            <textarea id="details${index}" class="details" name="itinerary[${index}][details]" style="visibility: hidden; height: 0; width: 0; overflow: hidden"></textarea>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="inclusion">Itinerary Includes</label>
                            <select data-placeholder="Add inclusions here" class="form-control select2" multiple id="includes${index}" name="itinerary[${index}][includes][]">

                            </select>

                        </div>
                    </div>
                </div>
                <hr id="line${index}">
            `
                );
                $('#line'+index).hide();
                var details = new Quill("#snow-editor"+index, {
                    theme: "snow",
                    modules: {
                        toolbar: editorToolbar
                    }
                });

                $('#includes'+index).select2({
                    tags: true,
                    tokenSeparators: [',']
                });
                {{--$.ajax({--}}
                {{--    url: "{{route('')}}",--}}
                {{--    data: "",--}}
                {{--    type: "POST",--}}
                {{--    success: function(data){--}}
                {{--        --}}
                {{--    },--}}
                {{--    error:function(msg){}--}}
                {{--});--}}
            });
        });
    </script>
@endpush
