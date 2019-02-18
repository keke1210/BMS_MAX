<!-- Navbar 2 -->

@role('admin|kamarier|menaxher|ekonomist')
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu" >
            <li class="nav-header" style="">
                <div class="dropdown profile-element row">
                    <a href="{{ url('/') }}" class="col-xs-12">
                        <img src="{{ asset('/images/official-logo.png')}}" class="hidden-xs col-xs-12 max-header" alt="">
                        <img src="{{ asset('/images/mini-logo.png')}}" class="col-xs-12 min-header" style="height:32px; margin-top:3px; margin-bottom:3px;"
                            alt="">
                    </a>
                </div>
            </li>
            @role('admin|menaxher')
            <li class="">
                <a href="/menaxher">
                    <i class="ti-id-badge ti-md"></i>
                    <span class="nav-label">Menaxher</span>
                </a>
            </li>
            @endrole
            @role('admin|kamarier')
            <li class="">
                <a href="/kamarier">
                    <i class="ti-id-badge ti-md"></i>
                    <span class="nav-label">Kamarier</span>
                </a>
            </li>
            @endrole
            @role('admin|ekonomist')
            <li class="">
                <a href="/ekonomist">
                    <i class="ti-id-badge ti-md"></i>
                    <span class="nav-label">Ekonomist</span>
                </a>
            </li>
            @endrole
            @role('admin|menaxher|kamarier|ekonomist')
            <li class="">
                <a href="/orders">
                    <i class="ti-write ti-md" aria-hidden="true"></i>
                    <span class="nav-label">Porosi</span>
                </a>
            </li>
            @endrole

        </ul>
    </div>
</nav>
<!-- END SIDE-MENU -->

<div class="navbar-fixed-top row border-bottom " id="topbar" >
    <div class="navbar-header col-sm-9 col-xs-2 no-padding">
        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary" href="#" ><i
                class="ti-menu" style="font-size: 22px; padding: 3px 6px!important"></i> </a>
    </div>
    <ul class="nav navbar-top-links navbar-right col-sm-3 text-right no-padding">
        <li class="profile-btn">
            <a href="/profile" title="Profile">
                <i class="ti-user ti-middle" style="font-size:25px;"></i>
            </a>
        </li>
        <li class="log-out-btn">

            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();"><i
                    class="ti-power-off ti-middle" style="font-size:25px;"></i>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>

    </ul>
    <!-- /.navbar -->
</div>
@endrole
