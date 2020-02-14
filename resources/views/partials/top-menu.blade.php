<div class="row light-menu">
    <div class="container clear-padding">
        <!-- BEGIN: HEADER -->
        <div class="navbar-wrapper">
            <div class="navbar navbar-default" role="navigation">
                <!-- BEGIN: NAV-CONTAINER -->
                <div class="nav-container">
                    <div class="navbar-header">
                        <!-- BEGIN: TOGGLE BUTTON (RESPONSIVE)-->
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!-- BEGIN: LOGO -->
                        <a class="navbar-brand clear-padding logo" href="{{route('home')}}">
                            <img src="{{asset("/assets/images/logo.png")}}" alt="logo">
                        </a>
                    </div>
                    <!-- BEGIN: NAVIGATION -->
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="mega">
                                <a href="{{route('home')}}"><i class="fa fa-home"></i> HOME</a>
                                <div class="clearfix"></div>
                            </li>
                            <li class="mega">

                                <a href="{{route('package.lists',['packageType' => \App\Enums\PackageType::HOLIDAY])}}"><i class="fa fa-suitcase"></i> HOLIDAY</a>
                                <div class="clearfix"></div>
                            </li>
                            <li class="mega">
                                <a href="{{route('package.lists',['package-type' => \App\Enums\PackageType::TOUR])}}"><i class="fa fa-globe"></i> TOURS</a>
                                <div class="clearfix"></div>
                            </li>
                            <li class="dropdown mega">
                                <a href="{{route('coming-soon')}}"><i class="fa fa-cc-visa"></i> VISA GUIDE</a>
                                <div class="clearfix"></div>
                            </li>
                            <li class="dropdown mega">
                                <a href="#contact-us"><i class="fa fa-envelope"></i> Contact Us</a>
                                <div class="clearfix"></div>
                            </li>
                        </ul>
                    </div>
                    <!-- END: NAVIGATION -->
                </div>
                <!--END: NAV-CONTAINER -->
            </div>
        </div>
        <!-- END: HEADER -->
    </div>
</div>
