<?php // dd($mailData );?>
<body style="margin:0; padding:15px; background-color:#F4F6F8">
    <center>
        <table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#F4F6F8" class="wrapper">
            <tr>
                <td align="center" height="100%" valign="top" width="100%">
                    <table class="show_site_logo" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;margin:0;background: #0e223a;">
                        <tr>
                            <td height="15" style="font-size:15px; line-height:10px;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="center" valign="top">
                                <!-- <a href="{{ url('') }}"><img src="{{ asset('public/images/logo.png') }}" alt="Insight" width="110" height="30"></a> -->
                                <a href="{{ url('/') }}"><img style="width: 170px;margin: 10px 0;padding: 0;height: auto;" src="{{ url('public/assets/images/logo-light.png') }}"></a>
                            </td>
                        </tr>
                        <tr>
                            <td height="20" style="font-size:20px; line-height:10px;">&nbsp;</td>
                        </tr>
                    </table>
                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;padding: 30px;" bgcolor="#FFFFFF">
                        <tr>
                            <td align="center" valign="top">
                                <p style="font-size: 24px;line-height:32px;font-family: Helvetica, Arial, sans-serif;text-align: left;color:#222222;margin: 0 0 15px 0;padding:0;font-weight: bold;">Referral Mail</p>
                                <p style="font-size: 16px;line-height:26px;font-family: Helvetica, Arial, sans-serif;text-align: left;color:#444444;margin: 0 0 15px 0;padding:0;">Hi {{$mailData['referralUser']}}, </p>
                                <p style="font-size: 16px;line-height:26px;font-family: Helvetica, Arial, sans-serif;text-align: left;color:#444444;margin: 0 0 15px 0;padding:0;"> {{ $mailData['ref_by']}}  has referred you to register on RegalDollar</p>
                                <p style="font-size: 16px;line-height:26px;font-family: Helvetica, Arial, sans-serif;text-align: left;color:#444444;margin: 0 0 15px 0;padding:0;">Use the referral code in registration</p>
                                <p style="font-size: 16px;line-height:26px;font-family: Helvetica, Arial, sans-serif;text-align: left;color:#444444;margin: 0 0 15px 0;padding:0;"> Referral Code : {{ $mailData['referralcode']}} </p>
                                
                            </td>
                        </tr>
                        <tr>
                            <td width="100%" style="font-family:Avenir, Helvetica, sans-serif;">
                                <p style="margin:0px;font-weight: bold; font-size: 16px;color: #222;line-height:26px;font-family: Helvetica, Arial, sans-serif;text-align: left;">Regal Dollars</p>
                                <p style="margin:0px;font-weight: normal; font-size: 16px;color: #222;line-height:26px;font-family: Helvetica, Arial, sans-serif;text-align: left;">#445 Mount Eden Road, Mount Eden, Auckland,</p>
                                <p style="margin:0px;font-weight: normal; font-size: 16px;color: #222;line-height:26px;font-family: Helvetica, Arial, sans-serif;text-align: left;">#21 Greens Road RD 2 Ruawai 0592</p>	 
                                <a href="#" style="margin:0px;text-decoration: none;font-weight: bold; font-size: 14px;color: #0e223a;line-height:26px;font-family: Helvetica, Arial, sans-serif;text-align: left;">dev.umi.nig.mybluehost.me</a>
                            </td>
                        </tr>
                        
                    </table>
                    <table class="mail_temp_footer" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;padding: 30px;background: #0e223a;" bgcolor="#FFFFFF">
                        <tr>
                            <td align="center" valign="top">
                                  <span style="font-size: 12px;color: #fff;line-height:24px;font-family: Helvetica, Arial, sans-serif;">© 2020 Regal Dollar, LLC. All Rights Reserved. Proudly designed and coded by D4D.</span>                              
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </center>
</body>