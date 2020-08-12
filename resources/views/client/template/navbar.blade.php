<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('forum')}}"><img src="{{asset('client/images/logo-ctu.png')}}"
                    alt="company logo" /></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right custom-menu">
                <li @if (Request::segment(1)=='hoc-tap' ) class='active' @endif>
                    <a href="{{route('forum')}}">Học tập</a></li>
                <li @if (Request::segment(1)=='chia-se' ) class='active' @endif>
                    <a href="{{route('share')}}">Chia sẻ</a></li>
                <li @if (Request::segment(1)=='cau-lac-bo' ) class='active' @endif>
                    <a href="{{route('club')}}">Câu lạc bộ</a></li>
                <li @if (Request::segment(1)=='doan-hoi' ) class='active' @endif>
                    <a href="{{route('union')}}">Đoàn, Hội</a></li>
                <li class="nav-item dropdown @if (Request::segment(1)=='tai-khoan') active @endif">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Chào,
                        {{ Auth::guard('student')->user()->stu_name }}
                    </a>
                    <div class="dropdown-menu" style="left: 0;" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item"
                            href="{{ route('Info',\Auth::user()->stu_code.".".(new Illuminate\Support\Str)::slug(\Auth::user()->stu_name)) }}">Thông
                            tin cá nhân</a>
                        <br>
                        <a class="dropdown-item" href="{{ route('chon-hoc-ky') }}">Tài liệu</a>
                        <br>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            style="background-color: red; color: white; ">Đăng xuất</a>
                    </div>
                </li>
                <li class="nav-item dropdown dropdown-notifications">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="fa fa-bell-o" aria-hidden="true"></i><span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right menu-notification" aria-labelledby="navbarDropdown">
                        @foreach (Auth::user()->notifications->take(9) as $notification)
                        <a class="dropdown-item" href="#">
                            <span>{!! $notification->noti_content!!}</span><br>
                        </a>
                        @endforeach
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>