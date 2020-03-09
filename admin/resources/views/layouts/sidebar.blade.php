<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{url('public')}}/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Travel Architect</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
{{--                <img src="{{url('public')}}/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">--}}
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


{{--                <li class="nav-header">EXAMPLES</li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{route('table')}}" class="nav-link">--}}
{{--                        <i class="nav-icon far fa-calendar-alt"></i>--}}
{{--                        <p>--}}
{{--                            Table--}}
{{--                            <span class="badge badge-info right">2</span>--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                </li>--}}
              {{--  <li class="nav-item">
                        <a href="{{route('faq')}}" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            FORM
                        </p>
                    </a>
                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{route('event')}}" class="nav-link">--}}
{{--                        <i class="nav-icon far fa-image"></i>--}}
{{--                        <p>--}}
{{--                            Event--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{route('faq')}}" class="nav-link">--}}
{{--                        <i class="nav-icon far fa-image"></i>--}}
{{--                        <p>--}}
{{--                            Faq--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{route('noticeboard')}}" class="nav-link">--}}
{{--                        <i class="nav-icon far fa-image"></i>--}}
{{--                        <p>--}}
{{--                            NoticeBoard--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                </li>--}}

                <li class="nav-item has-treeview">
                    <a href="" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Package
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('package.add')}}" class="nav-link">
                                <i class="nav-icon far fa-image"></i>
                                <p>
                                    Add Package
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('package.listing')}}" class="nav-link">
                                <i class="nav-icon far fa-image"></i>
                                <p>
                                    Package list
                                </p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item ">
                    <a href="{{route('package.booking.request')}}" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Booking Request

                        </p>
                    </a>

                </li>
                <li class="nav-item has-treeview">
                    <a href="" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Search Query
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('search.flight')}}" class="nav-link">
                                <i class="nav-icon far fa-image"></i>
                                <p>
                                    Flight
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('search.holiday')}}" class="nav-link">
                                <i class="nav-icon far fa-image"></i>
                                <p>
                                    Holiday
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('search.tour')}}" class="nav-link">
                                <i class="nav-icon far fa-image"></i>
                                <p>
                                   Tour
                                </p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item ">
                    <a href="{{route('visaguide')}}" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Visa Guide

                        </p>
                    </a>

                </li>
                <li class="nav-item ">
                    <a href="{{route('popularcity')}}" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Popular City

                        </p>
                    </a>

                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
