@include('homeheader')
<div class="container">
    <div class="row justify-content-center verify-email">
        <div class="col-md-8">
            <div class="card">
            <div class="alert alert-success" role="alert">
                         {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>
                <div class="card-body">
                
                <div class="desc">
                    <p><span>{{ Auth::user()->name }}</span> , you're one step away from a better finacial future.We've just sent you an email to verify that you're the owner of <span>{{Auth::user()->email }}</span></p>
                    <p class="bold">please click the link in the email to open your account.</p>
                </div>    

                
                <div class="re_send_mail">

                    <div class="left_sec">
                        <div class="user-profile">
                            Name {{ Auth::user()->name }}
                            <br>
                            Email {{ Auth::user()->email }}
                        </div>
                    </div>
                    <div class="right_sec">
                         <p>If you haven't received the email within 10 minutes,try sending it again. Don't forget to check your spam folder ! - {{ Auth::user()->name }}</p>
                         @if (session('resent'))
                         <!-- <div class="alert alert-success" role="alert">
                         {{ __('A fresh verification link has been sent to your email address.') }}
                         </div> -->
                            @endif
                            {{ __('Before proceeding, please check your email for a verification link.') }}
                            {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                    </div>

                    
                </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@include('homefooter')

