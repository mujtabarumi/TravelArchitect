@php
    $additional_info = old('inclusion',data_get($tabData,'additional_info'));
    $terms_and_conditions = old('inclusion',data_get($tabData,'terms_and_conditions'));
@endphp

<div class="tab-pane active" id="step6">
    <div class="row">
        <div class="col-12">
            <div class="form-group mb-3">
                <h5>Additional Info</h5>
                <div id="snow-editor" style="height: 300px;width: 100%">{!! $additional_info !!}</div> <!-- end Snow-editor-->
                <textarea id="additional_info" name="additional_info" style="visibility: hidden; height: 0; width: 0; overflow: hidden"></textarea>
                @component('components.input-validation-error',['field' => 'additional_info']) @endcomponent
            </div>
        </div> <!-- end col -->
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-group mb-3">
                <h5>Terms and Condition</h5>
                <div id="snow-editor2" style="height: 300px;width: 100%">{!! $terms_and_conditions !!}</div> <!-- end Snow-editor-->
                <textarea id="terms_and_conditions" name="terms_and_conditions" style="visibility: hidden; height: 0; width: 0; overflow: hidden"></textarea>
                @component('components.input-validation-error',['field' => 'terms_and_conditions']) @endcomponent
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
            var details = new Quill("#snow-editor2", {
                theme: "snow",
                modules: {
                    toolbar: editorToolbar
                }
            });



            $('form').submit(function (e) {
                $('#additional_info').val($('#snow-editor').find('.ql-editor').html());
                $('#terms_and_conditions').val($('#snow-editor2').find('.ql-editor').html());
            });


        })
    </script>
@endpush
