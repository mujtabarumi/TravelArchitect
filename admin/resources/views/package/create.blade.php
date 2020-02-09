@extends('main')
@php
    $stepName = data_get($tabs,$currentStep)['step'];
    $viewName = 'package.create_tab_'.$stepName;
@endphp
@push('styles')
    <style>
        .select2-container--default .select2-selection--single {
            width: 100%;
            height: calc(2.25rem + 2px);
            padding: .375rem .75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            box-shadow: inset 0 0 0 transparent;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #007bff;
            border-color: #006fe6;
        }
    </style>
@endpush
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="row mb-2">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Create Package</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" autocomplete="off" enctype="multipart/form-data" action="{{ route('package.add') }}">
                                @csrf
                                <div id="tab-wrapper">
                                    <ul class="nav nav-pills bg-light nav-justified form-wizard-header mb-4">
                                        @foreach($tabs as $key => $tab)
                                            <li class="nav-item">
                                                @php
                                                    $tabClass = [];
                                                    $isDisabled = data_get($tab,'disabled',true);
                                                    $tabLink = $isDisabled ? 'javascript:void(0)' : route('package.add', ['step' => $key] );
                                                    if ($key == $currentStep) {
                                                        $tabClass[] = 'active';
                                                    }
                                                    if ($isDisabled) {
                                                        $tabClass[] = 'disabled';
                                                    }
                                                @endphp
                                                <a href="{{  $tabLink  }}"
                                                   class="nav-link rounded-0 pt-2 pb-2 {{ implode(" ",$tabClass) }}">
                                                    <span>{{ __(data_get($tab,'title')) }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>

                                    <div class="tab-content border-0 mb-0">
                                        <input type="hidden" value="{{ $currentStep }}" name="step">
                                        @include($viewName)
                                        <ul class="list-inline wizard mb-0">
                                            @if($currentStep > \App\Enums\PackageStep::BASIC_INFORMATION)
                                                <li class="previous list-inline-item">
                                                    <a href="" class="btn btn-outline-secondary">{{__("Back")}}</a>
                                                </li>
                                            @endif
                                            <li class="next list-inline-item float-right">
                                                <button type="submit" class="btn btn-primary">{{__("Save and continue")}}</button>
                                            </li>
                                        </ul>

                                    </div> <!-- tab-content -->
                                </div> <!-- end #basicwizard-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('js')
    <script>
        $(function () {
            $(window).keydown(function(event){
                if(event.keyCode == 13) {
                    event.preventDefault();
                    return false;
                }
            });
        });
    </script>
@endsection
