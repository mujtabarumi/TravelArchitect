<div>
    <table width="100%">
        <tr>
            <td width="20%" style="padding: 10px">Local Time</td>
            <td style="padding: 10px">{{$visaguide->local_time}}</td>
        </tr>
        <tr>
            <td width="20%" style="padding: 10px">Telephone Code</td>
            <td style="padding: 10px">{{$visaguide->telephone_code}}</td>
        </tr>
        <tr>
            <td width="20%" style="padding: 10px">Bank Time</td>
            <td style="padding: 10px">{{$visaguide->bank_time}}</td>
        </tr>
        <tr>
            <td width="20%" style="padding: 10px">Exchange Rate</td>
            <td style="padding: 10px">{{$visaguide->exchange_rate}}</td>
        </tr>
        <tr>
            <td width="20%" style="padding: 10px">Embassy Address</td>
            <td style="padding: 10px">{{$visaguide->embassy_address}}</td>
        </tr>


    </table>

    <h4><b>Visa Requirements</b></h4>
    {{$visaguide->visa_requirements}}

</div>