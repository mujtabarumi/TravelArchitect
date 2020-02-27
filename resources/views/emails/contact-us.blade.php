@extends('layout.mail')
@section('mail_title', __('Easy.Jobs Message Notification'))
@section('mail_content')


    <img src="{{asset("/assets/images/logo.png")}}" width="250" height="131" alt="Logo">

    <table border="0" cellpadding="0" cellspacing="0" width="520" id="m_5757456170307957942m_-2982500232671187998template_container"
           style="border-radius:3px!important;background-color:#ffffff;border:1px solid #e9e9e9;border-radius:3px!important;padding:20px">
        <tbody>

        <tr>
            <td align="center" valign="top">

                <table border="0" cellpadding="0" cellspacing="0" width="520" id="m_5757456170307957942m_-2982500232671187998template_body">
                    <tbody>
                    <tr>
                        <td valign="top" style="border-radius:3px!important;font-family:'Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif">
                            <table border="0" cellpadding="20" cellspacing="0" width="100%">
                                <tbody>

                                <tr>
                                    <td valign="top">
                                        <div style="color:#000000;font-size:14px;font-family:'Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif;line-height:150%;text-align:left">

                                            <p>
                                                {{__("Hi")}}  ,
                                            </p>
                                            <p>
                                                <b>{{$messagedata['name']}}</b> has sent a message. Here we show his message details.
                                            </p>
                                            <p>
                                                <b>Name :</b> {{$messagedata['name']}} <br>
                                                <b>Email :</b> {{$messagedata['email']}} <br>
                                                <b>Title :</b> {{$messagedata['message-title']}} <br>
                                                <b>Message :</b> {{$messagedata['comment']}} <br>

                                                </p>
                                            <p>
                                                {{__("Kind Regards")}},<br>

                                                <b>Travel Architect</b>

                                            </p>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                        </td>
                    </tr>
                    </tbody></table>

            </td>
        </tr>
        <tr>
            <td align="center" valign="top">

                <table border="0" cellpadding="10" cellspacing="0" width="600" id="m_5757456170307957942m_-2982500232671187998template_footer" style="border-top:0">
                    <tbody><tr>
                        <td valign="top">
                            <table border="0" cellpadding="10" cellspacing="0" width="100%">
                                <tbody>
                                <tr>
                                    <td colspan="2" valign="middle" id="m_5757456170307957942m_-2982500232671187998credit" style="border:0;color:#000000;font-family:'Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif;font-size:12px;line-height:125%;text-align:center">
                                        <p><a href=""></a></p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
@endsection
