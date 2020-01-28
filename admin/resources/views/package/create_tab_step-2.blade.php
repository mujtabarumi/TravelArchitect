@php
    $inclusions = json_decode(old('inclusion',data_get($tabData,'inclusion')));
    $exclusions = json_decode(old('exclusion',data_get($tabData,'exclusion')));
    $details = old('details',data_get($tabData,'details'));
    if (empty($inclusions)) {
        $inclusions = [];
    }
    if (empty($exclusions)) {
        $exclusions = [];
    }
@endphp

<div class="tab-pane active" id="step2">
    <div class="row">
        <div class="col-12">
            <div class="form-group mb-3">
                <h5>{{__("Details")}}</h5>
                <div id="snow-editor" style="height: 300px;width: 100%">{!! $details !!}</div> <!-- end Snow-editor-->
                <textarea id="details" name="details" style="visibility: hidden; height: 0; width: 0; overflow: hidden"></textarea>
                @component('components.input-validation-error',['field' => 'details']) @endcomponent
            </div>
        </div> <!-- end col -->
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="inclusion">{{__("Inclusion")}}</label>
                <select data-placeholder="Add inclusions here" class="form-control select2" multiple id="inclusion" name="inclusion[]">
                    @foreach($inclusions as $inclusion)
                        <option value="{{$inclusion}}" selected> {{$inclusion}} </option>
                    @endforeach
                </select>
                @component('components.input-validation-error',['field' => 'inclusion']) @endcomponent
            </div>
        </div> <!-- end col -->
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="exclusion">{{__("Exclusion")}}</label>
                <select data-placeholder="Add exclusions here" class="form-control select2" multiple id="exclusion" name="exclusion[]">
                    @foreach($exclusions as $exclusion)
                        <option value="{{$exclusion}}" selected> {{$exclusion}} </option>
                    @endforeach
                </select>
                @component('components.input-validation-error',['field' => 'exclusion']) @endcomponent
            </div>
        </div> <!-- end col -->
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

            var details = new Quill("#snow-editor", {
                theme: "snow",
                modules: {
                    toolbar: editorToolbar
                }
            });

            $('.select2').select2({
                tags: true,
                tokenSeparators: [',']
            });

            $('form').submit(function (e) {
                $('#details').val($('#snow-editor').find('.ql-editor').html());
            });
        })
    </script>
@endpush
