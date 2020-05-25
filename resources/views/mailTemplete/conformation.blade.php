
<body style="margin:0; padding:15px; background-color:#F4F6F8">
    <center>
        <table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#F4F6F8" class="wrapper">
            <tr>
                <td align="center" height="100%" valign="top" width="100%">
                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;margin:0" bgcolor="#F4F6F8">
                        <tr>
                            <td height="15" style="font-size:15px; line-height:10px;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="center" valign="top">
                                <!-- <a href="{{ url('') }}"><img src="{{ asset('public/images/logo.png') }}" alt="Insight" width="110" height="30"></a> -->
                                <a href="{{ url('/') }}"><img src="{{ url('public/assets/images/logo-light.png') }}"  width="110" height="30"></a>
                            </td>
                        </tr>
                        <tr>
                            <td height="20" style="font-size:20px; line-height:10px;">&nbsp;</td>
                        </tr>
                    </table>
                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;padding: 30px;" bgcolor="#FFFFFF">
                        <tr>
                            <td align="center" valign="top">
                                <p style="font-size: 24px;line-height:32px;font-family: Helvetica, Arial, sans-serif;text-align: left;color:#222222;margin: 0 0 15px 0;padding:0;font-weight: bold;">Investment Details</p>
                                <p style="font-size: 16px;line-height:26px;font-family: Helvetica, Arial, sans-serif;text-align: left;color:#444444;margin: 0 0 15px 0;padding:0;">Hi {{ $currentUser }},</p>
                                <p style="font-size: 16px;line-height:26px;font-family: Helvetica, Arial, sans-serif;text-align: left;color:#444444;margin: 0 0 15px 0;padding:0;">{{ $message }} </p>
                                
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </center>
</body>