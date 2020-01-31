<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head',[
        'styles' => [

        ]
    ])
<style>
    .ui-autocomplete-input  a.sbiAnchor.ui-state-hover {
        background: blue;
    }

</style>
</head>

<body class="load-full-screen">

@include('partials.loader')

<div class="site-wrapper">
@include('partials.top-header')
<div class="clearfix"></div>
@include('partials.top-menu')
@include('home.main-slider')
@include('partials.social-share')
@include('home.main-query-section')
@include('home.holiday-top-destination')
@include('home.recomanded-holidays',['recommendedHolidays' => $recommendedHolidays])
@include('partials.contact-us-form')
@include('partials.footer')

</div>
@include('partials.scripts',[
    'scripts' => [

    ]
])

<meta name="csrf-token" content="{{ csrf_token() }}">
<script type="text/javascript">

    $(document).ready(function(){
        src = "search/autocomplete";

        $( "#To" ).autocomplete({
            source: function(request, response) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: src,
                    data: {
                        term : request.term
                    },
                    success: function(data) {
                        response(data);

                    }
                });
            },
            minLength: 1,
            select: function(event, ui) {
                $('#To').val(ui.item.value);
            }
        });

        $( "#From" ).autocomplete({
            source: function(request, response) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: src,
                    data: {
                        term : request.term
                    },
                    success: function(data) {
                        response(data);

                    }
                });
            },
            minLength: 1,
            select: function(event, ui) {
                $('#From').val(ui.item.value);
            }
        });
    });



</script>
</body>
</html>
