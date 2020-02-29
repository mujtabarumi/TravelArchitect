@extends('layout.main')
@push('styles')
    <style>
        .ui-autocomplete-input  a.sbiAnchor.ui-state-hover {
            background: blue;
        }
        .top-offer {
            padding: 30px 0 !important;
        }
    </style>
@endpush
@section('content')
    @include('home.main-slider', ['homeSlider' => $homeSlider])
    @include('home.main-query-section')
    @include('home.holiday-top-destination', ['popularHolidays' => $popularHolidays])
    @include('home.recomanded-holidays',['recommendedHolidays' => $recommendedHolidays])
    @include('home.recomanded-tours',['recommendedTours' => $recommendedTours])
@endsection


@push('scripts')


@endpush
