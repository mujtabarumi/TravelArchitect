@extends('layout.main')
@push('styles')
    <style>

    </style>
@endpush
@section('content')
    <!-- START: USER PROFILE -->
    <div class="row user-profile">
        <div class="container">
            <div class="col-md-12 user-name">
                <h3>Welcome, {{$user->name}}</h3>
            </div>
            <div class="col-md-2 col-sm-2">
                <div class="user-profile-tabs">
                    <ul class="nav nav-tabs">
                        <li ><a data-toggle="tab" href="#profile-overview" class="text-center"><i class="fa fa-bolt"></i> <span>Overview</span></a></li>
{{--                        <li><a data-toggle="tab" href="#booking" class="text-center"><i class="fa fa-history"></i> <span>Bookings</span></a></li>--}}
                        <li class="active" ><a data-toggle="tab" href="#profile" class="text-center"><i class="fa fa-user"></i> <span>Profile</span></a></li>
{{--                        <li><a data-toggle="tab" href="#wishlist" class="text-center"><i class="fa fa-heart-o"></i> <span>Wishlist</span></a></li>--}}
{{--                        <li><a data-toggle="tab" href="#cards" class="text-center"><i class="fa fa-credit-card"></i> <span>My Cards</span></a></li>--}}
                        <li><a data-toggle="tab" href="#complaint" class="text-center"><i class="fa fa-edit"></i> <span>Complaints</span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-10 col-sm-10">
                <div class="tab-content">
                    <div id="profile-overview" class="tab-pane fade in ">
                        <div class="col-md-6">
                            <div class="brief-info">
                                <div class="col-md-2 col-sm-2 clear-padding">
                                    <img src="assets/images/user1.jpg" alt="cruise">
                                </div>
                                <div class="col-md-10 col-sm-10">
                                    <h3>Lenore</h3>
                                    <h5><i class="fa fa-envelope-o"></i>lenore@lenoremail.com</h5>
                                    <h5><i class="fa fa-phone"></i>+91 1234567890</h5>
                                    <h5><i class="fa fa-map-marker"></i>Burbank, USA</h5>
                                </div>
                                <div class="clearfix"></div>
                                <div class="brief-info-footer">
                                    <a href="#"><i class="fa fa-edit"></i>Edit Profile</a>
                                    <a href="#"><i class="fa fa-plus"></i>Add Travel Preference</a>
                                </div>
                            </div>
{{--                            <div class="clearfix"></div>--}}
{{--                            <div class="most-recent-booking">--}}
{{--                                <h4>Recent Booking</h4>--}}
{{--                                <div class="field-entry">--}}
{{--                                    <div class="col-md-6 col-sm-4 col-xs-4 clear-padding">--}}
{{--                                        <p><i class="fa fa-plane"></i>New York<i class="fa fa-long-arrow-right"></i>New Delhi</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-4 col-sm-6 col-xs-6">--}}
{{--                                        <p class="confirmed"><i class="fa fa-check"></i>Confirmed</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-2 col-sm-2 col-xs-2 text-center clear-padding">--}}
{{--                                        <a href="#">Detail</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="clearfix"></div>--}}
{{--                                <div class="field-entry">--}}
{{--                                    <div class="col-md-6 col-sm-4 col-xs-4 clear-padding">--}}
{{--                                        <p><i class="fa fa-bed"></i>Grand Lilly <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-4 col-sm-6 col-xs-6">--}}
{{--                                        <p class="confirmed"><i class="fa fa-check"></i>Confirmed</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-2 col-sm-2 col-xs-2 text-center clear-padding">--}}
{{--                                        <a href="#">Detail</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="clearfix"></div>--}}
{{--                                <div class="field-entry">--}}
{{--                                    <div class="col-md-6 col-sm-4 col-xs-4 clear-padding">--}}
{{--                                        <p><i class="fa fa-suitcase"></i>Wonderful Europe</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-4 col-sm-6 col-xs-6">--}}
{{--                                        <p class="failed"><i class="fa fa-times"></i>failed</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-2 col-sm-2 col-xs-2 text-center clear-padding">--}}
{{--                                        <a href="#">Detail</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="clearfix"></div>--}}
{{--                                <div class="field-entry">--}}
{{--                                    <div class="col-md-6 col-sm-4 col-xs-4 clear-padding">--}}
{{--                                        <p><i class="fa fa-plane"></i>New York<i class="fa fa-long-arrow-right"></i>New Delhi</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-4 col-sm-6 col-xs-6">--}}
{{--                                        <p class="confirmed"><i class="fa fa-check"></i>Confirmed</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-2 col-sm-2 col-xs-2 text-center clear-padding">--}}
{{--                                        <a href="#">Detail</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="clearfix"></div>--}}
{{--                                <div class="field-entry">--}}
{{--                                    <div class="col-md-6 col-sm-4 col-xs-4 clear-padding">--}}
{{--                                        <p><i class="fa fa-bed"></i>Grand Lilly <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-4 col-sm-6 col-xs-6">--}}
{{--                                        <p class="confirmed"><i class="fa fa-check"></i>Confirmed</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-2 col-sm-2 col-xs-2 text-center clear-padding">--}}
{{--                                        <a href="#">Detail</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="clearfix"></div>--}}
{{--                                <div class="field-entry">--}}
{{--                                    <div class="col-md-6 col-sm-4 col-xs-4 clear-padding">--}}
{{--                                        <p><i class="fa fa-suitcase"></i>Wonderful Europe</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-4 col-sm-6 col-xs-6">--}}
{{--                                        <p class="failed"><i class="fa fa-times"></i>failed</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-2 col-sm-2 col-xs-2 text-center clear-padding">--}}
{{--                                        <a href="#">Detail</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="clearfix"></div>--}}
{{--                            </div>--}}
                        </div>
{{--                        <div class="col-md-6">--}}
{{--                            <div class="user-profile-offer">--}}
{{--                                <h4>Offers For You</h4>--}}
{{--                                <div class="offer-body">--}}
{{--                                    <div class="offer-entry">--}}
{{--                                        <div class="col-md-4 col-sm-4 col-xs-4 offer-left text-center">--}}
{{--                                            <p>20% OFF</p>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-8 col-sm-8 col-xs-8 offer-right">--}}
{{--                                            <p>Get 20% OFF on flights when you pay with your Bank of America Credit Card. <a href="#">Book Now</a></p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                    <div class="offer-entry">--}}
{{--                                        <div class="col-md-4 col-sm-4 col-xs-4 offer-left text-center">--}}
{{--                                            <p>30% OFF</p>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-8 col-sm-8 col-xs-8 offer-right">--}}
{{--                                            <p>Get 30% OFF on flights when you pay with your Bank of America Credit Card. <a href="#">Book Now</a></p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                    <div class="offer-entry">--}}
{{--                                        <div class="col-md-4 col-sm-4 col-xs-4 offer-left text-center">--}}
{{--                                            <p>10% OFF</p>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-8 col-sm-8 col-xs-8 offer-right">--}}
{{--                                            <p>Get 10% OFF on flights when you pay with your Bank of America Credit Card. <a href="#">Book Now</a></p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="user-notification">--}}
{{--                                <h4>Notification</h4>--}}
{{--                                <div class="notification-body">--}}
{{--                                    <div class="notification-entry">--}}
{{--                                        <p><i class="fa fa-plane"></i> Domestic Flights Starting from $199 <span class="pull-right">1m ago</span></p>--}}
{{--                                    </div>--}}
{{--                                    <div class="notification-entry">--}}
{{--                                        <p><i class="fa fa-bed"></i> 20% Cashback on hotel booking <span class="pull-right">1h ago</span></p>--}}
{{--                                    </div>--}}
{{--                                    <div class="notification-entry">--}}
{{--                                        <p><i class="fa fa-bolt"></i> 50% off on all items <span class="pull-right">08h ago</span></p>--}}
{{--                                    </div>--}}
{{--                                    <div class="notification-entry">--}}
{{--                                        <p><i class="fa fa-sun-o"></i> New Year special offer <span class="pull-right">1d ago</span></p>--}}
{{--                                    </div>--}}
{{--                                    <div class="notification-entry">--}}
{{--                                        <p><i class="fa fa-plane"></i> Domestic Flights Starting from $199 <span class="pull-right">1m ago</span></p>--}}
{{--                                    </div>--}}
{{--                                    <div class="notification-entry">--}}
{{--                                        <p><i class="fa fa-bed"></i> 20% Cashback on hotel booking <span class="pull-right">1h ago</span></p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
{{--                    <div id="booking" class="tab-pane fade in">--}}
{{--                        <div class="col-md-3 col-sm-3 col-xs-6">--}}
{{--                            <form>--}}
{{--                                <select class="form-control">--}}
{{--                                    <option>All Bookings</option>--}}
{{--                                    <option>Hotel</option>--}}
{{--                                    <option>Flight</option>--}}
{{--                                    <option>Holiday</option>--}}
{{--                                    <option>Cruise</option>--}}
{{--                                </select>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                        <div class="clearfix"></div>--}}
{{--                        <div class="col-md-12">--}}
{{--                            <div class="item-entry">--}}
{{--                                <span>Order ID: CR1234</span>--}}
{{--                                <div class="item-content">--}}
{{--                                    <div class="item-body">--}}
{{--                                        <div class="col-md-2 col-sm-2 clear-padding text-center">--}}
{{--                                            <img src="assets/images/offer1.jpg" alt="cruise">--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-4 col-sm-4">--}}
{{--                                            <h4>Grand Lilly <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></h4>--}}
{{--                                            <p>Check In: 22 Aug </p>--}}
{{--                                            <p>Check Out: 25 Aug</p>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-3 col-sm-3">--}}
{{--                                            <p class="confirmed"><i class="fa fa-check"></i>Confirmed</p>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-3 col-sm-3">--}}
{{--                                            <p><a href="#">Cancel</a></p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="item-footer">--}}
{{--                                        <p><strong>Order Date:</strong> 20 Aug 2015<strong>Order Total:</strong> $566</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="item-entry">--}}
{{--                                <span>Order ID: CR1568</span>--}}
{{--                                <div class="item-content">--}}
{{--                                    <div class="item-body">--}}
{{--                                        <div class="col-md-2 col-sm-2 clear-padding text-center">--}}
{{--                                            <img src="assets/images/airline/vistara-2x.png" alt="cruise">--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-4 col-sm-4">--}}
{{--                                            <h4>New Delhi <i class="fa fa-long-arrow-right"></i> New York</h4>--}}
{{--                                            <p>Take Off: 22 Aug </p>--}}
{{--                                            <p>Landing: 22 Aug</p>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-3 col-sm-3">--}}
{{--                                            <p class="confirmed"><i class="fa fa-check"></i>Confirmed</p>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-3 col-sm-3">--}}
{{--                                            <p><a href="#">Cancel</a></p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="item-footer">--}}
{{--                                        <p><strong>Order Date:</strong> 20 Aug 2015<strong>Order Total:</strong> $566</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="item-entry">--}}
{{--                                <span>Order ID: CR9880</span>--}}
{{--                                <div class="item-content">--}}
{{--                                    <div class="item-body">--}}
{{--                                        <div class="col-md-2 col-sm-2 clear-padding text-center">--}}
{{--                                            <img src="assets/images/offer1.jpg" alt="cruise">--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-4 col-sm-4">--}}
{{--                                            <h4>Wonderful Europe</h4>--}}
{{--                                            <p>Start: 22 Aug </p>--}}
{{--                                            <p>End: 25 Aug</p>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-3 col-sm-3">--}}
{{--                                            <p class="failed"><i class="fa fa-times"></i>Payment Failed</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="item-footer">--}}
{{--                                        <p><strong>Order Date:</strong> 20 Aug 2015<strong>Order Total:</strong> $566</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="item-entry">--}}
{{--                                <span>Order ID: CR1234</span>--}}
{{--                                <div class="item-content">--}}
{{--                                    <div class="item-body">--}}
{{--                                        <div class="col-md-2 col-sm-2 clear-padding text-center">--}}
{{--                                            <img src="assets/images/offer2.jpg" alt="cruise">--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-4 col-sm-4">--}}
{{--                                            <h4>Grand Lilly <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></h4>--}}
{{--                                            <p>Check In: 22 Aug </p>--}}
{{--                                            <p>Check Out: 25 Aug</p>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-3 col-sm-3">--}}
{{--                                            <p class="confirmed"><i class="fa fa-check"></i>Confirmed</p>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-3 col-sm-3">--}}
{{--                                            <p><a href="#">Cancel</a></p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="item-footer">--}}
{{--                                        <p><strong>Order Date:</strong> 20 Aug 2015<strong>Order Total:</strong> $566</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="item-entry completed">--}}
{{--                                <span>Order ID: CR1568</span>--}}
{{--                                <div class="item-content">--}}
{{--                                    <div class="item-body">--}}
{{--                                        <div class="col-md-2 col-sm-2 clear-padding text-center">--}}
{{--                                            <img src="assets/images/airline/vistara-2x.png" alt="cruise">--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-4 col-sm-4">--}}
{{--                                            <h4>New Delhi <i class="fa fa-long-arrow-right"></i> New York</h4>--}}
{{--                                            <p>Take Off: 22 Aug </p>--}}
{{--                                            <p>Landing: 22 Aug</p>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-3 col-sm-3">--}}
{{--                                            <p class="confirmed"><i class="fa fa-check"></i>Completed</p>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-3 col-sm-3">--}}
{{--                                            <p><a href="#">Submit Review</a></p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="item-footer">--}}
{{--                                        <p><strong>Order Date:</strong> 20 Aug 2015<strong>Order Total:</strong> $566</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="item-entry completed">--}}
{{--                                <span>Order ID: CR9880</span>--}}
{{--                                <div class="item-content">--}}
{{--                                    <div class="item-body">--}}
{{--                                        <div class="col-md-2 col-sm-2 clear-padding text-center">--}}
{{--                                            <img src="assets/images/offer3.jpg" alt="cruise">--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-4 col-sm-4">--}}
{{--                                            <h4>Wonderful Europe</h4>--}}
{{--                                            <p>Start: 22 Aug </p>--}}
{{--                                            <p>End: 25 Aug</p>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-3 col-sm-3">--}}
{{--                                            <p class="confirmed"><i class="fa fa-check"></i>Completed</p>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-3 col-sm-3">--}}
{{--                                            <p><a href="#">Submit Review</a></p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="item-footer">--}}
{{--                                        <p><strong>Order Date:</strong> 20 Aug 2015<strong>Order Total:</strong> $566</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="text-center load-more">--}}
{{--                                <a href="#">LOAD MORE</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div id="profile" class="tab-pane fade in active">
                        <div class="col-md-6">
                            <div class="user-personal-info">
                                <h4>Personal Information</h4>
                                <div class="user-info-body">
                                    <form >
                                        <div class="col-md-6 col-sm-6">
                                            <label>First Name</label>
                                            <input type="text" name="fname" required placeholder="First Name" class="form-control" value="{{$user->first_name}}">
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <label>First Name</label>
                                            <input type="text" name="lname" required placeholder="Last Name" class="form-control" value="{{$user->last_name}}">
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <label>Name</label>
                                            <input type="text" name="lname" required placeholder="Last Name" class="form-control" value="{{$user->name}}">
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-12">
                                            <label>Email-ID</label>
                                            <input type="email" name="email" required placeholder="lenore@example.com" class="form-control" value="{{$user->email}}">
                                        </div>
                                        <div class="col-md-12">
                                            <label>Contact Number</label>
                                            <input type="text" name="contact" required class="form-control" value="{{$user->mobile_number}}">
                                        </div>
                                        <div class="col-md-12">
                                            <label>Date Of Birth</label>
                                            <div class="clearfix"></div>
                                            <div class="col-md-12 col-sm-12 col-xs-12 clear-padding">
                                                <input type="date" name="contact" required class="form-control" value="{{$user->dob}}">
{{--                                                <select class="form-control" name="day">--}}
{{--                                                    <option>Day</option>--}}
{{--                                                    <option>01</option>--}}
{{--                                                    <option>02</option>--}}
{{--                                                    <option>03</option>--}}
{{--                                                    <option>04</option>--}}
{{--                                                    <option>05</option>--}}
{{--                                                </select>--}}
                                            </div>
{{--                                            <div class="col-md-4 col-sm-4 col-xs-4">--}}
{{--                                                <select class="form-control" name="month">--}}
{{--                                                    <option>Month</option>--}}
{{--                                                    <option>01</option>--}}
{{--                                                    <option>02</option>--}}
{{--                                                    <option>03</option>--}}
{{--                                                    <option>04</option>--}}
{{--                                                    <option>05</option>--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-4 col-sm-4 col-xs-4 clear-padding">--}}
{{--                                                <select class="form-control" name="year">--}}
{{--                                                    <option>Year</option>--}}
{{--                                                    <option>1990</option>--}}
{{--                                                    <option>1991</option>--}}
{{--                                                    <option>1992</option>--}}
{{--                                                    <option>1993</option>--}}
{{--                                                    <option>1994</option>--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
                                        </div>
                                        <div class="col-md-12">
                                            <label>Mobile Number</label>
                                            <input type="text" name="mobile_number" required class="form-control" value="{{$user->mobile_number}}">
                                        </div>
                                        <div class="col-md-12">
                                            <label>Passport Number</label>
                                            <input type="text" name="passport_number" required class="form-control" value="{{$user->passport_number}}">
                                        </div>
                                        <div class="col-md-12">
                                            <label>Passport Expiry Date</label>
                                            <input type="text" name="passport_number" required class="form-control" value="{{$user->passport_expiry_date}}">
                                        </div>
                                        <div class="col-md-12">
                                            <label>National Id Number</label>
                                            <input type="text" name="national_id_number" required class="form-control" value="{{$user->national_id_number}}">
                                        </div>
                                        <div class="col-md-12">
                                            <label>Gender</label>
                                            <input type="text" name="gender" required class="form-control" value="{{$user->gender}}">
                                        </div>
                                        <div class="col-md-12">
                                            <label>Spouse Name</label>
                                            <input type="text" name="spouse_name" required class="form-control" value="{{$user->spouse_name}}">
                                        </div>
                                        <div class="col-md-12">
                                            <label>Occupation</label>
                                            <input type="text" name="occupation" required class="form-control" value="{{$user->occupation}}">
                                        </div>

{{--                                        <div class="col-md-12">--}}
{{--                                            <label>Current Address</label>--}}
{{--                                            <textarea placeholder="Your Current Address" id="current-address" class="form-control" rows="5"></textarea>--}}
{{--                                            <div class="col-md-6 col-sm-6 col-xs-6 clear-padding">--}}
{{--                                                <input type="text" name="zip-code" class="form-control" placeholder="Zip Code">--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-6 col-sm-6 col-xs-6">--}}
{{--                                                <input type="text" name="zip-code" class="form-control" placeholder="City">--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-6 col-sm-6 clear-padding">--}}
{{--                                                <select class="form-control" name="country">--}}
{{--                                                    <option>Country</option>--}}
{{--                                                    <option>Australia</option>--}}
{{--                                                    <option>India</option>--}}
{{--                                                    <option>USA</option>--}}
{{--                                                    <option>UK</option>--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-6 col-sm-6">--}}
{{--                                                <select class="form-control" name="state">--}}
{{--                                                    <option>State</option>--}}
{{--                                                    <option>CA</option>--}}
{{--                                                    <option>GA</option>--}}
{{--                                                    <option>NY</option>--}}
{{--                                                    <option>SA</option>--}}
{{--                                                    <option>WA</option>--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-12">--}}
{{--                                            <label>Upload Avatar</label>--}}
{{--                                            <input type="file" name="profile-pic" class="upload-pic">--}}
{{--                                        </div>--}}
                                        <div class="clearfix"></div>
                                        <div class="col-md-6 col-sm-6 col-xs-6 text-center">
                                            <button type="submit">SAVE CHANGES</button>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6 text-center">
                                            <a href="#">CANCEL</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="user-change-password">
                                <h4>Change Password</h4>
                                <div class="change-password-body">
                                    <form >
                                        <div class="col-md-12">
                                            <label>Old Password</label>
                                            <input type="password" placeholder="Old Password" class="form-control" name="old-password">
                                        </div>
                                        <div class="col-md-12">
                                            <label>New Password</label>
                                            <input type="password" placeholder="New Password" class="form-control" name="new-password">
                                        </div>
                                        <div class="col-md-12">
                                            <label>Confirm Password</label>
                                            <input type="password" placeholder="Confirm Password" class="form-control" name="confirm-password">
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <button type="submit">SAVE CHANGES</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="user-preference">
                                <h4 data-toggle="collapse" data-target="#flight-preference" aria-expanded="false" aria-controls="flight-preference">
                                    <i class="fa fa-plane"></i> Flight Preference <span class="pull-right"><i class="fa fa-chevron-down"></i></span>
                                </h4>
                                <div class="collapse" id="flight-preference">
                                    <form >
                                        <div class="col-md-6 col-sm-6">
                                            <label>Price Range</label>
                                            <select class="form-control" name="flight-price-range">
                                                <option>Upto $199</option>
                                                <option>Upto $250</option>
                                                <option>Upto $499</option>
                                                <option>Upto $599</option>
                                                <option>Upto $1000</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <label>Food Preference</label>
                                            <select class="form-control" name="flight-food">
                                                <option>Indian</option>
                                                <option>Chineese</option>
                                                <option>Sea Food</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <label>Airline</label>
                                            <select class="form-control" name="flight-airline">
                                                <option>Indigo</option>
                                                <option>Vistara</option>
                                                <option>Spicejet</option>
                                            </select>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-12 text-center">
                                            <button type="submit">SAVE CHANGES</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="user-preference">
                                <h4 data-toggle="collapse" data-target="#hotel-preference" aria-expanded="false" aria-controls="hotel-preference">
                                    <i class="fa fa-bed"></i> Hotel Preference <span class="pull-right"><i class="fa fa-chevron-down"></i></span>
                                </h4>
                                <div class="collapse" id="hotel-preference">
                                    <form >
                                        <div class="col-md-6 col-sm-6">
                                            <label>Price Range</label>
                                            <select class="form-control" name="hotel-price-range">
                                                <option>Upto $199</option>
                                                <option>Upto $250</option>
                                                <option>Upto $499</option>
                                                <option>Upto $599</option>
                                                <option>Upto $1000</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <label>Food Preference</label>
                                            <select class="form-control" name="hotel-food">
                                                <option>Indian</option>
                                                <option>Chineese</option>
                                                <option>Sea Food</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <label>Facilities</label>
                                            <select class="form-control" name="hotel-facilities">
                                                <option>WiFi</option>
                                                <option>Bar</option>
                                                <option>Restaurant</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <label>Rating</label>
                                            <select class="form-control" name="hotel-facilities">
                                                <option>5</option>
                                                <option>4</option>
                                                <option>3</option>
                                            </select>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-12 text-center">
                                            <button type="submit">SAVE CHANGES</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
{{--                    <div id="wishlist" class="tab-pane fade in">--}}
{{--                        <div class="col-md-12">--}}
{{--                            <div class="item-entry">--}}
{{--                                <span><i class="fa fa-hotel"></i> Hotel</span>--}}
{{--                                <div class="item-content">--}}
{{--                                    <div class="item-body">--}}
{{--                                        <div class="col-md-2 col-sm-2 clear-padding text-center">--}}
{{--                                            <img src="assets/images/offer1.jpg" alt="cruise">--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-7 col-sm-7">--}}
{{--                                            <h4>Grand Lilly <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></h4>--}}
{{--                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-3 col-sm-3">--}}
{{--                                            <p><a href="#">Remove</a></p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="item-footer">--}}
{{--                                        <p><strong>Order Total:</strong> $566 <a href="#">Book Now</a></p>--}}
{{--                                    </div>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="item-entry">--}}
{{--                                <span><i class="fa fa-hotel"></i> Hotel</span>--}}
{{--                                <div class="item-content">--}}
{{--                                    <div class="item-body">--}}
{{--                                        <div class="col-md-2 col-sm-2 clear-padding text-center">--}}
{{--                                            <img src="assets/images/offer2.jpg" alt="cruise">--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-7 col-sm-7">--}}
{{--                                            <h4>Grand Lilly <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></h4>--}}
{{--                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-3 col-sm-3">--}}
{{--                                            <p><a href="#">Remove</a></p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="item-footer">--}}
{{--                                        <p><strong>Order Total:</strong> $566 <a href="#">Book Now</a></p>--}}
{{--                                    </div>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="item-entry">--}}
{{--                                <span><i class="fa fa-hotel"></i> Hotel</span>--}}
{{--                                <div class="item-content">--}}
{{--                                    <div class="item-body">--}}
{{--                                        <div class="col-md-2 col-sm-2 clear-padding text-center">--}}
{{--                                            <img src="assets/images/offer3.jpg" alt="cruise">--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-7 col-sm-7">--}}
{{--                                            <h4>Grand Lilly <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></h4>--}}
{{--                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-3 col-sm-3">--}}
{{--                                            <p><a href="#">Remove</a></p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="item-footer">--}}
{{--                                        <p><strong>Order Total:</strong> $566 <a href="#">Book Now</a></p>--}}
{{--                                    </div>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="item-entry">--}}
{{--                                <span><i class="fa fa-plane"></i> Flight</span>--}}
{{--                                <div class="item-content">--}}
{{--                                    <div class="item-body">--}}
{{--                                        <div class="col-md-2 col-sm-2 clear-padding text-center">--}}
{{--                                            <img src="assets/images/offer2.jpg" alt="cruise">--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-7 col-sm-7">--}}
{{--                                            <h4>New York <i class="fa fa-long-arrow"></i> New Delhi</h4>--}}
{{--                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-3 col-sm-3">--}}
{{--                                            <p><a href="#">Remove</a></p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="item-footer">--}}
{{--                                        <p><strong>Order Total:</strong> $566 <a href="#">Book Now</a></p>--}}
{{--                                    </div>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="item-entry">--}}
{{--                                <span><i class="fa fa-suitcase"></i> Tour</span>--}}
{{--                                <div class="item-content">--}}
{{--                                    <div class="item-body">--}}
{{--                                        <div class="col-md-2 col-sm-2 clear-padding text-center">--}}
{{--                                            <img src="assets/images/offer1.jpg" alt="cruise">--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-7 col-sm-7">--}}
{{--                                            <h4>Wonderful Europe</h4>--}}
{{--                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-3 col-sm-3">--}}
{{--                                            <p><a href="#">Remove</a></p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="item-footer">--}}
{{--                                        <p><strong>Order Total:</strong> $566 <a href="#">Book Now</a></p>--}}
{{--                                    </div>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="load-more text-center">--}}
{{--                                <a href="#">Load More</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div id="cards" class="tab-pane fade in">--}}
{{--                        <div class="col-md-12">--}}
{{--                            <div class="col-md-6">--}}
{{--                                <div class="card-entry">--}}
{{--                                    <div class="pull-right">--}}
{{--                                        <p><a href="#"><i class="fa fa-pencil"></i></a><a href="#"><i class="fa fa-times"></i></a></p>--}}
{{--                                    </div>--}}
{{--                                    <h3>XXXX XXXX XXXX 1234</h3>--}}
{{--                                    <p>Valid Thru 06/17</p>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                    <div class="card-type">--}}
{{--                                        <p>Name On Card</p>--}}
{{--                                        <div class="pull-left">--}}
{{--                                            <h3>Lenore</h3>--}}
{{--                                        </div>--}}
{{--                                        <div class="pull-right">--}}
{{--                                            <img src="assets/images/card/mastercard.png" alt="cruise">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-6">--}}
{{--                                <div class="card-entry">--}}
{{--                                    <div class="pull-right">--}}
{{--                                        <p><a href="#"><i class="fa fa-pencil"></i></a><a href="#"><i class="fa fa-times"></i></a></p>--}}
{{--                                    </div>--}}
{{--                                    <h3>XXXX XXXX XXXX 2345</h3>--}}
{{--                                    <p>Valid Thru 06/17</p>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                    <div class="card-type">--}}
{{--                                        <p>Name On Card</p>--}}
{{--                                        <div class="pull-left">--}}
{{--                                            <h3>Lenore</h3>--}}
{{--                                        </div>--}}
{{--                                        <div class="pull-right">--}}
{{--                                            <img src="assets/images/card/visa.png" alt="cruise">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="clearfix"></div>--}}
{{--                            <div class="col-md-6">--}}
{{--                                <div class="card-entry primary-card">--}}
{{--                                    <div class="pull-left">--}}
{{--                                        <span>Primary</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="pull-right">--}}
{{--                                        <p><a href="#"><i class="fa fa-pencil"></i></a><a href="#"><i class="fa fa-times"></i></a></p>--}}
{{--                                    </div>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                    <h3>XXXX XXXX XXXX 1234</h3>--}}
{{--                                    <p>Valid Thru 06/17</p>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                    <div class="card-type">--}}
{{--                                        <p>Name On Card</p>--}}
{{--                                        <div class="pull-left">--}}
{{--                                            <h3>Lenore</h3>--}}
{{--                                        </div>--}}
{{--                                        <div class="pull-right">--}}
{{--                                            <img src="assets/images/card/mastercard.png" alt="cruise">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-6">--}}
{{--                                <div class="user-add-card">--}}
{{--                                    <form >--}}
{{--                                        <input class="form-control" name="card-number" type="text" required placeholder="Card Number">--}}
{{--                                        <input class="form-control" name="cardholder-name" type="text" required placeholder="Cardholder Name">--}}
{{--                                        <div class="col-md-6 col-sm-6 col-xs-6 clear-padding">--}}
{{--                                            <input class="form-control" name="valid-month" type="text" required placeholder="Expiry Month">--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-6 col-sm-6 col-xs-6">--}}
{{--                                            <input class="form-control" name="valid-year" type="text" required placeholder="Expiry Year">--}}
{{--                                        </div>--}}
{{--                                        <div class="clearfix"></div>--}}
{{--                                        <div class="col-md-4 clear-padding">--}}
{{--                                            <input class="form-control" name="cvv" type="password" required placeholder="CVV">--}}
{{--                                        </div>--}}
{{--                                        <div class="clearfix"></div>--}}
{{--                                        <div>--}}
{{--                                            <button type="submit">ADD CARD</button>--}}
{{--                                        </div>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div id="complaint" class="tab-pane fade in">
                        <div class="col-md-12">
                            <div class="recent-complaint">
                                <h3>Service Requests</h3>
                                <div class="complaint-tabs">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a data-toggle="tab" href="#active-complaint" class="text-center"><i class="fa fa-bolt"></i> Active (6)</a></li>
                                        <li><a data-toggle="tab" href="#resolved-complaint" class="text-center"><i class="fa fa-history"></i> Resolved (4)</a></li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div id="active-complaint" class="tab-pane fade in active">
                                        <p><a href="#"><span>Ticket #123456:</span> My last booking was failed but ammount has been dedicted from my account.</a></p>
                                        <p><a href="#"><span>Ticket #113443:</span> My last booking was failed but ammount has been dedicted from my account.</a></p>
                                        <p><a href="#"><span>Ticket #113443:</span> My last booking was failed but ammount has been dedicted from my account.</a></p>
                                        <p><a href="#"><span>Ticket #123456:</span> My last booking was failed but ammount has been dedicted from my account.</a></p>
                                        <p><a href="#"><span>Ticket #113443:</span> My last booking was failed but ammount has been dedicted from my account.</a></p>
                                        <p><a href="#"><span>Ticket #113443:</span> My last booking was failed but ammount has been dedicted from my account.</a></p>
                                    </div>
                                    <div id="resolved-complaint" class="tab-pane fade in">
                                        <p><a href="#"><span>Ticket #123456:</span> My last booking was failed but ammount has been dedicted from my account.</a></p>
                                        <p><a href="#"><span>Ticket #113443:</span> My last booking was failed but ammount has been dedicted from my account.</a></p>
                                        <p><a href="#"><span>Ticket #113443:</span> My last booking was failed but ammount has been dedicted from my account.</a></p>
                                        <p><a href="#"><span>Ticket #123456:</span> My last booking was failed but ammount has been dedicted from my account.</a></p>
                                    </div>
                                </div>
                                <h3>New Requests</h3>
                                <div class="submit-complaint">
                                    <form >
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <label>Category</label>
                                            <select class="form-control" name="category">
                                                <option>Flight</option>
                                                <option>Hotel</option>
                                                <option>Cruise</option>
                                                <option>Holiday</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <label>Sub Category</label>
                                            <select class="form-control" name="sub-category">
                                                <option>Flight</option>
                                                <option>Hotel</option>
                                                <option>Cruise</option>
                                                <option>Holiday</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <label>Booking ID</label>
                                            <input type="text" class="form-control" name="booking-id" placeholder="e.g. CR12567">
                                        </div>
                                        <div class="col-md-12">
                                            <label>Subject</label>
                                            <input type="text" class="form-control" name="subject" placeholder="Problem Subject">
                                        </div>
                                        <div class="col-md-12">
                                            <label>Problem Description</label>
                                            <textarea class="form-control" rows="5" name="problem" placeholder="Your Issue"></textarea>
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <button type="submit">SUBMIT REQUEST</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: USER PROFILE -->
@endsection


@push('scripts')
    <script>

    </script>
@endpush
