@extends('layouts.app')

@section('title', 'Eden Ramoneda | Home')
            <!-- Navbar -->
        <div id="app">
            <nav class="main-header navbar navbar-expand">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars hamburger-menu"></i></a>
                    </li>
                </ul>
 
            </nav>
            <!-- /.navbar -->

            <aside class=" main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="index3.html" class="brand-link">
                <img src="{{ asset('uploads/aerolink.png')}}" alt="Aerolink" class="brand-image img-circle">
                <h3 class="brand-text">Aerolink</h3>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                    <img src="{{ asset('uploads/eden.jpg')}}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">
                            {{ Auth::user()->name }}
                        </a>
                    </a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview menu-open">
                            <router-link to="/dashboard" class="nav-link">
                                <i class="nav-icon fa fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </router-link>
                        </li>
                        <li class="nav-item has-treeview">
                            <router-link to="/myinfo" class="nav-link">
                                <i class="nav-icon fas fa-money"></i>
                                <p>
                                    Personal Information 
                                </p>
                            </router-link>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('logout') }}" class="nav-link"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                <i class="nav-icon fa fa-user"></i>
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>
                <router-view></router-view>
        </div>
<script>
// Add active class to the current button (highlight it)
//var header = document.getElementById("myDIV");
var btns = document.getElementsByClassName("nav-item");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace(" active", "");
  this.className += " active";
  });
}
</script>