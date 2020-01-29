@extends('main')
@php
    $tabs = config('packages.listing.tabs');
    $tabView = false;

    if (isset($tabs[$status])) {
        $tabView = $tabs[$status]['view'];
    }

@endphp
@push('styles')
    <style>
        .nav-tabs {
            box-shadow: none;
        }
        .nav-tabs .nav-link {
            position: relative;
            bottom: -1px;
        }
        .tab-content__header {
            margin-bottom: 20px;
            margin-top: 20px;
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
                            <h3 class="card-title">Package lists</h3>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="nav nav-tabs">
                                        @foreach($tabs as $key => $attr)
                                            <li class="nav-item">
                                                <a href="{{ route('package.listing', [$tabRoutes[$key]]) }}" class="nav-link {{ $key == $status ? "active" : ""}}">
                                                    <span class="d-none d-sm-block">{{ __(data_get($attr,'title')) }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>

                                    <div class="tab-content">
                                        @if($tabView)
                                            @include($tabView, ['packages' => $packages, 'status' => $status, 'search' => $search])
                                        @endif

                                        {{ $packages->links() }}
                                    </div>
                                </div>
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

    </script>
@endsection
