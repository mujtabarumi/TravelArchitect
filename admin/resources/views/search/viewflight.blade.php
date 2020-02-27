
<table>

    <tr>
        <td>Departure From :</td>
        <td>{{$model->departurefrom}}</td>
    </tr>
    <tr>
        <td>Departure To :</td>
        <td>{{$model->departureto}}</td>
    </tr>
    <tr>
        <td>Trip Type :</td>
        <td>{{$model->trip_type}}</td>
    </tr>
    <tr>
        <td>Departure Date :</td>
        <td>{{$model->departure_date}}</td>
    </tr>
    <tr>
        <td>Return Date :</td>
        <td>{{$model->return_date}}</td>
    </tr>
    <tr>
        <td>Travelers (adult):</td>
        <td>{{$model->adult_travelers_count}}</td>
    </tr><tr>
        <td>Travelers (child) :</td>
        <td>{{$model->child_travelers_count}}</td>
    </tr>
    <tr>
        <td>Class Type :</td>
        <td>{{$model->class_type}}</td>
    </tr>

    @if($model->user_id == "")

        <tr>
            <td>Name :</td>
            <td>{{$model->searchname}}</td>
        </tr>
        <tr>
            <td>Email :</td>
            <td>{{$model->searchemail}}</td>
        </tr>
        <tr>
            <td>Mobile :</td>
            <td>{{$model->searchmobile}}</td>
        </tr>
    @else
        <tr>
            <td>Name :</td>
            <td>{{$model->username}}</td>
        </tr>
        <tr>
            <td>Email :</td>
            <td>{{$model->useremail}}</td>
        </tr>
        <tr>
            <td>Mobile :</td>
            <td>{{$model->usermobile}}</td>
        </tr>

    @endif


    <tr>
        <td>Search Date :</td>
        <td>{{$model->searchcreate_at}}</td>
    </tr>
</table>