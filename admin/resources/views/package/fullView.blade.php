@php
   // dd($package->meta);
    $title = data_get($package,'title');
    $packageTypeId = data_get($package,'package_type_id');
    $selectedPackageType = null;

        if (!blank($packageTypeId)) {
            $selectedPackageType = \App\Models\PackageType::find($packageTypeId);
        }
    $package_themes = json_decode(data_get($package,'theme_map',[]));
    $package_meta = data_get($package,'meta');
    $package_costs = data_get($package_meta,'package_cost',[]);
    $package_places = data_get($package_meta,'places',[]);

    $inclutions = json_decode(data_get($package, 'inclusion'));
    $exclutions = json_decode(data_get($package, 'exclusion'));
    $itineraries = data_get($package,'itineraries',[]);
    $package_address = data_get($package,'meta.address',[]);

    $selectedCountries = array();

    $selectedCities = array();

    if (!blank($package_address)) {
        $country = data_get($package_address,'country',[]);
        $city = data_get($package_address,'city',[]);
        if (!blank($country)) {
            foreach ($country as $co) {
                $dataCo = \App\Models\Country::find($co);
                array_push($selectedCountries,$dataCo);
            }
        }
        if (!blank($city)) {
            foreach ($city as $ci) {
                $dataCi = \App\Models\City::find($ci);
                array_push($selectedCities,$dataCi);
            }
        }
    }

    //dd($package_address);
