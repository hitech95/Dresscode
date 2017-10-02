<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dresscode Backoffice</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    @if (Auth::guard('admin')->check())
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="#">Products</a></li>
                        <li><a href="#">Orders</a></li>
                        @if(true)
                            <li><a href="#">Carts</a></li>
                        @endif
                        <li><a href="#">Tickets</a></li>
                        @if(true)
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false">
                                    Shops <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ route('admin.shops') }}">Shops</a></li>
                                    <li><a href="{{ route('admin.shop.create') }}">New Shop</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="{{ route('admin.brands') }}">Brands</a></li>
                                    <li><a href="{{ route('admin.brand.create') }}">New Brand</a></li>
                                </ul>
                            </li>
                        @else
                            <li><a href="{{ route('admin.shop') }}">Your Shop</a></li>
                        @endif
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                Employees <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Employees</a></li>
                                <li><a href="#">New Employees</a></li>
                                <li role="separator" class="divider"></li>
                                @if(true)
                                    <li><a href="{{ route('admin.roles') }}">Roles</a></li>
                                @endif
                            </ul>
                        </li>
                        @if(true)
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false">
                                    Customers <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ route('admin.customers') }}">Customers</a></li>
                                    <li><a href="{{ route('admin.customer.create') }}">New Customers</a></li>
                                </ul>
                            </li>
                        @endif
                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guard('admin')->guest())
                        <li><a href="{{ route('admin.login') }}">Login</a></li>
                        <li><a href="{{ route('admin.register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('admin.profile') }}">
                                        Your Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.logout') }}">
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
