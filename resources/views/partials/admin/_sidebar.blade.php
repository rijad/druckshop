
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">

                <div class="sb-sidenav-menu-heading">
                    <a  href="{{ route('dashboard') }}">Dashboard</a>
                </div>

                

                <a class="nav-link" href="{{ route('customer.index') }}"> 
                    <div class="sb-nav-link-icon">
                        <i class="fa fa-sliders"></i>
                    </div>Customers
                </a>


                <!-- <a class="nav-link" href="{{ route('gallery.index') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fa fa-sliders"></i>
                    </div>Gallery
                </a> -->
                
                @if (Session::get('Parameter') == true)
                <a class="nav-link" href="{{ route('parameter.index') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-tachometer-alt"></i>
                    </div>Parameters
                </a>
                @elseif (Session::get('Parameter') == false)
                    <a></a>
                @endif 

                <a class="nav-link" href="{{ route('bindingsample.index') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-tachometer-alt"></i>
                    </div>Binding Sample Image
                </a>

                <a class="nav-link" href="{{ route('stylesheet.index') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-tachometer-alt"></i>
                    </div>Style Sheet
                </a>


                <a class="nav-link" href="{{ route('order') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fa fa-shopping-cart"></i>
                    </div>Orders
                </a>

                @if (Session::get('Return orders') == true)
                <a class="nav-link" href="{{ route('returnorder.index') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fa fa-shopping-cart"></i>
                    </div>Return Orders
                </a>
                @elseif (Session::get('Return orders') == false)
                    <a></a>
                @endif 

                <a class="nav-link" href="{{ route('payment') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fa fa-credit-card-alt"></i>
                    </div>Payment
                </a>
                <a class="nav-link" href="{{ route('freesample') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-tachometer-alt"></i>
                    </div>Free Samples
                </a>

                 @if (Session::get('Sliders') == true)
                    <a class="nav-link" href="{{ route('slider.index') }}"> 
                        <div class="sb-nav-link-icon">
                            <i class="fa fa-sliders"></i>
                        </div>Sliders
                    </a>
                @elseif (Session::get('Sliders') == false)
                    <a></a>
                @endif 

                <a class="nav-link" href="{{ route('newsletter.index') }}"> 
                    <div class="sb-nav-link-icon">
                        <i class="fa fa-sliders"></i>
                    </div>NewsLetter
                </a>

                <a class="nav-link" href="{{ route('FAQ.index') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fa fa-question-circle"></i>
                    </div>FAQ
                </a>
                
                <a class="nav-link" href="{{ route('about-edit') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-tachometer-alt"></i>
                    </div>About
                </a>

                @if (Session::get('Latest') == true)
                <a class="nav-link" href="{{ route('latest.index') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-tachometer-alt"></i>
                    </div>Latest
                </a>
                @elseif (Session::get('Latest') == false)
                    <a></a>
                @endif 

                <a class="nav-link" href="{{ route('users') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fa fa-users"></i>
                    </div>Admin Users
                </a>

                @if(Auth::guard('admin')->user()->role == 0)
                <a class="nav-link" href="{{ route('change-password', 1) }}">
                    <div class="sb-nav-link-icon">
                        <i class="fa fa-key"></i>
                    </div>Change Admin Password 
                </a>
                @endif

                @if(Auth::guard('admin')->user()->role == 0 || Auth::guard('admin')->user()->role == 1)
                    <a class="nav-link" href="{{ route('roles') }}"> 
                        <div class="sb-nav-link-icon">
                            <i class="fa fa-sliders"></i>
                        </div>Permissions
                    </a>
                @endif


                @if (Session::get('RoleMiddleware') == true)
                    <a class="nav-link" href="{{ route('user-roles') }}"> 
                        <div class="sb-nav-link-icon">
                            <i class="fa fa-sliders"></i>
                        </div>Roles
                    </a> 
                @elseif (Session::get('RoleMiddleware') == false)
                    <a></a>
                @endif

                @if(Auth::guard('admin')->user()->role == 0 || Auth::guard('admin')->user()->role == 1)
                    <a class="nav-link" href="{{ route('change-password', 2) }}">
                        <div class="sb-nav-link-icon">
                            <i class="fa fa-key"></i>
                        </div>Change Employee Password
                    </a>
                @endif

                

            </nav>
        </div>
