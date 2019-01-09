@include('backend._partial.header')

<main class="app-content">

    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> @yield('PageHead')</h1>
            <p>@yield('PageName')</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">@yield('PageUrl')</li>
        </ul>
    </div>

    @yield('content')

</main>


@include('backend._partial.footer')