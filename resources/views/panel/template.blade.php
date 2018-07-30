@extends("layout.layout")


@section("body")

    <!--Header-part-->
    <div id="header">
        <h1><a href="dashboard.html">Matrix Admin</a></h1>
    </div>
    <!--close-Header-part-->


    <!--top-Header-menu-->
    <div id="user-nav" class="navbar navbar-inverse">
        <ul class="nav">
            <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome User</span><b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="icon-check"></i> My Tasks</a></li>
                    <li class="divider"></li>
                    <li><a href="login.html"><i class="icon-key"></i> Log Out</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div id="sidebar"><a href="/" class="visible-phone"><i class="icon icon-home"></i> Anasayfa</a>
        <ul>
            <li class=""><a href="{{Route("home")}}"><i class="icon icon-home"></i> <span>HomePage</span></a> </li>
            <li class=""><a href="{{Route("category.index")}}"><i class="icon icon-list"></i> <span>Category</span></a> </li>
            <li class=""><a href="{{Route("product.index")}}"><i class="icon icon-list"></i> <span>Product</span></a> </li>
        </ul>
    </div>
    <!--sidebar-menu-->

    <!--main-container-part-->
    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
        </div>
        <!--End-breadcrumbs-->

        <!--Action boxes-->
        <div class="container-fluid">
            @yield("content")
        </div>
    </div>

    <!--end-main-container-part-->

    <!--Footer-part-->

    <div class="row-fluid">
        <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
    </div>

    <!--end-Footer-part-->
@endsection

@section('css')
    @include("panel.css-and-js.css")
@endsection

@section('js')
    @include("panel.css-and-js.js")
@endsection

