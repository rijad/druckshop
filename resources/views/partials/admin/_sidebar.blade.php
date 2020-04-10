
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">
                                <a  href="{{ route('dashboard') }}">Dashboard</a>
                            </div>
                            <a class="nav-link" href="{{ route('users') }}">
                                <div class="sb-nav-link-icon">
                                    <i class="fa fa-sliders"></i>
                                </div>Users</a>
                            <a class="nav-link" href="{{ route('slider.index') }}"> 
                                <div class="sb-nav-link-icon">
                                    <i class="fa fa-sliders"></i>
                                </div>Sliders</a>
                            <a class="nav-link" href="{{ route('gallery.index') }}">
                                <div class="sb-nav-link-icon">
                                    <i class="fa fa-sliders"></i>
                                </div>Gallery</a>
                            <a class="nav-link" href="{{ route('parameter.index') }}">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-tachometer-alt"></i>
                                </div>Parameters</a>
                            <a class="nav-link" href="{{ route('order') }}">
                                <div class="sb-nav-link-icon">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>Orders</a>
                            <a class="nav-link" href="{{ route('returnorder.index') }}">
                                <div class="sb-nav-link-icon">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>Return Orders</a>
                            <a class="nav-link" href="{{ route('FAQ.index') }}">
                                <div class="sb-nav-link-icon">
                                    <i class="fa fa-question-circle"></i>
                                </div>FAQ</a>
                            <a class="nav-link" href="{{ route('payment') }}">
                                <div class="sb-nav-link-icon">
                                    <i class="fa fa-credit-card-alt"></i>
                                </div>Payment</a>
                            <a class="nav-link" href="{{ route('freesample') }}">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-tachometer-alt"></i>
                                </div>Free Samples</a>
                            <a class="nav-link" href="{{ route('about-edit') }}">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-tachometer-alt"></i>
                                </div>About</a>

                            <a class="nav-link" href="{{ route('bindingsample.index') }}">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-tachometer-alt"></i>
                                </div>Binding Sample Image</a>

                            <a class="nav-link" href="{{ route('defectfile') }}">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-tachometer-alt"></i>
                                </div>Defect File</a>
                </nav>
            </div>
