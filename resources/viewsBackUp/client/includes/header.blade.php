   <!-- Top Bar Start -->
   <div class="topbar">

<!-- LOGO -->
<div class="topbar-left">
    <a href="{{ url('/client') }}" class="logo">
        <span>
        <img src="{{ URL::asset('public/assets/images/logo-light.png') }}" alt="" height="18">
        </span>
        <i><img src="{{ URL::asset('public/assets/images/logo-sm.png') }}" alt="" height="22"></i>
    </a>
</div>

<nav class="navbar-custom">
    <ul class="navbar-right d-flex list-inline float-right mb-0">
        <li class="dropdown notification-list d-none d-md-block">
            <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <img src="{{ URL::asset('public/assets/images/flags/us_flag.jpg') }}" class="mr-2" height="12" alt=""/> English <span class="mdi mdi-chevron-down"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right language-switch">
                <a class="dropdown-item" href="#">
                <img src="{{ URL::asset('public/assets/images/flags/germany_flag.jpg') }}" alt="" height="16" />
                <span> German </span>
                </a>
                <a class="dropdown-item" href="#">
                <img src="{{ URL::asset('public/assets/images/flags/italy_flag.jpg') }}" alt="" height="16" />
                <span> Italian </span>
                </a>
                <a class="dropdown-item" href="#">
                <img src="{{ URL::asset('public/assets/images/flags/french_flag.jpg') }}" alt="" height="16" />
                <span> French </span>
                </a>
                <a class="dropdown-item" href="#">
                <img src="{{ URL::asset('public/assets/images/flags/spain_flag.jpg') }}" alt="" height="16" />
                <span> Spanish </span>
                </a>
                <a class="dropdown-item" href="#">
                <img src="{{ URL::asset('public/assets/images/flags/russia_flag.jpg') }}" alt="" height="16" />
                <span> Russian </span>
                </a>
            </div>
        </li>

        <!-- full screen -->
        <li class="dropdown notification-list d-none d-md-block">
            <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                <i class="mdi mdi-fullscreen noti-icon"></i>
            </a>
        </li>

        <!-- notification -->
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="mdi mdi-bell-outline noti-icon"></i>
                @if(auth()->user()->unreadnotifications->count())
                <span class="badge badge-pill badge-danger noti-icon-badge">{{ auth()->user()->unreadnotifications->count() }}</span>
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
                <!-- item-->
                <h6 class="dropdown-item-text">
                    Notifications @if(auth()->user()->unreadnotifications->count()) ({{ auth()->user()->unreadnotifications->count() }}) @endif
                </h6>
                <div class="slimscroll notification-item-list">
                <div class="markassRead">
                <a href="{{ route('markRead')}}">Mark all as Read</a>
                </div>
                @foreach( auth()->user()->unreadnotifications as $notification)
                    <a href="javascript:void(0);" class="dropdown-item notify-item unread">
                        <div class="notify-icon bg-warning"><i class="mdi mdi-message-text-outline"></i></div>
                        <p class="notify-details unread">{{ $notification->data['data'] }}<span class="text-muted">{{ $notification->data['data'] }}</span></p>
                    </a>
                    @endforeach

                    @foreach( auth()->user()->readnotifications as $notification)
                    <a href="javascript:void(0);" class="dropdown-item notify-item read">
                        <div class="notify-icon bg-warning"><i class="mdi mdi-message-text-outline"></i></div>
                        <p class="notify-details read">{{ $notification->data['data'] }}<span class="text-muted">{{ $notification->data['data'] }}</span></p>
                    </a>
                    @endforeach
                    <!-- item-->
                    <!-- <a href="javascript:void(0);" class="dropdown-item notify-item active">
                        <div class="notify-icon bg-success"><i class="mdi mdi-account-card-details"></i></div>
                        <p class="notify-details">New Investment Created<span class="text-muted">You have signed up for a 24 mo / $10,000 plan on Sept 12, 2019.</span></p>
                    </a> -->
                </div>
                <!-- All-->
                <a href="{{  url('client/notifications-managment') }}" class="dropdown-item text-center text-primary">
                        View all <i class="fi-arrow-right"></i>
                    </a>
            </div>
        </li>
        <li class="dropdown notification-list">
            <div class="dropdown notification-list nav-pro-img">
                <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="fa fa-user" style="font-size:1.5em;"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <a class="dropdown-item" href="{{ url('/client/account') }}"><i class="mdi mdi-account-circle m-r-5"></i> My Profile</a>
                    <a class="dropdown-item" href="{{ url('/client/investment_plans') }}"><i class="mdi mdi-bank m-r-5"></i> Investment Plans</a>
                    <a class="dropdown-item" href="{{ url('/client/receive_money') }}"><i class="mdi mdi-cash-multiple m-r-5"></i> Receive Money</a>
                    <div class="dropdown-divider"></div>
                    <!-- <a class="dropdown-item text-danger" href="/logout"><i class="mdi mdi-power text-danger"></i> Logout</a> -->
                    <a class="dropdown-item text-danger" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="mdi mdi-power text-danger"></i> Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                        </form> 
					
                </div>
            </div>
        </li>

    </ul>

    <ul class="list-inline menu-left mb-0">
        <li class="float-left">
            <button class="button-menu-mobile open-left waves-effect">
                <i class="mdi mdi-menu"></i>
            </button>
        </li>

    </ul>

</nav>

</div>
