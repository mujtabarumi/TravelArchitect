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
    //dd($package_costs);
@endphp
<html>
<body>
<table width="100%" style="padding: 40px 40px">
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr>
        <td ><h2><b> {{$title}} </b></h2>
{{--            <h3 style="font-style: italic; color:#ffe332">Turkey- The Land of the Crescent of Moon </h3>--}}
        </td>
    </tr>
    <tr >
        <td width="50%">
            <table width="100%"  >
                <tr>
                    <td>
                        <table width="100%">
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
                        <img align="left" style="background-color: #4c110f" width="300px" height="200px" src="{{url('public/assets/images/Travelers-Logo-4.png')}}">
                    </td>
                </tr>

            </table>
        </td>

    </tr>
    <tr>
        <td><h3 style=" text-decoration: underline; ">{{$title}}</h3></td>
    </tr>
    <tr >
        <td><h3 style=" color: coral;margin-top: -20px">

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
    <tr >
        <td ><h3 align="center" style="color: #4c110f">Tentative Itinerary</h3></td>
    </tr>
    <tr >
        <td width="100%" style="background-color: #ffe332"><h2 style="margin-top: 10px" align="center">DAY 1: ARRIVE AT ISTANBUL</h2></td>

    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td><b>Free Day</b></td>
    </tr>
    <tr>
        <td><b>Arrive at Istanbul Airport, get picked up and check in your hotel</b></td>
    </tr>
    <tr>
        <td><img align="left"  src="{{url('public/assets/images/Travelers-Logo-4.png')}}">
        </td>
    </tr>
    <tr >
        <td width="100%" style="background-color: #ffe332"><h2 style="margin-top: 10px" align="center">DAY 2: SIGHTSEEING AT ISTANBUL</h2></td>

    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td><b>Free Day</b></td>
    </tr>
    <tr>
        <td><b>Arrive at Istanbul Airport, get picked up and check in your hotel</b></td>
    </tr>
    <tr>
        <td><img align="left"  src="{{url('public/assets/images/Travelers-Logo-4.png')}}">
        </td>
    </tr>
    <tr>
        <td align="center"><b>End of our services here.</b></td>
    </tr>
    <tr>
        <td align="center"><b>Thank you for choosing us for your travel in Turkey</b></td>
    </tr>
    <tr >
        <td width="50%" style="background-color:  #ffe332; margin-top: 10px" align="center">
            <table width="50%" >
                <tr>
                    <td align="center"><h4><b>PACAKGE PRICE PER PERSION</b></h4></td>
                </tr>
                <tr>
                    <td align="center"><h2><b>BDT 78,500/- (Without air ticket)</b></h2></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
