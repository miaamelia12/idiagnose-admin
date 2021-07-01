<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{url('/')}}" class="site_title {{ Request::is('/') ? 'active' : '' }}"><i class="fa fa-stethoscope"></i> <span>Monika</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                @if(Auth::user()->profil == '')
                <img src="{{asset('assets/template/production/images/user.png')}}" alt="..." class="img-circle profile_img">
                @else
                <img src="{{asset('images/user/'. Auth::user()->profil)}}" alt="profile image" class="avatar" style="margin: 25px 0 0 20px; width: 50px; height: 50px; border-radius: 50%;">
                @endif
            </div>
            <div class="profile_info">
                <span>Selamat Datang,</span>
                <h2>{{ Auth::user()->level }}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <ul class="nav side-menu">
                    <li class="nav-item {{ setActive(['/', 'home']) }}">
                        <a href="{{url('/')}}" class="nav-link"><i class="fa fa-home"></i> Dashboard</a>
                    </li>
                    @if(Auth::user()->level == 'Admin')
                    <li><a><i class="fa fa-clone"></i> Master Data <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li class="nav-item">
                                <a href="{{ route('anak.index') }}" class="nav-link {{ setActive(['anak*']) }}"> Data Anak</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('pendamping.index') }}" class="nav-link {{ setActive(['pendamping*']) }}"> Data Pendamping</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('konsultan.index') }}" class="nav-link {{ setActive(['konsultan*']) }}"> Data Konsultan</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('user.index') }}" class="nav-link {{ setActive(['user*']) }}"> Data User</a>
                            </li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-calendar"></i> Jadwal Aktivitas <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li class="nav-item">
                                <a href="{{ route('aktivitas-batita.index') }}" class="nav-link {{ setActive(['aktivitas-batita*']) }}"> Batita</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('aktivitas-balita.index') }}" class="nav-link {{ setActive(['aktivitas-balita*']) }}"> Balita</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a href="{{route('aktivitas-anak.index')}}" class="nav-link {{ setActive(['aktivitas-anak*']) }}"> Anak-anak</a>
                            </li> -->
                        </ul>
                    </li>
                    @endif

                    @if(Auth::user()->level == 'Admin')
                    <li><a><i class="fa fa-stethoscope"></i> Prediksi Stunting <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li class="sub_menu"><a href="{{ route('data-sampel.index') }}" class="nav-link {{ setActive(['data-sampel*']) }}">Data Sampel</a></li>
                            <li><a href="{{ route('prediksi-stunting.index') }}" class="nav-link {{ setActive(['prediksi-stunting*']) }}">Prediksi</a></li>
                            <!-- <li><a href="{{route('riwayat-prediksi.index')}}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">Riwayat Prediksi</a></li> -->
                        </ul>
                    </li>
                    @else
                    <li>
                        <a href="{{ route('prediksi-stunting.index') }}" class="nav-link {{ setActive(['prediksi-stunting*']) }}"><i class="fa fa-stethoscope"></i>Prediksi</a>
                    </li>
                    @endif

                    @if(Auth::user()->level == 'Admin')
                    <li><a><i class="fa fa-clipboard"></i> Perkembangan Anak <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li class="nav-item">
                                <a href="{{ route('diagnosa.index') }}" class="nav-link {{ Request::is('diagnosa') ? 'active' : '' }}">Daftar Diagnosa</a>
                            </li>
                            <li>
                                <a href="{{ route('jadwal-konsultasi.index') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">Jadwal Konsultasi</a>
                            </li>
                            <li>
                                <a href="{{ route('riwayat-konsultasi.index') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">Riwayat Konsultasi</a>
                            </li>
                        </ul>
                    </li>
                    @endif
            </div>
        </div>
        <!-- /sidebar menu -->
    </div>
</div>