@endphp
<html>
<body>
<table width="100%" style="padding: 40px 40px"  >

    <tr>
        <td ><h2><b> {{$title}} </b></h2>
{{--            <h3 style="font-style: italic; color:#ffe332">Turkey- The Land of the Crescent of Moon </h3>--}}
        </td>
    </tr>
    <tr >
        <td width="100%">
            <table width="100%" style="height: 150px" >
                <tr >
                    <td width="60%">
                        <table width="100%"  >
                            <tr>
                                <td >Travel Type:</td>
                                <td >
                                    @foreach($package_themes as $p_t)

                                        @if(!$loop->last)
                                            {{$p_t}} ,
                                        @else
                                            {{$p_t}}
                                        @endif
                                    @endforeach
                                    {{" - ".$selectedPackageType->name }}
                                </td>
                            </tr>
                            <tr>
                                <td>Travel Duration: </td>
                                <td>{{$package->duration}}</td>
                            </tr>
                            @if (!blank($package_costs))
                            <tr>
                                <td>Number of Traveler: </td>
                                <td>

                                        @foreach($package_costs as $pa)
                                            @if($loop->count > 1 )
                                                @if($loop->first)
                                                    {{$pa['person']}} /
                                                @else
                                                    {{$pa['person']}}
                                                @endif
                                            @else
                                            {{$pa['person']}}
                                            @endif
                                        @endforeach
                                        people
                                </td>
                            </tr>
                            @endif
                            <tr>
                                <td>Meal Plan: </td>
                                <td>As Per Itinerary</td>
                            </tr>
                            <tr>
                                <td>Vehicle: </td>
                                <td>As Per Itinerary </td>
                            </tr>
{{--                            <tr>--}}
{{--                                <td>Accommodation in hotel: </td>--}}
{{--                                <td>4 Star</td>--}}
{{--                            </tr>--}}

                        </table>
                    </td>
                    <td width="50%" >
                        <img align="left" style="background-color: #4c110f" width="300px" height="150px" src="{{url('public/image/Travelers-Logo-4.png')}}">
                    </td>
                </tr>
                <tr height="100%"><td></td></tr>
                <tr height="100%"><td></td></tr>
            </table>
        </td>

    </tr>

    <tr >
        <td width="50%"><h3 style=" text-decoration: underline;">{{$title}}</h3></td>
    </tr>
    <tr >
        <td width="50%"><h3 style=" color: coral;margin-top: -20px">

                @if (!blank($package_places))
                    (

                    @foreach($package_places as $p_p)
                        @if($loop->count > 1 )
                            @if($loop->first)
                                {{$p_p}} -
                            @else
                                {{$p_p}}
                            @endif
                        @else
                            {{$p_p}}
                        @endif
                        @endforeach


                    )
                @endif
            </h3></td>
    </tr>
    <tr height="100%"><td></td></tr>
    <tr >
        <td ><h3 align="center" style="color: #4c110f">Tentative Itinerary</h3></td>
    </tr>
    @foreach($itineraries as $iti)
    <tr>
        <td width="100%" style="background-color: #ffe332">
            <h2 style="margin-top: 10px;margin-left: 10px" align="left">{{$iti->title}}</h2>
        </td>
    </tr>
        @if(!blank($iti->itineraryIncludes))
        <tr>
            <td width="100%">
                <h4>includes:

                        @foreach($iti->itineraryIncludes as $include)

                            @if($loop->count > 1)
                                @if(!$loop->last)
                                    {{$include->text}},
                                @else
                                    {{$include->text}}
                                @endif
                            @else
                                {{$include->text}}
                            @endif

                        @endforeach

                </h4>
            </td>
        </tr>
        @endif
        @if(!blank($iti->details))
        <tr>
            <td width="100%">
                {!! $iti->details !!}
            </td>
        </tr>
        @endif
    @endforeach
    <tr>
        <td align="center"><b>End of our services here.</b></td>
    </tr>
    <tr>
        <td align="center" style="margin-bottom: 10px">
            <b>Thank you for choosing us for your travel in

                @if(!blank($selectedCountries))
                    @foreach($selectedCountries as $sco)

                        @if($loop->count > 1)
                            @if(!$loop->last)
                                {{$sco->name}},
                            @else
                                {{$sco->name}}
                            @endif
                        @else
                            {{$sco->name}}
                        @endif

                    @endforeach
                @endif
            </b>
        </td>
    </tr>
    @if(!blank($package_costs))
    <tr>

        <td width="50%" style="background-color:  #ffe332; margin-top: 10px" align="center">
            @foreach($package_costs as $pa)

                @if($loop->first)
                    <table width="50%" >

                        <tr>
                            <td align="center"><h4><b>PACAKGE PRICE PER {{$pa['person']}}</b></h4></td>
                        </tr>
                        <tr>
                            <td align="center"><h2><b>{{$pa['cost']}} /-
                                        @if($package->air_price_included === 1 )
                                            ( air price included)
                                        @else
                                            ( without air price )
                                        @endif
                                    </b></h2></td>
                        </tr>
                    </table>

                @endif
            @endforeach
        </td>
    </tr>
    @endif
    <tr >
        <td width="100%" style="margin-top: 15px"> <h2 style="text-align: center"> INCLUSIONS </h2></td>
    </tr>
    @if(!blank($inclutions))
        @foreach($inclutions as $inc)
            <tr>
                <td width="100%"> <i class="fa fa-info-circle"></i>{{$inc}}</td>
            </tr>
        @endforeach
    @endif

    <tr >
        <td width="100%" style="margin-top: 15px"> <h2 style="text-align: center"> EXCLUSIONS </h2></td>
    </tr>
    @if(!blank($exclutions))
        @foreach($exclutions as $exc)
            <tr>
                <td width="100%"> <i class="fa fa-info-circle"></i>{{$exc}}</td>
            </tr>
        @endforeach
    @endif

    <tr>
        <td width="100%" style="margin-top: 15px;margin-left: 10px" > <h2 style="text-align: left"> <U>Special Note:</U> </h2></td>
    </tr>
    <tr>
        <td width="100%">Booking should be made 40 days before travel otherwise price may change.</td>
    </tr>
    <tr>
        <td width="100%">This Package is for Minimum 2 per person.</td>
    </tr>
    <tr>
        <td width="100%">Air Tickets are subject to availability.</td>
    </tr>
    <tr>
        <td width="100%">You have to book your air ticket before one month of your travel.</td>
    </tr>
    <tr>
        <td width="100%">60% money should be paid for booking as advance.</td>
    </tr>

    <tr>
        <td width="100%" style="margin-top: 20px;text-align: center">***Flights timings may subject to change without prior notice from Airlines.</td>
    </tr>
    <tr>
        <td width="100%" style="margin-top: 15px;text-align: center">***Hotels will be booked as mentioned in the “INCLUSION” section as per their availability on
            twin/double sharing basis.</td>
    </tr>

</table>
</body>
</html>
