@include('layouts.header')

<div class="wrapper">

@include('layouts.navbar')

@include('layouts.sidebar')

<div class="page-wrapper">
    <div class="content">
        <br>
        @yield('content')
    </div>
</div>
@include('layouts._modal-create-meta-data')

@include('layouts.footer')
