<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('mail_title')</title>
    <style>
        /* Footer */

        .footer {
            margin: 0 auto;
            margin-top: 10px;
            padding: 0;
            text-align: center;
            width: 350px;
            -premailer-cellpadding: 0;
            -premailer-cellspacing: 0;
            -premailer-width: 570px;
        }

        .footer p {
            color: #aeaeae;
            font-size: 12px;
            text-align: center;
        }

    </style>
</head>
<body>
<div marginwidth="0" marginheight="0" style="background-color:#f6f6f6;font-family:'Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif">

    <div style="width:100%;margin:0;padding:70px 0 70px 0">
        <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
            <tbody>
            <tr>
                <td align="center" valign="top">
                    <div id="m_5757456170307957942m_-2982500232671187998template_header_image">

                        @yield('mail_content')
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
        <table class="footer" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td class="content-cell" align="center">
                    <p> Copyright © {{ date('Y') }} {{ config('app.name') }}. {{__('All rights reserved.')}} </p>
                </td>
            </tr>
        </table>
    </div>

</div>
</body>
</html>
