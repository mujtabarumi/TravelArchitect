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


    </style>
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
                        <img style="width: 500px;height: 300px;" id="package_showcase_case_1_preview" @if($slider1) src="{{url('public'."/".$slider1->getUrl())}}" @else src="{{ url('public/packageImages/package-fallback.jpg')}}" @endif alt="">
                        <!--Uploaded image -->
                        <button type="button" class="btn btn-rounded btn-transparent btn-file">
                            {{__("Change Photo")}}
                            <input type="file" accept=".png, .jpg, .jpeg" class="changePhoto" data-name="showcase_case_1" name="showcase_case_1" id="package_show_case_1">
                        </button>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-6 mb-3 mb-lg-0">
                    <div class="company-details__showcase-single @if(!$slider2) placeholder @endif">
                        <img style="width: 500px;height: 300px;" id="package_showcase_case_2_preview" src="@if($slider2) {{ url('public'."/".$slider2->getUrl())}} @else {{ url('public/packageImages/package-fallback.jpg')}} @endif" alt="">
                        <!--Uploaded image -->

                        <button type="button" class="btn btn-rounded btn-transparent btn-file">
                            {{__("Change Photo")}}
                            <input type="file" accept=".png, .jpg, .jpeg" id="showcase_photo_2" class="changePhoto" name="showcase_case_2"data-name="showcase_case_2">
                        </button>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6 col-lg-6 col-xl-6 mb-3 mb-lg-0">
                    <div class="company-details__showcase-single @if(!$slider3) placeholder @endif">
                        <img style="width: 500px;height: 300px;" id="package_showcase_case_3_preview" src="@if($slider3) {{ url('public'."/".$slider3->getUrl())}} @else {{ url('public/packageImages/package-fallback.jpg')}} @endif" alt="">
                        <!--Uploaded image -->

                        <button type="button" class="btn btn-rounded btn-transparent btn-file">
                            Change Photo
                            <input type="file" accept=".png, .jpg, .jpeg" id="showcase_photo_3" class="changePhoto" name="showcase_case_3" data-name="showcase_case_3">
                        </button>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-6 mb-3 mb-lg-0">
                    <div class="company-details__showcase-single @if(!$slider4) placeholder @endif">
                        <img style="width: 500px;height: 300px;" id="package_showcase_case_4_preview" src="@if($slider4) {{ url('public'."/".$slider4->getUrl())}} @else {{ url('public/packageImages/package-fallback.jpg')}} @endif" alt="">
                        <!--placeHolder image -->

                        <button type="button" class="btn btn-rounded btn-transparent btn-file">
                            {{__("Change Photo")}}
                            <input type="file" accept=".png, .jpg, .jpeg" id="showcase_photo_4" class="changePhoto" name="showcase_case_4" data-name="showcase_case_4">
                        </button>
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
</div>
@push('scripts')
    <script>
        $(function () {

            const inputFileClass = '.changePhoto';

            $(inputFileClass).change(function (e) {
                if (this.files.length > 0) {
                    let imageType = $(this).data('name');
                    readFile(this,imageType);
                }
            });

            function readFile(input,target) {
                if (input.files && input.files[0]) {
                    var file = input.files[0];
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#package_'+target+'_preview').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                } else {
                    alert("{{__("Sorry - you're browser doesn't support the FileReader API")}}");
                }
            }

        });

    </script>
@endpush
