      <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">
                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu" id="side-menu">
                            <li class="menu-title">Investment Dashboard</li>
                            <li>
                                <a href="{{ url('/client') }}" class="waves-effect">
                                    <i class="ti-home"></i><span class="badge badge-primary badge-pill float-right">2</span> <span> Home </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/client/withdraw-management') }}" class="waves-effect">
                                    <i class="ti-reload"></i>
                                    <span> Withdraw Money </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/client') }}/create-account" class="waves-effect">
                                <i class="ti-bar-chart"></i> Open New Account</a>
                            </li>
                            <li>
                                <a href="{{ url('/client/') }}/documents" class="waves-effect"><i class="ti-files">
                                </i><span> Documents & Contracts </span>
                                </a>
                            </li>
                            <li class="menu-title">FAQ/Contact</li> 
                            <li>
                                <a href="{{ url('/client/') }}/contact" class="waves-effect"><i class="ti-email"></i><span> Contact Us </span></a>
                            </li>
                            <li>
                                <a href="{{ url('/') }}pages-faq" class="waves-effect"><i class="ti-comments"></i><span> Help / FAQ </span></a>
                            </li>
                        </ul>
                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>
                </div>
                <!-- Sidebar -left -->
            </div>
            <!-- Left Sidebar End -->
