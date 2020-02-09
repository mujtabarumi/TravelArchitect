@php
    $inclusions = json_decode(old('inclusion',data_get($tabData,'inclusion')));
    $exclusions = json_decode(old('exclusion',data_get($tabData,'exclusion')));
    $details = old('details',data_get($tabData,'details'));

    $package_costs = data_get($tabData,'meta.package_cost',[]);

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
    <div class="row">
        <div class="col-md-12">
            <div class="form-group mb-3">
                <label class="col-form-label" for="expiry_date">{{__("Package Cost")}}</label>
                <div class="input-group">
                    <input type="number" min="1" class="form-control col-md-3" name="" id="person" autocomplete="off" placeholder=" person number " >
                    &nbsp;&nbsp;<input type="number" min="1" class="form-control col-md-3" id="cost" name="" autocomplete="off" placeholder="cost">
                    &nbsp;&nbsp;<button class="btn btn-info btn-sm" id="addPacakageCost" style="float: right">Add More</button>
                </div><!-- input-group -->
                @component('components.input-validation-error',['field' => 'meta.package_cost.person']) @endcomponent
            </div>
        </div>
        <ul class="mt-1" id="package-costWrapper">
            @foreach($package_costs as $p_c)
                <li class="package-cost-list">
                    <span>{{ $p_c['person'] }}</span><b> Person - Cost: </b><span>{{$p_c['cost']}}</span>
                    <input type="hidden" value="{{ $p_c['person'] }}" name="meta[package_cost][{{$loop->index}}][person]">
                    <input type="hidden" value="{{$p_c['cost']}}" name="meta[package_cost][{{$loop->index}}][cost]">
                    <i class="ti-close pointer ml-1"></i>
                </li>
            @endforeach
        </ul>
{{--        <div class="col-md-3">--}}
{{--            <div class="form-group mb-3">--}}
{{--                <label class="col-form-label" for="expiry_date">{{__("Cost")}}</label>--}}
{{--                <div class="input-group">--}}
{{--                    <input type="number" min="1" class="form-control" name="meta[package_cost][cost]" autocomplete="off" placeholder="cost" id="">--}}
{{--                </div><!-- input-group -->--}}
{{--                @component('components.input-validation-error',['field' => 'meta.package_cost.cost']) @endcomponent--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-md-3">--}}
{{--            <button class="btn btn-info btn-sm" id="addPacakageCost" style="float: right">Add More</button>--}}
{{--        </div>--}}
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

            $('#addPacakageCost').click(function () {
                event.preventDefault();

            });

            var btnAddPacakageCost = $('#addPacakageCost');
            var inputPerson = $('#person');
            var inputCost = $('#cost');
            var packageCostWrapper = $('#package-costWrapper');
            var btnRemovePackageCost = '.ti-close';
            bindRemovePackageCost();
            var packagege_cost_count = "{{count($package_costs)}}";

            $(btnAddPacakageCost).click(function () {
                var person = $(inputPerson).val();
                var cost = $(inputCost).val();

                    $(packageCostWrapper).append(packageCostTemplates.replace(/:person/g,person)
                        .replace(/:cost/g,cost).replace(/:count/g,packagege_cost_count));
                    $(inputPerson).val("");
                    $(inputCost).val("");
                    bindRemovePackageCost();
                    packagege_cost_count++;


            });

            function bindRemovePackageCost(){
                $(btnRemovePackageCost).unbind('click').click(function (e) {
                    e.preventDefault();
                    $(this).closest('.package-cost-list').remove();
                });
            }

            var packageCostTemplates = `
                <li class="benefit-list-item">
                    <span>:person</span> <b>Person - BDT:</b> <span>:cost</span>
                    <input type="hidden" value=":person" name="meta[package_cost][:count][person]">
                    <input type="hidden" value=":cost" name="meta[package_cost][:count][cost]">
                    <i class="fa fa-trash-o pointer ml-1"></i>
                </li>
            `;

        })
    </script>
@endpush
