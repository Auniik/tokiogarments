<div class="site-nav-inner site-navigation navigation navdown">
    <div class="container">
        <nav class="navbar navbar-expand-lg ">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"><i class="icon icon-menu"></i></span></button>
            <!-- End of Navbar toggler-->

            <div class="collapse navbar-collapse justify-content-start" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    {{--<li class="nav-item dropdown">--}}
                        {{--<a href="{{route('index')}}">Home</a>--}}
                    {{--</li>--}}
                    <!-- li end-->

                    @foreach($menus as $menu)
                        @if (count($menu->submenus) == 0)
                                <li class="nav-item dropdown">
                                    <a href="{{url($menu->slug)}}">{{$menu->name}}</a>
                                </li>
                            @else
                                <li class="nav-item dropdown menu-nav">
                                    <a class="nav-link" href="{{url($menu->slug)}}" data-toggle="dropdown">{{$menu->name}}<i class="fa fa-angle-down"></i></a>
                        @endif

                        <ul class="dropdown-menu" role="menu">
                            @foreach($menu->submenus as $submenu)
                            <li><a href="{{url($submenu->slug)}}">{{$submenu->name}}</a></li>
                            {{--<li class="dropdown-submenu"><a class="nav-link" href="#" data-toggle="dropdown">Kids Wear</a>--}}
                                {{--<ul class="dropdown-menu">--}}
                                    {{--<li><a href="#">Child Menu 1</a></li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            @endforeach
                        </ul>
                    </li>
                    @endforeach
                    <!-- li end-->

                    </li>
                </ul>
                <!--Nav ul end-->
            </div>
            <a href="{{url('contact')}}" class="top-right-btn btn btn-primary">Contact</a>
            <!-- Top bar btn -->
        </nav>
        <!-- Collapse end-->



    </div>
</div>
