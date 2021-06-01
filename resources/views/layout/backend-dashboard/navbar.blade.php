<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Monika</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{asset('assets/template/production/images/img.jpg')}}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section {{ setShow(['anak*']) }}">
                <ul class="nav side-menu">
                    <li class="nav-item">
                        <a href="{{route('dashboard.index')}}" class="nav-link {{ Request::is('/') ? 'active' : '' }}"><i class="fa fa-home"></i> Dashboard</a>
                    </li>
                    <li><a><i class="fa fa-clone"></i> Master Data <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li class="nav-item">
                                <a href="{{route('anak.index')}}" class="nav-link {{ setActive(['anak*']) }}"> Data Anak</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('pendamping.index')}}" class="nav-link {{ setActive(['pendamping*']) }}"> Data Pendamping</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('konsultan.index')}}" class="nav-link {{ setActive(['konsultan*']) }}"> Data Konsultan</a>
                            </li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-calendar"></i> Jadwal Aktivitas</a>
                        <!-- <ul class="nav child_menu">
                            <li class="sub_menu"><a href="{{ url('/daftarkonsultasi') }}">Level Two</a>
                            </li>
                            <li><a href="#level2_1">Level Two</a>
                            </li>
                            <li><a href="#level2_2">Level Two</a>
                            </li>
                        </ul> -->
                    </li>
                    <li><a><i class="fa fa-bar-chart"></i> Pertumbuhan <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ url('/hasilpemeriksaan') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">Hasil Pemeriksaan</a></li>
                            <li><a href="media_gallery.html">Pemeriksaan</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-sitemap"></i> Perkembangan <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li class="nav-item">
                                <a href="{{route('diagnosa.index')}}" class="nav-link {{ Request::is('diagnosa') ? 'active' : '' }}">Daftar Diagnosa</a>
                            </li>
                            <li>
                                <a href="{{route('konsultasi.index')}}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">Daftar Konsultasi</a>
                            </li>
                        </ul>
                    </li>
            </div>
        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>