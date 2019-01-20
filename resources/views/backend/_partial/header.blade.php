<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="Tokio Garments">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('backend/css/main.css') }}">

    {{-- trumbowyg --}}
    <link rel="stylesheet" type="text/css" href="{{ url('backend/js/trumbowyg/trumbowyg.min.css') }}">

    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="app sidebar-mini rtl">

<!-- Navbar-->
<header class="app-header"><a class="app-header__logo" href="{{ url('/') }}" target="_blank">Tokio Garments</a>

    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">
        <!-- User Menu-->
        <li class="dropdown">

            <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
                <i class="fa fa-user fa-lg"></i>
            </a>

            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                {{--<li><a class="dropdown-item" href="{{ url('profile') }}"><i class="fa fa-user fa-lg"></i> Profile</a></li>--}}
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
        </li>
    </ul>
</header>

<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
        <div>
            <p class="app-sidebar__user-name">{{ Auth::user() ==null ? '' : Auth::user()->name }}
                <?php
                    $path = Request::path();
                ?></p>
            <p class="app-sidebar__user-designation">Admin</p>
        </div>
    </div>

    <ul class="app-menu">

        <li><a class="app-menu__item {{ $path  == '/' ? 'active' : '' }}" target="_blank" href="{{ url('/') }}"><i class="app-menu__icon fa fa-external-link"></i><span class="app-menu__label">Visit Site</span></a></li>
        <li><a class="app-menu__item {{ $path  == 'dashboard' ? 'active' : '' }}" href="{{ url('dashboard') }}"><i class="app-menu__icon fa fa-dashboard"></i>  <span class="app-menu__label">Dashboard</span></a>
        <li><a class="app-menu__item  {{ starts_with($path, 'config') ? 'active' : '' }}" href="{{ route('config.index') }}"><i class="app-menu__icon fa fa-gear"></i><span class="app-menu__label">Global Settings</span></a>
        <li class="treeview"><a class="app-menu__item " href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-picture-o"></i><span class="app-menu__label">Production Unit</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item {{ starts_with($path,  'production-units') ? 'active' : '' }}" href="{{ route('production-units.index') }}"><i class="icon fa fa-circle-o"></i> Units</a></li>
                <li><a class="treeview-item {{ starts_with($path,  'production-categories') ? 'active' : '' }}" href="{{ route('production-categories.index') }}"><i class="icon fa fa-circle-o"></i> Categories</a></li>
                <li><a class="treeview-item {{ starts_with($path,  'production-equipments') ? 'active' : '' }}" href="{{ route('production-equipments.index') }}"><i class="icon fa fa-circle-o"></i> Equipments</a></li>
                <li><a class="treeview-item {{ starts_with($path,  'production-sliders') ? 'active' : '' }}" href="{{ route('production-sliders.index') }}"><i class="icon fa fa-circle-o"></i> Images</a></li>
            </ul>
        </li>
        <li><a class="app-menu__item {{ starts_with($path, 'slider') ? 'active' : '' }}" href="{{ route('slider.index') }}"><i class="app-menu__icon fa fa-picture-o"></i><span class="app-menu__label">Slider</span></a></li>
        <li><a class="app-menu__item {{ starts_with($path, 'client') ? 'active' : '' }}" href="{{ route('client.index') }}"><i class="app-menu__icon fa fa-thumbs-o-up"></i><span class="app-menu__label">Client</span></a></li>
        <li><a class="app-menu__item {{ starts_with($path,  'page') ? 'active' : '' }}" href="{{ route('page.index') }}"><i class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Page</span></a></li>
        <li><a class="app-menu__item {{ starts_with($path,  'equipment') ? 'active' : '' }}" href="{{ route('equipment.index') }}"><i class="app-menu__icon fa fa-cubes"></i><span class="app-menu__label">Equipment</span></a></li>
        <li><a class="app-menu__item {{ starts_with($path,  'compliance') ? 'active' : '' }}" href="{{ route('compliance.index') }}"><i class="app-menu__icon fa fa-sitemap"></i><span class="app-menu__label">Compliance</span></a></li>
        <li class="treeview"><a class="app-menu__item " href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-picture-o"></i><span class="app-menu__label">Photo Gallery</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item {{ starts_with($path,  'gallery_name') ? 'active' : '' }}" href="{{ route('gallery_name.index') }}"><i class="icon fa fa-circle-o"></i> Photo Category</a></li>
                <li><a class="treeview-item {{ starts_with($path,  'gallery') ? 'active' : '' }}" href="{{ route('gallery.index') }}"><i class="icon fa fa-circle-o"></i> Gallery</a></li>
            </ul>
        </li>
        <li><a class="app-menu__item {{ starts_with($path,  'social') ? 'active' : '' }}" href="{{ route('social.index') }}"><i class="app-menu__icon fa fa-link"></i><span class="app-menu__label"> Social Profiles</span></a></li>
        <li><a class="app-menu__item {{ starts_with($path,  'users') ? 'active' : '' }}" href="{{ route('users.index') }}"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label"> User Management</span></a></li>
    </ul>

</aside>
