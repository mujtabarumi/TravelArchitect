@php

@endphp
@push('styles')
    <style>
        .package-cover-image {
            background-color: #2CA9FF;
            height: 315px;
        }
        .package-cover-image img{
            width: 100%;
            height: 100%;
        }
        .package-cover--regular .package-cover-image .btn {
            position: absolute;
            top: 6%;
            left: 3%;
        }
        .btn-transparent {
            background-color: rgba(23,34,59,.8);
            border: 1.5px solid transparent;
            color: #fff;
            padding: 12px 24px;
        }
        .btn-transparent:hover {
            background-color: rgba(23,34,59,.9);
            border: 1.5px solid #fff;
            color: #fff;
        }
        .btn-rounded {
            border-radius: 2em;
        }
        .btn:hover {
            text-decoration: none;
        }

        .company-details__showcase-single.full.placeholder img {
            width: 100% !important;
            height: 100% !important;
            opacity: 1;
            object-fit: cover;
        }

        .company-details__showcase-single.placeholder img {
            height: 300px !important;
            width: 100% !important;
            opacity: 1;
            object-fit: cover;
        }

        .company-details__showcase-single .btn {
            position: absolute;
            bottom: 8%;
            right: 15px;
        }

        .modal-lg {
            max-width: 80%;
        }

    </style>
    <link rel="stylesheet" href="{{asset('public/assets/libs/croppie/croppie.css')}}">
