<div class="site-nav-inner site-navigation navigation navdown">
    <div class="container">
        <nav class="navbar navbar-expand-lg ">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"><i class="icon icon-menu"></i></span></button>
            <!-- End of Navbar toggler-->

            <div class="collapse navbar-collapse justify-content-start" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a href="{{route('index')}}">Home</a>
                    </li>
                    <!-- li end-->
                    {{--@foreach()--}}
                    <li class="nav-item dropdown"><a class="nav-link" href="#" data-toggle="dropdown">Products<i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">404</a></li>
                            <li class="dropdown-submenu"><a class="nav-link" href="#" data-toggle="dropdown">Kids Wear</a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Child Menu 1</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- li end-->

                    </li>
                    <!-- li end-->
                    <li class="nav-item dropdown">
                        <a href="{{url('contact')}}">Contact</a>
                    </li>
                </ul>
                <!--Nav ul end-->
            </div>
            <a href="#" class="top-right-btn btn btn-primary">Request a Quote</a>
            <!-- Top bar btn -->
        </nav>
        <!-- Collapse end-->



    </div>
</div>
