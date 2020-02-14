<!-- START: FOOTER -->
<section id="footer">
    <footer>

        <div class="row main-footer-sub">
            <div class="container clear-padding">
                <div class="col-md-7 col-sm-7">
                    <form method="post" action="{{route('coming-soon')}}">
                        @csrf
                        <label>SUBSCRIBE TO OUR NEWSLETTER</label>
                        <div class="clearfix"></div>
                        <div class="col-md-9 col-sm-8 col-xs-6 clear-padding">
                            <input class="form-control" type="email" required placeholder="Enter Your Email" name="email">
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-6 clear-padding">
                            <button type="submit"><i class="fa fa-paper-plane"></i>SUBSCRIBE</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-5 col-sm-5">
                    <div class="social-media pull-right">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-footer row">
            <div class="container clear-padding">
                <div class="col-md-3 col-sm-6">
                    <div class="links">
                        <h4>COMPANY</h4>
                        <ul>
                            <li><a href="#">About Us</a></li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                    <div class="links">
                        <h4>Terms & Condition</h4>
                        <ul>
                            <li><a href="#">General Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 links">
                    <h4>Help</h4>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Support Center</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Discount FAQ</a></li>
                        <li><a href="#">Payment Security</a></li>
                        <li><a href="#">EMI</a></li>
                    </ul>
                </div>
                <div class="clearfix visible-sm-block"></div>
                <div class="col-md-3 col-sm-6 links">
                    <h4>Our Services</h4>
                    <ul>

                        <li><a href="{{route('package.lists',['package-type' => \App\Enums\PackageType::TOUR])}}">Tours</a></li>
                        <li><a href="{{route('package.lists',['packageType' => \App\Enums\PackageType::HOLIDAY])}}">Holidays</a></li>

                    </ul>
                </div>
                <div class="col-md-3 col-sm-6 contact-box">
                    <h4>Contact Us</h4>
                    <p><i class="fa fa-home"></i>
                        Navana Cordelia, Road:17, House: 61 (Level: 3), Block: C, Banani,
                        Dhaka, Bangladesh
                    </p>
                    <p><i class="fa fa-phone"></i> +880 1730-206887</p>
                    <p><i class="fa fa-envelope-o"></i>travelarchitectbd@gmail.com</p>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12 text-center we-accept">
                    <h4>We Accept</h4>
                    <ul>
                        <li><img src="{{url('/assets/images/card/mastercard.png')}}" alt="cruise"></li>
                        <li><img src="{{url('assets/images/card/visa.png')}}" alt="cruise"></li>
                        <li><img src="{{url('assets/images/card/american-express.png')}}" alt="cruise"></li>
                        <li><img src="{{url('assets/images/card/mastercard.png')}}" alt="cruise"></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="main-footer-nav row">
            <div class="container clear-padding">
                <div class="col-md-6 col-sm-6">
                    <p>Copyright &copy; {{ date('Y') }} {{ config('app.name') }}. {{__('All rights reserved.')}}</p>
                </div>
                <div class="col-md-6 col-sm-6">
                    <ul>

                        <li><a href="{{route('package.lists',['package-type' => \App\Enums\PackageType::TOUR])}}">Tours</a></li>
                        <li><a href="{{route('package.lists',['packageType' => \App\Enums\PackageType::HOLIDAY])}}">Holidays</a></li>

                    </ul>
                </div>
                <div class="go-up">
                    <a href="#"><i class="fa fa-arrow-up"></i></a>
                </div>
            </div>
        </div>
    </footer>
</section>
<!-- END: FOOTER -->
