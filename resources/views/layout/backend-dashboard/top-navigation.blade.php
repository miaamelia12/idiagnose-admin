<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
            <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                        @if(Auth::user()->profil == '')
                        <img src="{{asset('assets/template/production/images/user.png')}}" alt="">
                        @else
                        <img src="{{asset('images/user/'. Auth::user()->profil)}}" alt="profile image">
                        @endif
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('profil.index') }}"> Profile</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" role="button">
                            <i class="fa fa-sign-out pull-right"></i> Keluar
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->