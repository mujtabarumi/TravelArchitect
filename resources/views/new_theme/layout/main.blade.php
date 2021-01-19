<!DOCTYPE html>
<html lang="en">

<head>
    @include('new_theme.partials.head',[
    'styles' => [

    ]
])
</head>

<body>
<div class="body-wrapper">
    @include('new_theme.partials.top-header')
    @include('new_theme.partials.top-menu')

    @yield('new_theme_content')

    @include('new_theme.partials.footer')

    @include('new_theme.partials.scripts',[
    'scripts' => [

    ]
])
</div>


</body>

</html>



