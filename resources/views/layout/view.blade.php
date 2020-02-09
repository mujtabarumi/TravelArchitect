@extends('layout.main')
@push('styles')
    <style>
        .ui-autocomplete-input  a.sbiAnchor.ui-state-hover {
            background: blue;
        }
    </style>
@endpush
@section('content')
    @include('home.main-slider')
    @include('home.main-query-section')
    @include('home.holiday-top-destination', ['popularHolidays' => $popularHolidays])
    @include('home.recomanded-holidays',['recommendedHolidays' => $recommendedHolidays])
@endsection


@push('scripts')

    <script type="text/javascript">
        $(document).ready(function(){
            addSelect2Ajax('#From','{{route('ajax.city')}}', null, {
                'tags' : false
            });
            addSelect2Ajax('#To','{{route('ajax.city')}}', null, {
                'tags' : false
            });
        });
    </script>
@endpush