@endpush
<div class="tab-pane active" id="step4">
    <div class="card package-cover--regular">
        <div class="card-body p-0">
            <div class="row align-items-center">
                <div class="col-md-12">
                    @php
                        $cover = $package->getMedia('cover_photo')->first();
                    @endphp
                    <div class="package-cover-image placeholder">
                        <img id="package_cover_photo_preview" src="@if($cover) {{url('public'."/".$cover->getUrl())}} @else {{url('public/packageImages/package-fallback.jpg')}} @endif" alt="package cover image">
                        <!--Uploaded image -->
                        <button type="button" class="btn btn-rounded btn-transparent btn-file">
                            {{__("Update Cover Image")}}
                            <input type="file" accept=".png, .jpg, .jpeg" class="changePhoto" data-name="cover_photo" name="cover_photo" id="upload_cover_photo2">
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card package-slider-images">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="font-weight-normal mb-3">{{$package->title}} slider Images</h4>
                    <p>{{__("Upload slider Images & first one will be featured in home page")}}</p>
                </div>
            </div>
            @php
                $slider = $package->getMedia('slider_images');
                $slider1  = $slider->where('order_column', 1)->first();
                $slider2  = $slider->where('order_column', 2)->first();
                $slider3  = $slider->where('order_column', 3)->first();
                $slider4  = $slider->where('order_column', 4)->first();
            @endphp
            <div class="row">
                <div class="col-md-6 col-lg-6 col-xl-6 mb-3 mb-lg-0">
                    <div class="company-details__showcase-single @if(!$slider1) placeholder @endif">
                        <!-- Use Class 'placeholder' also, only when any image is not uploaded -->
                        <img style="width: 500px;height: 300px;" id="package_show_case_1_preview" @if($slider1) src="{{url('public'."/".$slider1->getUrl())}}" @else src="{{ url('public/packageImages/package-fallback.jpg')}}" @endif alt="">
                        <!--Uploaded image -->
                        <button type="button" class="btn btn-rounded btn-transparent btn-file">
                            {{__("Change Photo")}}
                            <input type="file" accept=".png, .jpg, .jpeg" class="changePhoto" data-name="package_showcase_case_1" name="showcase_case_1" id="package_show_case_1">
                        </button>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-6 mb-3 mb-lg-0">
                    <div class="company-details__showcase-single @if(!$slider2) placeholder @endif">
                        <img style="width: 500px;height: 300px;" id="package_show_case_2_preview" src="@if($slider2) {{ url('public'."/".$slider2->getUrl())}} @else {{ url('public/packageImages/package-fallback.jpg')}} @endif" alt="">
                        <!--Uploaded image -->

                        <button type="button" class="btn btn-rounded btn-transparent btn-file">
                            {{__("Change Photo")}}
                            <input type="file" accept=".png, .jpg, .jpeg" id="showcase_photo_2" class="changePhoto" name="showcase_case_2"data-name="package_showcase_case_2">
                        </button>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6 col-lg-6 col-xl-6 mb-3 mb-lg-0">
                    <div class="company-details__showcase-single @if(!$slider3) placeholder @endif">
                        <img style="width: 500px;height: 300px;" id="package_show_case_3_preview" src="@if($slider3) {{ url('public'."/".$slider3->getUrl())}} @else {{ url('public/packageImages/package-fallback.jpg')}} @endif" alt="">
                        <!--Uploaded image -->

                        <button type="button" class="btn btn-rounded btn-transparent btn-file">
                            Change Photo
                            <input type="file" accept=".png, .jpg, .jpeg" id="showcase_photo_3" class="changePhoto" name="showcase_case_3" data-name="package_showcase_case_3">
                        </button>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-6 mb-3 mb-lg-0">
                    <div class="company-details__showcase-single @if(!$slider4) placeholder @endif">
                        <img style="width: 500px;height: 300px;" id="package_show_case_4_preview" src="@if($slider4) {{ url('public'."/".$slider4->getUrl())}} @else {{ url('public/packageImages/package-fallback.jpg')}} @endif" alt="">
                        <!--placeHolder image -->

                        <button type="button" class="btn btn-rounded btn-transparent btn-file">
                            {{__("Change Photo")}}
                            <input type="file" accept=".png, .jpg, .jpeg" id="showcase_photo_4" class="changePhoto" name="showcase_case_4" data-name="package_showcase_case_4">
                        </button>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal" id="cropImagePop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content modal-lg">
                        <div class="modal-header">
                            <h5 class="modal-title">{{__("Resize Image")}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div id="image-crop-wrapper" class="modal-body">

                        </div>
                        <div class="modal-footer">
                            <div class="image-modal-loader" style="display: flex; align-items: center">
                                <div class="loader-title">{{__("Uploading")}}...</div>
                                <div class="loader-img"><img src="{{ url('public/assets/loader.gif') }}" alt=""></div>
                            </div>
                            <div class="image-modal-button">
                                <button type="button" class="btn btn-default" data-dismiss="modal">{{__("Close")}}</button>
                                <button type="button" id="cropImageBtn" class="btn btn-primary" data-target="">{{__('Crop')}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>




    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@push('scripts')
    <script src="{{asset('public/assets/libs/croppie/croppie.js')}}"></script>
    <script>
        // $(function () {

            {{--const inputFileClass = '.changePhoto';--}}

            {{--$(inputFileClass).change(function (e) {--}}
            {{--    if (this.files.length > 0) {--}}
            {{--        let imageType = $(this).data('name');--}}
            {{--        readFile(this,imageType);--}}
            {{--    }--}}
            {{--});--}}

            {{--function readFile(input,target) {--}}
            {{--    if (input.files && input.files[0]) {--}}
            {{--        var file = input.files[0];--}}
            {{--        var reader = new FileReader();--}}
            {{--        reader.onload = function (e) {--}}
            {{--            $('#package_'+target+'_preview').attr('src', e.target.result);--}}
            {{--        };--}}
            {{--        reader.readAsDataURL(input.files[0]);--}}
            {{--    } else {--}}
            {{--        alert("{{__("Sorry - you're browser doesn't support the FileReader API")}}");--}}
            {{--    }--}}
            {{--}--}}

            /*
        * Image crop realted codes are here
        * */
            $(function () {

                const PACKAGE_COVER_PHOTO = 'cover_photo';
                const PACKAGE_SHOWCASE_1 = 'package_showcase_case_1';
                const PACKAGE_SHOWCASE_2 = 'package_showcase_case_2';
                const PACKAGE_SHOWCASE_3 = 'package_showcase_case_3';
                const PACKAGE_SHOWCASE_4 = 'package_showcase_case_4';


                const CROP_TARGET_CONFIG = {

                    [PACKAGE_COVER_PHOTO]: {
                        input_id: '#upload_cover_photo2',
                        target_id: '#package_cover_photo_preview',
                        ...setConfig(674, 115, 1348, 230)
                    },
                    [PACKAGE_SHOWCASE_1]: {
                        input_id: '#package_show_case_1',
                        target_id: '#package_show_case_1_preview',
                        ...setConfig(370, 250, 740, 500)
                    },
                    [PACKAGE_SHOWCASE_2]: {
                        input_id: '#package_show_case_2_input',
                        target_id: '#package_show_case_2_preview',
                        ...setConfig(370, 250, 740, 500)
                    },
                    [PACKAGE_SHOWCASE_3]: {
                        input_id: '#package_show_case_3_input',
                        target_id: '#package_show_case_3_preview',
                        ...setConfig(370, 250, 740, 500)
                    },
                    [PACKAGE_SHOWCASE_4]: {
                        input_id: '#package_show_case_4_input',
                        target_id: '#package_show_case_4_preview',
                        ...setConfig(370, 250, 740, 500)
                    },
                };
                let CROPPIE_OBJECT;
                const inputFileClass = '.changePhoto';
                const cropWrapperElement = $('#image-crop-wrapper');

                $(inputFileClass).change(function (e) {
                    if (this.files.length > 0) {
                        let imageType = $(this).data('name');
                        let options = CROP_TARGET_CONFIG[imageType].basicOptions;
                        CROP_TARGET_CONFIG[imageType].result['format'] = this.files[0].type;

                        if (this.files[0].type == 'image/png') {
                            CROP_TARGET_CONFIG[imageType].result['format'] = 'png'
                        } else {
                            CROP_TARGET_CONFIG[imageType].result['format'] = 'jpeg';
                        }

                        readFile(this, createCropper(cropWrapperElement, options));
                        $('#cropImageBtn').attr('data-target', imageType);
                    }
                });

                $('#cropImagePop').on('hidden.bs.modal', function () {
                    destroyCropper(cropWrapperElement);
                    $('#cropImageBtn').attr('data-target', "");
                    $(inputFileClass).val(null);
                });

                $('#cropImageBtn').click(function () {
                    let target = $(this).attr('data-target');
                    var options = CROP_TARGET_CONFIG[target];
                    let fileExtention = CROP_TARGET_CONFIG[target].result['format'];
                    CROPPIE_OBJECT.croppie('result', options.result).then((blob) => {
                        fetch(blob).then(e => e.blob()).then((res) => {
                            var requestData = new FormData();
                            requestData.append('file', res, target + '.' + fileExtention);
                            requestData.append('target', target);
                            requestData.append('package_id', "{{ $package->id }}");
                            showModalImageLoader();

                            $.ajax({
                                url: "{{ route('save.settings.image') }}",
                                data: requestData,
                                type: 'POST',
                                contentType: false,
                                processData: false,
                                success: (res) => {
                                    $(options.target_id).attr('src', blob);
                                    hideModalImageLoader();
                                    $('#cropImagePop').modal('hide');

                                },
                                error: (err) => {
                                    // var errx = JSON.parse(err.responseText).message;
                                    hideModalImageLoader();
                                }
                            });

                        });
                    });
                });

                function readFile(input, cropper) {
                    if (input.files && input.files[0]) {
                        var file = input.files[0];
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            cropper.croppie('bind', {
                                url: e.target.result
                            });
                        };
                        reader.readAsDataURL(input.files[0]);
                    } else {
                        alert("{{__("Sorry - you're browser doesn't support the FileReader API")}}");
                    }
                }

                function setConfig(vWidth, vHeight, width, height) {
                    return {
                        basicOptions: {
                            enableExif: true,
                            viewport: {
                                width: vWidth,
                                height: vHeight,
                                type: 'square'
                            },
                            boundary: {
                                width: vWidth + 100,
                                height: vHeight + 100
                            }
                        },
                        result: {
                            type: 'canvas',
                            size: {width, height},
                            quality: 1
                        }
                    }
                }

                function createCropper(elem, options) {
                    CROPPIE_OBJECT = $(elem).croppie(options);
                    $('#cropImagePop').modal('show');
                    $(cropWrapperElement).addClass('ready');
                    return CROPPIE_OBJECT;
                }

                function destroyCropper(elem) {
                    $(elem).croppie('destroy');
                }

                hideModalImageLoader();

                function hideModalImageLoader() {
                    $('.image-modal-loader').hide();
                    $('.image-modal-button').show();
                }

                function showModalImageLoader() {
                    $('.image-modal-button').hide();
                    $('.image-modal-loader').show();
                }


        });

    </script>
@endpush
